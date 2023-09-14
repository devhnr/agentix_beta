<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!DOCTYPE html>
<html>
<head>
<title>Acros</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
	<div  style="max-width:620px;margin: 0 auto;padding-top:20px;border: thin solid #f3f0f0;">
		<header style="text-align:center;">
			<!--<a href="<?php echo $front_base_url ;?>index.php"><img style="max-width:100%;display: block;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/cart_top.png"></a>-->
		</header>
		<div style="background:#ababab;padding: 5% 3% 5%;text-align:center">
			<p style="font-size: 17px;letter-spacing: 0.2px;text-align:center;line-height: 30px;color:#fff;margin:0;">
				This is in reference to your order no. <strong><?php echo $order["order_id"]; ?></strong> that you had
				placed on <strong><?php echo date("d-m-Y",strtotime($order["cdate"])); ?></strong>, while shopping on <strong><a href="<?php echo $front_base_url ;?>index.php" style="color: #ffffff; text-decoration:none;">www.acros.in</a></strong><br>
			</p>
			<h3 style="color:#fff">Your order has been successfully canceled!</h3>
			<p style="font-size: 17px;letter-spacing: 0.5px;text-align:center;line-height: 30px;color:#fff;margin:0;">We would like to inform you that we will be refunding
			the amount in your account,
			which be reflect in your bank account/credit card
			in next 8-10 working days. We'd love to see you soon.</p>			
		</div>
		
		<div style="margin-top: 18px;">
			
<!--			<a href="#"><img style="max-width:100%;width:32%;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/homes2_1.png"></a>
			<a href="#"><img style="max-width:100%;width:32%;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/homes2_2.png"></a>
			<a href="#"><img style="max-width:100%;width:32%;" src="<?php echo $front_base_url; ?>site/views/emailer/mailimages/homes2_3.png"></a>-->
			</div>
		
	</div>

</body>
</html>
