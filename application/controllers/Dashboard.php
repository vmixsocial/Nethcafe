<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

public function __construct(){
	parent::__construct();
} 

function index(){
	if($this->check_islogged()==1){
     $data['foodcat'] = $this->common_model->food_categories_count();
     $data['fooditems'] = $this->common_model->food_items_count();
     $data['pendingorder'] = $this->common_model->pending_order_count(date("Y-m-d"));
     $data['doneorder'] = $this->common_model->done_order_count(date("Y-m-d"));
	   $this->load->view('internal/dashboard_viw',$data);
	}else{
       redirect('admin','refresh');
	}	
}

function products(){
	if($this->check_islogged()==1){
       $data['mainTitle'] = "Home";
       $data['subTitle'] = "Product";
       $data['product_cat'] = $this->common_model->get_product_categories();
       $data['product_list'] = $this->common_model->get_product_list();
	   $this->load->view('internal/product_viw',$data);
	}else{
       redirect('admin','refresh');
	}	
}

function add_product(){
   $prodarr['prod_category'] = $this->input->post('prodcat');
   $prodarr['product_name'] = $this->input->post('prodname');
   $prodarr['unit_price'] = $this->input->post('uprice');
   $prodarr['qty'] = $this->input->post('pqty');
   $prodarr['active_stts'] = 1;
   $prodarr['is_stock_item'] = $this->input->post('stkitm');

   $insertproduct = $this->common_model->insert_new_product($prodarr);
   if($insertproduct){
         $this->session->set_flashdata('successmsg', 'Succesfully Update');
         redirect('dashboard/products','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Create');
         redirect('dashboard/products','refresh');
       }
}

function edit_product(){
   $prodids = $this->input->post('prodids');	
   $prodarr['prod_category'] = $this->input->post('eprodcat');
   $prodarr['product_name'] = $this->input->post('eprodname');
   $prodarr['unit_price'] = $this->input->post('euprice');
   $prodarr['qty'] = $this->input->post('epqty');
   $prodarr['is_stock_item'] = $this->input->post('estkitm');
   $updproduct = $this->common_model->update_product($prodarr,$prodids);
   if($updproduct){
         $this->session->set_flashdata('successmsg', 'Succesfully Update');
         redirect('dashboard/products','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/products','refresh');
       }
}

function inactive(){
   $prodids = $this->input->post('prodid');
   $stts['active_stts'] =0;
   $updproduct = $this->common_model->update_product($stts,$prodids);
   if($updproduct){
         $this->session->set_flashdata('successmsg', 'Succesfully Inactive');
         redirect('dashboard/products','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/products','refresh');
       }
}

function active(){
   $prodids = $this->input->post('prodid');  
   $stts['active_stts'] =1;
   $updproduct = $this->common_model->update_product($stts,$prodids);
   if($updproduct){
         $this->session->set_flashdata('successmsg', 'Succesfully Active');
         redirect('dashboard/products','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/products','refresh');
       }
}

function pending_orders(){
	if($this->check_islogged()==1){
	   $data['mainTitle'] = "Home";
       $data['subTitle'] = "Pending Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_pending_orders(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
        	$newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
	   $this->load->view('internal/pending_order_viw',$data);
	}else{
       redirect('admin','refresh');
	}	
}

function done_orders(){
	if($this->check_islogged()==1){
	   $data['mainTitle'] = "Home";
       $data['subTitle'] = "Done Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_done_orders(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'pickup_stts' => $pendordes->pickup_stts,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
	   $this->load->view('internal/done_order_viw',$data);
	}else{
       redirect('admin','refresh');
	}	
}

function bill_process(){
  $data['mainTitle'] = "Home";
  $data['subTitle'] = "Bill";
  $orderid = $this->uri->segment(3);
  $pendordes = $this->common_model->get_today_pending_orders_by_id($orderid);

    
        //foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

           
        //}
      
        $data['order_data'] = $newarr;
        $this->load->view('internal/bill_viw',$data);
}

