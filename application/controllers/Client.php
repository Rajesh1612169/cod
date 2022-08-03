<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	
	public function __construct(){
        parent::__construct();
                // $this->load->view('ui/trail');
                $this->load->helper('url');
        $this->load->model('Client_model','cm');
        date_default_timezone_set("Asia/Karachi");
    }
        
// ==================login========================
	public function login(){
	    $email  =   $this->input->post('email');
	    $pass   =   $this->input->post('pass');
	    $data   =   $this->cm->login($email,$pass);
	    if(empty($data)){
	        $this->session->set_flashdata('error', 'Email or passowrd is incorrect');
	        redirect('Client/login_view');
	    }
	    else{
	    $newdata = array(
        'email'  => $data[0]['email'],
        'name'     => $data[0]['name'],
        'c_id'     => $data[0]['c_id']);
        $this->session->set_userdata($newdata);
            redirect('Client');
	    }
	}
	
	
    public function register(){
        
         // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
            $data1 = $this->input->post();

            $email = $data1['email'];
            $pass = $data1['password'];


        
        // SMTP configuration
        $mail->isSMTP();

        $mail->Host     = 'mail.redxcourier.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@redxcourier.com';
        $mail->Password = 'redxcourier@2021';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('info@redxcourier.com', 'Redx Courier');
        $mail->addReplyTo('info@redxcourier.com', 'Redx Courier');
        
        // Add a recipient
        $mail->addAddress($email);
        
        // Add cc or bcc 
        // $mail->addCC('rajeshkumar1612169@gmail.com');
        // $mail->addBCC('rajeshkumar1612169@gmail.com');
        
        // Email subject
        $mail->Subject = 'Account created';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Congratulation your account has been Successfully created</h1>
            <p>You email is $email and password is $pass.</p>";
        $mail->Body = $mailContent;
        
        if($mail->send()){
        
        if($this->input->post())
        {
            
            
            $data = $this->input->post();
           
         
            if($this->cm->register($data))
            {
                $this->session->set_flashdata('Saved', 'Client Created Successfully');
                
                      
        
        
                redirect('client/login_view');
            }
        }
        
    }
        else
        {
            $this->load->view('client/register');
        }
	}
	public function login_view(){
	    $this->load->view('client/login');
	}
	public function signout(){
	     $this->session->unset_userdata('email','name');
	     redirect('Client');
	}
// ==================login========================


// ==================Booking========================
public function add_booking_show(){
    if(isset($_SESSION['email'])){
        $data['client'] =   $this->cm->get_client($_SESSION['email']);
        $data['cities'] =   $this->cm->city();
	        $this->load->view('client/add_booking',$data);
	    }
	    else{redirect('Client/login_view');}
}
public function add_booking(){
	        $data   =   $this->input->post();
	        $this->cm->add_booking($data);
	        $this->session->set_flashdata('success', 'Your consignment has been booked');
	        redirect('Client/add_booking_show');
}
public function consignment(){
    if(isset($_SESSION['email'])){
        $id =   $_SESSION['c_id'];
        $from   =   $this->input->post('from');
        $to     =   $this->input->post('to');
        if(isset($from) && isset($to)){
            $from   =   date("Y-m-d", strtotime($from));
            $to     =   date("Y-m-d", strtotime($to));
            $data['datas']  =   $this->cm->get_consignment_date($id,$from,$to);
        }
        else{
            $data['datas']  =   $this->cm->get_consignment($id);
        }
            
	        $this->load->view('client/consignment',$data);
	    }
	    else{redirect('Client/login_view');}
}

public function consignment_details($id){
     if(isset($_SESSION['email'])){
       
        $data['datas']      =   $this->cm->consignment_details($id);
        $data['trackings']   =   $this->cm->tracking($id);
	      $this->load->view('client/consignment_details',$data);
	    }
	    else{redirect('Client/login_view');}
}

public function print_label($id){
    if(isset($_SESSION['email'])){
        $data['datas']  =   $this->cm->consignment_details_print($id);
       $this->load->view('client/print_barcode',$data);
       
	    }else{redirect('Client/login_view');}
}

