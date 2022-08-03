<?php
class Client_model extends CI_Model {
    
    
// ========================Index====================================
    public function get_todays_consignmnet($id){
        $date = date('Y-m-d');
        return $this->db->select('COUNT(c_id)')
                        ->where('shipper_id',$id)
                        ->where('booking_date',$date)
                        ->get('consignment')
                        ->result_array();
    }
    public function get_weekly_consignment($id){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('shipper_id',$id)
                        ->where("yearweek(DATE(booking_date), 1) = yearweek(curdate(), 1)")
                        ->get()
                        ->result_array();
    }
    public function get_all_consignment($id){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('shipper_id',$id)
                        ->get()
                        ->result_array();
    }
    public function get_new_consignment($id){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('shipper_id',$id)
                        ->where('status_id','1')
                        ->get()
                        ->result_array();
    }
    public function get_delivered_consignment($id){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('shipper_id',$id)
                        ->where('status_id','2')
                        ->get()
                        ->result_array();
    }
    public function get_return_consignment($id){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('shipper_id',$id)
                        ->where('status_id','11')
                        ->get()
                        ->result_array();
    }
    public function get_undelivered_consignment($id){
        return $this->db->select('COUNT(c_id)')
                        ->from('consignment')
                        ->where('shipper_id',$id)
                        ->where('status_id !=','2')
                        ->where('status_id !=','1')
                        ->where('status_id !=','11')
                        ->get()
                        ->result_array();
    }
// ========================Index====================================



// ========================login====================================
    public function login($email,$pass){
        return  $this->db->where('email',$email)
                            ->where('password',$pass)
                            ->get('client')->result_array();
    }
    
