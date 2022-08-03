<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function __construct(){
        parent::__construct();
                // $this->load->view('ui/trail');
        $this->load->model('Admin_model','am');
        $this->load->model('Client_model','cm');
        date_default_timezone_set("Asia/Karachi");
    }
        
    public function index()
	{
	    
	    if(isset($_SESSION['email'])  && isset($_SESSION['id'])){
	        $id =   $_SESSION['id'];
	        $email  = $_SESSION['email'];
	        $check = $this->am->check_admin($email,$id);
	        
	        if(empty($check)){
	            redirect('admin/signout');
	        }
	        else
	        {
    	        $data['today']          =   $this->am->get_todays_consignmnet();
    	        $data['arrival']         =   $this->am->get_Arrival_consignment();
                $data['arrival']         =   $this->am->reached_at_branch();
                $data['office']         =   $this->am->get_refuse_consignment();
                $data['re_attempt']         =   $this->am->re_attempt_consignment();
                $data['hold']         =   $this->am->hold_consignment();
                $data['cust_notavail']         =   $this->am->cust_notavail_consignment();
    	        $data['all']            =   $this->am->get_all_consignment();
    	        $data['new']            =   $this->am->get_canceled_consignment();
    	        $data['delivered']      =   $this->am->get_delivered_consignment();
    	        $data['undelivered']    =   $this->am->get_undelivered_consignment();
    	        $data['couriers']        =   $this->am->get_courier_cod();
    	        $data['news']           =   $this->am->news();
    	        $this->load->view('admin/dashboard',$data);
	        }
	    }
	    else{redirect('admin/login_view');}
	}
	
	
// ==================Import_Booking========================
    public function import(){
     if(isset($_SESSION['email'])){
            $data['datas']  =   $this->am->client();
	      $this->load->view('admin/import',$data);
	    }
	    else{redirect('admin/login_view');}
    }

    public function importbooking(){
        
        $allowed = array('xls', 'xlsx', 'csv');
        $filename = $_FILES['result_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) 
        {
            $this->session->set_flashdata('import_fail', 'Invalid File Format');
            redirect('admin/import');
        }
        else
        {
                    $shipper_id = $this->input->post('client');
                    $booking_date=date('Y-m-d');
                    require_once APPPATH.'third_party/PHPExcel.php';
                    $this->excel = new PHPExcel();
                    $file_info = pathinfo($_FILES["result_file"]["name"]);
                    $file_directory = "uploads/";
                    $new_file_name = date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];
                    
                    if(move_uploaded_file($_FILES["result_file"]["tmp_name"], $file_directory . $new_file_name))
                    {   
                        $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
                        $objReader	= PHPExcel_IOFactory::createReader($file_type);
                        $objPHPExcel = $objReader->load($file_directory . $new_file_name);
                        $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                        foreach($sheet_data as $data)
                        {
                            $result = array(
                                    'shipper_id'=> $shipper_id,
                                    'p_address' =>  $data['A'],
                                    'r_address' =>  $data['B'],
                                    'consignee_name' =>  $data['C'],
                                    'consignee_ref' =>  $data['D'],
                                    'consignee_number' =>  $data['E'],
                                    'consignee_email' =>  $data['F'],
                                    'consignee_address' =>  $data['G'],
                                    'cod' =>  $data['H'],
                                    'pcs' =>  $data['I'],
                                    'weight' =>  $data['J'],
                                    'description' =>  $data['K'],
                                    'city_id' =>  $data['L'],
                                    'remark' =>  $data['M'],
                                    'booking_date' => $booking_date
                                    
                            );
                            $this->am->import_bookings($result);
                        }
                    }
                    $this->session->set_flashdata('success', 'Your consignments has been booked');
            	    redirect('admin/import');
        }
    }
// ==================Import_Booking========================	
	
	
	
	
	
	
	










	
// ==================Admin login========================
	public function login(){
	   
	    $email  =   $this->input->post('email');
	    $pass   =   $this->input->post('pass');
	    $data   =   $this->am->login($email,$pass);
	    
	    if(empty($data)){
	        $this->session->set_flashdata('error', 'Email or passowrd is incorrect');
	        redirect('admin/login_view');
	    }
	    else{
	       
	    $newdata = array(
        'email'  => $data[0]['email'],
        'name'     => $data[0]['name'],
        'id'        =>$data[0]['c_id']);
        $this->session->set_userdata($newdata);
        
        
            redirect('Admin');
            
            
	    }
	}
	public function login_view(){
	    $this->load->view('admin/login');
	}
	public function signout(){
	     $this->session->unset_userdata('email','name');
	     redirect('Admin');
	}
// ==================Admin login========================



// ==================Load sheet========================
public function print_labels($id){
    if(isset($_SESSION['email'])){
        $data['datas']  =   $this->cm->consignments_details_print($id);
        $this->load->view('client/print_barcode',$data);
	    }else{redirect('Client/login_view');}
}
public function loadsheet(){
    if(isset($_SESSION['email'])){
        $id =   $_SESSION['c_id'];
        $data['datas']  =   $this->cm->loadsheet($id);
       $this->load->view('admin/loadsheet',$data);
       
	    }else{redirect('admin/login_view');}
}

