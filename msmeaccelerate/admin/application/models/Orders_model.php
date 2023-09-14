<?php
class Orders_model extends CI_Model
{
    private $data = array();

    public function __construct()
    {
        parent::__construct();
    }

	public function getOrders_vendoritem($order_id = '',$status ='')
    {
			$this->db->join('user','ci_orders.user_id = user.id', 'left');
			$this->db->join('ci_shipping_address','ci_orders.order_id = ci_shipping_address.order_id', 'left');
			$this->db->join('ci_order_item','ci_order_item.order_id = ci_orders.order_id', 'left');
			$this->db->select('user.email as user_email');
			$this->db->select('user.fname as user_name');
			$this->db->select('user.mobile as user_mobile');
			$this->db->select('ci_order_item.api_booking_id as api_booking_id');
			$this->db->select('user.lname as lname');
			$this->db->select('ci_orders.*');
			$this->db->select('ci_shipping_address.*');
		 
        if ($order_id != '') {
            $this->db->where('ci_order_item.order_item_id', $order_id);
							}
							
		if ($status != '') {
            if($status == 'SUCCESS' OR $status == 'FAILED'){ 
				$this->db->where('ci_orders.payment_status',$status);
			}else{
				$this->db->where('ci_orders.order_status',$status);
			}
		}				
							
        $this->db->order_by('ci_orders.order_id', 'DESC');
        $order_list = $this->db->get('ci_orders')->result_array();
			

        foreach ($order_list as &$order) {
            $this->db->where('order_id', $order['order_id']);
            $item_list = $this->db->get('ci_order_item')->result_array();
            $total = 0;
            $additonal_cost = 0;
            foreach ($item_list as &$item) {
                $this->db->where('id', $item['product_id']);
                $product = $this->db->get('product')->result_array(); 
                $total += $item['product_item_price']*$item['product_quantity'];
				 
				//$item['product_name'] = $product[0];
				 
				//$pname=$product['product_name']; 
            }
          
			$order['items'] = $item_list;
            $order['sub_total'] = $total;
			
        }
        return $order_list;
    }

	public function getOrders_vendoritem_bookingid($order_id,$bookingapiid)
    {
			$this->db->join('user','ci_orders.user_id = user.id', 'left');
			$this->db->join('ci_shipping_address','ci_orders.order_id = ci_shipping_address.order_id', 'left');
			$this->db->join('ci_order_item','ci_order_item.order_id = ci_orders.order_id', 'left');
			$this->db->select('user.email as user_email');
			$this->db->select('user.fname as user_name');
			$this->db->select('user.mobile as user_mobile');
			$this->db->select('ci_order_item.api_booking_id as api_booking_id');
			$this->db->select('user.lname as lname');
			$this->db->select('ci_orders.*');
			$this->db->select('ci_shipping_address.*');
		    $this->db->where('ci_order_item.order_item_id', $order_id);
            
 							
		if ($status != '') {
            if($status == 'SUCCESS' OR $status == 'FAILED'){ 
				$this->db->where('ci_orders.payment_status',$status);
			}else{
				$this->db->where('ci_orders.order_status',$status);
			}
		}				
							
        $this->db->order_by('ci_orders.order_id', 'DESC');
        $order_list = $this->db->get('ci_orders')->result_array();
			

        foreach ($order_list as &$order) {
            $this->db->where('order_id', $order['order_id']);
            $this->db->where('api_booking_id', $bookingapiid);
            $item_list = $this->db->get('ci_order_item')->result_array();
            $total = 0;
            $additonal_cost = 0;
            foreach ($item_list as &$item) {
                $this->db->where('id', $item['product_id']);
                $product = $this->db->get('product')->result_array(); 
                $total += $item['product_item_price']*$item['product_quantity'];
				 
				//$item['product_name'] = $product[0];
				 
				//$pname=$product['product_name']; 
            }
          
			$order['items'] = $item_list;
            $order['sub_total'] = $total;
			
        }
        return $order_list;
    }