function bill_print(){
	if($this->check_islogged()==1){
    $orderid = $this->uri->segment(3);
    $pendordes = $this->common_model->get_today_pending_orders_by_id($orderid);

    
        //foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

           
        //}
      
        $data['order_data'] = $newarr;
        $this->load->view('internal/bill_order_viw',$data);
	   	}else{
       redirect('admin','refresh');
	}	
}

/* function bill_save(){
  $orderid = $this->uri->segment(3);
  $addbill['order_id'] = $orderid;
  $addbill['bill_date'] = date("Y-m-d h:i:s");
  $updorder['is_processed'] = 3;
  $upd_n_insert = $this->common_model->update_and_insert($orderid,$addbill,$updorder);
  if($upd_n_insert){
         $this->session->set_flashdata('successmsg', 'Bill Created Succesfully');
         redirect('dashboard/ready_to_delivery','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/ready_to_delivery','refresh');
       }
} */

function bill_save(){
  $orderid = $this->uri->segment(3);
  $updorder['is_processed'] = 3;
  $getorderitms = $this->common_model->get_order_items($orderid);
  $insertbillarr['order_id'] = $orderid;
  $insertbillarr['bill_date'] = date("Y-m-d h:i:s");
  $insertbillarr['total_price'] = $this->common_model->get_order_items_total($orderid);
  $billid = $this->common_model->insert_bill($insertbillarr);
  $updorder = $this->common_model->update_orders_tbl($updorder,$orderid);
  foreach($getorderitms as $itms){
    $billitmarr['bill_id'] = $billid;
    $billitmarr['product_id'] =$itms->product_id;
    $billitmarr['unit_price'] =$itms->unit_price;
    $billitmarr['itmqty'] =$itms->itmqty;
    $this->common_model->insert_bill_items($billitmarr);
  }

       if($billid && $updorder){
         $this->session->set_flashdata('successmsg', 'Bill Created Succesfully');
         redirect('dashboard/ready_to_delivery','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/ready_to_delivery','refresh');
       }


}

function employee_mgt(){
  
  if($this->check_islogged()==1){
    $data['mainTitle'] = "Home";
    $data['subTitle'] = "Employee";
        $data['emplist'] = $this->common_model->get_employee_list();
        $this->load->view('internal/employee_viw',$data);
      }else{
       redirect('admin','refresh');
  } 
}

function add_employee(){
  $empinsertarr['emp_type'] = $this->input->post('empcat');
  $empinsertarr['emp_name'] = $this->input->post('empname');
  $empinsertarr['address'] = $this->input->post('empaddress');
  $empinsertarr['contact_no'] = $this->input->post('empcontact');
  $insertid = $this->common_model->insert_employee($empinsertarr);
  if($insertid){
    $logininsertarr['emp_id'] = $insertid;
    $logininsertarr['username'] = $this->input->post('username');
    $logininsertarr['password'] = $this->input->post('password');
    $logininsertarr['user_type'] = 1;
    $logininsertarr['active_stts'] = 1;

    $insertlogins = $this->common_model->insert_user($logininsertarr);
     if($insertlogins){
         $this->session->set_flashdata('successmsg', 'Created Succesfully');
         redirect('dashboard/employee_mgt','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Create');
         redirect('dashboard/employee_mgt','refresh');
       }
  }
  
}

function do_processing(){
  $id = $this->uri->segment(3);
  $updorder['is_processed'] = 1;
  $updorder = $this->common_model->update_order($updorder,$id);
     if($updorder){
         $this->session->set_flashdata('successmsg', 'Updated Succesfully');
         redirect('dashboard/pending_orders','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/pending_orders','refresh');
       }
}

function processing_orders(){
  if($this->check_islogged()==1){
     $data['mainTitle'] = "Home";
       $data['subTitle'] = "Processing Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_processing_orders(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
     $this->load->view('internal/processing_order_viw',$data);
  }else{
       redirect('admin','refresh');
  } 
}

