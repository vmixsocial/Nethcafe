<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct(){
	  parent::__construct();
	  $this->load->library('cart');	  
	 } 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('web/home_view');
	}

	function menus(){
		$menus = $this->common_model->get_menu();
		$menuarr = [];
		foreach($menus as $mn){
		  $prodarr = array(
		   'prodcatid' => $mn->prod_cat_id,
		   'prodcatname' => $mn->product_category,
           'products' => $this->common_model->get_product($mn->prod_cat_id),
		  );

		  array_push($menuarr,$prodarr);	
		}
		$data['menuitem'] = $menuarr;
		$this->load->view('web/menu_view',$data);
	}

	function menus_for_order(){
		$menus = $this->common_model->get_menu();
		$menuarr = [];
		foreach($menus as $mn){
		  $prodarr = array(
		   'prodcatid' => $mn->prod_cat_id,
		   'prodcatname' => $mn->product_category,
           'products' => $this->common_model->get_product($mn->prod_cat_id),
		  );

		  array_push($menuarr,$prodarr);	
		}
		$data['menuitem'] = $menuarr;
		$this->load->view('web/menu_for_order_view',$data);
	}

	function reservations(){
		$this->load->view('web/reservation_view');
	}

	function about(){
		$this->load->view('web/about_view');
	}

	function contact(){
		$this->load->view('web/contact_view');
	}

	function signup(){
      $customername = $this->input->post('customername');
      $contact = $this->input->post('contact');
      $cusemail = $this->input->post('cusemail');
      $pw = $this->input->post('pw');
      
      $insertcusarr['cus_name'] = $customername;
      $insertcusarr['contact_no'] = $contact;
      $insertcusarr['email'] = $cusemail;

      $customerid = $this->common_model->insert_customer($insertcusarr);
      if($customerid){
        $insertcuslogin['emp_id'] = $customerid;
        $insertcuslogin['username'] = $cusemail;
        $insertcuslogin['password'] = $pw;
        $insertcuslogin['user_type'] = 2;
        $insertcuslogin['active_stts'] = 1;
        $usercreate = $this->common_model->insert_user($insertcuslogin);
        if($usercreate){
         $this->session->set_flashdata('successmsg', 'User Created Succesfully.user Your Email as Username.Please Login To Order Foods');
         redirect('home/index','refresh');
       }else{
         $this->session->set_flashdata('errormsg', 'Error Create User');
         redirect('home/index','refresh');
       }
      }else{
         $this->session->set_flashdata('errormsg', 'Error Create User');
         redirect('home/index','refresh');
      }

	}

	function signin(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $authcheck = $this->common_model->check_login($username,$password,2);
      if(sizeof($authcheck)>0){
 		$newdata = array(
        'emp_id' => $authcheck->emp_id,
        'emp_name' => $authcheck->cus_name,
        'user_id' => $authcheck->user_id
    );

        $this->session->set_userdata($newdata);
        redirect('home/menus_for_order','refresh');
 	}else{
 		$this->session->set_flashdata('errormsg', 'Invalid Login. Please Try Again !!!');	
        redirect('home/index','refresh');
 	}
	}


	function add_to_cart(){ 
        $data = array(
            'id' => $this->input->post('product_id'), 
            'name' => $this->input->post('product_name'), 
            'price' => $this->input->post('product_price'), 
            'qty' => $this->input->post('quantity'), 
        );

        //print_r($data);
        $addcart = $this->cart->insert($data);
        if($addcart){
          $this->session->set_flashdata('successmsg', 'Item Added To the Cart');
          redirect('home/menus_for_order','refresh');
        }else{
          $this->session->set_flashdata('errormsg', 'Error Adding to cart');	
          redirect('home/menus_for_order','refresh');
        } 
        //echo $this->show_cart(); 
    }

    function show_cart(){ 
        /*$output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm" >Cancel</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output; */
        $this->load->view('web/my_cart_viw');
    }

    function delete_cart(){ 
    $data = array(
        'rowid' => $this->input->post('row_id'), 
        'qty' => 0, 
    );
    $this->cart->update($data);
    echo $this->show_cart();
}
 
    // display cart
    function load_cart(){ 
        echo $this->show_cart();
    }

    function proceed_order(){
      $pickup_type = $this->input->post('pickup_type');
      $deli_address = $this->input->post('deli_address');
      $cusid = $this->session->userdata('emp_id');
      $totalamt = $this->cart->total();
      
      $insertorderarr['customer_id'] = $cusid;
      $insertorderarr['total_price'] = $totalamt;
      $insertorderarr['delivery_address'] = $deli_address;
      $insertorderarr['date_and_time'] = date("Y-m-d h:i:s");
      $insertorderarr['is_processed'] = 0;
      $insertorderarr['pickup_stts'] = $pickup_type;

      $insertid = $this->common_model->insert_order($insertorderarr);

      //echo $pickup_type." ".$deli_address." ".$cusid;
      foreach ($this->cart->contents() as $items) {
        $itemprice = $items['price'];
        $itemqty = $items['qty'];
        $item_id = $items['id'];

        $insertordritmarr['order_id'] = $insertid;
        $insertordritmarr['product_id'] = $item_id;
        $insertordritmarr['unit_price'] = $itemprice;
        $insertordritmarr['itmqty'] = $itemqty;
        $this->common_model->insert_order_items($insertordritmarr);
      }
      $this->session->set_flashdata('successmsg', 'Your Order Has been Succesfully Sent. !!!');
      $this->cart->destroy();
      redirect('home','refresh');

    }

    function my_orders(){
      $customerid = $this->session->userdata('emp_id');
      echo $customerid;
      $pendings = $this->common_model->get_my_orders($customerid);
      //print_r($pendings);
      $pendingarr = [];
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

      $this->load->view('web/my_orders_viw',$data);
    }

		
}