public function print_loadsheet($id){
    if(isset($_SESSION['email'])){
        $email          =   $_SESSION['email'];
        $data['client'] =   $this->cm->get_client($email);
        $data['datas']  =   $this->cm->print_loadsheet($id);
        $this->load->view('admin/print_loadsheet',$data);
       
	    }else{redirect('admin/login_view');}
}
// ==================client========================

    public function clients(){
         if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->client();
	        $this->load->view('admin/client',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    public function add_client(){
         if(isset($_SESSION['email'])){
             
	        $this->load->view('admin/add_client');
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function add_new_client(){
      
       $dataforemail      =   $this->input->post();
             $torec        =   $dataforemail['email'];
             $passw        =   $dataforemail['password'];
        
       
        
         // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
             
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        // $mail->isSMTP();

        $mail->Host     = 'mail.redxcourier.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@redxcourier.com';
        $mail->Password = 'redxcourier@2021';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('info@redxcourier.com', 'Redx Courier');
        $mail->addReplyTo('info@redxcourier.com', 'Redx Courier');
        
        // Add a recipient
        $mail->addAddress($torec);
        
        // Add cc or bcc 
        // $mail->addCC('rajeshkumar1612169@gmail.com');
        // $mail->addBCC('rajeshkumar1612169@gmail.com');
        
        // Email subject
        $mail->Subject = 'Account created';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Congratulation your account has been Successfully created</h1>
            <p>You email is $torec and password is $passw.</p>";
        $mail->Body = $mailContent;
        
    
        if($mail->send()){
            
        
        if(isset($_SESSION['email'])){
             $data      =   $this->input->post();
             $to        =   $data['email'];
             $pass        =   $data['password'];
             $name      =   $data['name'];
             $subject   =   'Account Information';
             $message   =   'Dear '.$name.",<br><br>";
             $message   .=   'Your account has been successfully created With the following Credientials and Information'."\n";
             $message   .=  'Company name: '.$data['company_name']."<br>";
             $message   .=  'Name: '.$data['name']."<br>";
             $message   .=  'Number: '.$data['number']."<br>";
             $message   .=  'Email: '.$data['email']."<br>";
             $message   .=  'Password: '.$data['password']."<br>";
             $message   .=  'Address: '.$data['address']."<br>";
             $message   .=  'CNIC: '.$data['cnic']."<br><br><br><br>";
             $message   .=  'Thanks,'."<br>".'Customer Support'."<br>".'Capra Range Logistics';
             $message   .=  "<br>". 'Powered By recreatepk.com';
             $this->email($to,$subject,$message);
             $this->am->add_new_client($data);
             $this->session->set_flashdata('Saved', 'Client Created Successfully');
             
        
        
             
             redirect('admin/add_client');
	    }
	    else{redirect('admin/login_view');}
    }
    
    }
    public function edit_client($id){
         if(isset($_SESSION['email'])){
            $data['datas']  =   $this->am->get_client($id);
	        $this->load->view('admin/edit_client',$data);
	    }else{redirect('admin/login_view');}
    }
    public function edit_new_client($id){
         if(isset($_SESSION['email'])){
            $data  =   $this->input->post();
            $this->am->edit_new_client($id,$data);
	        $this->session->set_flashdata('Saved', 'Client Created Successfully');
	        redirect("admin/edit_client/$id");
	    }else{redirect('admin/login_view');}
    }
    
    public function delete_client($id){
        if(isset($_SESSION['email'])){
            $this->am->delete_client($id);
            $this->session->set_flashdata('Saved', 'Client Created Successfully');
	        redirect('admin/clients');
	    }else{redirect('admin/login_view');}
    }
    
    public function clients_leads(){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->clients_leads();
	        $this->load->view('admin/clients_leads',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function search_leads(){
        if(isset($_SESSION['email'])){
            $from = $this->input->post('start');
            $to = $this->input->post('end');
            $data['datas'] = $this->am->search_leads($from,$to);
	        $this->load->view('admin/clients_leads',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function delete_client_leads($id){
         if(isset($_SESSION['email'])){
            $this->am->delete_client_leads($id);
            $this->session->set_flashdata('delete', 'Client Deleted Successfully');
	        redirect('admin/clients_leads');
	    }else{redirect('admin/login_view');}
    }
    
     public function delete_client_requests($id){
         if(isset($_SESSION['email'])){
            $this->am->delete_client_requests($id);
            $this->session->set_flashdata('delete', 'Client request Deleted Successfully');
	        redirect('admin/client_request');
	    }else{redirect('admin/login_view');}
    }
    
    
    public function client_request(){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->client_request();
	        $this->load->view('admin/client_request',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function edit_request_client($id){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->get_client_request($id);
	        $this->load->view('admin/edit_client_request',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function edit_new_client_request($id){
         if(isset($_SESSION['email'])){
            $data   =   $this->input->post();
            $this->am->edit_new_client_request($id,$data);
            redirect('admin/client_request');
	    }
	    else{redirect('admin/login_view');}
    }
// ==================client========================

//====================Arrival==================================================
 public function arrival(){
        if(isset($_SESSION['email'])){
            $data['statuses']   =  $this->am->status();
            $data['datas']      =  $this->am->arrival();
	        $this->load->view('admin/arrival',$data); 
	    }
	    else{redirect('admin/login_view');}
    }
    public function search_booked_by_cns(){
        if(isset($_SESSION['email'])){
            $data           =   $this->input->post('cn');
            $cns            =   array_unique(explode("\n",$data),SORT_NUMERIC);
            $datas['datas']   =   $this->am->search_booked_by_cns($cns);
            $datas['statuses']   =  $this->am->status();
	        $this->load->view('admin/arrival',$datas); 
	    }
	    else{redirect('admin/login_view');}
    }
//====================Arrival==================================================


// ==================Booking========================

    public function booking(){
        if(isset($_SESSION['email'])){
            $data1               =  $this->input->post();
            $data['couriers']  =    $this->am->courier();
            $data['d_couriers']  =    $this->am->d_courier();
            $data['statuses']   =  $this->am->status();
            $data['datas']      =  $this->am->get_booking_date($data1);
	        $this->load->view('admin/consignment',$data);
	    }
	    else{redirect('admin/login_view');}
    }
     public function booking_date1(){
        if(isset($_SESSION['email'])){
            $data1               =  $this->input->post();
            $data['couriers']  =    $this->am->courier();
            $data['d_couriers']  =    $this->am->d_courier();
            $data['statuses']   =  $this->am->status();
            $data['datas']      =  $this->am->get_booking_date($data1);
	        $this->load->view('admin/consignment',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    public function booking_date(){
        if(isset($_SESSION['email'])){
	        $this->load->view('admin/consignment_date');
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function consignment_edit($id){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->consignment_edit($id);
            $data['cities']   =   $this->am->city();
	        $this->load->view('admin/consignment_edit',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function consignment_edit_new($id){
        if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
             $this->am->consignment_edit_new($data,$id);
             $this->session->set_flashdata('success', 'Edit Successfully');
             redirect("admin/consignment_edit/$id");
	    }
	    else{redirect('admin/login_view');}
    }
    public function add_booking(){
        if(isset($_SESSION['email'])){
            
            $data['clients']   =   $this->am->client();
            $data['cities']   =   $this->am->city();
	        $this->load->view('admin/add_booking',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function get_client_info(){
        $id =   $this->input->post('c_id');
        echo json_encode($this->am->get_client_info($id));
    }
    public function add_new_booking(){
	        $data   =   $this->input->post();
	         $to        =   $data['consignee_email'];
             $name      =   $data['consignee_name'];
             $address   =   $data['consignee_address'];
             $number    =   $data['consignee_number'];
             $cod       =   $data['cod'];
             $subject   =   'Consignment Booked';
             $message   =   'Dear '.$name.",<br><br>";
             $message   .=  'A consignment has been booked with Capra Range Logistics please see the following Details'."<br>";
             $message   .=  'For: '.$name."<br>";
             $message   .=  'Address: '.$address."<br>";
             $message   .=  'Number: '.$number."<br>";
             $message   .=  'Cash on Delivery: '.$cod."<br><br><br><br>";
             $message   .=  'You Can Also track your parcel on: https://deliveryensure.com/tracking/'."<br><br><br><br>";
             $message   .=  'Thanks,'."<br>".'Customer Support'."<br>".'Capra Range Logistics';
             $message   .=  "<br>". 'Powered By recreatepk.com';
             $this->email($to,$subject,$message);
	        $this->am->add_booking($data);
	        $this->session->set_flashdata('success', 'Your consignment has been booked');
	        redirect('admin/add_booking');
}
    public function consignment_delete($cn){
        if(isset($_SESSION['email'])){
             $this->am->consignment_delete($cn);
             $this->session->set_flashdata('del', 'deleted Successfully');
             redirect("admin/booking_date");
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function search_by_cns(){
        if(isset($_SESSION['email'])){
            $data           =   $this->input->post('cn');
            $cns            =   array_unique(explode("\n",$data),SORT_NUMERIC);
            $datas['datas']   =   $this->am->search_by_cns($cns);
            $datas['couriers']  =    $this->am->courier();
            $datas['d_couriers']  =    $this->am->d_courier();
            $datas['statuses']   =  $this->am->status();
	        $this->load->view('admin/consignment',$datas);
	    }
	    else{redirect('admin/login_view');}
    }
// ==================Booking========================



// ==================company========================

    public function profile(){
        if(isset($_SESSION['email'])){
            $email  =   $_SESSION['email'];
            $data['datas']   =   $this->am->profile($email);
	        $this->load->view('admin/profile',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    public function profile_edit($id){
        if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
             $this->am->profile_edit($data,$id);
             $this->session->set_flashdata('success', 'Edit Successfully');
             redirect("admin/profile/$id");
	    }
	    else{redirect('admin/login_view');}
    }
// ==================company========================


// =================================status======================================
    public function status(){
        if(isset($_SESSION['email'])){
             $data['datas']  =   $this->am->status();
             $this->load->view('admin/status',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    public function add_status(){
        if(isset($_SESSION['email'])){
             $this->load->view('admin/add_status');
	    }
	    else{redirect('admin/login_view');}
    }
    public function add_new_status(){
        if(isset($_SESSION['email'])){
            $data   =   $this->input->post();
            $this->am->add_new_status($data);
            $this->session->set_flashdata('success', 'Saved Successfully');
            redirect("admin/add_status");
	    }
	    else{redirect('admin/login_view');}
    }
    public function edit_status($id){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->get_status($id);
            $this->load->view('admin/edit_status',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    public function edit_new_status($id){
         if(isset($_SESSION['email'])){
            $data   =   $this->input->post();
            $this->am->edit_new_status($id,$data);
            $this->session->set_flashdata('success', 'edit Successfully');
            redirect("admin/edit_status/$id");
	    }
	    else{redirect('admin/login_view');}
    }
    public function delete_status($id){
         if(isset($_SESSION['email'])){
           
            $this->am->delete_status($id);
            $this->session->set_flashdata('success', 'deleted Successfully');
            redirect("admin/status");
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function change_status($s_id,$cn){
        if(isset($_SESSION['email'])){
            $this->am->insert_status($s_id,$cn);
            $this->am->change_status($s_id,$cn);
            $data   =   $this->am->get_client_by_cn($cn);
            $data1  =   $this->am->consignment_details($cn);
            if($s_id=='8'){
                $number     =   $data[0]['number'];
                $c_name     =   $data[0]['company_name'];
                $date       =   date('d/m/Y');
                
                $number1     =   $data1[0]['consignee_number'];
                $c_name1     =   $data1[0]['consignee_name'];
                $msg1        =   "Dear $c_name1, your package booked from $c_name is out for delivery";
                // $this->msgAPI($number1,$msg1);
                
            }
            
            $this->session->set_flashdata('changed', 'changed Successfully');
            redirect("admin/booking_date");
	    }
	    else{redirect('admin/login_view');}
    }
    public function change_statuses($status){
        $i    =   $this->input->post();
        $ids    =   $i['n'];
        if($ids[0]==='on'){
            unset($ids['0']);
           foreach($ids as $id){
                $this->am->insert_status($status,$id);
                $this->am->change_status($status,$id);
                $this->am->make_commission($id);
                
           }
        }
        else{
            foreach($ids as $id){
                $this->am->insert_status($status,$id);
                $this->am->change_status($status,$id);
                $this->am->make_commission($id);
           }
        }
        echo json_encode('success');
        
    }
    
    public function change_statuses_arrival($status){
        $i    =   $this->input->post();
        // $ids    =   $i['n'];
        foreach($i as $n){
            foreach($n as $data){
                if($data['ids']==='on'){
                    unset($data['ids']);
                   
                }
                else{
                    $id     =   $data['ids'];
                    $weight =   $data['weight'];
                    $this->am->insert_status($status,$id);
                    $this->am->change_status($status,$id);
                    $this->am->change_weights($id,$weight);
                }
            }
        }
        
        echo json_encode('success');
        
    }
    public function del_all(){
        $i    =   $this->input->post();
        $ids    =   $i['n'];
        if($ids[0]==='on'){
            unset($ids['0']);
           foreach($ids as $id){
                $this->am->del_all($id);
                
           }
        }
        else{
            foreach($ids as $id){
                $this->am->del_all($id);
                
           }
        }
        echo json_encode('success');
        
    }
    public function view_consignment_history($id){
        if(isset($_SESSION['email'])){
            $data['trackings']  =   $this->am->view_consignment_history($id);
            $data['datas']  =   $this->am->consignment_details($id);
           $this->load->view('admin/history',$data);
	    }
	    else{redirect('admin/login_view');}
    }
     public function tracking(){
        if(isset($_SESSION['email'])){
            $id =   $this->input->post('cn');
            $data['datas']      =   $this->cm->consignment_details($id);
            $data['trackings']   =   $this->cm->tracking($id);
           $this->load->view('admin/history',$data);
	    }
	    else{redirect('admin/login_view');}
    }
    
    public function delivered_POD(){
         if(isset($_SESSION['email'])){
        $cn   = $this->input->post('cn');
        $name = $this->input->post('recived_by');
        $s_id = '2';
        $data   =   $this->am->get_client_by_cn($cn);
        $this->am->delivered_POD($cn,$name,$s_id);
        $this->am->insert_status($s_id,$cn);
        $to         =   $data[0]['email'];
        $subject    =   'Status Change for CN# '.$cn;
        $message    =   'Dear '.$data[0]['company_name'].",<br><br><br>";
        $message    .=   'Consignment with tracking # '.$cn.' has been delivered'."<br>";
        $message    .=   'Receiving Person: '.$name."<br><br><br>";
             $message   .=  'Thanks,'."<br>".'Customer Support'."<br>".'Capra Range Logistics';
             $message   .=  "<br>". 'Powered By recreatepk.com';
        
        // $this->email($to,$subject,$message);
        
        
        $number     =   $data[0]['number'];
        $c_name     =   $data[0]['company_name'];
        $date       =   date('d/m/Y');
        $msg        =   "Dear $c_name, CN: $cn has been Delivered to $name on $date";
        // $this->msgAPI($number,$msg);
        $this->session->set_flashdata('changed', 'changed Successfully');
        redirect("admin/booking_date");
         }else{redirect('admin/login_view');}
        
    }
// =================================status======================================










// =================================inovicing======================================
    public function invoice(){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->invoice();
            $this->load->view('admin/customer_invoice',$data);
        }else{redirect('admin/login_view');}
    }
    public function add_invoice(){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->client();
            $this->load->view('admin/add_invoice',$data);
        }else{redirect('admin/login_view');}
    }
    public function get_client_consignment(){
        $data   =   $this->input->post();
        $email  =   $_SESSION['email'];
        $json['consingments']   =   $this->am->get_client_consignment($data);
        $json['tax']            =   $this->am->profile($email);
        echo json_encode($json);
    }
    public function add_new_invoice(){
        $data       =   $this->input->post();
        $r_amount   =   $data['r_amount'];
        $client_id  =   $data['c_id'];
        $cost       =   $data['total_cost'];
        $cl_data    =   $this->am->get_client_info($client_id);
        $number     =   $cl_data[0]['number'];
        $c_name     =   $cl_data[0]['company_name'];
        if($data['n'][0]=='on'){
            
            
            $msg        =   "Dear $c_name, Invoice has been created with Billed Amount of $r_amount PKR & cost of $cost PKR for further Info see your COD portal cod.deliveryensure.com/client";
            // $this->msgAPI($number,$msg);  
            
            unset($data['n'][0]);
            $this->am->add_new_invoice($data);
            echo json_encode($msg);
        }
        else{
            $msg        =   "Dear $c_name, Invoice has been created with Billed Amount of $r_amount PKR & cost of $cost PKR for further Info see your COD portal cod.deliveryensure.com/client";
            // $this->msgAPI($number,$msg);
            $this->am->add_new_invoice($data);
            echo json_encode($msg);
        }
        
        
    }
    public function pay_invoice($status,$id){
        if(isset($_SESSION['email'])){
            $statuss    =   $this->am->pay_invoice($status,$id);
            if($statuss == '1'){
                $email      =   $_SESSION['email'];
                $profile    =   $this->am->profile($email);
                $invoice    =   $this->am->invoice_details($id);
                
                $to         =   $invoice[0]['email'];
                $subject    =   'Invoice has been paid';
                $message    =   'Dear '.$invoice[0]['company_name'].',your invoice# '.$invoice[0]['ci_id'].' has been paid'.",<br><br><br>";
                $message    .=   "<table>
                                <thead>
                                <tr>
                                    <th>CN #</th>
                                    <th>Consignee Ref</th>
                                    <th>Consignee</th>
                                    <th>Destination City</th>
                                    <th>Booking Date</th>
                                    <th>Wieght</th>
                                    <th>Status</th>
                                    <th>COD</th>
                                    <th>Delivery Cost + Tax</th>
                                </tr>
                                </thead><tbody>";
                foreach($invoice as $invi){
                    $weight =   ceil($invi['weight']);
                    $price  =   $invi['price'];
                    $addkg  =   $invi['addkg'];
                    $khi_rtn =   $invi['khi_rtn'];
                    
                    $pricenwd=   $invi['pricenwd'];
                    $addkgnwd=   $invi['addkgnwd'];
                    $nwd_rtn =   $invi['nwd_rtn'];
                    
                    if($invi['c_id']=='175'){
                        if($invi['s_id']=='2'){
                            if($weight<=1){
                                $d_cost = $weight*$price;
                            }
                            else{
                                $new_weight = $weight-1;
                                $d_cost =   $price+($new_weight*$addkg);
                            }
                            
                            
                            $message    .=   "<tr><td>".$invi['consignment_id']."</td><td>".$invi['consignee_ref']."</td><td>".$invi['consignee_name']."</td><td>".$invi['city_name']."</td><td>".$invi['date']."</td><td>".$invi['weight']."</td><td>".$invi['description']."</td><td>".$invi['cod']."</td><td>".$d_cost." + Tax</td></tr>";
                        }
                        if($invi['s_id']=='11'){
                            $d_cost =   $khi_rtn;
                            $message    .=   "<tr><td>".$invi['consignment_id']."</td><td>".$invi['consignee_ref']."</td><td>".$invi['consignee_name']."</td><td>".$invi['city_name']."</td><td>".$invi['date']."</td><td>".$invi['weight']."</td><td>".$invi['description']."</td><td>".$invi['cod']."</td><td>".$d_cost." + Tax</td></tr>";
                        }
                            
                    }
                    else{
                        if($invi['s_id']=='2'){
                            if($weight<=1){
                                $d_cost = $weight*$pricenwd;
                            }
                            else{
                                $new_weight = $weight-1;
                                $d_cost =   $pricenwd+($new_weight*$addkgnwd);
                            }
                            $message    .=   "<tr><td>".$invi['consignment_id']."</td><td>".$invi['consignee_ref']."</td><td>".$invi['consignee_name']."</td><td>".$invi['city_name']."</td><td>".$invi['date']."</td><td>".$invi['weight']."</td><td>".$invi['description']."</td><td>".$invi['cod']."</td><td>".$d_cost." + Tax</td></tr>";
                        }
                        if($invi['s_id']='11'){
                            $d_cost =   $nwd_rtn;
                            $message    .=   "<tr><td>".$invi['consignment_id']."</td><td>".$invi['consignee_ref']."</td><td>".$invi['consignee_name']."</td><td>".$invi['city_name']."</td><td>".$invi['date']."</td><td>".$invi['weight']."</td><td>".$invi['description']."</td><td>".$invi['cod']."</td><td>".$d_cost." + Tax</td></tr>";
                        }
                            
                    }
                    
                }
                // print_r($to);
                // print_r($subject);
                // print_r($message);die;
                $this->email($to,$subject,$message);
                
                
                $this->session->set_flashdata('changed', 'changed Successfully');
                redirect('admin/invoice');
            }
            else{
                $this->session->set_flashdata('changed', 'changed Successfully');
                redirect('admin/invoice');
            }
            
        }else{redirect('admin/login_view');}
    }
    
    public function delete_invoice($id){
        if(isset($_SESSION['email'])){
            $this->am->delete_invoice($id);
            $this->session->set_flashdata('del', 'changed Successfully');
            redirect('admin/invoice');
        }else{redirect('admin/login_view');}
    }
    
    public function print_invoice($id){
         if(isset($_SESSION['email'])){
             $email =   $_SESSION['email'];
            $data['profile']    =   $this->am->profile($email);
            $data['invoice']    =   $this->am->invoice_details($id);
           $this->load->view('admin/print_invoice',$data);  
         }else{redirect('admin/login_view');}
    }
// =================================inovicing=================================








// =================================City======================================
    public function city(){
         if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->city();
            $this->load->view('admin/city',$data);
         }else{redirect('admin/login_view');}
    }
    
    public function add_city(){
         if(isset($_SESSION['email'])){
            $this->load->view('admin/add_city');
         }else{redirect('admin/login_view');}
    }
    
    public function add_new_city(){
         if(isset($_SESSION['email'])){
            $ref_id   =   $this->input->post('ref_id');
            $name   =   $this->input->post('name');
            $data   =   $this->am->add_new_city($ref_id,$name);
            if($data=='1'){
                $this->session->set_flashdata('error', 'ref no exist');
            }
            else{
                $this->session->set_flashdata('success', 'added Successfully');
            }
            redirect('admin/add_city');
         }else{redirect('admin/login_view');}
    }
    public function delete_city($id){
         if(isset($_SESSION['email'])){
            $this->am->delete_city($id);
            $this->session->set_flashdata('del', 'deleted Successfully');
            redirect('admin/city');
         }else{redirect('admin/login_view');}
    }
// =================================City======================================








// =================================Courier======================================

    public function courier(){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->courier();
            $this->load->view('admin/courier',$data);
         }else{redirect('admin/login_view');}
    }
    
    public function add_courier(){
        if(isset($_SESSION['email'])){
            $this->load->view('admin/add_courier');
         }else{redirect('admin/login_view');}
    }
    
    public function add_new_courier(){
        if(isset($_SESSION['email'])){
            $data   =   $this->input->post();
            $this->am->add_new_courier($data);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect('admin/add_courier');
         }else{redirect('admin/login_view');}
    }
    
    public function edit_courier($id){
        if(isset($_SESSION['email'])){
            $data['datas']   =   $this->am->get_courier($id);
            $this->load->view('admin/edit_courier',$data);
         }else{redirect('admin/login_view');}
    }
    
    public function edit_new_courier($id){
        if(isset($_SESSION['email'])){
            $data   =   $this->input->post();
            $this->am->edit_new_courier($id,$data);
            $this->session->set_flashdata('edit', 'added Successfully');
            redirect("admin/edit_courier/$id");
         }else{redirect('admin/login_view');}
    }
    
    public function delete_courier($id){
            $this->am->delete_courier($id);
            $this->session->set_flashdata('del', 'added Successfully');
            redirect("admin/courier");
    }
    
    public function courier_settlement(){
        if(isset($_SESSION['email'])){
            $data['datas']      =  $this->am->d_courier();
            $this->load->view('admin/courier_settlement',$data);
         }else{redirect('admin/login_view');}
    }
    public function print_delivery_sheet(){
        if(isset($_SESSION['email'])){
            $data['datas']   =  $this->am->d_courier();
            $this->load->view('admin/print_delivery_sheet',$data);
         }else{redirect('admin/login_view');}
    }
    public function get_delivery_sheet(){
        $id =   $this->input->post();
        echo json_encode($this->am->get_delivery_sheet($id));
    }
    
// =================================Courier======================================








// =================================change_pickup_delivery======================
    public function change_pickup($cid){
        $courier_id['pick_courier'] =   $cid;
         $i    =   $this->input->post();
        $ids    =   $i['n'];
        if($ids[0]==='on'){
            unset($ids['0']);
           foreach($ids as $id){
                $this->am->change_pickup($courier_id,$id);
                 $this->am->insert_status($s_id,$cn);
           }
        }
        else{
            foreach($ids as $id){
                $this->am->change_pickup($courier_id,$id);
           }
        }
        echo json_encode('success');
    }
    
    
    
    public function change_delivery($cid){
        $courier_id['delivery_courier'] =   $cid;
        $i    =   $this->input->post();
        $ids    =   $i['n'];
        if($ids[0]==='on'){
            unset($ids['0']);
           foreach($ids as $id){
                $this->am->change_delivery($courier_id,$id);
           }
        }
        else{
            foreach($ids as $id){
                $this->am->change_delivery($courier_id,$id);
           }
        }
        echo json_encode('success');
        
    }
// =================================change_pickup_delivery======================






// =================================courier_reports======================
    public function get_deliverd_consignmnet(){
        $id =   $this->input->post();
        $data['status']     =  $this->am->status();
        $data['consignment']     =  $this->am->get_all_assigned_consignment($id);
        echo json_encode($data);
    }
    public function courier_settlement_cod(){
        $i    =   $this->input->post();
        $statuses =   $i['statuses'];
        if(isset($i['n']) || !empty($i['n'])){
        $ids    =   $i['n'];
        foreach($statuses as $status){
            $this->am->change_status($status['status'],$status['ids']);
            $this->am->insert_status($status['status'],$status['ids']);
        }
        foreach($ids as $id){
                $this->am->courier_settlement($id);
           }
          echo json_encode('success');
        }
        else{
            foreach($statuses as $status){
            $this->am->change_status($status['status'],$status['ids']);
            $this->am->insert_status($status['status'],$status['ids']);
        }
        echo json_encode('success2');
        }
    }
    public function courier_reports_date(){
        if(isset($_SESSION['email'])){
            $this->load->view('admin/courier_reports_date');
         }else{redirect('admin/login_view');}
    }
    public function courier_reports(){
        if(isset($_SESSION['email'])){
            $s_date =   $this->input->post('start');
            $e_date =   $this->input->post('end');
            $data['datas']   =  $this->am->courier_reports($s_date,$e_date);
            $data['s_date']  =  $s_date;
            $data['e_date']  =  $e_date;
            $this->load->view('admin/courier_reports',$data);
         }else{redirect('admin/login_view');}
    }
// =================================courier_reports======================














// =================================news========================================
    public function news(){
         if(isset($_SESSION['email'])){
            $data['datas']   =  $this->am->news();
            $this->load->view('admin/news',$data);
         }else{redirect('admin/login_view');}
    }
    public function add_new_news(){
         if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
             $data['date']  =   date("Y-m-d", strtotime($data['date']));
            $this->am->add_news($data);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect('admin/add_news');
         }else{redirect('admin/login_view');}
    }
    public function add_news(){
         if(isset($_SESSION['email'])){
            $this->load->view('admin/add_news');
         }else{redirect('admin/login_view');}
    }
    public function edit_news($id){
         if(isset($_SESSION['email'])){
             $data['datas']  =   $this->am->get_news($id);
            $this->load->view('admin/edit_news',$data);
         }else{redirect('admin/login_view');}
    }
    public function edit_new_news($id){
         if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
             $data['date']  =   date("Y-m-d", strtotime($data['date']));
             $this->am->edit_news($id,$data);
             $this->session->set_flashdata('edit', 'added Successfully');
            redirect("admin/edit_news/$id");
         }else{redirect('admin/login_view');}
    }
    public function delete_news($id){
        if(isset($_SESSION['email'])){
             $this->am->delete_news($id);
             $this->session->set_flashdata('del', 'added Successfully');
            redirect("admin/news");
         }else{redirect('admin/login_view');}
    }
// =================================news========================================









// =================================expense_category========================================

    public function expense_category(){
         if(isset($_SESSION['email'])){
            $data['datas']   =  $this->am->expense_category();
            $this->load->view('admin/expense_category',$data);
         }else{redirect('admin/login_view');}
    }
    
    public function add_expense_category(){
        if(isset($_SESSION['email'])){
            $this->load->view('admin/add_expense_category');
         }else{redirect('admin/login_view');}
    }
    
     public function add_new_expense_category(){
         if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
            $this->am->add_new_expense_category($data);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect('admin/add_expense_category');
         }else{redirect('admin/login_view');}
    }
    
    public function edit_expense_category($id){
         if(isset($_SESSION['email'])){
             $data['datas']  =   $this->am->get_expense_category($id);
            $this->load->view('admin/edit_expense_category',$data);
         }else{redirect('admin/login_view');}
    }
    public function edit_new_expense_category($id){
         if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
             $this->am->edit_new_expense_category($id,$data);
             $this->session->set_flashdata('Success', 'added Successfully');
            redirect("admin/edit_expense_category/$id");
         }else{redirect('admin/login_view');}
    }
    public function delete_expense_category($id){
        if(isset($_SESSION['email'])){
             $this->am->delete_expense_category($id);
             $this->session->set_flashdata('del', 'added Successfully');
            redirect("admin/expense_category");
         }else{redirect('admin/login_view');}
    }
// =================================expense_category========================================




















// =================================expense========================================
     public function expense(){
         if(isset($_SESSION['email'])){
            $data['cash_in_account']    =   $this->am->get_money_account();
            $data['datas']   =  $this->am->expense_category_cost_total();
            $this->load->view('admin/expense',$data);
         }else{redirect('admin/login_view');}
    }
    
    public function get_expense_by_date(){
        if(isset($_SESSION['email'])){
        $start      =   $this->input->post('start');
        $end        =   $this->input->post('end');
        $data['start']  =   $start;
        $data['end']  =   $end;
        $data['cash_in_account']    =   $this->am->get_money_account();
        $data['datas']   =  $this->am->expense_category_cost_total_date($start,$end);
        $this->load->view('admin/expense',$data);
        }else{redirect('admin/login_view');}
    }
    
    public function get_expenses_data($id){
        if(isset($_SESSION['email'])){
            $data['datas']   =  $this->am->get_all_expense($id);
            $this->load->view('admin/expense_detail',$data);
         }else{redirect('admin/login_view');}
    }
    public function get_expenses_data_date($start,$end,$id){
        if(isset($_SESSION['email'])){
            $start1 = date("m/d/Y", strtotime($start));
            $end1 = date("m/d/Y", strtotime($end));
            $data['datas']   =  $this->am->get_all_expense_by_date($start1,$end1,$id);
            $this->load->view('admin/expense_detail',$data);
         }else{redirect('admin/login_view');}
    }
    public function add_expense(){
        if(isset($_SESSION['email'])){
            $data['datas']   =  $this->am->expense_category();
            $this->load->view('admin/add_expense',$data);
         }else{redirect('admin/login_view');}
    }
    public function add_new_expense(){
         if(isset($_SESSION['email'])){
             $data  =   $this->input->post();
             $cost  =   $this->input->post('cost');
            $this->am->add_new_expense($data);
            $this->am->subtract_from_account($cost);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect('admin/add_expense');
         }else{redirect('admin/login_view');}
    }
    public function edit_expense($id){
        if(isset($_SESSION['email'])){
            $data['expense']   =  $this->am->get_expense($id);
            $data['datas']  =  $this->am->expense_category();
            $this->load->view('admin/edit_expense',$data);
         }else{redirect('admin/login_view');}
    }
    public function edit_new_expense($id){
        if(isset($_SESSION['email'])){
            $data  =   $this->input->post();
            $cost  =    $this->input->post('cost');
            $this->am->change_again_account($id,$cost);
            $this->am->edit_new_expense($id,$data);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect("admin/edit_expense/$id");
         }else{redirect('admin/login_view');}
    }
    public function delete_expense($id,$id2){
        if(isset($_SESSION['email'])){
            $this->am->add_again_account($id);
            $this->am->delete_expense($id);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect("admin/get_expenses_data/$id2");
         }else{redirect('admin/login_view');}
    }
// =================================category========================================


















// =================================Accounts======================================
    public function add_money_account(){
        if(isset($_SESSION['email'])){
            $data['datas']   =  $this->am->get_money_account();
            $this->load->view('admin/account',$data);
         }else{redirect('admin/login_view');}
    }
    
    public function add_into_account(){
        if(isset($_SESSION['email'])){
             $add  =   $this->input->post('addmoney');
             $minus  =   $this->input->post('minusmoney');
            $this->am->add_into_account($add,$minus);
            $this->session->set_flashdata('success', 'added Successfully');
            redirect('admin/add_money_account');
         }else{redirect('admin/login_view');}
    }
// =================================Accounts======================================




















// =================================Email======================================
    public function email($to,$subject,$message){
        
        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');

        $this->email->set_newline("\r\n");
        $this->email->from($from,'Capra Range Logistics');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        // if ($this->email->send()) {
        //     echo 'Your Email has successfully been sent.';
        // } else {
        //     show_error($this->email->print_debugger());
        // }
        
        
        $this->email->send();
    }
// =================================Email======================================





// =================================msg======================================

    public function msgAPI($to,$msg){
          $msg1 =   urlencode($msg);
          $to1 =   urlencode($to);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://my.ezeee.pk/sendsms_url.html?Username=03322473158&Password=@03322473158&From=Delvyensure&To=$to1&Message=$msg1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
    } 
// =================================msg======================================


public function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}




}