	public function getOrders($order_id = '',$status ='')
    {
			//$this->db->join('user','ci_orders.user_id = user.id', 'left');
			//$this->db->join('ci_shipping_address','ci_orders.order_id = ci_shipping_address.order_id', 'left');
			// $this->db->select('user.email as user_email');
			// $this->db->select('user.fname as user_name');
			// $this->db->select('user.mobile as user_mobile');
			// $this->db->select('user.lname as lname');
			$this->db->select('ci_orders.*');
			//$this->db->select('ci_shipping_address.*');
		 
        if ($order_id != '') {
            $this->db->where('ci_orders.order_id', $order_id);
		}
					
	    $this->db->order_by('ci_orders.order_id', 'DESC');
        $order_list = $this->db->get('ci_orders')->result_array();
	
        foreach ($order_list as &$order) {
            $this->db->where('order_id', $order['order_id']);
            $item_list = $this->db->get('ci_order_item')->result_array();
            $total = 0;
            $additonal_cost = 0;
            foreach ($item_list as &$item) {
                $this->db->where('id', $item['product_id']);
                $product = $this->db->get('product')->result_array(); 
                //$total += $item['product_item_price']*$item['product_quantity'];
				//$item['product_name'] = $product[0];
				//$pname=$product['product_name']; 
            }
    		$order['items'] = $item_list;
            $order['sub_total'] = $total;
	    }
        return $order_list;
    }

	public function getOrdersitem($order_id = '')
    {
         $this->db->where('order_item_id', $order_id);
        $result = $this->db->get('ci_order_item')->result_array();

        if ($result != null) {
            return $result[0];
        }
        return null;
    }

	

	public function getOrderdetail($order_id = '')
    {
         $this->db->where('order_id', $order_id);
        $result = $this->db->get('ci_orders');

        if ($result != '') {
            return $result->row();
        }
        return null;
    }

	public function getshippingadd($order_id = '')
    {
         $this->db->where('order_id', $order_id);
        $result = $this->db->get('ci_shipping_address');

        if ($result != '') {
            return $result->row();
        }
        return null;
    }

	public function vendordetails($id = '')
    {
         $this->db->where('id', $id);
        $result = $this->db->get('user')->result_array();

        if ($result != null) {
            return $result[0];
        }
        return null;
    }


