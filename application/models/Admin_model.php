<?php
class Admin_model extends CI_Model {
    
// ========================login====================================
    public function login($email,$pass){
        return  $this->db->where('email',$email)
                            ->where('password',$pass)
                            ->get('company')->result_array();
    }
    
// ========================login====================================


    public function consignments_details_print($id){
        return $this->db->select('*,consignment.c_id as consignment_id,client.company_name,city.name as city_name,consignment.description as c_description')
                        ->from('consignment')
                        ->join('status','consignment.status_id=status.s_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->where('consignment.loadsheet_cconsignment_id',$id)
                        ->get()
                        ->result_array();
    }

    public function loadsheet($id){
        return $this->db->where('shipper_id',$id)->get('loadsheet')->result_array();
    }
    
        public function print_loadsheet($id){
        $data['printed']    =   1;
        $this->db->where('ls_id',$id)->update('loadsheet',$data);
        return $this->db->select('*,city.name as city_name,city.c_id as city_idddd,consignment.c_id as consignment_id')
                        ->from('consignment')
                        ->join('loadsheet','loadsheet.ls_id=consignment.loadsheet_cconsignment_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('consignment.loadsheet_cconsignment_id',$id)
                        ->get()
                        ->result_array();
    }



// ========================Index====================================
    public function get_todays_consignmnet(){
        $date = date('Y-m-d');
        return $this->db->select('COUNT(c_id)')
                        ->where('booking_date',$date)
                        ->get('consignment')
                        ->result_array();
    }
    public function get_weekly_consignment(){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where("yearweek(DATE(booking_date), 1) = yearweek(curdate(), 1)")
                        ->get()
                        ->result_array();
    }
    public function get_all_consignment(){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->get()
                        ->result_array();
    }
    public function get_canceled_consignment(){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','11')
                        ->get()
                        ->result_array();
    }
    public function get_delivered_consignment(){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','2')
                        ->get()
                        ->result_array();
    }
    public function get_undelivered_consignment(){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id !=','2')
                        ->where('status_id !=','1')
                        ->where('status_id !=','11')
                        ->get()
                        ->result_array();
    }
    public function get_courier_cod(){
        return $this->db->select('SUM(cod),d_courier.name,d_courier.father_name,d_courier.c_id')
                        ->from('consignment')
                        ->join('d_courier','consignment.delivery_courier=d_courier.c_id')
                        ->where('consignment.status_id','2')
                        ->group_by("delivery_courier")
                        ->get()
                        ->result_array();
    }
    public function get_Arrival_consignment(){
         return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','7')
                        ->get()
                        ->result_array();
    }
    public function get_refuse_consignment(){
         return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','5')
                        ->get()
                        ->result_array();
    }
    public function reached_at_branch(){
         return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','16')
                        ->get()
                        ->result_array();
    }
    public function re_attempt_consignment(){
         return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','17')
                        ->get()
                        ->result_array();
    }
    public function hold_consignment(){
         return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','10')
                        ->get()
                        ->result_array();
    }
    public function cust_notavail_consignment(){
         return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('status_id','9')
                        ->get()
                        ->result_array();
    }
// ========================Index====================================










// ========================Client====================================
    public function client(){
        $this->db->from('client');
        $this->db->order_by("c_id", "asc");
        $query = $this->db->get(); 
        return $query->result_array();
    }
    public function add_new_client($data){
        $this->db->insert('client',$data);
    }
    public function get_client($id){
        return $this->db->where('c_id',$id)->get('client')->result_array();
    }
    public function edit_new_client($id,$data){
        $this->db->where('c_id',$id)
                ->update('client',$data);
    }
    public function delete_client($id){
        $this->db->where('c_id',$id)
                ->delete('client');
    }
    public function client_request(){
        return $this->db->get('client_request')->result_array();
    }
    
    public function clients_leads(){
        return $this->db->get('leads')->result_array();
    }
    
     public function delete_client_leads($id){
        return $this->db->where('id',$id)->delete('leads');
    }
     public function delete_client_requests($id){
        return $this->db->where('c_id',$id)->delete('client_request');
    }
    
    public function search_leads($from,$to){
        return $this->db->where('date >=',$from)->where('date <=',$to)->get('leads')->result_array();
    }
    
    public function get_client_request($id){
        return $this->db->where('c_id',$id)->get('client_request')->result_array();
    }
    
    public function edit_new_client_request($id,$data){
        $this->db->insert('client',$data);
        
        $this->db->where('c_id',$id)
                ->delete('client_request');
    }
// ========================Client====================================




// ========================Bookings====================================
    public function booking(){
        return $this->db->select('*,client.name as contact_name,consignment.c_id as cn')
                        ->from('consignment')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('status','status.s_id=consignment.status_id')
                        // ->group_by('consignment.booking_date')
                        ->order_by('consignment.booking_date','desc')
                        ->get()
                        ->result_array();
    }
    public function consignment_edit($id){
        return $this->db->select('*,client.name as contact_name,consignment.c_id as cn')
                        ->from('consignment')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->where('consignment.c_id',$id)
                        ->get()
                        ->result_array();
    }
    public function consignment_edit_new($data,$id){
        $this->db->where('c_id',$id)
                ->update('consignment',$data);
    }
    public function get_client_info($id){
        return $this->db->where('c_id',$id)
                        ->get('client')
                        ->result_array();
    }
    public function add_booking($data){
        $this->db->insert('consignment',$data);
    }
    public function import_bookings($data){
        $this->db->insert('loadsheet_consignment',$data);
        return true;
    }
    
    public function arrival(){ 
        return $this->db->select('*,client.name as contact_name,consignment.c_id as cn,city.name as city_name')
                        ->from('consignment')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('consignment.status_id','1')
                        ->get()
                        ->result_array();
    }
    
    public function get_booking_date($data){
        $s_date  =   $data['start'];
        $e_date  =   $data['end'];
        $start  =   date("Y-m-d", strtotime($s_date));
        $end    =   date("Y-m-d", strtotime($e_date));
        
        return $this->db->select('*,client.name as contact_name,consignment.c_id as cn,courier.name as courier_name,d_courier.name as d_courier_name,city.name as city_name')
                        ->from('consignment')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('courier','courier.c_id=consignment.pick_courier')
                        ->join('d_courier','d_courier.c_id=consignment.delivery_courier')
                        // ->order_by('consignment.booking_date','asc')
                        ->where('consignment.booking_date >=',$start)
                        ->where('consignment.booking_date <=',$end)
                        ->get()
                        ->result_array();
    }
    public function search_by_cns($cns){
        if(!empty($cns) || isset($cns)){
        foreach($cns as $cn){
        $cs[] =   $this->db->select('*,client.name as contact_name,consignment.c_id as cn,courier.name as courier_name,d_courier.name as d_courier_name,city.name as city_name')
                        ->from('consignment')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('courier','courier.c_id=consignment.pick_courier')
                        ->join('d_courier','d_courier.c_id=consignment.delivery_courier')
                        ->where('consignment.c_id',$cn)
                        ->get()
                        ->result_array();
        }
        }
        // print("<pre>".print_r($cs,true)."</pre>");die;
         if(!empty($cs[0]) || isset($cs[0]) || $cs[0]==''){
        foreach($cs as $datas){
            foreach($datas as $data){
                $dat[]  =   $data;
            }
        }
       
        return $dat;
        }
        else{
            $dat = '123';
            return $dat;
        }
    }
    public function search_booked_by_cns($cns){
        if(!empty($cns) || isset($cns)){
        foreach($cns as $cn){
        $cs[] =   $this->db->select('*,client.name as contact_name,consignment.c_id as cn,courier.name as courier_name,d_courier.name as d_courier_name,city.name as city_name')
                        ->from('consignment')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('courier','courier.c_id=consignment.pick_courier')
                        ->join('d_courier','d_courier.c_id=consignment.delivery_courier')
                        ->where('consignment.c_id',$cn)
                        ->where('consignment.status_id','1')
                        ->get()
                        ->result_array();
        }
        }
        // print("<pre>".print_r($cs,true)."</pre>");die;
         if(!empty($cs[0]) || isset($cs[0]) || $cs[0]==''){
        foreach($cs as $datas){
            foreach($datas as $data){
                $dat[]  =   $data;
            }
        }
       
        return $dat;
        }
        else{
            $dat = '123';
            return $dat;
        }
    }
    public function consignment_delete($id){
        $this->db->where('c_id',$id)->delete('consignment');
    }
// ========================Bookings====================================


// ========================city====================================
    public function city(){
        return $this->db->get('city')->result_array();
    }
    
    public function add_new_city($ref_id,$name){
        $insert =   array('ref_id'=>$ref_id,
                            'name'=>$name);
        $data   =   $this->db->where('ref_id',$ref_id)
                            ->get('city')
                            ->result_array();
        if(!empty($data)){
            return '1';
        }
        else{
            $this->db->insert('city',$insert);
            return '2';
        }
    }
    public function get_city($id){
        return $this->db->where('c_id',$id)
                            ->get('city')
                            ->result_array();
    }
    
    public function delete_city($id){
        $this->db->where('c_id',$id)
                ->delete('city');
    }
// ========================city====================================



// ========================account====================================
    public function profile($email){
        return  $this->db->where('email',$email)->get('company')->result_array();
    }
    public function profile_edit($data,$id){
        $this->db->where('c_id',$id)
                ->update('company',$data);
    }
// ========================account====================================

// ========================check_company====================================
    public function check_admin($email,$id){
        return $this->db->where('email',$email)->where('c_id',$id)->get('company')->result_array();
    }
// ========================check_company====================================







// ========================status====================================
    public function status(){
        return $this->db->get('status')->result_array();
    }
    public function add_new_status($data){
        $this->db->insert('status',$data);
    }
    public function get_status($id){
        return $this->db->where('s_id',$id)
                        ->get('status')
                        ->result_array();
    }
    public function edit_new_status($id,$data){
        $this->db->where('s_id',$id)
                ->update('status',$data);
    }
    public function delete_status($id){
        $this->db->where('s_id',$id)->delete('status');
    }
    public function insert_status($s_id,$cn){
        $tracking=array('consignment_id'=>$cn,
                        'status_id'=>$s_id);
        $this->db->insert('tracking_history',$tracking);
    }
    public function change_status($s_id,$cn){
        $tracking=array('status_id'=>$s_id);
         $this->db->where('c_id',$cn)
                ->update('consignment',$tracking);
    }
    public function del_all($cn){
         $this->db->where('c_id',$cn)
                ->delete('consignment');
    }
    public function view_consignment_history($id){
        return $this->db->select('*')
                        ->from('tracking_history')
                        ->join('status','status.s_id=tracking_history.status_id')
                        ->where('tracking_history.consignment_id',$id)
                        ->get()
                        ->result_array();
    }
    
    public function delivered_POD($cn,$name,$s_id){
        $data   =   array('status_id'=>$s_id,
                        'recived_by'=>$name);
        return $this->db->where('c_id',$cn)
                        ->update('consignment',$data);
    }
// ========================status====================================










// ========================Invoicing====================================
    public function invoice(){
        return $this->db->select('*')
                        ->from('client_invoice')
                        ->join('client','client.c_id=client_invoice.client_id')
                        ->get()
                        ->result_array();
    }
    public function get_client_consignment($data){
        $id =   $data['shipper_id'];
        return $this->db->select('*,consignment.c_id as consignment_id,status.description as status_description,city.name as city_name')
                        ->from('consignment')
                        ->join('city','consignment.city_id=city.ref_id')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->where('consignment.shipper_id',$id)
                        ->where('consignment.invoice_id','0')
                        ->where("(consignment.status_id='2' OR consignment.status_id='11')", NULL, FALSE)
                        ->get()
                        ->result_array();
    }
    
    public function add_new_invoice($data){
        $ids        =   $data['n'];
        $total_cost =   $data['total_cost'];
        $c_id       =   $data['c_id'];
        $date       =   $data['date'];
        $insert     =   array('total_cost'=> $total_cost,
                                'date'  => $date,
                                'client_id' => $c_id);
        $this->db->insert('client_invoice',$insert);
        $last_id['invoice_id']    =   $this->db->insert_id();
        
        foreach($ids as $id){
            $this->db->where('c_id',$id)
                    ->update('consignment',$last_id);
        }
    }
    
    public function pay_invoice($status,$id){
        
        if($status==0){
            $statuss =   1;
            $s['status']   =   '1';
            $this->db->where('ci_id',$id)
                    ->update('client_invoice',$s);
                    
            return $statuss;
            
        }
        else{
            $statuss =   0;
            $s['status']   =   '0';
             $this->db->where('ci_id',$id)
                    ->update('client_invoice',$s);
            return $statuss;
        }
    }
    
    public function delete_invoice($id){
        $invoice_id['invoice_id']   =   0;
        $this->db->where('ci_id',$id)
                ->delete('client_invoice');
        $this->db->where('invoice_id',$id)
                ->update('consignment',$invoice_id);
    }
    
    public function invoice_details($id){
        return $this->db->select('*,consignment.c_id as consignment_id, city.c_id as city_id, city.name as city_name,client.name as client_name')
                        ->from('client_invoice')
                        ->join('consignment','consignment.invoice_id=client_invoice.ci_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('client_invoice.ci_id',$id)
                        ->get()
                        ->result_array();
    }
// ========================Invoicing====================================









// ========================Courier====================================
    public function courier(){
        return  $this->db->get('courier')->result_array();
    }
    
    public function d_courier(){
        return  $this->db->get('d_courier')->result_array();
    }
    
   public function add_new_courier($data){
        $this->db->insert('courier',$data);
        $this->db->insert('d_courier',$data);
    }
    public function get_courier($id){
        return $this->db->where('c_id',$id)
                        ->get('courier')
                        ->result_array();
    }
    public function edit_new_courier($id,$data){
        $this->db->where('c_id',$id)
                ->update('courier',$data);
        $this->db->where('c_id',$id)
                ->update('d_courier',$data);
    }
    public function delete_courier($id){
        $this->db->where('c_id',$id)
                ->delete('courier');
        $this->db->where('c_id',$id)
                ->delete('d_courier');
    }
    public function get_delivery_sheet($id){
        $delivery_courier   =   $id['delivery_courier'];
        
        return $this->db->select('consignment.c_id as cn,consignment.weight,
                                consignment.pcs,client.name,client.address,
                                client.number,consignment.consignee_name,
                                consignment.consignee_address,consignment.consignee_number,
                                consignment.cod,d_courier.name as d_name')
                        ->from('consignment')
                        ->join('client','consignment.shipper_id=client.c_id')
                        ->join('d_courier','d_courier.c_id=consignment.delivery_courier')
                        ->where('delivery_courier',$delivery_courier)
                        ->where('status_id !=','2')
                        ->where('status_id !=','11')
                        ->get()
                        ->result_array();
       
    }
// ========================Courier====================================






// =================================change_pickup_delivery======================
    public function change_pickup($courier_id,$id){
         $this->db->where('c_id',$id)
                ->update('consignment',$courier_id);
    }
     public function change_delivery($courier_id,$id){
        $this->db->where('c_id',$id)
                ->update('consignment',$courier_id);
    }
// =================================change_pickup_delivery======================














// =================================change_pickup_delivery======================

    public function change_weights($id,$weight){
        $w['weight']  =   $weight;
        $this->db->where('c_id',$id)
                ->update('consignment',$w);
    }



// =================================change_pickup_delivery======================







// =================================commision======================
    public function make_commission($id){
        $consignment_data   =   $this->db->select('status_id,delivery_courier,booking_date')
                                        ->from('consignment')
                                        ->where('delivery_courier != ','1')
                                        ->where('status_id != ','1')
                                        ->where('c_id',$id)
                                        ->get()
                                        ->result_array();
        if(!empty($consignment_data)) {
            
                        
        $courier_id         =   $consignment_data[0]['delivery_courier'];
        $status_id          =   $consignment_data[0]['status_id'];
        $date               =   date("Y-m-d");
        
        $data               =   array('courier_id'=>$courier_id,
                                        'status_id'=>$status_id,
                                        'consignment_id'=>$id,
                                        'date'=>$date);
                                        
        $data1              =   array('status_id'=>$status_id);
                                        
        $commision_data     =   $this->db->select('consignment_id')
                                        ->from('commission')
                                        ->where('consignment_id',$id)
                                        ->get()
                                        ->result_array();
        $c_id               =   $commision_data[0]['consignment_id'];
        
        if($c_id=='' || empty($c_id)){
            $this->db->insert('commission',$data);
        }
        else{
            $this->db->where('consignment_id',$c_id)
                ->update('commission',$data1);
        }
        }
        
    }
// =================================commision======================









// =================================courier_reports======================
    public function get_deliverd_consignmnet($id){
        $delivery_courier   =   $id['delivery_courier'];
        return $this->db->where('delivery_courier',$delivery_courier)
                        ->where('status_id','2')
                        ->get('consignment')
                        ->result_array();
    }
    public function get_all_assigned_consignment($id){
        $delivery_courier   =   $id['delivery_courier'];
        return $this->db->select("*")
                        ->from('consignment')
                        ->join('status','consignment.status_id=status.s_id')
                        ->where('consignment.delivery_courier',$delivery_courier)
                        ->get()
                        ->result_array();
                        
                        
    }
    public function courier_settlement($id){
        $courier_id['delivery_courier'] =   '1';
        $this->db->where('c_id',$id)
                ->update('consignment',$courier_id);
    }
    
    public function courier_reports($s_date,$e_date){
        $start  =   date("Y-m-d", strtotime($s_date));
        $end    =   date("Y-m-d", strtotime($e_date));
        return $this->db->query("SELECT courier.name,courier.father_name,status.code,status.description,COUNT(commission.status_id),commission.courier_id
                                FROM commission
                                JOIN courier ON courier.c_id=commission.courier_id
                                JOIN status ON status.s_id=commission.status_id
                                WHERE commission.status_id=2 AND commission.date >= '$start' AND commission.date <= '$end'
                                GROUP BY commission.courier_id")
                        ->result_array();
    }
// =================================courier_reports======================











// =================================news========================================
    public function news(){
        return $this->db->get('news')->result_array();
    }
    public function add_news($data){
        $this->db->insert('news',$data);
    }
    public function get_news($id){
        return  $this->db->where('n_id',$id)
                            ->get('news')
                            ->result_array();
    }
    public function edit_news($id,$data){
        $this->db->where('n_id',$id)
                ->update('news',$data);
    }
    public function delete_news($id){
        $this->db->where('n_id',$id)
                ->delete('news');
    }
// =================================news========================================
public function consignment_details($id){
        return $this->db->select('*,consignment.c_id as consignment_id,client.company_name,city.name as city_name,consignment.description as c_description')
                        ->from('consignment')
                        ->join('status','consignment.status_id=status.s_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->where('consignment.c_id',$id)
                        ->get()
                        ->result_array();
    }
    public function tracking($id){
        return $this->db->select('*')
                        ->from('tracking_history')
                        ->join('status','status.s_id=tracking_history.status_id')
                        ->where('consignment_id',$id)
                        ->get()
                        ->result_array();
    }
    
    
    
    
    
    
    
    
    
    
// ========================expense_category====================================
    public function expense_category(){
        return $this->db->get('expense_category')->result_array();
    }
    
    public function add_new_expense_category($data){
        
            $this->db->insert('expense_category',$data);
         
    }
    public function edit_new_expense_category($id,$data){
        $this->db->where('ec_id',$id)
                ->update('expense_category',$data);
    }
    public function get_expense_category($id){
        return $this->db->where('ec_id',$id)
                            ->get('expense_category')
                            ->result_array();
    }
    
    public function delete_expense_category($id){
        $this->db->where('ec_id',$id)
                ->delete('expense_category');
    }
    public function expense_category_cost_total(){
        return $this->db->query('SELECT SUM(expense.cost),expense_category.ec_id,expense_category.name,expense_category.description 
                                FROM `expense`
                                INNER JOIN expense_category 
                                ON expense_category.ec_id=expense.ec_id
                                GROUP BY ec_id')->result_array();
    }
    public function expense_category_cost_total_date($start,$end){
        return $this->db->query("SELECT SUM(expense.cost),expense_category.ec_id,expense_category.name,expense_category.description 
                                FROM `expense`
                                INNER JOIN expense_category 
                                ON expense_category.ec_id=expense.ec_id
                                WHERE expense.date >= '$start'
                                AND expense.date <= '$end'
                                GROUP BY ec_id")->result_array();
    }
// ========================expense_category====================================











// ========================expense====================================
    public function add_new_expense($data){
        $this->db->insert('expense',$data);
    }
     public function expense(){
        return $this->db->get('expense')->result_array();
    }
    
    public function edit_new_expense($id,$data){
        $this->db->where('e_id',$id)
                ->update('expense',$data);
    }
    public function get_expense($id){
        return $this->db->where('e_id',$id)
                            ->get('expense')
                            ->result_array();
    }
    
    public function delete_expense($id){
        $this->db->where('e_id',$id)
                ->delete('expense');
    }
    public function get_all_expense($id){
        return $this->db->where('ec_id',$id)
                ->get('expense')
                ->result_array();
    }
    public function get_all_expense_by_date($start,$end,$id){
        return $this->db->query("SELECT * FROM expense WHERE ec_id='$id' AND expense.date >='$start' AND expense.date <='$end'")->result_array();
        // return $this->db->where('ec_id',$id)
        //                 ->where('expense.date >=',$start)
        //                 ->where('expense.date <=',$end)
        //                 ->get('expense')
        //                 
    }
// ========================expense====================================











// ========================Accounts====================================
    public function get_money_account(){
        return $this->db->get('account')
                        ->result_array();
    }
    public function add_into_account($add,$minus){
        $account    =   $this->db->get('account')
                                ->result_array();
        $money      =   $account[0]['money'];
        $id         =   $account[0]['a_id'];
        
        $addition   =   $money+$add;
        $subtract   =   $addition-$minus;
        
        $data       =   array('money'=>$subtract);
        $this->db->where('a_id',$id)
                ->update('account',$data);
    }
    public function subtract_from_account($cost){
        $account    =   $this->db->get('account')
                                ->result_array();
        $money      =   $account[0]['money'];
        $id         =   $account[0]['a_id'];
        $subtract   =   $money-$cost;
        $data       =   array('money'=>$subtract);
        $this->db->where('a_id',$id)
                ->update('account',$data);
    }
    
    public function add_again_account($id){
        $expense    =    $this->db->where('e_id',$id)
                        ->get('expense')
                        ->result_array();
        $cost       =   $expense[0]['cost'];
        
        $account    =   $this->db->get('account')
                                ->result_array();
        $money      =   $account[0]['money'];
        $id         =   $account[0]['a_id'];
        
        $addition   =   $money+$cost;
        $data       =   array('money'=>$addition);
        $this->db->where('a_id',$id)
                ->update('account',$data);
    }
    
    public function change_again_account($id,$new_cost){
        $expense    =    $this->db->where('e_id',$id)
                        ->get('expense')
                        ->result_array();
        $cost       =   $expense[0]['cost'];
        
        $account    =   $this->db->get('account')
                                ->result_array();
        $money      =   $account[0]['money'];
        $id         =   $account[0]['a_id'];
        
        $sub_from_account   =   $money  -   $cost;
        $add_into_account   =   $sub_from_account+$new_cost;
        
        $data       =   array('money'=>$add_into_account);
        $this->db->where('a_id',$id)
                ->update('account',$data);
        
    }
// ========================Accounts====================================














// ========================for_email====================================
    public function get_client_by_cn($cn){
        return $this->db->select('client.email,client.company_name,consignment.consignee_name,client.number')
                        ->from('client')
                        ->join('consignment','consignment.shipper_id=client.c_id')
                        ->where('consignment.c_id',$cn)
                        ->get()
                        ->result_array();
                        
    } 
// ========================for_email====================================



}