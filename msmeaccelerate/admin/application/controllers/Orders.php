<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Orders extends CI_Controller
{
    private $data = array();
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('adminId') == null) {
            redirect($this->config->item('base_url'));
        }
        parse_str($_SERVER['QUERY_STRING'], $_GET);
        $this->load->model('orders_model');
		include("./phpmailer/PHPMailer.php");
		include("./phpmailer/SMTP.php");
		include("./phpmailer/POP3.php");
    }

	

    public function lists($status='')
    {
		// $order = $this->orders_model->exportorders();
        $this->data['orders_list'] = $this->orders_model->getOrders($id='',$status);

        //echo "<pre>";print_r($this->data['orders_list']);echo"</pre>";exit;
	    $this->load->view('list_order', $this->data);
    }

	function updatestatus($id,$value) {	
        
        $this->load->model('orders_model');
        
        $result=$this->orders_model->updatestatus($id,$value);	
		
	    $this->session->set_flashdata('L_strErrorMessage','Orders Type Changed Succcessfully!');
		redirect($this->config->item('base_url').'orders/lists');
    }



function download_order_report(){
		// echo"hii";
		$this->load->model('orders_model');
	   $user_list = $this->orders_model->exportorders();
	   
	   $output = 'Order-Id,Order Number,First Name,Last Name,Email,Mobile,Product Name,Qty,Order Date,Price,Order Status, Payment Status,Payment Mode,address1, address2,City,State,Country,Pincode,Article code,Sku Code';
	   $output .= "\n";
	   if($user_list != '' && count($user_list) > 0) {

		   $i=1;

		   $currentOrderId = null;
		   $orderID = '';

		   foreach ($user_list as $key => $user) {
			   
			   if($user->payment_status == 1)
				   {
					   $paymentStatus = 'PAID';
						   
				   }
				   else{

					   $paymentStatus ='FAILED';
				   }

				   if($user->paymentmode == 1)
				   {
					   $paymentMode = 'COD';
						   
				   }
				   else{

					   $paymentMode ='ONLINE PAYMENT';
				   }

				   if($user->order_status == 0)
				   {
					   $orderStatus = 'PENDING';
						   
				   }
				   else if($user->order_status == 1){

					   $orderStatus ='PACKED';
				   }
				   else if($user->order_status == 4){

					$orderStatus ='CANCELLED';
				}
				else if($user->order_status == 3){

					$orderStatus ='DELIVERED';
				}
				else if($user->order_status == 2){

					$orderStatus ='DISPATCHED';
				}
				else if($user->order_status == 5){

					$orderStatus ='RETURN';
				}
				else if($user->order_status == 6){

					$orderStatus ='EXCHANGE';
				}
				else if($user->order_status == 7){

					$orderStatus ='REFUND';
				}
				else{
					$orderStatus=$user->order_status;
				}

				if($user->order_id != $currentOrderId){
					$currentOrderId = $user->order_id;
					$orderID = $currentOrderId;
				} else {
					$orderID = '-';
				}
				   


		   $output .= 	'"' . $orderID . '","' . $user->order_number . '","' . $user->fname . '","' . $user->lname . '","' . $user->email . '","' . $user->mobile . '","' . $user->order_item_name . '","' . $user->product_quantity . '","' . $user->cdate . '","' . $user->product_item_price . '","' . $orderStatus . '","' . $paymentStatus . '","' . $paymentMode . '" ,"' .  $user->Address1 . '" ,"' .  $user->Address2 . '" ,"' .  $user->City . '" ,"' .  $user->AddressState . '" ,"' .  $user->Country . '","' .  $user->PostCode . '","' .  $user->similarCode . '","' .  $user->skuCode . '"' ;
		   // $output .= '"' . $i. '","' . $user->fname . '","' . $user->email . '","' . $user->mobile . '"';
		   $output .= "\n";

		   $i++;

		   }

	   }

	   $filename = "Order_reports.xlsx";

	   header('Content-type: application/xlsx');

	   header('Content-Disposition: attachment; filename=' . $filename);

	   echo $output;

	   //echo "<pre>";print_r($output);echo "</pre>";

	   exit;
   }

	
	  public function lists_experiance()
    {
        $this->data['get_experiance_order'] = $this->orders_model->get_experiance_order();
        $this->load->view('list_experiance_order', $this->data);
    }
	
	
	public function view_experiance_orders($order_id)
    {
		$data['order'] = $this->orders_model->get_experiance_order_detail($order_id);
		$data['order_attendees'] = $this->orders_model->get_experiance_attendees_detail($order_id);
        $this->load->view('view_experiance_orders', $data);
    }
	
    public function detail($order_id)
    {
		$order = $this->orders_model->getOrders($order_id);
		// echo "<pre>";
		// print_r($order);
		// die;
		$this->data['order'] = $order[0];
		$this->data['totol_words'] = $this->convert_number_to_words(round($order[0]['order_total']));
		$this->load->view('view_orders', $this->data);
    }


	public function vendordetail($order_id,$bookingapiid)
    {
		$order = $this->orders_model->getOrders_vendoritem_bookingid($order_id,$bookingapiid);
		$this->data['order'] = $order[0];
		$this->data['totol_words'] = $this->convert_number_to_words(round($order[0]['order_total']));
		
		$this->load->library('shipping');
		$id = $order[0]['api_booking_id'];
		$postfields['order_ids'] = $id;
		$result = $this->shipping->deliveredstatus($postfields);
		$schedulepickuparray = json_decode($result);
		
		$this->data['schedulepickuparray'] = $schedulepickuparray;
		$this->load->view('view_vendororders', $this->data);
    }





	public function Invoice($order_id)
	{
		$order = $this->orders_model->getOrders($order_id);
		$this->data['order'] = $order[0];
		$this->data['totol_words'] = $this->convert_number_to_words(round($order[0]['order_total']));
		  
        $this->load->view('view_invoice', $this->data);
	}
	public function packing_slip()
	{
		 $this->load->view('packing_slip');
	}
  function changeStatusmail($orderid)
   {
		$status=$this->input->post("status");
		$trackadd=$this->input->post("tracking");
		
		
	   	if($request=$this->orders_model->status($orderid,$status,$trackadd))
		{
				$order1 = $this->orders_model->getOrders($orderid);
				$data["order"]=$order1[0];
				
				if($status=='S'){	
						$message =  $this->load->view('emailer/order-shipped.php',$data,true);
				}
				if($status=='D'){	
						$message =  $this->load->view('emailer/order-delivered.php',$data,true);	
				}
				if($status=='C'){	
						$message =  $this->load->view('emailer/order-cancelled.php',$data,true);	
				}	
				
			$to=$data["order"]["user_email"];
			
			if($status=='P'){	
					$subject  = 'Pending Order';
				}
			if($status=='S'){	
					$subject  = 'Shipped Order';
					
				}
			if($status=='D'){	
					$subject  = 'Delivered Order';
					
				}
			if($status=='C'){	
			$subject  = 'Canceled Order ';
						
				}
				
			if($status !='P'){
						
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: coalbrass.com <info@coalbrass.com>' . "\r\n" .
						'Reply-To: info@coalbrass.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			$headers .= 'BCC: amvisolution@gmail.com' . "\r\n";
				mail($to, $subject, $message, $headers);
				
				mail('amvi.himanshu@gmail.com', $subject, $message, $headers);
				
			}	
 			$this->session->set_flashdata('L_strErrorMessage','Your Order Status Update  successfully.');
			}
			else
			{
				$this->session->set_flashdata('flashError','Some Errors prevented from Adding!!!!');
			}
	   //redirect($this->config->item('base_url').'orders/lists');
	   redirect($this->config->item('base_url').'orders/detail/'.$orderid);
	   
   }
   
    public function changeStatus()
    {
        $order_id     = $this->input->get('order_id');
        $order_status = $this->input->get('order_status');
        $order        = $this->orders_model->setOrderStatus($order_id, $order_status);
        echo $order;
    }
  
    public function changeItemStatus()
    {
        $order_item_id = $this->input->post('id');
        $order_item_status = $this->input->post('selected_status'); 
        $userid = $this->input->post('userid');
        $orderid = $this->input->post('orderid');
        
        $order_items = $this->orders_model->getOrdersitem($order_item_id);
        $order_item = $this->orders_model->changeItemStatus($order_item_id, $order_item_status);
        $order = $this->orders_model->getOrderdetail($orderid);
		
		$tracking_id12 = $order_items['tracking_id'];

		$shippingadd = $this->orders_model->getshippingadd($orderid);
        $userdata = $this->orders_model->userdata($userid);
        //print_r($userdata); exit;
        if($order_item == 1 && $order_item_status == 2){

			$curl2 = curl_init();

			curl_setopt_array($curl2, [
			CURLOPT_URL => "https://live-server-8556.wati.io/api/v1/sendTemplateMessage?whatsappNumber=91$userdata->mobile",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{\"parameters\":[{\"name\":\"test\",\"value\":\"$order->order_number\"},{\"name\":\"string\",\"value\":\"https://www.notsopink.in/beta/track-order/$order->order_number\"}],\"template_name\":\"track_order_rev\",\"broadcast_name\":\"track_order_rev\"}",
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIyZTY2ZTY2Yy1hZGRhLTQ3OTctYTdjMS01MTVmYmVjYzczYWYiLCJ1bmlxdWVfbmFtZSI6InBhdGVsbmlrdWwzMjFAZ21haWwuY29tIiwibmFtZWlkIjoicGF0ZWxuaWt1bDMyMUBnbWFpbC5jb20iLCJlbWFpbCI6InBhdGVsbmlrdWwzMjFAZ21haWwuY29tIiwiYXV0aF90aW1lIjoiMDQvMjEvMjAyMiAwODoyMToyNiIsImRiX25hbWUiOiI4NTU2IiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQURNSU5JU1RSQVRPUiIsImV4cCI6MjUzNDAyMzAwODAwLCJpc3MiOiJDbGFyZV9BSSIsImF1ZCI6IkNsYXJlX0FJIn0.GDeZp-gA18soo5tDjEcD6aAgYJsSTI3uer7_l9stF4o",
				"Content-Type: text/json"
			],
			]);

			$response2 = curl_exec($curl2);
			$err = curl_error($curl2);

			curl_close($curl2);

			// if ($err) {
			// echo "cURL Error #:" . $err;
			// } else {
			// echo $response;
			// }
            
            $msg = "Hey $userdata->fname, your Not So Pink order: $order->order_number has been shipped. View order details: https://www.notsopink.in/my-purchase Track your order: https://www.notsopink.in/my-purchase Thank you for shopping with Soch Retail Private Limited.";
    		$message = urlencode($msg);


            $curl = curl_init();
            curl_setopt_array($curl, array(CURLOPT_URL =>"http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=FvNm7Az&type=0&dlr=1&destination=$userdata->mobile&source=NSPORD&message=$message&entityid=1601980161097394647&tempid=1607100000000115815",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
			
            curl_close($curl);

            $email_message = '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Order Shipped</title>
                
            </head>
            <body>
                <table width="100%"" border="0" cellpadding="0" cellspacing="0" style="background: #fff;">
             
                    <tr>
                        <td align="center">
                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                               <link href="https://www.notsopink.in/emailers/fonts.css" rel="stylesheet">
                <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
            
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top" bgcolor="#fff">
                                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tbody>
            
                                                    <tr>
                                                    <td height="50"></td>
                                                </tr>
            
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size: 30pt; color:#3c3c3c; opacity: 0.65;line-height: 34pt; font-weight: bold; ">
                                                    YOUR NOT SO PINK<br> ORDER: '.$order->order_number.' <br> HAS BEEN SHIPPED!
                                                  </td>
                                                </tr>
            
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>
            
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">
                                                    Hey '.$userdata->fname.',<br>
                                                    Your Not So Pink order: '.$order->order_number.' has been shipped.
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>
                                                
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">
                                                    Time to get excited because you"ll get to don your<br>
                                                    brand new purchase pretty soon!
                                                  </td>
                                                </tr>
                                                
                                                 <tr>
                                                    <td height="20"></td>
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>
                                                
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">
                                                    You can track your order by clicking below.
                                                  </td>
                                                </tr>
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td align="center" style="font-family: Helvetica, sans-serif; font-size:14pt; color:#726e6d;line-height:24px; font-weight: 700;">
                                                        <a href="https://www.notsopink.in/track-order/'.$order->order_number.'" style="text-decoration: none;background: #cac6c3;color: #3c3a3b;font-weight: 700;padding: 6px 20px;">TRACK ORDER</a>
                                                    </td>
                                                </tr>
                                                
                                                 <tr>
                                                    <td height="40"></td>
                                                </tr>
                                                
                                                
                                                
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                
                    
                    
                    <tr>
                        <td align="center">
                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border: 1px solid #3c3c3c;">
            
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top" bgcolor="#fff">
                                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tbody>
            
                                                    <tr>
                                                    <td height="30"></td>
                                                </tr>
            
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size: 18pt; color:#3c3c3c;">
                                                    SHIPPING ADDRESS
                                                  </td>
                                                </tr>
            
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
            
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size:14pt; color:#3c3c3c; opacity: 0.8; line-height: 22pt; font-weight: 400;padding: 0px 5%;">
                                                    '.$shippingadd->address1.' '.$shippingadd->address2.' '.$shippingadd->city.' '.$shippingadd->state.' '.$shippingadd->country.' '.$shippingadd->post_code.'   
                                                  </td>
                                                </tr>
                                                  <tr>
                                                    <td height="35"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="center">
                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
            
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top" bgcolor="#fff">
                                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tbody>
            
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
            
                                                <tr>
                                                  <td align="center" style="font-family: Helvetica, sans-serif; font-size:14pt; color:#3c3c3c; opacity: 0.8; line-height: 22pt; font-weight: 400;padding: 0px 5%;">
                                                    For support, email us on <a href="mailto:" style="text-decoration:none; color:#3c3c3c;">wecare@notsopink.in</a><br>
                                            or visit <a href="https://www.notsopink.in/" target="_blank" style="text-decoration:none; color:#3c3c3c;">www.notsopink.in</a>
                                                  </td>
                                                </tr>
                                                  <tr>
                                                    <td height="0"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    
                
            
            
            
                    <tr>
                        <td align="center">
                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td height="10"></td>
                                    </tr>
            
                                    <tr>
                                        <td>
                                            <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
            
                                                <tr>
                                                <td align="center">
                                                    <table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">
            
                                                        <tbody>
            
                                                        <tr>
                                                            <td height="20"></td>
                                                        </tr>
            
            
                                                        <tr align="center">
                                                            <td ><a href="https://www.notsopink.in/" target="_blank" style="text-decoration:none; color:#3c3c3c;font-size: 14pt;">SHOP</a></td>
                                                        </tr>
            
            
                                                        <tr>
                                                            <td height="20"></td>
                                                        </tr>
            
            
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                            </table>
            
                                            <table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
                                            <tbody><tr>
                                                <td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                    <p style="padding-left: 24px;">&nbsp;</p>
                                                </td>
                                            </tr>
                                          </tbody>
                                        </table>
            
                                        <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tbody>
            
                                                        <tr>
                                                            <td height="20s"></td>
                                                        </tr>
            
                                                        <tr align="center">
                                                            <td ><a href="https://www.notsopink.in/collections" target="_blank" style="text-decoration:none; color:#3c3c3c;font-size: 14pt;">COLLECTIONS</a></td>
                                                        </tr>
            
                                                        <tr>
                                                            <td height="20"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        
                                           </tbody>
                                         </table>
            
            
                                         <table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
                                            <tbody><tr>
                                                <td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                    <p style="padding-left: 24px;">&nbsp;</p>
                                                </td>
                                            </tr>
                                        </tbody></table>
            
            
                                            <table class="col3" width="183" border="0" align="right" cellpadding="0" cellspacing="0">
                                            <tbody><tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">
            
                                                        <tbody>
            
            
                                                        <tr>
                                                            <td height="20"></td>
                                                        </tr>
            
            
                                                        <tr align="center">
                                                            <td ><a href="https://www.notsopink.in/about" target="_blank" style="text-decoration:none; color:#3c3c3c;font-size: 14pt;">ABOUT US</a></td>
                                                        </tr>
            
            
                                                        <tr>
                                                            <td height="20"></td>
                                                        </tr>
            
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
            
                                        </td>
                                    </tr>
            
                                </tbody>
                            </table>
                        </td>
                    </tr>
            
            
            
            
            
                    <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px;">
                        <tbody>
                            <tr>
                            <td align="center">
                                <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-top: 1px solid #3c3c3c; border-bottom: 1px solid #3c3c3c">
                                <tbody>
                                    <!-- <tr>
                                    <td height="50"></td>
                                </tr> -->
                                <tr>
                                <td align="right">
                                    <table class="col2" width="287" border="0" align="left" cellpadding="0" cellspacing="0">
                                    <tbody>
            
                                    <tr>
                                        <td height="35"></td>
                                    </tr>
            
                                    <tr width="100%">
                                        <td align="center" width="100%"  style="font-family: Helvetica, sans-serif; font-size: 12pt; color:#3c3c3c; font-weight: 400; ">Let&apos;s hang out?</td>
                                    </tr>
            
                                    <tr>
                                        <td height="15"></td>
                                    </tr>
            
                                    <tr width="100%">
                                        <td style="font-family: Lato, sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 300;"> 
                                            <ul style="display: flex;list-style: none;text-align: center;    margin-left: 25px;">
                                            <li style="padding-right: 30px;"><a href="https://www.facebook.com/notsopink/" style="text-decoration: none;text-align: center;color: #534f4e;font-size: 20px;" target="_blank"><img src="https://www.notsopink.in/site/views/images/fb-icon.png"></a></li>

                                            <li style="padding-right: 30px;"><a href="https://www.instagram.com/accounts/login/?next=/notsopink.in/" style="text-decoration: none;text-align: center;color: #534f4e;font-size: 20px;" target="_blank"><img src="https://www.notsopink.in/site/views/images/insta-icon.png"></a></li>

                                            <li style="padding-right: 30px;"><a href="https://mobile.twitter.com/notsopinkindia" style="text-decoration: none;text-align: center;color: #534f4e;font-size: 20px;" target="_blank"><img src="https://www.notsopink.in/site/views/images/twit-icon.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
            
                                    </tbody>
                                    </table>
            
                                    <table width="287" border="0" align="right" cellpadding="0" cellspacing="0" class="col2" style="border-left: 1px solid #3c3c3c;">
                                    <tbody>
            
                                    <tr>
                                        <td align="center">
                                        <table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
            
                                    <tbody>
            
                                    <tr>
                                        <td style="font-family: Helvetica, sans-serif; font-size:12pt; color:#524f4d; line-height:25px; font-weight: 400;"> <strong style="font-family: Lato, sans-serif; font-weight: 700;">Soch</strong> <span style="font-family: Lato, sans-serif; font-weight: 400;">Retail Pvt. Ltd.</span><br> Building No.A-11, Gala No.- 10 to 13, Lonad Village, Opp. Sawad Maharashtra - 421101<br>Email: <a href="#" style="text-decoration:none; color:#3c3c3c;">wecare@notsopink.in</a></td>
                                    </tr>
            
                                    <tr>
                                        <td height="40"></td>
                                    </tr>
            
                                    </tbody>
                                    </table>
                                    
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                </td>
                                </tr>
                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
            
            
            
                    <tr>
                        <td align="center">
                            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td height="10"></td>
                                    </tr>
            
                                    <tr align="center">
                                        <td style="font-family: Helvetica, sans-serif; font-size:9.5pt; color:#524f4d; line-height:18.83pt; font-weight: 400;">&copy; 2021-22 Soch Retail Pvt. Ltd. All rights reserved</td>
                                    </tr>
            
            
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
            
                                    <tr align="center">
                                        <td>
                                            <a href="https://www.notsopink.in/" target="_blank"><img src="https://www.notsopink.in/site/views/images/NSP-Logo-header.png"></a>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td height="10"></td>
                                    </tr>
            
                                </tbody>
                            </table>
                        </td>
                    </tr>
            
            
            
                </table>
            
            </body>
            </html>';

            $subject = "Order Shipped";
			$to = $userdata->email;

			// $headers  = 'MIME-Version: 1.0' . "\r\n";
			// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// $headers .= 'From:notsopink <info@notsopink.in>' . "\r\n" .
			// 			'Reply-To: info@notsopink.in' . "\r\n" .
			// 			'X-Mailer: PHP/' . phpversion();
			// $headers .= 'Cc: info@notsopink.in' . "\r\n";

			// mail($to, $subject, $email_message, $headers);
			//mail('hello@notsopink.in', $subject, $message, $headers);

			$addcc = array();
					$AddAttachment=array();
					if($to != ''){
						$this->mailsent($to,$subject,$email_message,$addcc,$AddAttachment);
					}
							
			//$this->session->set_flashdata('success_register','Register Successfully!!!!');
        }
        //  if($order_item == 1 && $order_item_status == 3){

        if($order_item == 1 && $order_item_status == 3){

            $msg = "Hey $userdata->fname, your Not So Pink order: $order->order_number has been delivered. Please rate your purchase: https://www.notsopink.in View order details: https://www.notsopink.in/purchase-detail/$order->order_number. Thank you for shopping with Soch Retail Private Limited";
    		$message = urlencode($msg);

			if($order_items['discounts']!=''){
				$discounted_price = round(($order_items['real_price'] * $order_items['discounts'])/100);
			}
			if($order_items['discount_price']!=''){
				$discounted_price = round($order_items['discount_price']);
			}
			else{
				$discounted_price = 0;
			} 

            $curl = curl_init();
            curl_setopt_array($curl, array(CURLOPT_URL =>"http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=FvNm7Az&type=0&dlr=1&destination=9824884913&source=NSPORD&message=$message&entityid=1601980161097394647&tempid=1607100000000115818",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
			
            curl_close($curl);

            $email_message = '
            
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Order Delivered</title>
	
</head>
<body>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background: #fff;">
 
		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
				   <link href="https://www.notsopink.in/emailers/fonts.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

					<tbody>
						<tr>
							<td align="center" valign="top" bgcolor="#fff">
								<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
									<tbody>

										<tr>
									    <td height="50"></td>
								    </tr>

								    <tr>
									  <td align="center" style="font-family: Helvetica, sans-serif; font-size: 30pt; color:#3c3c3c; opacity: 0.65;line-height: 34pt; font-weight: bold; ">
										TIME TO REDEFINE<br> YOUR WORKWEAR <br> WITH NOT SO PINK
									  </td>
								    </tr>

								    <tr>
									    <td height="20"></td>
								    </tr>

								    <tr>
									  <td align="center" style="font-family: Helvetica, sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">
										Hey '.$userdata->fname.',<br>
										We&apos;re sure that this email will find you happy and excited,<br>
										because our delivery partner just informed us that your<br> 
										Not So Pink order: '.$order->order_number.' has been delivered to you.<br>
										It&apos;s time to redefine your workwear collection,<br>
										one Not So Pink apparel at a time.
									  </td>
								    </tr>
								    
								    <tr>
									    <td height="20"></td>
								    </tr>
								    
								   
								    
								    
								    
								    
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
				   

					<tbody>
						<tr>
							<td align="center" valign="top" bgcolor="#fff">
								<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
									<tbody>

									<tr>
									    <td height="50" ></td>
								    </tr>

								    <tr>
								        <td align="center" style="font-family: Helvetica, sans-serif; font-size: 20pt; color:#3c3c3c; line-height: 34pt; font-weight: 400; ">
										HERE&apos;S WHAT YOU ORDERED:
									  </td>
									  									  
								    </tr>

								    <tr>
									    <td height="20"></td>
								    </tr>

								   
									</tbody>
								</table>
								
								<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-top: 1px solid #3c3c3c;">
									<tbody>
                                    
								    <tr>
								        <td height="30" ></td>
								         <tr>
								             <td><img src="https://www.notsopink.in/upload/products/'.$order_items['base_image'].'" style="width:100px"></td>
								             <td style="font-family: Helvetica, sans-serif;font-size: 14pt;color: #3c3c3c;font-weight: 500; float: left;width: 200px;">'.$order_items['order_item_name'].'</td>
								             <td style="font-family: Helvetica, sans-serif;font-size: 14pt;color: #3c3c3c;font-weight: 500; float: left;">&times; '.$order_items['product_quantity'].'</td>
								             <td style="font-family: Helvetica, sans-serif;font-size: 14pt;color: #3c3c3c;font-weight: 500; float: right;">&#8377; '.round($order_items['product_item_price']).'</td>
								        </tr>	
								        <td height="30" ></td>
								    </tr>
									
									 </tbody>
									 </table>';
								
								$email_message .= '<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-top: 1px solid #3c3c3c;">
									<tbody>
								    <tr>
								        <td height="30" ></td>
								         <tr>
								             <td style="font-family: Lato, sans-serif;font-size: 16pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: left;">Sub total:</td>
								             <td style="font-family: Lato, sans-serif;font-size: 14pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: right;">&#8377; '.round($order_items['real_price']).'</td>
								        </tr>
								        <td height="20" ></td>
								        <tr>
								             <td style="font-family: Lato, sans-serif;font-size: 16pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: left;">Discount:</td>
								             <td style="font-family: Lato, sans-serif;font-size: 14pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: right;">'.$discounted_price.'</td>
								        </tr>
								        
								        <td height="20" ></td>
								        <tr>
								             <td style="font-family: Lato, sans-serif;font-size: 16pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: left;">Shipping:</td>
								             <td style="font-family: Lato, sans-serif;font-size: 14pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: right;">&#8377; '.round($order->shippingcost).'</td>
								        </tr>
								        
								        <td height="20" ></td>
								        <tr>
								             <td style="font-family: Lato, sans-serif;font-size: 16pt;color: #3c3c3c;opacity: 0.8;font-weight: 700; float: left;">Total:</td>
								             <td style="font-family: Lato, sans-serif;font-size: 14pt;color: #3c3c3c;opacity: 0.8;font-weight: 500; float: right;">&#8377; '.round($order_items['product_item_price']).'</td>
								        </tr>
								        
								        
								        <td height="50" ></td>
								    </tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		
		
		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border: 1px solid #3c3c3c;">

					<tbody>
						<tr>
							<td align="center" valign="top" bgcolor="#fff">
								<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
									<tbody>

										<tr>
									    <td height="30"></td>
								    </tr>

								    <tr>
									  <td align="center" style="font-family: Helvetica, sans-serif; font-size: 18pt; color:#3c3c3c;">
										SHIPPING ADDRESS
									  </td>
								    </tr>

								    <tr>
									    <td height="10"></td>
								    </tr>

								    <tr>
									  <td align="center" style="font-family: Helvetica, sans-serif; font-size:14pt; color:#3c3c3c; opacity: 0.8; line-height: 22pt; font-weight: 400;padding: 0px 5%;">
									  '.$shippingadd->address1.' '.$shippingadd->address2.' <br> '.$shippingadd->city.' '.$shippingadd->state.' <br> '.$shippingadd->country.' '.$shippingadd->post_code.'
									  </td>
								    </tr>
								      <tr>
									    <td height="35"></td>
								    </tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		
		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">

					<tbody>
						<tr>
							<td align="center" valign="top" bgcolor="#fff">
								<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
									<tbody>

									<tr>
									    <td height="30"></td>
								    </tr>

								    <tr>
									  <td align="center" style="font-family: Helvetica, sans-serif; font-size:14pt; color:#3c3c3c; opacity: 0.8; line-height: 22pt; font-weight: 400;padding: 0px 5%;">
										For support, email us on <a href="mailto:" style="text-decoration:none; color:#3c3c3c;">wecare@notsopink.in</a><br>
                                            or visit <a href="https://www.notsopink.in/" target="_blank" style="text-decoration:none; color:#3c3c3c;">www.notsopink.in</a>
									  </td>
								    </tr>
								      <tr>
									    <td height="0"></td>
								    </tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		
	



		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td height="10"></td>
						</tr>

						<tr>
							<td>
								<table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
										<td height="30"></td>
									</tr>

									<tr>
									<td align="center">
										<table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

											<tbody>

											<tr>
												<td height="20"></td>
											</tr>


											<tr align="center">
												<td><a href="https://www.notsopink.in/" target="_blank" style="text-decoration:none; color:#3c3c3c;font-size: 14pt;">SHOP</a></td>
											</tr>


											<tr>
												<td height="20"></td>
											</tr>


										</tbody>
									</table>
									</td>
								</tr>
								</tbody>
								</table>

								<table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
								<tbody><tr>
									<td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
										<p style="padding-left: 24px;">&nbsp;</p>
									</td>
								</tr>
							  </tbody>
						    </table>

						    <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
									<td height="30"></td>
								</tr>
								<tr>
									<td align="center">
										<table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody>

											<tr>
												<td height="20s"></td>
											</tr>

											<tr align="center">
												<td ><a href="https://www.notsopink.in/collections" target="_blank" style="text-decoration:none; color:#3c3c3c;font-size: 14pt;">COLLECTIONS</a></td>
											</tr>

											<tr>
												<td height="20"></td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							
							   </tbody>
						     </table>


						     <table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
								<tbody><tr>
									<td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
										<p style="padding-left: 24px;">&nbsp;</p>
									</td>
								</tr>
							</tbody></table>


								<table class="col3" width="183" border="0" align="right" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="30"></td>
								</tr>
								<tr>
									<td align="center">
										<table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

											<tbody>


											<tr>
												<td height="20"></td>
											</tr>


											<tr align="center">
												<td ><a href="https://www.notsopink.in/about" target="_blank" style="text-decoration:none; color:#3c3c3c;font-size: 14pt;">ABOUT US</a></td>
											</tr>


											<tr>
												<td height="20"></td>
											</tr>

										</tbody>
									</table>
									</td>
								</tr>
								
							</tbody>
						</table>

							</td>
						</tr>

					</tbody>
				</table>
			</td>
		</tr>





		<tr>
		<td align="center">
			<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px;">
			<tbody>
				<tr>
				<td align="center">
					<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-top: 1px solid #3c3c3c; border-bottom: 1px solid #3c3c3c">
					<tbody>
						<!-- <tr>
						<td height="50"></td>
					</tr> -->
					<tr>
					<td align="right">
						<table class="col2" width="287" border="0" align="left" cellpadding="0" cellspacing="0">
						<tbody>

						<tr>
							<td height="35"></td>
						</tr>

						<tr width="100%">
							<td align="center" width="100%"  style="font-family: Helvetica, sans-serif; font-size: 12pt; color:#3c3c3c; font-weight: 400; ">Let"s hang out?</td>
						</tr>

						<tr>
							<td height="15"></td>
						</tr>

						<tr width="100%">
							<td style="font-family: Lato, sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 300;"> 
								<ul style="display: flex;list-style: none;text-align: center;    margin-left: 25px;">
								<li style="padding-right: 30px;"><a href="https://www.facebook.com/notsopink/" style="text-decoration: none;text-align: center;color: #534f4e;font-size: 20px;" target="_blank"><img src="https://www.notsopink.in/site/views/images/fb-icon.png"></a></li>
                                            <li style="padding-right: 30px;"><a href="https://www.instagram.com/accounts/login/?next=/notsopink.in/" style="text-decoration: none;text-align: center;color: #534f4e;font-size: 20px;" target="_blank"><img src="https://www.notsopink.in/site/views/images/insta-icon.png"></a></li>

                                            <li style="padding-right: 30px;"><a href="https://mobile.twitter.com/notsopinkindia" style="text-decoration: none;text-align: center;color: #534f4e;font-size: 20px;" target="_blank"><img src="https://www.notsopink.in/site/views/images/twit-icon.png"></a></li>
						        </ul>
							</td>
						</tr>

					    </tbody>
						</table>

						<table width="287" border="0" align="right" cellpadding="0" cellspacing="0" class="col2" style="border-left: 1px solid #3c3c3c;">
						<tbody>

						<tr>
							<td align="center">
							<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td height="30"></td>
						</tr>

						<tbody>

						<tr>
							<td style="font-family: Helvetica, sans-serif; font-size:12pt; color:#524f4d; line-height:25px; font-weight: 400;"> <strong style="font-family: Lato, sans-serif; font-weight: 700;">Soch</strong> <span style="font-family: Lato, sans-serif; font-weight: 400;">Retail Pvt. Ltd.</span><br> Building No.A-11, Gala No.- 10 to 13, Lonad Village, Opp. Sawad Maharashtra - 421101<br>Email: <a href="#" style="text-decoration:none; color:#3c3c3c;">wecare@notsopink.in</a></td>
						</tr>

						<tr>
							<td height="40"></td>
						</tr>

					    </tbody>
					    </table>
						
						</td>
						</tr>
						</tbody>
					    </table>
					</td>
					</tr>
				</tbody></table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>



		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td height="10"></td>
						</tr>

						<tr align="center">
							<td style="font-family: Helvetica, sans-serif; font-size:9.5pt; color:#524f4d; line-height:18.83pt; font-weight: 400;">&copy; 2021-22 Soch Retail Pvt. Ltd. All rights reserved</td>
						</tr>


						<tr>
							<td height="30"></td>
						</tr>

						<tr align="center">
							<td>
								<a href="https://www.notsopink.in/" target="_blank"><img src="https://www.notsopink.in/site/views/images/NSP-Logo-header.png"></a>
							</td>
						</tr>
						
						<tr>
							<td height="10"></td>
						</tr>

					</tbody>
				</table>
			</td>
		</tr>



	</table>

</body>
</html>';

            $subject = "Order Delivered";
			$to = $userdata->email;

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Not So Pink <info@notsopink.in>' . "\r\n" .
						'Reply-To: info@notsopink.in' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			$headers .= 'Cc: info@notsopink.in' . "\r\n";

			mail($to, $subject, $email_message, $headers);
			//mail('hello@notsopink.in', $subject, $message, $headers);
							
			//$this->session->set_flashdata('success_register','Register Successfully!!!!');
        }
        echo $order_item;
    }
    
	public function download_report()
	{
		$order_list  = $this->orders_model->getOrders($id='',$status='');
		$output = '';
		$output .= 'Order No,Order Date,User Name,Product,Color,Size,MRP,City,Payment status,Order Status,Delivery Date';
		
		$output .="\n";
		if($order_list != '' && count($order_list) > 0) {
			$i=1;
		foreach($order_list as $order) {
				foreach($order['items'] as $items){
					
					if($order['order_status'] == 'P')
					{
						$order_status = 'Pending';
						$status_date	="-";	
					}
					else if($order['order_status'] == 'R')
					{
						$order_status = 'Processing';
						$status_date	="-";	
					} 
					else if($order['order_status'] == 'S')
					{
						$order_status = 'Shipped';
						$status_date	="-";	
					} 
					else if($order['order_status'] == 'D')
					{
						$order_status = 'Delivered';
						$status_date =date("Y-m-d",strtotime($order['status_date']));	
					} else 
					{
						$order_status ='Canceled';
						$status_date	="-";
					}
			if($order['city']=='rest_of_mum_guj' || $order['city']=='rest_of_india'){ $city = $order['city1']; }else{ $city = $order['city']; }		
					
			$orderdate=date("Y-m-d",strtotime($order['cdate']));
		$output .= '"'.$order['order_id'].'","'.$orderdate.'","'.$order['user_name'].'","'.$items['order_item_name'].'","'.$items['colour_name'].'","'.$items['size_name'].'","'.$items['product_item_price'].'","'.$city.'","'.$order['payment_status'].'","'.$order_status.'","'.$status_date.'"';  
		$output .="\n";
		$i++;  }  }
		}
		$filename = "Order-report.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		echo $output;
		exit;
	}
function convert_number_to_words($number)
{
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . $this->convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
	}	

	function addresspickup()
	{
		$data['err_msg'] = '';
		if($this->input->post("action")=="add_pick_up_point")
		{
			$data["contact_persons_name"] 			= $this->input->post("contact_persons_name");
			$data["contact_persons_mobile_number"] 	= $this->input->post("contact_persons_mobile_number");
			$data["address"] 						= $this->input->post("address");
			$data["address2"] 						= $this->input->post("address2");
			$data["city"] 							= $this->input->post("city");
			$data["state"] 							= $this->input->post("state");
			$data["pincode"] 						= $this->input->post("pincode");
			$data["google_map_link"] 				= $this->input->post("google_map_link");

			$this->orders_model->add_pick_up_point($data);

			$this->session->set_flashdata('L_strErrorMessage','Pick Up Address added successfully');
			redirect($this->config->item('base_url').'orders/lists');

		}
		$this->load->view('addresspickup',$data);
	}

	function create_label()
	{
		$id = $this->input->post("itemid");
		$data["order_detail"] = $this->orders_model->get_product($id);
		$data["productdetails"] = $this->orders_model->productattrdetails($data["order_detail"][0]->attribute_id);
		$data["get_address"] = $this->orders_model->get_address();

		$html = $this->load->view('create_label',$data,true);
		echo $html;
	}

	function create_label_new()
	{	
		$id = $this->input->post("itemid");
		$data["order_detail"] = $this->orders_model->get_product($id);

		$data["sub_total"] = $this->input->post("sub_total");
		$data["select_itemid"] = $id;
		
		// foreach($data["order_detail"] as $value){
		// 	$data["productdetails"] = $this->orders_model->productattrdetails($value->attribute_id);
		// }
		// echo "<pre>";
		// print_r($data);
		// die;

		$data["productdetails"] = $this->orders_model->productattrdetails($data["order_detail"][0]->attribute_id);
		
		$data["get_address"] = $this->orders_model->get_address();

		$html = $this->load->view('create_label_new',$data,true);
		echo $html;
	}

	function create_label_add_new()
	{
		$formValues = $this->input->post(NULL, TRUE);
		// new code start 
		$select_itemid 	= explode(",",$formValues['select_itemid']);
		$order_sub_total = $formValues['order_sub_total'];
		$data["select_itemid"] 	= $formValues['select_itemid'];
		$data["weight"]			= $formValues['weight'];
		$data["length"]			= $formValues['length'];
		$data["height"]			= $formValues['height'];
		$data["width"]			= $formValues['width'];
		$data["vendor_id"] 		= $formValues['vendor_id'];
		$data["user_id"] 		= $formValues['user_id'];
		$data["order_id"] 		= $formValues['order_id'];
		$data["pickupaddress"] 	= $formValues['pickupaddress'];

		$order_id = $data["order_id"];
		$vendor_id = $data["vendor_id"];
		$pickupaddress = $data["pickupaddress"];
		$vendor_sel_address = $this->orders_model->vendor_sel_address($pickupaddress);

		// echo "<pre>";
		// print_r($select_itemid);
		// die;
		$cod_amount = 0;
		$total_product_quantity = 0;
		$item_list = [];
		$item_names = '';
		if($this->input->post("action")=="create_label_add_new")
		{
			foreach($select_itemid as $key =>$item_id){

				$data["order_item_id"] 	= $item_id;
				$order_item_id = $data["order_item_id"];
				$orderdetails = $this->orders_model->get_product_order_item($order_item_id);

				$coupondiscount = $orderdetails->coupondiscount;
				$item_total = round($orderdetails->product_item_price * $orderdetails->product_quantity);
				if(!empty($coupondiscount)){
					$amount = ($item_total * $coupondiscount) / $order_sub_total;
					$cod_amount = ($cod_amount + $item_total) - $amount; 
				}else{
					$cod_amount = $cod_amount + $item_total;
				}
				if($orderdetails->paymentmode == 1) {
					$payment_mode = 'cod';
					// $cod_amount += round($orderdetails->product_item_price * $orderdetails->product_quantity);
					// if(!empty($coupondiscount)){
					// 	$cod_amount = ($cod_amount + $item_total) - $amount;
					// }else{
					// 	$cod_amount = $cod_amount + $item_total;
					// }
				}else{
					$payment_mode = 'prepaid';
					// $cod_amount = 0;
				}
				
				if($key != (count($item_id) - 1))
			    {
			        $item_names .=', ';
			    }
				$item_names .= $orderdetails->order_item_name;

				$order_item_name = $orderdetails->order_item_name;
				$full_name = $orderdetails->first_name.' '.$orderdetails->last_name;
				$phone_number = $orderdetails->phone_number;
				$post_code = $orderdetails->post_code;
				$full_address = $orderdetails->address1. ', ' .$orderdetails->address2;
				$total_product_quantity = $total_product_quantity + $orderdetails->product_quantity;
				$invoice_number = $orderdetails->invoice_number.'-'.$item_id;

				$item1_details = array(
			        'price'  => $item_total - round($amount), //Price of single unit inclusive of GST
		            'item_name'    => $order_item_name,
		            'quantity'     => $orderdetails->product_quantity, #Total units of this item
		            'sku' => '',
		            'item_tax_percentage' => 0
			    );
			    $item_list[] = $item1_details;
			}
			if($cod_amount <= 899){
				$delivery_charges = 99;
				$cod_amount = $cod_amount + $delivery_charges;
			}else{
				$delivery_charges = 0;
			}
			$data['client_order_id'] = $invoice_number;
			$params = array(
				'auth_token' => 'be561b7ff406f0624395df5025a5f95c775450',
				'item_name' => $item_names,
				'item_list' => json_encode($item_list),
				'from_name' => $vendor_sel_address->contact_persons_name,
				'from_phone_number' => $vendor_sel_address->contact_persons_mobile_number,
				'from_address' => $vendor_sel_address->address. ', ' .$vendor_sel_address->address2,
				'from_pincode' => $vendor_sel_address->pincode,
				'pickup_gstin' => '',
				'to_name' => $full_name,
				'to_phone_number' => $phone_number,
				'to_pincode' => $post_code,
				'to_address' => $full_address,
				'quantity' => $total_product_quantity,
				'invoice_value' => round($cod_amount),
				'payment_mode' => $payment_mode,
				'cod_amount' => round($cod_amount),
				'client_order_id' => $invoice_number,
				'item_breadth' => $data["width"],
				'item_length' => $data["length"],
				'item_height' => $data["height"],
				'item_weight' => $data["weight"],
				'shipping_charge' => $delivery_charges,
				'is_reverse' => False
			);
			
			$json_params = json_encode( $params );
				$url = 'https://www.pickrr.com/api/place-order/';
				//open connection
				$ch = curl_init();
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $json_params);
				curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				//execute post
				$result = curl_exec($ch);
				$result = json_decode($result, true);

				// echo "<pre>";print_r($result);die;
				//close connection
				curl_close($ch);					

				$data["sorder_id"] 			= $result['order_id'];
				$data["order_pk"] 			= $result['order_pk'];
				$data["tracking_id"] 		= $result['tracking_id'];
				$data["manifest_link"] 		= $result['manifest_link'];
				$data["routing_code"] 		= $result['routing_code'];
				$data["courier"] 			= $result['courier'];
				$data["track_url"] 			= $result['track_url'];

				if( $result['success'] == 1){
					$this->orders_model->create_label_add_new($data);
					
				}else{
					$this->session->set_flashdata('flashError',$result['err']);
					redirect($this->config->item('base_url').'orders/detail/'.$order_id);
					exit();
				}
		}

		$this->session->set_flashdata('L_strErrorMessage','Shipment created successfully.');
		redirect($this->config->item('base_url').'orders/detail/'.$data["order_id"]);
		
		// echo "<pre>";
		// print_r($params);
		// die;

		

		// old code start


		// if($this->input->post("action")=="create_label_add_new")
		// {
		//     $data["pickupaddress"] 			= $this->input->post("pickupaddress");
		// 	$data["weight"] 				= $this->input->post("weight");
		// 	$data["length"] 				= $this->input->post("length");
		// 	$data["height"] 				= $this->input->post("height");
		// 	$data["width"] 					= $this->input->post("width");
		// 	$data["order_item_id"] 			= $this->input->post("order_item_id");
		// 	$data["vendor_id"] 				= $this->input->post("vendor_id");
		// 	$data["user_id"] 				= $this->input->post("user_id");
		// 	$data["order_id"] 				= $this->input->post("order_id");
			
		// 	$order_id = $data["order_id"];
  //       	$order_item_id = $data["order_item_id"];
  //       	$vendor_id = $data["vendor_id"];
  //       	$pickupaddress = $data["pickupaddress"];
  //       	$orderdetails = $this->orders_model->get_product_order_item($order_item_id);
  //       	$vendor_sel_address = $this->orders_model->vendor_sel_address($pickupaddress);

		// 	// echo "<pre>";
		// 	// print_r($orderdetails);
		// 	// die;

		// 	if($orderdetails->paymentmode == 1) {
		// 		$payment_mode = 'cod';
		// 		$cod_amount = round($orderdetails->product_item_price * $orderdetails->product_quantity);
		// 	}else{
		// 		$payment_mode = 'prepaid';
		// 		$cod_amount = 0;
		// 	}
			
			
		// 	$params = array(
		// 		'auth_token' => 'be561b7ff406f0624395df5025a5f95c775450',
		// 		'item_name' => $orderdetails->order_item_name,
		// 		'from_name' => $vendor_sel_address->contact_persons_name,
		// 		'from_phone_number' => $vendor_sel_address->contact_persons_mobile_number,
		// 		'from_address' => $vendor_sel_address->address. ', ' .$vendor_sel_address->address2,
		// 		'from_pincode' => $vendor_sel_address->pincode,
		// 		'pickup_gstin' => '',
		// 		'to_name' => $orderdetails->first_name.' '.$orderdetails->last_name,
		// 		'to_phone_number' => $orderdetails->phone_number,
		// 		'to_pincode' => $orderdetails->post_code,
		// 		'to_address' => $orderdetails->address1. ', ' .$orderdetails->address2,
		// 		'quantity' => $orderdetails->product_quantity,
		// 		'invoice_value' => round($orderdetails->product_item_price * $orderdetails->product_quantity),
		// 		'payment_mode' => $payment_mode,
		// 		'cod_amount' => $cod_amount,
		// 		'client_order_id' => $orderdetails->invoice_number,
		// 		'item_breadth' => $data["width"],
		// 		'item_length' => $data["length"],
		// 		'item_height' => $data["height"],
		// 		'item_weight' => $data["weight"],
		// 		'is_reverse' => False
		// 	);


		// 	//echo "<pre>";print_r($params);echo "<pre>";exit;


		// 	$json_params = json_encode( $params );
		// 		$url = 'https://www.pickrr.com/api/place-order/';
		// 		//open connection
		// 		$ch = curl_init();
		// 		//set the url, number of POST vars, POST data
		// 		curl_setopt($ch,CURLOPT_URL, $url);
		// 		curl_setopt($ch,CURLOPT_POSTFIELDS, $json_params);
		// 		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		// 		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		// 		//execute post
		// 		$result = curl_exec($ch);
		// 		$result = json_decode($result, true);

		// 		//echo "<pre>";print_r($result);echo "<pre>";
		// 		//close connection
		// 		curl_close($ch);
				

		// 	$data["sorder_id"] 			= $result['order_id'];
		// 	$data["order_pk"] 			= $result['order_pk'];
		// 	$data["tracking_id"] 		= $result['tracking_id'];
		// 	$data["manifest_link"] 		= $result['manifest_link'];
		// 	$data["routing_code"] 		= $result['routing_code'];
		// 	$data["courier"] 			= $result['courier'];
		// 	$data["track_url"] 			= $result['track_url'];

			
		// 	if( $result['success'] == 1){
		// 		$this->orders_model->create_label_add_new($data);
				
		// 	}else{
		// 		$this->session->set_flashdata('flashError',$result['err']);
		// 		redirect($this->config->item('base_url').'orders/detail/'.$order_id);
		// 		exit();
		// 	}

		// 	$productdetails = $this->orders_model->get_product_order_item($data["order_item_id"]);

		// 	$to = $productdetails->email;
		// 	$message = '<!doctype html><html lang="en"><head>
  //           	<title>Product Packed</title>
  //           	<style>
  //           		@import url("https://fonts.googleapis.com/css?family=Lato");
  //           	</style> </head><body style="text-align: center;margin: 0;background: #ececec; font-family: "Lato", sans-serif;font-weight: 100;">
  //           	<div style="max-width:630px;margin: 0 auto;border: thin solid #f3f0f0;background: #fff; border:1px solid #ccc">
  //           		<div style="float: left; width: 100%; border-bottom:1px solid #ccc; text-align:center">
  //           		<a href="'.$this->config->item('base_url').'"><img src="'.$this->config->item('base_url_views').'images/logo2-hori.png" style="margin-top:20px;max-width:200px;"></a>
  //           		</div>
  //           		<div style="float: left; width: 92%;padding: 10px 4%;text-align: left;">
  //            			<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;margin: 0;">Hi '.$productdetails->fname.' '.$productdetails->lname.',</p>
  //           			<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;margin: 0;">Vendor has packed the product '.$productdetails->order_item_name.'.</p>
  //           		</div>
  //            		<div style="clear: both">
  //           	</div></div>
  //           </body>
  //           </html>';
		// 	$subject = "Order Status - Product has been Packed.";
		// 	$headers  = 'MIME-Version: 1.0' . "\r\n";
		// 	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// 	$headers .= 'From: Not So Pink <info@notsopink.in>' . "\r\n" .
		// 		'Reply-To: info@notsopink.in' . "\r\n" .
		// 		'X-Mailer: PHP/' . phpversion();

		// 	//mail($to, $subject, $message, $headers);
			
		// 	$this->session->set_flashdata('L_strErrorMessage','Shipment created successfully.');
		// 	redirect($this->config->item('base_url').'orders/detail/'.$data["order_id"]);
		// }
	}

	function create_label_add()
	{
		if($this->input->post("action")=="create_label_add")
		{
		    $data["pickupaddress"] 			= $this->input->post("pickupaddress");
			$data["weight"] 				= $this->input->post("weight");
			$data["length"] 				= $this->input->post("length");
			$data["height"] 				= $this->input->post("height");
			$data["width"] 					= $this->input->post("width");
			$data["order_item_id"] 			= $this->input->post("order_item_id");
			$data["vendor_id"] 				= $this->input->post("vendor_id");
			$data["user_id"] 				= $this->input->post("user_id");
			$data["order_id"] 				= $this->input->post("order_id");
			
			$this->request($data);
			$this->orders_model->create_label_add($data);
			
			$productdetails = $this->orders_model->get_product_order_item($data["order_item_id"]);

			$to = $productdetails->email;
			$message = '<!doctype html><html lang="en"><head>
            	<title>Product Packed</title>
            	<style>
            		@import url("https://fonts.googleapis.com/css?family=Lato");
            	</style> </head><body style="text-align: center;margin: 0;background: #ececec; font-family: "Lato", sans-serif;font-weight: 100;">
            	<div style="max-width:630px;margin: 0 auto;border: thin solid #f3f0f0;background: #fff; border:1px solid #ccc">
            		<div style="float: left; width: 100%; border-bottom:1px solid #ccc; text-align:center">
            		<a href="'.$this->config->item('base_url').'"><img src="'.$this->config->item('base_url_views').'images/logo2-hori.png" style="margin-top:20px;max-width:200px;"></a>
            		</div>
            		<div style="float: left; width: 92%;padding: 10px 4%;text-align: left;">
             			<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;margin: 0;">Hi '.$productdetails->fname.' '.$productdetails->lname.',</p>
            			<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;margin: 0;">Vendor has packed the product '.$productdetails->order_item_name.'.</p>
            		</div>
             		<div style="clear: both">
            	</div></div>
            </body>
            </html>';
			$subject = "Order Status - Product has been Packed.";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Not So Pink <info@notsopink.in>' . "\r\n" .
				'Reply-To: info@notsopink.in' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			//mail($to, $subject, $message, $headers);
			
			$this->session->set_flashdata('L_strErrorMessage','Product has been Packed Succefully');
			redirect($this->config->item('base_url').'orders/detail/'.$data["order_id"]);
		}
	}

	public function request($data)
    {
		$order_id = $data["order_id"];
        $order_item_id = $data["order_item_id"];
        $vendor_id = $data["vendor_id"];
        $pickupaddress = $data["pickupaddress"];
        $orderdetails = $this->orders_model->get_product_order_item($order_item_id);
        $vendor_sel_address = $this->orders_model->vendor_sel_address($pickupaddress);
        
        $postfields                     = array();
        $postfields['pickup_pincode']   = $vendor_sel_address->pincode;
        $postfields['delivery_pincode'] = $orderdetails->post_code;
        $postfields['quantity']         = '1';
        $temp                           = array();
        $temp['length']                 = $data["length"];
        $temp['height']                 = $data["height"];
        $temp['width']                  = $data["width"];
        $temp['weight']                 = $data["weight"]*1000;
        $temp['value']                  = number_format($orderdetails->product_item_price,'2','.','');
        $postfields['packages'][]       = $temp;
        $postfields['is_cod_booking']   = false;
        $postfields['is_commercial']    = true;
        $postfields['is_document']      = false;
		 
        $this->load->library('shipping');
        $result = $this->shipping->request($postfields);
        $resultarray = json_decode($result);

		$servicearray = $resultarray->services;
		$totalcountservice = $resultarray->total_count;
		
		if($totalcountservice == 0){
			$this->session->set_flashdata('flashError','No Services Available for the provided requirements.');
			redirect($this->config->item('base_url').'orders/detail/'.$order_id);
			exit();
		}
		
        $productid = $servicearray[0]->product_id;
        $this->booking($productid,$orderdetails,$vendor_sel_address); 
    }

	public function booking($productid,$orderdetails,$vendor_sel_address)
    {
        $postfields                      = array();
        $temp                            = array();
        $temp['name']                    = $vendor_sel_address->contact_persons_name;
        $temp['phone']                   = $vendor_sel_address->contact_persons_mobile_number;
        $temp['email']                   = 'shipping@notsopink.in';
        $temp['address']['company_name'] = 'sender';
        $temp['address']['street1']      = substr($vendor_sel_address->address, 0, 49);
        $temp['address']['street2']      = substr($vendor_sel_address->address2, 0, 49);
        $temp['address']['city']         = $vendor_sel_address->city;
        $temp['address']['state']        = $vendor_sel_address->state_name;
        $temp['address']['country']      = 'India';
        $temp['address']['postal_code']  = $vendor_sel_address->pincode;
        $postfields['shipper']           = $temp;

        $temp                            = array();
        $temp['name']                    = $orderdetails->first_name." ".$orderdetails->last_name;
        $temp['phone']                   = $orderdetails->phone_number;
        $temp['email']                   = $orderdetails->email;
        $temp['address']['company_name'] = 'receiver';
        $temp['address']['street1']      = $orderdetails->address1;
        $temp['address']['street2']      = $orderdetails->address2;
        $temp['address']['city']         = $orderdetails->city;
        $temp['address']['state']        = $orderdetails->state;
        $temp['address']['country']      = $orderdetails->country;
        $temp['address']['postal_code']  = $orderdetails->post_code;
        $postfields['receiver']          = $temp;

        $postfields['customer_reference']       = $orderdetails->id;
        $postfields['invoice_number']           = $orderdetails->order_item_id;
        $postfields['invoice_amount']           = $orderdetails->product_item_price;
        $postfields['product_id']               = $productid;
        $postfields['is_multi_packet_shipment'] = false;
        $postfields['parcel_contents']          = $orderdetails->order_item_name;
        $postfields['is_test_booking']          = false;
        $postfields['send_confirmation_mail']   = false;
        $postfields['alert_receiver']           = false;
        $postfields['generate_label']           = true;
        
         
        $this->load->library('shipping');
        $result = $this->shipping->booking($postfields);
        $bookingarray = json_decode($result);

		if($bookingarray->status == 402){
			$this->session->set_flashdata('flashError','Insufficient credits in your wallet. Kindly re-charge to add credits & continue booking.');
			redirect($this->config->item('base_url').'orders/lists');
			exit();
		}
        
        $c['liveecouriercharge'] = $bookingarray->booking[0]->booking_amount->total_charges;
        $c['bookingid'] = $bookingarray->booking_id;
        $label_info = $bookingarray->label_info->label;
        $c['pdf'] = $label_info->pdf_link;
        $c['productid'] = $productid;
        $c['order_item_id'] = $orderdetails->order_item_id;
        $this->orders_model->updateshipdetails($c);
    }

	function cancelbooking(){
		$bookingid = "";
		$this->load->library('shipping');
        $result = $this->shipping->cancelBooking($bookingid);
        $bookingarray = json_decode($result);
	}

	function ready_to_dispatch()
	{
		$id = $this->input->post("ready_itemid");
		$data["order_detail"] = $this->orders_model->get_product($id);
		$html = $this->load->view('ready_to_dispatch',$data,true);
		echo $html;
	}

	function track_package()
	{
		$id = $this->input->post("itemid");
		$data1["order_detail"] = $this->orders_model->getorderitem($id);
		
		//$data['schedulepickuparray'] = array();
		if($data1["order_detail"]->tracking_id != '') {
			$url = 'https://async.pickrr.com/track/tracking/';
				$data = array (
					'tracking_id' => $data1["order_detail"]->tracking_id,
					'auth_token' => 'be561b7ff406f0624395df5025a5f95c775450'
					);

					$params = '';
				foreach($data as $key=>$value)
							$params .= $key.'='.$value.'&';

					$params = trim($params, '&');

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
				curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
				curl_setopt($ch, CURLOPT_HEADER, 0);
				$result = curl_exec($ch);
				curl_close($ch);
				$data1['dataArray'] = $json = json_decode($result, true);

				// for( $i = 0; $i<count(($json['track_arr'])); $i++ ){
				// 	print_r ($json['track_arr'][$i]['status_array'][0]['status_time']); echo "\n";
				// 	print_r ($json['track_arr'][$i]['status_array'][0]['status_body']); echo "\n";
				// 	print_r ($json['track_arr'][$i]['status_array'][0]['status_location']); echo "\n";
				// 	echo "\n";
				// }

		}

		//echo "<pre>";print_r($data1["order_detail"]);echo "</pre>";die;

 		$html = $this->load->view('track_package',$data1,true);
		echo $html;
	}

	function ready_to_dispatch_add()
	{
	    if($this->input->post("action")=="ready_to_dispatch_add")
		{	
			$data["start_date"] 			= $this->input->post("start_date");
 			$data["order_item_id"] 			= $this->input->post("order_item_id");
			$data["vendor_id"] 				= $this->input->post("vendor_id");
			$data["user_id"] 				= $this->input->post("user_id");
			$data["order_id"] 				= $this->input->post("order_id");
			$data["api_booking_id"] 	    = $this->input->post("api_booking_id");
			
			$this->load->library('shipping');
			$postfields['order_ids'] = $data["api_booking_id"];
			$postfields['pickup_date'] = date('Y-m-d',strtotime($data["start_date"]));
			$result = $this->shipping->schedulepickup($postfields);
			$schedulepickuparray = json_decode($result);
			 
			$data["customer_reference"] 	    = $schedulepickuparray->pickup_references[0]->customer_reference;

			$this->orders_model->ready_to_dispatch_add($data);
			
			$productdetails = $this->orders_model->get_product_order_item($data["order_item_id"]);
				
			 

			$to = $productdetails->email;
			$message = '<!doctype html><html lang="en"><head>
            	<title>Product Dispatched</title>
            	<style>
            		@import url("https://fonts.googleapis.com/css?family=Lato");
            	</style> </head><body style="text-align: center;margin: 0;background: #ececec; font-family: "Lato", sans-serif;font-weight: 100;">
            	<div style="max-width:630px;margin: 0 auto;border: thin solid #f3f0f0;background: #fff; border:1px solid #ccc">
            		<div style="float: left; width: 100%; border-bottom:1px solid #ccc; text-align:center">
            		<a href="'.$this->config->item('base_url').'"><img src="'.$this->config->item('base_url_views').'images/logo2-hori.png" style="margin-top:20px;max-width:200px;"></a>
            		</div>
            		<div style="float: left; width: 92%;padding: 10px 4%;text-align: left;">
             			<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;margin: 0;">Hi '.$productdetails->fname.' '.$productdetails->lname.',</p>
            			<p>Your order is dispatched.</p>
            			<p>Yipppieee !</p>
            			<p>Your order is on its way to You. Follow the Happy Shipping Trail by clicking on the link below.</p>
						<p><a href="'.$this->config->item('http_host').'home/trackpackage/'.$productdetails->api_booking_id.'" style="background: #000;color: #f3eded;padding: 5px 20px;text-decoration: none;font-size: 15px;display: inline-block;">TRACK ORDER</a></p>';
					
						$sellercontent = '<p><table style="border-collapse: collapse;width: 100%;"><tr style="border-bottom: 1px solid #CCCECF;">
					<td style="width: 85px;padding-bottom: 10px;vertical-align: top;">
						<img src="'.$this->config->item('http_host').'/upload/products/medium/'.$productdetails->base_image.'" style="max-width:100%;height:97px;" />
					</td>
					<td style="text-align: left;vertical-align: top;padding-left: 15px;padding-bottom: 10px;">
						<p style="margin: 0;"><strong>'.$productdetails->order_item_name.'</strong></p>
						<p style="margin: 0;">
							<span style="color:gray;">Variant:</span> '.$productdetails->size_name;
							
							if($productdetails->colour_name != ''){
								$sellercontent .= ' | <span style="color:gray;">Color:</span> '.$productdetails->colour_name;
							}

						$sellercontent .= '</p>
						<p style="margin: 0;">
							<span style="color:gray;">Quantity:</span> '.$productdetails->product_quantity.'
						</p><br>
						<p style="margin: 0;"><strong></strong></p>
					</td>';
					
					
					if($productdetails->product_item_price != $productdetails->real_price){
						$sellercontent .= '<td style="vertical-align: top;width: 150px;text-align: right;padding-bottom: 10px;">Rs. '.round($productdetails->product_item_price * $productdetails->product_quantity).' &nbsp; <del style="color:gray;">Rs.: '.round($productdetails->real_price * $productdetails->product_quantity).'</del></td>';
					} else {
						$sellercontent .= '<td style="vertical-align: top;width: 150px;text-align: right;padding-bottom: 10px;">Rs. '.round($productdetails->product_item_price * $productdetails->product_quantity).'</td>';
					}

					$sellercontent .= '</tr></table></p>';
					$message .= $sellercontent;
            		$message .= '</div>
             		<div style="float: left; width: 92%;padding: 10px 4%;text-align: left;">
						<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;margin: 0;">With Miles of Smiles,<BR>
			Team Not So Pink</p><br>
						<p style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;     margin: 0;">Need Help?<br>
						<a href="'.$this->config->item('base_url').'contact-us" style="font-size: 16px;line-height: 30px;color: #58595B;font-family: "Lato", sans-serif;font-weight: 100;     margin: 0;">Contact Us for Help & Support</a></p>
					</div>
            		<div style="clear: both">
            	</div></div>
            </body>
            </html>';
			
			//echo $message; echo $productdetails->phone_number; die;

			$subject = "Order Status - Product has been Dispatched";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Not So Pink <info@notsopink.in>' . "\r\n" .
				'Reply-To: info@notsopink.in' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			//mail($to, $subject, $message, $headers);
			
			$mobilenumber = $productdetails->phone_number;
			if($mobilenumber != ''){
				$msg = "HAPPY SOUL: Your Wellness Parcel is on the way to deliver  Happiness at your door steps! Need more happiness??? Its available at www.happysoul.in";
				$message = urlencode($msg);	
				// $this->sms($mobilenumber,$message);
			}

			$this->session->set_flashdata('success','Product Pickup Request has been Set Successfully');
			redirect($this->config->item('base_url').'orders/detail/'.$data["order_id"]);
		}
	}

	function cancel_booking(){
		
		$order_id1 = $this->input->post("order_id1");
		$order_item_id1 = $this->input->post("order_item_id1");
		$bookingid = $this->input->post("api_booking_id1");

		$this->load->library('shipping');
        $result = $this->shipping->cancelBooking($bookingid);

        $bookingarray = json_decode($result);
		//echo "<pre>";print_r($bookingarray);echo "</pre>";
		if($bookingarray->orders != '' && count($bookingarray->orders) > 0){
			foreach($bookingarray->orders as $bookingCancel){
				$co['booking_status'] = $bookingCancel->order_status;
				$co['order_item_id'] = $order_item_id1;
				$this->orders_model->updateShipOrderStatus($co);
			}
			$this->session->set_flashdata('L_strErrorMessage','Booking has been Cancelled Succefully');
		}
		else{
			$this->session->set_flashdata('flashError','No Services Available please try again.');
		}
		
		redirect($this->config->item('base_url').'orders/detail/'.$order_id1);
	}

	function cancel_booking_new(){
		
		$order_id1 = $this->input->post("order_id1");
		$order_item_id1 = $this->input->post("order_item_id1");
		$bookingid = $this->input->post("tracking_id1");

		$params = array(
			'auth_token' => 'be561b7ff406f0624395df5025a5f95c775450',
			'tracking_id' => $bookingid
		);


		$json_params = json_encode( $params );
            $url = 'https://pickrr.com/api/order-cancellation/';
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $json_params);
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            //execute post
            $result = curl_exec($ch);
            $result = json_decode($result, true);

			//echo "<pre>";print_r($result);echo "</pre>";
            //close connection
            curl_close($ch);

       if($result['err'] == null){
			$co['booking_status'] = 'Cancelled';
			$co['order_item_id'] = $order_item_id1;
			$co['tracking_id'] = $bookingid;
			$this->orders_model->updateShipOrderStatus($co);
			$this->session->set_flashdata('L_strErrorMessage','Booking has been Cancelled Succefully');
	   }
		else{
			$this->session->set_flashdata('flashError','No Services Available please try again.');
		}
		
		redirect($this->config->item('base_url').'orders/detail/'.$order_id1);
	}

	function mailsent($to,$subject,$message,$addcc,$AddAttachment)
	{
	
	
		error_reporting(E_STRICT);
		

			$mail = new PHPMailer(true);
			
			try {
			//Server settings
			//$mail->SMTPDebug = 2;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'us1-mta1.sendclean.net';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'smtp83304630';                     // SMTP username
			$mail->Password   = 'zbeIFLT7uu';                               // SMTP password
			$mail->SMTPSecure = "tls";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('info@notsopink.in', 'Notsopink');
			$mail->addAddress($to, "");     // Add a recipient
			if($addcc !='' && count($addcc)>0)
			{
				foreach($addcc as $key=>$value)
				{	
					$mail->addCC($value);	
				}
			}
			if($AddAttachment !='' && count($AddAttachment)>0)
			{
				foreach($AddAttachment as $key=>$value)
				{	
					if($value !='')
					{
						$mail->addAttachment($value);
					}
				}
			}
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;

			$mail->send();
			//echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

    function updateuti($id,$value,$order_id,$user_id)
    {   

        $result=$this->orders_model->updateuti($id,$value);

        $orderNumber = $this->orders_model->getOrderNumber($order_id);

        if($value == 1){
             $userdata = $this->orders_model->userdata($user_id);
            
            $msg = "Hey $userdata->fname, your Not So Pink order: $orderNumber has been returned successfully. 
Our team will keep you updated with the next steps. View order details: https://www.notsopink.in/my-purchase Thank you for shopping with Soch Retail Private Limited";

            $message = urlencode($msg);

            $curl = curl_init();
                curl_setopt_array($curl, array(CURLOPT_URL =>"http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=FvNm7Az&type=0&dlr=1&destination=$userdata->mobile&source=NSPORD&message=$message&entityid=1601980161097394647&tempid=1607100000000115831",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
        }



        $this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');

        redirect($this->config->item('base_url').'orders/detail/'.$order_id);
        //$this->load->view('users/list_user', $data);
    }



    function updateuti_exchange($id,$value,$order_id,$user_id)
    {   

        $result=$this->orders_model->updateuti_exchange($id,$value);

        $orderNumber = $this->orders_model->getOrderNumber($order_id);

        if($value == 1){
             $userdata = $this->orders_model->userdata($user_id);
            
//             $msg = "Hey $userdata->fname, your Not So Pink order: $orderNumber has been returned successfully. 
// Our team will keep you updated with the next steps. View order details: https://www.notsopink.in/my-purchase Thank you for shopping with Soch Retail Private Limited";

        $msg = "Hey $userdata->fname, your Not So Pink order: $orderNumber has been exchanged successfully. Our team will keep you updated with the next steps.
View order details: https://www.notsopink.in/my-purchase Thank you for shopping with Soch Retail Private Limited";

            $message = urlencode($msg);

            $curl = curl_init();
                curl_setopt_array($curl, array(CURLOPT_URL =>"http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=FvNm7Az&type=0&dlr=1&destination=$userdata->mobile&source=NSPORD&message=$message&entityid=1601980161097394647&tempid=1607100000000115829",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
        }



        $this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');

        redirect($this->config->item('base_url').'orders/detail/'.$order_id);
        //$this->load->view('users/list_user', $data);
    }
}