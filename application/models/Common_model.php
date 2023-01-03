<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

  function __construct(){
	parent::__construct();

  }	

  function auth_check_admin($username,$password,$type){
  	$this->db->where('username',$username);
  	$this->db->where('password',$password);
  	$this->db->where('user_type',$type);
  	$this->db->where('active_stts',1);
  	$this->db->join('employee','access_right.emp_id=employee.emp_id');
  	return $this->db->get('access_right')->row();
  }

  function get_product_list(){
    $this->db->join('product_category','product.prod_category=product_category.prod_cat_id','left');
  	return $this->db->get('product')->result();
  }

  function get_product_categories(){
    return $this->db->get('product_category')->result();
  }

  function insert_new_product($prodarr){
    return $this->db->insert('product',$prodarr);
  }	

  function update_product($prodarr,$prodids){
    $this->db->where('product_id',$prodids);
    return $this->db->update('product',$prodarr);
  }

  function get_today_pending_orders($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',0);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_today_processing_orders($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',1);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_today_ready_to_deliver_orders($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',2);
    $this->db->where('order.pickup_stts',2);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_today_ready_to_pickup_orders($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',2);
    $this->db->where('order.pickup_stts',1);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_today_pickup_orders($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',3);
    $this->db->where('order.pickup_stts',1);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_today_deliver_orders_todo($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',3);
    $this->db->where('order.pickup_stts',2);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_my_deliveries($today,$deliveryperson){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.delivery_person',$deliveryperson);
    $this->db->where('order.is_processed',3);
    $this->db->where('order.pickup_stts',2);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }
  


  function get_today_done_orders($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',4);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result();
  }

  function get_order_items($id){
    $this->db->where('order_items.order_id',$id);
    $this->db->join('product','order_items.product_id=product.product_id');
    return $this->db->get('order_items')->result();
  }

  function get_order_items_total($orderid){
    $this->db->select('sum(order_items.unit_price*order_items.itmqty) as totalamt');
    $this->db->where('order_items.order_id',$orderid);
    $this->db->join('product','order_items.product_id=product.product_id');
    return $this->db->get('order_items')->row()->totalamt;
  }

  function get_today_pending_orders_by_id($orderid){
    $this->db->where('order.order_id',$orderid);
    //$this->db->where('order.is_processed',0);
    $this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->row();
  }

  function update_and_insert($orderid,$addbill,$updorder){
    $insertval = $this->db->insert('bill',$addbill);
    $this->db->where('order_id',$orderid);
    $updval = $this->db->update('order',$updorder);
    if($insertval && $updval){
      return true;
    }else{
      return false;
    }
  }

  function food_categories_count(){
    $query = $this->db->get('product_category');
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return 0;
    }
  }

  function food_items_count(){
    $query = $this->db->get('product');
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return 0;
    }
  }

  function pending_order_count($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',0);
    $this->db->join('customer','order.customer_id=customer.cid');
    $query = $this->db->get('order');
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return 0;
    }
  }

  function done_order_count($today){
    $this->db->where('DATE(order.date_and_time)',$today);
    $this->db->where('order.is_processed',1);
    $this->db->join('customer','order.customer_id=customer.cid');
    $query = $this->db->get('order');
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return 0;
    }
  }

  function get_menu(){
    return $this->db->get('product_category')->result();
  }

  function get_product($catid){
    $this->db->where('prod_category',$catid);
    return $this->db->get('product')->result();
  }

  function insert_customer($insertcusarr){
    $this->db->insert('customer',$insertcusarr);
    return $this->db->insert_id();
  }

  function insert_user($insertcuslogin){
    return $this->db->insert('access_right',$insertcuslogin);
  }


  function check_login($username,$password,$type){
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $this->db->where('user_type',$type);
    $this->db->where('active_stts',1);
    $this->db->join('customer','access_right.emp_id=customer.cid');
    return $this->db->get('access_right')->row();
  }

  function insert_order($insertorderarr){
    $this->db->insert('order',$insertorderarr);
    return $this->db->insert_id();
  }

  function insert_order_items($insertordritmarr){
    return $this->db->insert('order_items',$insertordritmarr);
  }

  function get_employee_list(){
    $this->db->where('access_right.user_type',1);
    $this->db->join('access_right','employee.emp_id=access_right.emp_id');
    return $this->db->get('employee')->result();
  }

  function insert_employee($empinsertarr){
    $this->db->insert('employee',$empinsertarr);
    return $this->db->insert_id();
  }

  function update_order($updorder,$id){
    $this->db->where('order_id',$id);
    return $this->db->update('order',$updorder);
  }

  function get_grns(){
    $this->db->where('product.is_stock_item',2);
    $this->db->join('product','grn.product_id=product.product_id');
    return $this->db->get('grn')->result();
  }

  function get_products(){
    $this->db->where('is_stock_item',2);
    return $this->db->get('product')->result();
  }

  function get_current_stock($prodid){
    $this->db->where('product_id',$prodid);
    $query = $this->db->get('stock');
    if($query->num_rows()>0){
      return $query->row()->stock_qty;
    }else{
      return 0;
    }
  }

  function insert_stock_and_grn($grnarr,$stkarr){
    $instr=$this->db->insert('grn',$grnarr);
    if($instr){
      return $this->db->insert('stock',$stkarr);
    }
  }



  function insert_grn_and_upd_stock($grnarr,$stkarr,$prodid){
    $instr=$this->db->insert('grn',$grnarr);
    if($instr){
      $this->db->where('product_id',$prodid);
      return $this->db->update('stock',$stkarr);
    }
  }

  function get_stock(){
    $this->db->join('product','stock.product_id=product.product_id');
    return $this->db->get('stock')->result();
  }

  function insert_bill($insertbillarr){
    $this->db->insert('bill',$insertbillarr);
    return $this->db->insert_id();
  }

  function insert_bill_items($billitmarr){
    return $this->db->insert('bill_items',$billitmarr);
  }

  function update_orders_tbl($updorder,$orderid){
    $this->db->where('order_id',$orderid);
    return $this->db->update('order',$updorder);
  }

  function get_next_bill_no(){
    $this->db->order_by('bill_id','DESC');
    $this->db->limit(1);
    $query = $this->db->get('bill');

    if($query->num_rows()>0){
      $billno = $query->row()->bill_id;
      $nextno = $billno+1;
      return $nextno;
    }else{
      return 1;
    }
  }

  function get_all_product_list(){
    $this->db->select('product.product_id,product.product_name,stock.stock_qty,product.is_stock_item,product.unit_price');
    $this->db->join('stock','product.product_id=stock.product_id','left');
    return $this->db->get('product')->result();
  }

  function upd_stock($newstkupdarr,$prodid){
    $this->db->where('product_id',$prodid);
    return $this->db->update('stock',$newstkupdarr);
  }

  function add_bill_items($billitmarr){
    return $this->db->insert('bill_items',$billitmarr);
  }

  function get_bill_items($billno){
    $this->db->where('bill_id',$billno);
    $this->db->join('product','bill_items.product_id=product.product_id');
    return $this->db->get('bill_items')->result();
  }

  function get_total_bill($billno){
    $this->db->select('sum(bill_items.unit_price*bill_items.itmqty) as totalamt');
    $this->db->where('bill_id',$billno);
    $this->db->join('product','bill_items.product_id=product.product_id');
    return $this->db->get('bill_items')->row()->totalamt;
  }

  function get_is_stockitm($prodid){
    $this->db->where('product_id',$prodid);
    $query = $this->db->get('product');
    return $query->row()->is_stock_item;
  }

  function delete_bill_items($prodid,$billno){
    $this->db->where('product_id',$prodid);
    $this->db->where('bill_id',$billno);
    return $this->db->delete('bill_items');
  }

  function insert_new_bill($insertbill){
    return $this->db->insert('bill',$insertbill);
  }

  function get_my_orders($customerid){
    /*$this->db->where('order.order_id','DESC');
    $this->db->where('order.customer_id',$customerid);
    //$this->db->join('customer','order.customer_id=customer.cid');
    return $this->db->get('order')->result(); */

    $sql = "SELECT * FROM `order`,customer WHERE `order`.customer_id=customer.cid AND customer_id='$customerid'";
    $query=$this->db->query($sql);
    return $query->result();
  }
  /*function get_items(){
  	$sql = "select * from items";
  	$query = $this->db->query($sql);
  	return $query->result();
  } */

}