    public function register($data)
    {
        return $this->db->insert('client_request',$data);
    }
// ========================login====================================

// ========================client====================================
    public function get_client($email){
        return $this->db->where('email',$email)
                        ->get('client')
                        ->result_array();
    }
// ========================client====================================


// ========================city====================================
    public function city(){
        return $this->db->get('city')
                        ->result_array();
    }
// ========================city====================================


// ========================booking====================================
    public function add_booking($data){
        $this->db->insert('loadsheet_consignment',$data);
    }
    public function get_consignment($id){
        $date   =   date("Y-m-d");
        return $this->db->select('*,consignment.c_id as consignment_id,consignment.description as c_description')
                        ->from('consignment')
                        ->join('status','consignment.status_id=status.s_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('shipper_id',$id)
                        ->where('booking_date',$date)
                        ->get()
                        ->result_array();
    }
    public function get_consignment_date($id,$from,$to){
        return $this->db->select('*,consignment.c_id as consignment_id,consignment.description as c_description')
                        ->from('consignment')
                        ->join('status','consignment.status_id=status.s_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('shipper_id',$id)
                        ->where('booking_date>=',$from)
                        ->where('booking_date<=',$to)
                        ->get()
                        ->result_array();
    }
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
    
    public function consignment_details_print($ids){
        return $this->db->select('*,consignment.c_id as consignment_id,client.company_name,city.name as city_name,consignment.description as c_description')
                        ->from('consignment')
                        ->join('status','consignment.status_id=status.s_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->where('consignment.c_id',$ids)
                        ->get()
                        ->result_array();
    }
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
    public function import_bookings($data){
        $this->db->insert('loadsheet_consignment',$data);
        return true;
    }
    
    public function loadsheet($id){
        return $this->db->where('shipper_id',$id)->get('loadsheet')->result_array();
    }
    
    public function open_finalize_booking($shipper_id){
        return $this->db->select('*')
                        ->from('loadsheet_consignment')
                        ->join('city','city.ref_id=loadsheet_consignment.city_id')
                        ->where('shipper_id',$shipper_id)
                        ->get()
                        ->result_array();
    }
    public function get_loadsheet_consignment_data($id){
        return $this->db->select('*,client.name as client_name')
                        ->from('loadsheet_consignment')
                        ->join('client','client.c_id=loadsheet_consignment.shipper_id')
                        ->join('city','city.ref_id=loadsheet_consignment.city_id')
                        ->where('loadsheet_consignment.ls_c_id',$id)
                        ->get()
                        ->result_array();
    }
    
    public function edit_new_consignement($id,$data){
        $this->db->where('ls_c_id',$id)->update('loadsheet_consignment',$data);
    }
    
    public function del_loadsheet_consigment($c_idss){
        foreach($c_idss as $c_ids){
            foreach($c_ids as $c_id){
                $this->db->where('ls_c_id',$c_id)->delete('loadsheet_consignment');
            }
        }
    }
    public function del_loadsheet_consigment1($c_id){
        $this->db->where('ls_c_id',$c_id)->delete('loadsheet_consignment');
    }
    public function save_booking($n,$shipper_id){
        $date   =   date('Y-m-d');
        $ids     =   $n['n'];
        foreach($ids as $id){
            $datas[]   =   $this->db->select('*')
                                ->from('loadsheet_consignment')
                                ->where('ls_c_id',$id)
                                    ->get()
                                    ->result_array();
            
        }
        $ls_data    =   array('date'=>$date,
                                'shipper_id'=>$shipper_id);
        $this->db->insert('loadsheet',$ls_data);
        $insert_id = $this->db->insert_id();
        
        
        foreach($datas as $data){
            foreach($data as $d){
                $d['loadsheet_cconsignment_id'] = $insert_id;
                unset($d['ls_c_id']);
                $this->db->insert('consignment',$d);
                $c_ids[] = $this->db->insert_id();
            }
        }
        foreach($c_ids as $c_id){
                $cid['consignment_id']    =   $c_id;
                $this->db->insert('tracking_history',$cid);
                
        }
        foreach($ids as $c_id){
            $this->db->where('ls_c_id',$c_id)->delete('loadsheet_consignment');
        }
    }
// ========================booking====================================







// ========================Tracking====================================
    public function tracking($id){
        return $this->db->select('*')
                        ->from('tracking_history')
                        ->join('status','status.s_id=tracking_history.status_id')
                        ->where('consignment_id',$id)
                        ->get()
                        ->result_array();
    }
// ========================Tracking====================================













// ========================Reports====================================
    public function get_status($id){
        return $this->db->select('status.code,status.description,status.s_id')
                        ->distinct('status.code,status.description,status.s_id')
                        ->from('consignment')
                        ->join('status','status.s_id=consignment.status_id')
                        ->where('consignment.shipper_id',$id)
                        ->get()
                        ->result_array();
    }
    public function get_consignment_by_status($c_id,$s_id){
        $status_id   =   $s_id['s_id'];
        return $this->db->select('*,city.name as city_name,consignment.c_id as consignment_id')
                        ->from('consignment')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('city','city.c_id=consignment.city_id')
                        ->where('consignment.shipper_id',$c_id)
                        ->where('consignment.status_id',$status_id)
                        ->get()
                        ->result_array();
    }
    
    public function get_consignment_by_date($data,$c_id){
        $s_date  =   $data['start'];
        $e_date  =   $data['end'];
        
        $start  =   date("Y-m-d", strtotime($s_date));
        $end    =   date("Y-m-d", strtotime($e_date));
        
        return $this->db->select('*,city.name as city_name,consignment.c_id as consignment_id')
                        ->from('consignment')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('consignment.booking_date >=',$start)
                        ->where('consignment.booking_date <=',$end)
                        ->where('consignment.shipper_id',$c_id)
                        ->get()
                        ->result_array();
    }
// ========================Reports====================================










// ========================Edit_profile====================================
    public function edit_profile($id,$data){
        $this->db->where('c_id',$id)
                ->update('client',$data);
    }

// ========================Edit_profile====================================










// ========================invoice====================================
    public function invoice($id){
        return $this->db->where('client_id',$id)
                        ->get('client_invoice')
                        ->result_array();
    }
    public function get_company(){
        return  $this->db->get('company')->result_array();
    } 
    public function invoice_details($id){
        return $this->db->select('*,consignment.c_id as consignmet_id, city.c_id as city_id, city.name as city_name,client.name as client_name')
                        ->from('client_invoice')
                        ->join('consignment','consignment.invoice_id=client_invoice.ci_id')
                        ->join('status','status.s_id=consignment.status_id')
                        ->join('client','client.c_id=consignment.shipper_id')
                        ->join('city','city.ref_id=consignment.city_id')
                        ->where('client_invoice.ci_id',$id)
                        ->get()
                        ->result_array();
    }
// ========================invoice====================================


// ========================check_client====================================
    public function check_client($email,$id){
        return $this->db->where('email',$email)->where('c_id',$id)->get('client')->result_array();
    }
// ========================check_client====================================

}