	public function getamount($order_id)
    {
        $this->db->where('order_id = ',$order_id);
		$query = $this->db->get('ci_order_item');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->product_item_price;
			return $result;
		} else {
			return false;
		}
    }
	public function getpname($productid)
    {
        $this->db->where('product_id = ',$productid);
		$query = $this->db->get('product');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->product_name;
			return $result;
		} else {
			return false;
		}
    }

	function exportorders() {
		
		
		$result = array();
			$sql = "SELECT ci.*, u.fname, u.lname,u.email,u.mobile,
			o.order_number,o.payment_status,o.paymentmode ,
			sp.address1 as Address1,
			sp.address2 as Address2,
			sp.city as City,
			sp.post_code as PostCode,
			sp.country as Country,
			sp.state as AddressState,
			pro.similar_code as similarCode,
			pa.sku_code as skuCode
			
			from ci_order_item ci
					left join ci_orders o ON o.order_id = ci.order_id
					left join user u on u.id = ci.user_info_id
					left join ci_shipping_address sp on sp.order_id = o.order_id
					left join product as pro on pro.id=ci.product_id
					/*left join product_attribute as pa on pa.pid=ci.product_id AND pa.size = ci.size_id*/
					
					order by ci.order_id asc";
			   
			$query = $this->db->query($sql);
	
			$result = $query->result();
			
			//  print_r($result);
			return $result;
			
			
			
	
	
		}
	public function product_image($productid)
    {
        $this->db->where('pid = ',$productid);
		 $this->db->where('baseimage= ',"1");
		$query = $this->db->get('product_image');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->image;
			return $result;
		} else {
			return false;
		}
    }
	public function gift_image($productid)
    {
        $this->db->where('id = ',$productid);
		$query = $this->db->get('gift');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->image;
			return $result;
		} else {
			return false;
		}
    }
	public function getcityname($productid)
    {
        $this->db->where('city_id = ',$productid);
		$query = $this->db->get('city');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->city_name;
			return $result;
		} else {
			return false;
		}
    }
	
	public function getstatename($productid)
    {
        $this->db->where('sid = ',$productid);
		$query = $this->db->get('state');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->sname;
			return $result;
		} else {
			return false;
		}
    }
	
	
	public function getcountryname($productid)
    {
        $this->db->where('cid = ',$productid);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->countryname;
			return $result;
		} else {
			return false;
		}
    }
	
	
	 public function status($order_id, $order_status,$trackadd)
    {
		$data=array(
             'order_status'=>$order_status,
			 'trackadd'=>$trackadd,
			 'status_date'=>date("Y-m-d H:i:s"),
            );
			
			
        $this->db->where('order_id',$order_id);
        if($this->db->update('ci_orders',$data))
		{
			return true;
		} 
		else 
		{
			return false;
		}
    }

	function updatestatus($id,$is_active)
	{		
		$sql= " update ci_orders set order_type= '".$is_active."' where order_id='".$id."' ";
		if($query = $this->db->query($sql)){
			return true;
			// $this->load->view('list_order');
		}else{
			return false;
		}
	
	}

    public function setOrderStatus($order_id, $order_status)
    {
        $this->db->set('payment_status', $order_status);
        $this->db->where('id', $order_id);
        $this->db->update('order');
        return $this->db->affected_rows();
    }

    public function changeItemStatus($order_item_id, $order_item_status)
    {
		$current_date = date('Y-m-d');
        $this->db->set('order_status', $order_item_status);
		$this->db->set('status_date', $current_date);
        $this->db->where('order_item_id', $order_item_id);
        $this->db->update('ci_order_item');
        return $this->db->affected_rows();
    }

	function userdata($id)
		{
		$this->db->select('*');
		$this->db->where(array('id' => $id));
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
				return false;
		}
	}
  
    
    #private functions
    private function getOrderAddress($user_id, $address_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $address_id);
        $result = $this->db->get('tbl_address_book')->result_array();
        $address = $result[0];

        $this->db->where('city_id', $address['city']);
        $result = $this->db->get('city')->result_array();
        $address['city'] = $result[0]['city_name'];

        $this->db->where('sid', $address['state']);
        $result = $this->db->get('state')->result_array();
        $address['state'] = $result[0]['sname'];

        $this->db->where('cid', $address['country']);
        $result = $this->db->get('country')->result_array();
        $address['country'] = $result[0]['countryname'];

        $this->db->where('id', $address['pincode']);
        $result = $this->db->get('pincodedata')->result_array();
        $address['pincode'] = $result[0]['pincode'];

        return $address;
    }
	public function getmodelname($model)
    {
        $this->db->where('id = ',$model);
		$query = $this->db->get('model');
		if ($query->num_rows() > 0)	{
			$result = $query->row()->name;
			return $result;
		} else {
			return "No Model";
		}
    }
	
	
	function  get_experiance_order()
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get('ci_orders_experiences');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}
	
	// function getproddetails($arrProddetails)

	//  {

	// 	$strQuery="SELECT p.*,( select min(price) from product_attribute where pid = p.id ) as `minprice`,IFNULL(im.image,'noimage.jpg') as base_image FROM product p LEFT JOIN product_image im ON im.pid=p.id and im.baseimage=1 where p.id=$arrProddetails";

	// 	$result = $this->db->query($strQuery);

	// 	if($result->num_rows()>0)

	// 	{

	// 		 $arrRes=$result->row(); 

	// 		return  $arrRes;

	// 	}

	// }
	
	function  get_experiance_order_detail($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('ci_orders_experiences');
		if ($query->num_rows() > 0)	{
			$result = $query->row();
			return $result;
		} else {
			return false;
		}
	}
	function  get_experiance_attendees_detail($id)
	{
		$this->db->where('expe_order_id = ',$id);
		$query = $this->db->get('ci_expr_attendees');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}
	
	function add_pick_up_point($content)
	{	
		$data['contact_persons_name'] 			= $content['contact_persons_name'];
		$data['contact_persons_mobile_number'] 	= $content['contact_persons_mobile_number'];
		$data['address'] 						= $content['address'];
		$data['address2'] 						= $content['address2'];
		$data['city'] 							= $content['city'];
		$data['state'] 							= $content['state'];
		$data['pincode'] 						= $content['pincode'];
		$data['google_map_link'] 				= $content['google_map_link'];
		
		$this->_data = $data;
		if ($this->db->insert('pick_up_address', $this->_data))
			{	
				return true;
			}
	}

	function get_product($id)
	{

		// $sql = "SELECT ci.*, u.fname, u.lname,sp.* from ci_order_item ci
		//         inner join ci_orders o ON o.order_id = ci.order_id
		//         inner join user u on u.id = ci.user_info_id
		// 		left join ci_shipping_address sp on sp.order_id = o.order_id
		//         where ci.order_item_id IN($id) order by ci.order_id desc";

		$sql = "SELECT ci.*, u.fname, u.lname,sp.* from ci_order_item ci
		        inner join ci_orders o ON o.order_id = ci.order_id
		        inner join user u on u.id = ci.user_info_id
				left join ci_shipping_address sp on sp.order_id = o.order_id
		        where ci.order_item_id = '".$id."' order by ci.order_id desc";
           
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}
	}

	// function productattrdetails($id)
	// {	
	// 	$sql = "SELECT * from product_attribute where id = '".$id."'";
	// 	$query = $this->db->query($sql);
	// 	if ($query->num_rows() > 0)
	// 	{
	// 		$result = $query->row();
	// 		return $result;
	// 	}
	// }

	// function getskucode($pid, $sizeId)
	// {	
	// 	$sql = "SELECT * from product_attribute where pid = '".$pid."' and size = '".$sizeId."'";
	// 	$query = $this->db->query($sql);
	// 	if ($query->num_rows() > 0)
	// 	{
	// 		$result = $query->row()->sku_code;
	// 		return $result;
	// 	}
	// }

	function get_address()
	{
	    $sql = "SELECT * FROM `pick_up_address` order by id desc";
	    $query = $this->db->query($sql);
	  	if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function create_label_add($content)
	{	
		$data['create_lable_weight'] 	= $content['weight'];
		$data['create_lable_length'] 	= $content['length'];
		$data['create_lable_height'] 	= $content['height'];
		$data['create_lable_width'] 	= $content['width'];
		$data['packstatus'] 			= 1;
		
		$this->_data = $data;

		// old code start
		$this->db->where('order_item_id',$content['order_item_id']);
		if ($this->db->update('ci_order_item', $this->_data))
		{	
			$order_status['vendor_id'] 		= $content['vendor_id'];
			$order_status['user_id'] 		= $content['user_id'];
			$order_status['order_id'] 		= $content['order_id'];
			$order_status['order_item_id'] 	= $content['order_item_id'];
			$order_status['status'] 		= 1;
			$this->_data = $order_status;
			if ($this->db->insert('ci_order_status', $this->_data))
			{
				
			}
			return true;
		}else
		{
			return false;
		}
	}

	function create_label_add_new($content)
	{	
		//echo "<pre>";print_r($content);echo "<pre>";
		
		$data['create_lable_weight'] 	= $content['weight'];
		$data['create_lable_length'] 	= $content['length'];
		$data['create_lable_height'] 	= $content['height'];
		$data['create_lable_width'] 	= $content['width'];
		$data['packstatus'] 			= 1;

		$data['sorder_id'] 	= $content['sorder_id'];
		$data['order_pk'] 	= $content['order_pk'];
		$data['tracking_id'] 	= $content['tracking_id'];
		$data['manifest_link'] 	= $content['manifest_link'];
		$data['routing_code'] 	= $content['routing_code'];
		$data['courier'] 	= $content['courier'];
		$data['track_url'] 	= $content['track_url'];		
				
		$this->_data = $data;

		// new code start
		$select_itemid = explode(",",$content['select_itemid']);
		foreach($select_itemid as $itemid)
		{
			$this->db->where('order_item_id',$itemid);
			$this->db->update('ci_order_item', $this->_data);
			
			$order_status['vendor_id'] 		= $content['vendor_id'];
			$order_status['user_id'] 		= $content['user_id'];
			$order_status['order_id'] 		= $content['order_id'];
			$order_status['tracking_id'] 		= $content['tracking_id'];
			$order_status['status'] 		= 1;
			$order_status['order_item_id'] 	= $itemid;
			$this->_order_status = $order_status;
			$this->db->insert('ci_order_status', $this->_order_status);

			$order_master['order_id'] 		= $content['order_id'];
			$order_master['order_item_id'] 	= $itemid;
			$order_master['client_order_id'] 	= $content['client_order_id'];
			$this->_order_master = $order_master;
			$this->db->insert('ci_orders_master', $this->_order_master);
		}
		return true;

		// old code start

		// $this->db->where('order_item_id',$content['order_item_id']);
		// //echo $this->db->last_query(); exit;
		// if ($this->db->update('ci_order_item', $this->_data))
		// {	
			
		// 	$order_status['vendor_id'] 		= $content['vendor_id'];
		// 	$order_status['user_id'] 		= $content['user_id'];
		// 	$order_status['order_id'] 		= $content['order_id'];
		// 	$order_status['order_item_id'] 	= $content['order_item_id'];
		// 	$order_status['status'] 		= 1;
		// 	$this->_data = $order_status;
		// 	if ($this->db->insert('ci_order_status', $this->_data))
		// 	{
				
		// 	}
		// 	return true;
		// }else
		// {
		// 	return false;
		// }
		
	}
	
	function get_product_order_item($id)
	{
 		$sql = "SELECT ci.*, o.order_number, o.invoice_number, o.paymentmode, o.coupondiscount, u.fname, u.lname, u.email,u.mobile, sp.* from ci_order_item ci
		        inner join ci_orders o ON o.order_id = ci.order_id
		        inner join user u on u.id = ci.user_info_id
				left join ci_shipping_address sp on sp.order_id = o.order_id
		        where ci.order_item_id = '".$id."' limit 1";
           
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
	}

	function vendor_sel_address($id)
	{
		$sql = "SELECT * FROM `pick_up_address` where id=$id order by id desc";
	    $query = $this->db->query($sql);
	  	if ($query->num_rows() > 0)	{
			$result = $query->row();
			return $result;
		} else {
			return false;
		}
	}

	function updateshipdetails($content)
	{
		$data['api_booking_id'] 	= $content['bookingid'];
		$data['api_label_pdf'] 		= $content['pdf'];
		$data['api_productid'] 		= $content['productid'];
		$data['liveecouriercharge'] = $content['liveecouriercharge'];
		$this->_data = $data;
		$this->db->where('order_item_id', $content['order_item_id']);
		if ($this->db->update('ci_order_item', $this->_data))
		{	
			return true;
		}else
		{
			return false;
		}
	}

	function ready_to_dispatch_add($content)
	{	
		/*$data['dispatch_end_date'] 	= $content['end_date'];*/
		$data['dispatch_start_date'] 	= date("Y-m-d H:i:s",strtotime($content['start_date']));
		$data['packstatus'] 			= 2;
		$data['customer_reference'] 	= $content['customer_reference'];

		$this->_data = $data;
		$this->db->where('order_item_id',$content['order_item_id']);
		if ($this->db->update('ci_order_item', $this->_data))
		{	
			$order_status['vendor_id'] 		= $content['vendor_id'];
			$order_status['user_id'] 		= $content['user_id'];
			$order_status['order_id'] 		= $content['order_id'];
			$order_status['order_item_id'] 	= $content['order_item_id'];
			$order_status['status'] 		= 2;
			$this->_data = $order_status;
			if ($this->db->insert('ci_order_status', $this->_data))
			{
				
			}
			return true;
		}else
		{
			return false;
		}
	}

	function updateShipOrderStatus($content)
	{
		$data['booking_status'] 	= $content['booking_status'];
		$data['packstatus'] 			= 3;
		$this->_data = $data;
		
		// new code start

		// $this->db->where_in('tracking_id', $content['tracking_id']);
		// $this->db->update('ci_order_item', $this->_data);
		
		// $order_status['status'] 		= 3;
		// $this->db->where('tracking_id', $content['tracking_id']);
		// $this->_data = $order_status;
		// $this->db->update('ci_order_status', $this->_data);
		
		// return true;

		// old code start

		$this->db->where('order_item_id', $content['order_item_id']);
		if ($this->db->update('ci_order_item', $this->_data))
		{	
			$order_status['status'] 		= 3;
			$this->db->where('order_item_id', $content['order_item_id']);
			$this->_data = $order_status;
			if ($this->db->update('ci_order_status', $this->_data))
			{
				
			}
			return true;
		}else
		{
			return false;
		}
	}

	function getorderitem($orderid)
	{	
		$sql = "SELECT * from ci_order_item where order_item_id = '".$orderid."'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
	}

	function trackstatus_step($order_item_id,$step)
	{	
		$sql = "SELECT * from ci_order_status where order_item_id = '".$order_item_id."' and status = '".$step."'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
	}

	function updateuti($id,$is_active)
	{
	$sql= " update ci_order_item set approve= '".$is_active."' where order_item_id ='".$id."' ";
		if ($query = $this->db->query($sql))	{
			return true;
		} else {
			return false;
			}
	}

	function updateuti_exchange($id,$is_active)
	{
	$sql= " update ci_order_item set exchange_approve= '".$is_active."' where order_item_id ='".$id."' ";
		if ($query = $this->db->query($sql))	{
			return true;
		} else {
			return false;
			}
	}

	function getOrderNumber($order_id)
	{	
		$sql = "SELECT * from ci_orders where order_id = '".$order_id."' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->order_number;
			return $result;
		}
	}

	function get_industry_name($id)
	{	
		$sql = "SELECT * from industry where id = '".$id."' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->name;
			return $result;
		}
	}

	function get_sub_industry_name($id)
	{	
		$sql = "SELECT * from sub_industry where id = '".$id."' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->name;
			return $result;
		}
	}

	function get_coverage_name($id)
	{	
		$sql = "SELECT * from coverage where id = '".$id."' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->name;
			return $result;
		}
	}

	function get_type_name($id)
	{	
		$sql = "SELECT * from type where id = '".$id."' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->name;
			return $result;
		}
	}

	

}