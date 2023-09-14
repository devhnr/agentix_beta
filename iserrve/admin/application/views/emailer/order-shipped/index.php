<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!doctype html>
<html lang="en">
	<body style="margin: 0;font-family: Arial, Helvetica, sans-serif;">
	
	
		<div style="max-width:630px;margin: 0 auto;border: thin solid #f3f0f0;">
			<header style="text-align:center;">
				<!--<a href="<?php echo $front_base_url ;?>index.php"><img style="max-width:100%;display: block;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/cart_top.png"></a>-->
			</header>
			<div style="background:#ababab;padding: 7% 8% 6%;">
				<p style="font-size: 17px;letter-spacing: 0.5px;text-align:center;line-height: 30px;color:#fff;margin:0;">
					Hi, Your order number <strong><?php echo $order["order_id"]; ?></strong> has been<br>
					shipped. It is expected to be delivered between
					<strong>3-5 business days</strong>
				</p>
			</div>
			
			
			<div style="background:#EDEDED;padding: 20px 7%;font-size: 14px;text-align: left;">
				<div style="width:55%;background:#EDEDED;text-align: left;display: inline-block;margin-bottom: 10px;">
					<p style="margin:0">
						<strong>Order Details</strong><br>
						Order No.: <?php echo $order["order_id"]; ?><br><br>
						Payment Mode: <?php if($order["paymentmode"] ==1){ echo "COD";}else{ echo "ONLINE PAYMENT";} ?><br>
						Expected delivery Date: <?php echo date("D, d",strtotime($order["cdate"])).' - '.date("d M Y",strtotime('+7 day',strtotime($order["cdate"])));?>
					</p>
				</div>
				<div style="width:44%;background:#EDEDED;text-align: left;display: inline-block;margin-bottom: 10px;">
					<p style="padding-left:7%;margin:0">
					<strong>Delivery Details</strong><br>
					<?php echo $order["user_name"].'<br>'.$order["address1"].' ,'.$order["city"].','.$order["state"].','.$order["country"].'- '.$order["post_code"]; ?>
					</p>
				</div>
				<p style="text-align: left;margin-bottom: 0;">
					<a href="#" style="background: #000;color: #f3eded;padding: 5px 20px;text-decoration: none;font-size: 15px;display: inline-block;">TRACK ORDER</a>
				</p>
			</div>
			
			<div style="padding: 0px 30px;">
				<p style="text-align: left;text-align: left;border-bottom: 2px solid #727171;padding-bottom: 4px;"><strong>Item(s) in Your Order</strong></p>
				<table style="border-collapse: collapse;width: 100%;">
				<?php	$pvalue = 0; foreach($order['items'] as $items){
							$pvalue=($pvalue+(($items['product_item_price'])*$items['product_quantity'])); ?>
					<tr style="border-bottom: 2px solid #CCCECF;">
						<td style="width: 85px;padding-bottom: 10px;vertical-align: top;">
						
						<?php
					$img= $this->orders_model->product_image($items['product_id']);
					 if($img !=''){ ?>
					 <img src="<?php echo $front_base_url; ?>upload/products/<?php echo $img; ?>" style="width:85px;height:97px;border: 2px solid gray;">
					<?php } else { ?>
					<img src="<?php echo $base_url_views; ?>images/noimage.jpg" style="width:85px;height:97px;border: 2px solid gray;" >
					<?php }  ?>
						
						</td>
						<td style="text-align: left;vertical-align: top;padding-left: 15px;padding-bottom: 10px;">
							<p style="margin: 0;"><strong><?php echo $items['order_item_name']; ?></strong></p>
							<p style="margin: 0;"><span style="color:gray;">Size:</span> <?php echo $items['size_name']; ?> | <span style="color:gray;">Quantity:</span> <?php echo $items['product_quantity']; ?></p><br>
							<p style="margin: 0;"><strong>Will be delivery by <?php echo date("l, d M, Y",strtotime('+7 day',strtotime($order["cdate"]))); ?> </strong></p>
						</td>
						<td style="vertical-align: top;width: 150px;text-align: right;padding-bottom: 10px;">Rs.: <?php echo number_format(($items['product_item_price'] * $items['product_quantity']),2) ?> &nbsp; <!--<del style="color:gray;">Rs.: 1599</del>--></td>
					</tr>
					<?php } ?>
					
					
					<tr style="border-bottom: 2px solid #CCCECF;color: #808080;">
						<td style="text-align:left;" colspan="2">Price</td>
						<td style="text-align:right;">Rs.: <?php echo number_format($pvalue,2); ?></td>
					</tr>
					<?php if($order['coupondiscount'] !='' && $order['coupondiscount'] != '0'){ ?>
					<tr style="border-bottom: 2px solid #CCCECF;color: #808080;">
						<td style="text-align:left;" colspan="2">Voucher Discount</td>
						<td style="text-align:right;">-Rs.: 50</td>
					</tr>
					<?php } ?>
					<!--<tr style="color: #808080;">
						<td style="text-align:left;" colspan="2">Shipping</td>
						<td style="text-align:right;">+Rs.: 50</td>
					</tr>-->
					<tr style="border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: bold;">
						<td style="text-align:left;" colspan="2">Total</td>
						<td style="text-align:right;">Rs.: <?php echo number_format($order['order_total']); ?></td>
					</tr>
				</table>
			</div>
			
			<div style="margin-top: 18px;">
			
<!--			<a href="#"><img style="max-width:100%;width:32%;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/homes2_1.png"></a>
			<a href="#"><img style="max-width:100%;width:32%;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/homes2_2.png"></a>
			<a href="#"><img style="max-width:100%;width:32%;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/homes2_3.png"></a>-->
			</div>
			
		</div>
	</body>
</html>