public function print_labels($id){
    if(isset($_SESSION['email'])){
        $data['datas']  =   $this->cm->consignments_details_print($id);
        $this->load->view('client/print_barcode',$data);
	    }else{redirect('Client/login_view');}
}
public function print_loadsheet($id){
    if(isset($_SESSION['email'])){
        $email          =   $_SESSION['email'];
        $data['client'] =   $this->cm->get_client($email);
        $data['datas']  =   $this->cm->print_loadsheet($id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $this->load->view('client/print_loadsheet',$data);
       
	    }else{redirect('Client/login_view');}
}

    public function set_barcode($code)
	{
     	$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode.
		Zend_Barcode::render('code128','image', array('text'=>$code), array());
	}
	
public function loadsheet(){
    if(isset($_SESSION['email'])){
        $id =   $_SESSION['c_id'];
        $data['datas']  =   $this->cm->loadsheet($id);
       $this->load->view('client/loadsheet',$data);
       
	    }else{redirect('Client/login_view');}
}
public function open_finalize_booking(){
    if(isset($_SESSION['email'])){
        $shipper_id     =   $_SESSION['c_id'];
        $data['datas']  =   $this->cm->open_finalize_booking($shipper_id);
       $this->load->view('client/finalize_booking',$data);
       
	    }else{redirect('Client/login_view');}
}
public function edit_consignement($id){
    if(isset($_SESSION['email'])){
        $data['cities'] =   $this->cm->city();
        $data['datas']  =   $this->cm->get_loadsheet_consignment_data($id);
       $this->load->view('client/edit_consignement',$data);
       
	    }else{redirect('Client/login_view');}
}

public function edit_new_consignement($id){
    if(isset($_SESSION['email'])){
        $data    =   $this->input->post();
        $this->cm->edit_new_consignement($id,$data);
         $this->session->set_flashdata('success', 'Your consignment has been booked');
       redirect("Client/edit_consignement/$id");
       
	    }else{redirect('Client/login_view');}
}
public function save_booking(){
    $shipper_id = $_SESSION['c_id'];
    $ids    =   $this->input->post();
    $data   =   $this->cm->save_booking($ids,$shipper_id);
    echo json_encode('done');
}
public function del_loadsheet_consigment(){
          $c_ids    =   $this->input->post();
         $this->cm->del_loadsheet_consigment($c_ids);
         echo json_encode('done');
}
public function del_loadsheet_consigment1($c_id){
         $this->cm->del_loadsheet_consigment1($c_id);
         $this->session->set_flashdata('success', 'Temporary consignment has been Deleted');
      redirect("Client/open_finalize_booking");
}
// ==================Booking========================











// ==================Import_Booking========================
    public function import(){
     if(isset($_SESSION['email'])){
       
	      $this->load->view('client/import');
	    }
	    else{redirect('Client/login_view');}
    }

    public function importbooking(){
        
        
        
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
            $sheet_data['sheet_data']	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            $sheet_data['cities'] =   $this->cm->city();
            $this->load->view('client/import2',$sheet_data);
        }
        
        
    }
    
    public function save_excel_date(){
        $data   =   $this->input->post();
         $final=array();
        // print("<pre>".print_r($data,true)."</pre>");die;
        $booking_date=date('Y-m-d');
        $shipper_id = $_SESSION['c_id'];
        $p_address =  $data['sheeta'];
        $r_address =  $data['sheetb'];
        $consignee_name     =   $data['sheetc'];
        $consignee_ref     =   $data['sheetd'];
        $consignee_number     =   $data['sheete'];
        $consignee_email     =   $data['sheetf'];
        $consignee_address     =   $data['sheetg'];
        $cod     =   $data['sheeth'];
        $pcs     =   $data['sheeti'];
        $weight     =   $data['sheetj'];
        $description =  $data['sheetk'];
        $remark =  $data['sheetm'];
        $city_id     =   1;
        
        $arrays		=	array_merge_recursive($p_address,$r_address,$consignee_name,$consignee_ref,$consignee_number,$consignee_email,$consignee_address,$cod,$pcs,$weight,$city_id,$description,$remark);

   
   for($i=1;$i<=count($data['sheeta']);$i++){
          
          $final['shipper_id']		=	$_SESSION['c_id'];
    			$final['p_address']	        =	$data['sheeta'][a.$i];
    			$final['r_address']	        =	$data['sheetb'][a.$i];
    			$final['consignee_name']	=	$data['sheetc'][a.$i];
    			$final['consignee_ref']		=	$data['sheetd'][a.$i];
    			$final['consignee_number']	=	$data['sheete'][a.$i];
    			$final['consignee_email']	=	$data['sheetf'][a.$i];
    			$final['consignee_address']	=	$data['sheetg'][a.$i];
    			$final['cod']		        =	$data['sheeth'][a.$i];
    			$final['pcs']	            =	$data['sheeti'][a.$i];
    			$final['weight']	        =	$data['sheetj'][a.$i];
    			$final['city_id']		    =	1;
    			$final['description']		=	$data['sheetk'][a.$i];
    			$final['remark']		    =	$data['sheetm'][a.$i];
    			$final['booking_date']		=  date('Y-m-d');
    		$this->cm->import_bookings($final);
  
   }
     
            
            $this->session->set_flashdata('success', 'Your consignments has been booked');
            redirect('Client/import');
    }
    
    