function ready_to_deliver(){
  $id = $this->uri->segment(3);
  $updorder['is_processed'] = 2;
  $updorder = $this->common_model->update_order($updorder,$id);
     if($updorder){
         $this->session->set_flashdata('successmsg', 'Updated Succesfully');
         redirect('dashboard/processing_orders','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/processing_orders','refresh');
       }
}

function ready_to_delivery(){
  if($this->check_islogged()==1){
     $data['mainTitle'] = "Home";
       $data['subTitle'] = "Ready To Deliver Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_ready_to_deliver_orders(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
     $this->load->view('internal/ready_deliver_order_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function delivery_orders(){
  if($this->check_islogged()==1){
     $data['mainTitle'] = "Home";
       $data['subTitle'] = "Deliver Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_deliver_orders_todo(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
     $this->load->view('internal/deleivery_order_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function assign_deliver_member(){
  $id = $this->uri->segment(3);
  $updorder['is_processed'] = 4;
  $updorder['delivery_person'] = $this->session->userdata('emp_id'); 
  $updorder = $this->common_model->update_order($updorder,$id);
     if($updorder){
         $this->session->set_flashdata('successmsg', 'Updated Succesfully');
         redirect('dashboard/delivery_orders','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/delivery_orders','refresh');
       }
}

function my_deliveries(){
  if($this->check_islogged()==1){
     $data['mainTitle'] = "Home";
       $data['subTitle'] = "Deliver Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_my_deliveries(date("Y-m-d"),$this->session->userdata('emp_id'));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
     $this->load->view('internal/my_deliveries_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function ready_to_pickup(){
  if($this->check_islogged()==1){
     $data['mainTitle'] = "Home";
       $data['subTitle'] = "Ready To Pickup Orders Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_ready_to_pickup_orders(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
     $this->load->view('internal/ready_pickup_order_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function done_pickups(){
  if($this->check_islogged()==1){
     $data['mainTitle'] = "Home";
       $data['subTitle'] = "Done Pickup Today ".date("Y-m-d");
       $pendingarr = [];
       $pendings = $this->common_model->get_today_pickup_orders(date("Y-m-d"));
     
        foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $pendordes->order_id,
              'customer' => $pendordes->cus_name,
              'contact' => $pendordes->contact_no,
              'total_price' => $pendordes->total_price,
              'delivery_address' => $pendordes->delivery_address,
              'order_items' => $this->common_model->get_order_items($pendordes->order_id)
            );

            array_push($pendingarr,$newarr);
        }
      
        $data['order_data'] = $pendingarr;
     $this->load->view('internal/done_pickup_order_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function pickup_Status(){
  $id = $this->uri->segment(3);
  $updorder['is_processed'] = 4;
  $updorder = $this->common_model->update_order($updorder,$id);
     if($updorder){
         $this->session->set_flashdata('successmsg', 'Updated Succesfully');
         redirect('dashboard/done_pickups','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/done_pickups','refresh');
       }
}


function grn_process(){
  if($this->check_islogged()==1){
       $data['mainTitle'] = "Home";
       $data['subTitle'] = "GRN";
       $pendingarr = [];
       $grnslist = $this->common_model->get_grns();
       $data['prodlist'] = $this->common_model->get_products();
        $data['grn_list'] = $grnslist;
     $this->load->view('internal/grn_process_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}


function add_new_grn(){
  $prodid = $this->input->post('prodid');
  $grnqty = $this->input->post('grnqty');

  //getcurrent stock
  $curstock = $this->common_model->get_current_stock($prodid);
  if($curstock==0){
    // insert new
    $grnarr['product_id'] = $prodid;
    $grnarr['grn_qty'] = $grnqty;
    $grnarr['grn_date'] = date("Y-m-d");

    $stkarr['product_id'] = $prodid;
    $stkarr['stock_qty'] = $grnqty;
    $upds=$this->common_model->insert_stock_and_grn($grnarr,$stkarr);
  }else{
    // update
    $grnarr['product_id'] = $prodid;
    $grnarr['grn_qty'] = $grnqty;
    $grnarr['grn_date'] = date("Y-m-d");

    $newqty = $curstock+$grnqty;
    $stkarr['stock_qty'] = $newqty;
    $upds=$this->common_model->insert_grn_and_upd_stock($grnarr,$stkarr,$prodid);

  }

        if($upds){
         $this->session->set_flashdata('successmsg', 'Updated Succesfully');
         redirect('dashboard/grn_process','refresh');
        }else{
         $this->session->set_flashdata('errormsg', 'Error Update');
         redirect('dashboard/grn_process','refresh');
        }
}

function stock(){
  
  if($this->check_islogged()==1){
       $data['mainTitle'] = "Home";
       $data['subTitle'] = "Stock";
       $pendingarr = [];
       
       $data['stklist'] = $this->common_model->get_stock();
       
     $this->load->view('internal/stock_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function bill(){
   if($this->check_islogged()==1){
       $data['mainTitle'] = "Home";
       $data['subTitle'] = "Bill";
       
       $data['nextbillno'] = $this->common_model->get_next_bill_no();
       $data['prodlist'] = $this->common_model->get_all_product_list();   
     $this->load->view('internal/bill_form_viw',$data);
  }else{
       redirect('admin','refresh');
  }
}

function add_bill_item(){
  $billno = $this->input->post('billno');
  $prodid = $this->input->post('prodid');
  $curstk = $this->input->post('curstk');
  $is_stock = $this->input->post('is_stock');
  $req_qty = $this->input->post('req_qty');
  $untprice = $this->input->post('untprice');
  if($is_stock==2){
    $newbal = $curstk-$req_qty;
    $newstkupdarr['stock_qty'] = $newbal;
    $this->common_model->upd_stock($newstkupdarr,$prodid);
  }
  
  
  $billitmarr['bill_id'] = $billno;
  $billitmarr['product_id'] = $prodid;
  $billitmarr['unit_price'] = $untprice;
  $billitmarr['itmqty'] = $req_qty;
  $addbillitem = $this->common_model->add_bill_items($billitmarr);
  if($addbillitem){
    echo json_encode(1);
  }else{
    echo json_encode(2);
  }
}

function get_bill_data(){
  $billno = $this->input->post('billno');
  $billitms = $this->common_model->get_bill_items($billno);
  if($billitms){
    echo json_encode($billitms);
  }
}

function get_stock_qty(){
  $prodid = $this->input->post('prodid');
  $curqty = $this->common_model->get_current_stock($prodid);
  if($curqty){
    echo json_encode($curqty);
  }
}

function delete_bill_item(){
  $prodid = $this->input->post('prd');
  $qtys = $this->input->post('qtys');
  $billno = $this->input->post('billno');
  $isprod = $this->common_model->get_is_stockitm($prodid);
  $curstock = $this->common_model->get_current_stock($prodid);

    if($isprod==2){
      $updstk['stock_qty'] = $curstock+$qtys;
      $this->common_model->upd_stock($updstk,$prodid);
    }
  $deleteitm = $this->common_model->delete_bill_items($prodid,$billno); 
  if($deleteitm){
    echo json_encode(1);
  }else{
    echo json_encode(2);
  }
}

function print_bill(){
  $billno = $this->uri->segment(3);
  
      $ordertot = $this->common_model->get_total_bill($billno);
    
        //foreach($pendings as $pendordes){
          $newarr = array(
              'order_id' => $billno,
              'customer' => "",
              'contact' => "",
              'total_price' => $ordertot,
              'delivery_address' => "",
              'order_items' => $this->common_model->get_bill_items($billno)
            );

         $insertbill['total_price'] = $ordertot; 
         $insertbill['bill_date'] = date("Y-m-d h:i:s");
         $this->common_model->insert_new_bill($insertbill);  
        //}
      
        $data['order_data'] = $newarr;
        $this->load->view('internal/bill_order_viw',$data);
}

function check_islogged(){
    	if($this->session->userdata('emp_id')){
           return 1;
    	}else{
    	   return 2;
    	}
    } 

}	