// ==================Import_Booking========================

















// ==================Invoice========================

    public function invoice(){
        if(isset($_SESSION['email'])){
            $id =   $_SESSION['c_id'];
            $data['datas']   =   $this->cm->invoice($id);
             $this->load->view('client/invoice',$data);
            
        }else{redirect('Client/login_view');}    
    }
    
    public function print_invoice($id){
         if(isset($_SESSION['email'])){
             $email =   $_SESSION['email'];
            $data['profile']    =   $this->cm->get_company();
            $data['invoice']    =   $this->cm->invoice_details($id);
           $this->load->view('client/print_invoice',$data);  
         }else{redirect('admin/login_view');}
    }
// ==================Invoice========================










// ===================================Invoice===================================
    public function report(){
        if(isset($_SESSION['email'])){
           $this->load->view('client/report');  
         }else{redirect('admin/login_view');}
    }
    public function get_consignment_by_status(){
        $c_id   =   $_SESSION['c_id'];
        $s_id   =   $this->input->post();
        echo json_encode($this->cm->get_consignment_by_status($c_id,$s_id));
    }
    public function get_consignment_by_date(){
         $data   =   $this->input->post();
         $c_id   =   $_SESSION['c_id'];
        echo json_encode($this->cm->get_consignment_by_date($data,$c_id));
    }
// ===================================Invoice===================================



//===================================Tracking===================================
public function Tracking(){
    if($_POST){
    $ids =   $this->input->post();
    $id =   $ids['cn'];
    $data['datas']      =   $this->cm->consignment_details($id);
    $data['trackings']   =   $this->cm->tracking($id);
	$this->load->view('client/tracking',$data);
    }
    else
    {
        redirect('client/login_view');
    }
}
//===================================Tracking===================================











// ===================================Profile===================================
    public function profile(){
        if(isset($_SESSION['email'])){
             $email =   $_SESSION['email'];
            $data['profile']    =   $this->cm->get_client($email);
           $this->load->view('client/profile',$data);  
         }else{redirect('admin/login_view');}
    }
    
    public function edit_profile($id){
        if(isset($_SESSION['email'])){
             $data =   $this->input->post();
           $this->cm->edit_profile($id,$data);
           $this->session->set_flashdata('success', 'Your profile successfully edited');
	    redirect('Client/profile');
         }else{redirect('admin/login_view');}
    }
// ===================================Profile===================================
	public function index()
	{
	    if(isset($_SESSION['email'])){
	        $email  =   $_SESSION['email'];
	        if(isset($_SESSION['c_id'])){
	        $id =   $_SESSION['c_id'];
	        $check  =   $this->cm->check_client($email,$id);
	        if(empty($check)){
	            redirect('Client/signout');
	        }
	        else{
	            $this->load->model('Admin_model','am');
	            $data['today']          =   $this->cm->get_todays_consignmnet($id);
    	        $data['weekly']         =   $this->cm->get_weekly_consignment($id);
    	        $data['all']            =   $this->cm->get_all_consignment($id);
    	        $data['new']            =   $this->cm->get_new_consignment($id);
    	        $data['delivered']      =   $this->cm->get_delivered_consignment($id);
    	        $data['return']      =   $this->cm->get_return_consignment($id);
    	        $data['undelivered']    =   $this->cm->get_undelivered_consignment($id);
    	        $data['news']           =   $this->am->news();
	            $this->load->view('client/dashboard',$data);
	        }
	        }
	        else{
	            redirect('Client/signout');
	        }
	    }
	    else{redirect('Client/login_view');}
	}
	
}
