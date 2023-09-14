<?php include('include/header.php');?>
<style>
.invoice-title h2,
.invoice-title h3 {
    display: inline-block;
}

.table>tbody>tr>.no-line {
    border-top: none;
}

.table>thead>tr>.no-line {
    border-bottom: none;
}

.table>tbody>tr>.thick-line {
    border-top: 2px solid;
}

.table>thead>tr>.thick-line-bottom {
    border-bottom: 2px solid;
}


}
</style>

<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>orders/lists">Get Quote Management</a></li>
                    <li class="crumb-active"><a href="#">Get Quote Details</a></li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>
                </div>
                <?php }?>
                <?php if($this->session->flashdata('flashError')!='') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-warning"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Error!</b> <?php echo $this->session->flashdata('flashError',5); ?>
                </div>
                <?php }  ?>
                <!-- <div class="col-md-12">
            <button class="btn btn-success pull-right"  style="margin-left:10px" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalHorizontal"><i class="fa fa-plus-circle"></i> Add Tracking Information</button>
            </div>-->
                <!--	<div class="col-md-12">
            <a href="javascript:void(0);" onclick="printDiv('printArea');" class="btn btn-alert pull-right"><i class="fa fa-plus"></i> Print Invoice</a>
            <a href="javascript:void(0);" onclick="printDiv('printslip');" class="btn btn-alert pull-right" style="margin-right:10px;"><i class="fa fa-plus"></i> Print Packing Slip</a>
            </div> -->
                <div class="clearfix">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="invoice-title">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <!-- <form
                                                        action="<?php echo $base_url."orders/changeStatusmail/".$order['order_id'];?>"
                                                        method="post" enctype="multipart/form-data" id="statusupdate">
                                                        <label>Order Status</label>
                                                        
                                                        <label>Tracking Detail</label>

                                                        <textarea name="tracking" placeholder="Enter Tracking Detail"
                                                            class="form-control"><?php echo $order['trackadd']; ?></textarea>

                                                        <button class="btn btn-alert" class="btn btn-primary btn-lg"
                                                            style="margin-top:05px"
                                                            onclick="javascript:statust(); return false;">Update</button>
                                                    </form> -->
                                                </div>
                                                <div class="col-xs-9">
                                                    <h3 class="pull-right">Get Quote # <?php echo $order['order_id']?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                        function statust() {
                                            var conf = confirm("Are you sure want to change Status ?");
                                            if (conf == true) {
                                                $("#statusupdate").submit();
                                                /*var base_url = '<?php echo $base_url.'orders/changeStatusmail'; ?>';
                                                window.location = base_url+"/"+order_id+"/"+status;*/
                                                return true;
                                            } else {
                                                return false;
                                            }
                                        }
                                        </script>
                                        <hr style="margin: 0 0 18px 0;">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <address >
                                                    <strong>Company Name : </strong><?php echo $order['companyname']; ?><br>
                                                    <strong>Email : </strong><?php echo $order['email']; ?><br>
                                                    <strong>Industry Type : </strong><?php echo $industry = $this->orders_model->get_industry_name($order['industry_id']); ?><br>
                                                    <strong>Sub Industry Type : </strong><?php echo $sub_industry = $this->orders_model->get_sub_industry_name($order['sub_industry_id']);; ?><br>
                                                    <strong>Annual Turnover : </strong><?php echo $order['annual_turnover']; ?><br>
                                                    <strong>Asset Value : </strong><?php echo $order['asses_value']; ?><br>
                                                    <strong>Number of Employee : </strong><?php echo $order['no_of_emp']; ?><br>
                                                    
                                                </address>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <address>
                                                    <strong>Get Quote Date:</strong><br>
                                                    <?php $order_date = strtotime( $order['cdate'] );
                                       echo $mysqldate = date( 'l, F d, Y', $order_date );?><br><br>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!--div class="col-xs-6">
                                 <address>
                                     <strong>Payment Method:</strong><br>
                                     <br>
                                 </address>
                                 </div>
                                 <div class="col-xs-6 text-right">
                                 <address>
                                     <strong>Order Date:</strong><br>
                                   <?php $order_date = strtotime( $order['created_on'] ); echo $mysqldate = date( 'l, F d, Y', $order_date );?><br><br>
                                 </address>
                                 </div-->
                                        </div>
                                    </div>
                                </div>
                                <?php //echo "<pre>"; print_r($order); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><strong>Customer Detail</strong></h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <td><strong>Name</strong></td>
                                                                <td class="text-center"><strong>Mobile</strong></td>
                                                                <td class="text-center"><strong>Email Id</strong></td>
                                                                <!--<td class="text-center"><strong>Address</strong></td>
                                                <td class="text-center"><strong>City</strong></td>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $order['name_inquiry'];?></td>
                                                                <td class="text-center">
                                                                    <?php echo $order['mobile_inquiry'];?></td>
                                                                <td class="text-center">
                                                                    <?php echo $order['email_inquiry'];?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="success-message"
                                            style="text-align:center; background-color:#055b57; color: white; font-size:18px; display:none;">
                                            Status Updated
                                            Successfully!</div>
                                        <?php $canceldisplay=false; if(count($order['items']) > 1 && $order['order_status'] == "P"){ $canceldisplay=true;}  ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><strong>Get Quote summary</strong></h3>
                                            </div>
                                            <div class="alert-danger"></div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                            <!-- <tr>
                                                                <button type="button" class="btn btn-primary btn-sm" id="create_shipment">Create Shipment</button>
                                                            </tr> -->
                                                            <tr>
                                                               <!--  <td class="thick-line-bottom"><strong>Check All <input type="checkbox" name="product_shipment" id="product_shipment"></strong></td> -->
                                                                <td class="thick-line-bottom"><strong>Coverage</strong></td>
                                                                
                                                                <td class="thick-line-bottom"><strong>Type</strong></td>

                                                                <td class="thick-line-bottom"><strong>Product
                                                                        Name</strong></td>

                                                                <td class="thick-line-bottom"><strong>Suminsured</strong></td>
                                                                <td class="thick-line-bottom">
                                                                    <strong>Avg</strong>
                                                                </td>
                                                                <td class="thick-line-bottom text-right">
                                                                    <strong>Premium</strong>
                                                                </td>
                                                                

                                                                <?php /* if($canceldisplay==true){ ?>
                                                                <td class="text-right thick-line-bottom">
                                                                    <strong>Cancel</strong>
                                                                </td>
                                                                <?php } */ ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($order['items'] as $item) { ?>
                                                            <tr>
                                                                 <td class="text-left">
                                                                    <?php 
                                                                    //echo $item['coverage_id']; 
                                                                    echo $industry = $this->orders_model->get_coverage_name($item['coverage_id']);
                                                                    ?>
                                                                </td> 
                                                                <td class="text-left">
                                                                    <?php 
                                                                        //echo $item['type_id']; 
                                                                         echo $industry = $this->orders_model->get_type_name($item['type_id']);
                                                                    ?>
                                                                </td> 
                                                                
                                                                <td class="text-left">
                                                                   
                                                                    <?php echo $item['order_item_name']; ?>
                                                                   
                                                                </td>
                                                                <td class="text-left">
                                                                  <?php echo $item['product_item_price']; ?>
                                                                </td>
                                                                <td class="text-left">
                                                                    <?php echo $item['average']; ?>
                                                                </td>
                                                                <td class="text-right">
                                                                  <?php echo $item['total_coverage_premium']; ?>
                                                                </td>
                                                               
                                                            </tr>
                                                            <?php }?>
                                                            <tr>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td colspan="1" class="thick-line text-left">
                                                                    <strong>Net Premium</strong>
                                                                </td>
                                                                <input type="hidden" id="sub_total" name="sub_total" value="<?php echo $order['sub_total'];?>">
                                                                <td colspan="2" class="thick-line text-right">Rs.
                                                                    <?php echo number_format($order['net_premium']);?>
                                                                </td>
                                                                
                                                               
                                                            </tr>
                                                            <!--<tr>
                                             <td class="no-line"></td>
                                             <td class="no-line"></td>
                                             <td class="no-line"></td>
                                             <td class="no-line"></td>
                                             <td class="no-line text-center"><strong>Additional Cost</strong></td>
                                             <td class="no-line text-right">Rs.<?php echo $order['ordercost']?></td>
                                             </tr>
                                             -->
                                                            
                                                            <?php if($order['coupondiscount'] !=''){ ?>
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td colspan="1" class="no-line text-left"><strong>Coupon
                                                                        Discount</strong></td>
                                                                <td colspan="2" class="no-line text-right">Rs.
                                                                    <?php echo "-".number_format($order['coupondiscount']); ?>
                                                                </td>
                                                                
                                                            </tr>
                                                            <?php } ?>
                                                            
                                                            <!-- 
                                             <tr>
                                                 <td class="no-line"></td>
                                                 <td class="no-line"></td>
                                                 <td class="no-line"></td>
                                                 <td class="no-line"></td>
                                                 <td class="no-line text-center"><strong>Shipping</strong></td>
                                                 <td class="no-line text-right">Rs. 0</td>
                                             </tr>-->
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td colspan="1" class="no-line text-left">
                                                                    <strong>Gst</strong>
                                                                </td>
                                                                <td colspan="2" class="no-line text-right">Rs.
                                                                    <?php echo number_format($order['gst_amount']);?>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td colspan="1" class="no-line text-left">
                                                                    <strong>Total Premium</strong>
                                                                </td>
                                                                <td colspan="2" class="no-line text-right">Rs.
                                                                    <?php echo number_format($order['order_total']);?>
                                                                </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                        function cancel_product(order_item_id, orderid) {
                            var conf = confirm("Are you sure want to Cancel Product ?");
                            if (conf == true) {
                                var base_url = '<?php echo $base_url.'orders/cancel_product'; ?>';
                                window.location = base_url + "/" + order_item_id + "/" + orderid;
                                return true;
                            } else {
                                return false;
                            }
                        }

                        function change_order_status(id, order_status, userid, orderid) {
                            var selected_status = $('#order_item_status_' + id).val();
                            var url = '<?php echo $base_url; ?>orders/changeItemStatus/'
                            $.ajax({
                                url: url,
                                type: 'post',
                                data: {
                                    'id': id,
                                    'selected_status': selected_status,
                                    'userid': userid,
                                    'orderid': orderid,
                                },
                                success: function(msg) {

                                    if (msg == 1) {
                                        $('.success-message').show();
                                        $('.success-message').show().delay(0).fadeIn('show');
                                        $('.success-message').show().delay(800).fadeOut('show');
                                        //$('.contact-form').hide();
                                    }
                                }
                            });
                        }
                        </script>
                    </div>
                    <!------Start Print Div -->
                    <style>
                    .panel {
                        margin-bottom: 0px !important;
                    }

                    .padding-zero {
                        padding-left: 0px !important;
                        padding-right: 0px !important;
                    }

                    .padding-right-zero {
                        padding-right: 0px !important;
                    }

                    .padding-top-zero {
                        padding-top: 0px !important;
                    }

                    .padding-bottom-zero {
                        padding-bottom: 0px !important;
                    }

                    .border-1px {
                        border: 1px solid #d5d5d5;
                    }

                    .border-bottom-1px {
                        border-bottom: 1px solid #d5d5d5;
                    }

                    .border-left-1px {
                        border-left: 1px solid #d5d5d5;
                    }

                    .border-right-1px {
                        border-right: 1px solid #d5d5d5;
                    }

                    .invoice-title h2,
                    .invoice-title h3 {
                        display: inline-block;
                    }

                    .table>tbody>tr>.no-line {
                        border-top: none;
                    }

                    .table>thead>tr>.no-line {
                        border-bottom: none;
                    }

                    .table>tbody>tr>.thick-line {
                        border-top: 2px solid;
                    }

                    .table>thead>tr>.thick-line-bottom {
                        border-bottom: 2px solid;
                    }

                    @media (max-width:768px) {

                        .col-xs-1,
                        .col-sm-1,
                        .col-md-1,
                        .col-lg-1,
                        .col-xs-2,
                        .col-sm-2,
                        .col-md-2,
                        .col-lg-2,
                        .col-xs-3,
                        .col-sm-3,
                        .col-md-3,
                        .col-lg-3,
                        .col-xs-4,
                        .col-sm-4,
                        .col-md-4,
                        .col-lg-4,
                        .col-xs-5,
                        .col-sm-5,
                        .col-md-5,
                        .col-lg-5,
                        .col-xs-6,
                        .col-sm-6,
                        .col-md-6,
                        .col-lg-6,
                        .col-xs-7,
                        .col-sm-7,
                        .col-md-7,
                        .col-lg-7,
                        .col-xs-8,
                        .col-sm-8,
                        .col-md-8,
                        .col-lg-8,
                        .col-xs-9,
                        .col-sm-9,
                        .col-md-9,
                        .col-lg-9,
                        .col-xs-10,
                        .col-sm-10,
                        .col-md-10,
                        .col-lg-10,
                        .col-xs-11,
                        .col-sm-11,
                        .col-md-11,
                        .col-lg-11,
                        .col-xs-12,
                        .col-sm-12,
                        .col-md-12,
                        .col-lg-12 {
                            padding-left: 1px !important;
                            padding-right: 1px !important;
                        }
                    }
                    </style>
                    <div class="panel" style="display:none;" id="printArea">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-12">
                                    <div class="col-xs-12 col-md-6 col-lg-4" style="width: 33.3333%;">
                                        <img width="210" style=" float:left"
                                            src="http://justintime.in/beta/upload/logo/logo.png" alt="Just In Time">
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 text-center" style="width: 33.3333%;">
                                        <h3 style=" margin-top:20px;"><span><strong>Invoice</strong></span></h3>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4" style="height: 80px;width: 33.3333%;">
                                        &nbsp;</div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 padding-right-zero padding-bottom-zero"
                                        style="padding-right:0px !important;padding-bottom:0px !important;width: 33.3333%; height:170px;">
                                        <div class="panel panel-default height" style="margin-bottom:0px !important;
                              background-color: #fff;
                              border-top: 1px solid #d5d5d5 !important;
                              border-right: 1px solid #d5d5d5 !important;border-left: 1px solid #d5d5d5 !important;
                              border-bottom: 1px solid #fff !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              ">
                                            <div class="panel-body">
                                                Sender<br />
                                                <strong>Just in Time Trading Pvt Ltd,</strong><br />
                                                V N Sphere, Plot No.199,<br />
                                                Vithalbhai Patel Road,<br />
                                                TPS-III,<br />
                                                Bandra(W)<br />
                                                Mumbai - 400050<br />
                                                Ph No: 65285700<br />
                                                E-Mail: customercare@justintime.in
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 padding-zero padding-bottom-zero"
                                        style="padding-bottom:0px !important;padding-left:0px !important; padding-right:0px !important;width: 33.3333% !important;">
                                        <div class="panel panel-default height" style="height: 205px ! important;margin-bottom:0px !important;  background-color: #fff;
                              border: 1px solid #d5d5d5 !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              margin-bottom: 20px;">
                                            <div class="panel-body border-bottom-1px"
                                                style=" border-bottom:1px solid #d5d5d5;">
                                                Invoice No.<br />
                                                <strong style="font-size:18px">RJLPL00317</strong><br />
                                            </div>
                                            <div class="panel-body">
                                                Order No.<br />
                                                <strong style="font-size:18px">OD506796207040523000</strong><br />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 padding-zero padding-bottom-zero"
                                        style="width: 33.3333% !important;">
                                        <div class="panel panel-default height" style="height: 205px ! important;margin-bottom:0px !important;  background-color: #fff;
                              border: 1px solid #d5d5d5 !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              margin-bottom: 20px;
                              margin-left:-10px;">
                                            <div class="panel-body border-bottom-1px"
                                                style="border-bottom:1px solid #d5d5d5;">
                                                Dated<br />
                                                <strong style="font-size:18px">16-Aug-2016</strong><br />
                                            </div>
                                            <div class="panel-body">
                                                Dated<br />
                                                <strong style="font-size:18px">16-Aug-2016</strong><br />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 padding-right-zero padding-top-zero"
                                        style="padding-right:0px !important; padding-top:0px !important;width: 33.3333%;">
                                        <div class="panel panel-default height" style="height: 150px !important;margin-bottom:0px !important;  background-color: #fff;
                              border: 1px solid #d5d5d5 !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              ">
                                            <div class="panel-body">
                                                Buyer<br />
                                                <strong>Dr.<?php echo $order['user_name'];?></strong><br />
                                                <?php echo $order['address'].",<br>";?>
                                                <?php echo $order['city'].",<br>";?>
                                                <?php echo $order['state']."-".$order['zipcode'].",<br>";?>
                                                <?php echo $order['country'].".<br>";?>
                                                <?php echo "Mo - ".$order['mobno']."<br>";?>
                                            </div>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 padding-zero padding-top-zero"
                                        style=" padding-left:0px !important; padding-right:0px !important; padding-top:0px !important;width: 33.3333%;">
                                        <div class="panel panel-default height" style="height: 150px !important;margin-bottom:0px !important;  background-color: #fff;
                              border: 1px solid #d5d5d5 !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              margin-bottom: 20px;">
                                            <div class="panel-body">
                                                Portal<br />
                                                <strong style="font-size:18px">JUST IN TIME</strong><br />
                                            </div>
                                            <!--<div class="panel-body">
                                 Dispatch Through<br />
                                 <strong style="font-size:18px">E-Kart Logistics</strong><br />    
                                    
                                    
                                 </div>-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 padding-zero padding-top-zero"
                                        style=" padding-left:0px !important; padding-right:0px !important; padding-top:0px !important;width: 33.3333%;">
                                        <div class="panel panel-default height" style="height: 150px !important;margin-bottom:0px !important;  background-color: #fff;
                              border: 1px solid #d5d5d5 !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              margin-bottom: 20px;">
                                            <div class="panel-body">
                                                Payment Mode<br />
                                                <strong style="font-size:18px">Prepaid</strong><br />
                                            </div>
                                            <!--<div class="panel-body">
                                 AWB No<br />
                                 <strong style="font-size:18px">FMPC0146442531</strong><br />     
                                    
                                    
                                 </div>-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-12 padding-zero padding-top-zero"
                                        style=" padding-left:0px !important; padding-right:0px !important; padding-top:0px !important;">
                                        <div class="panel panel-default" style="margin-left: 10px;margin-bottom:0px !important;  background-color: #fff;
                              border-bottom: 0px solid #fff !important;
                              border-radius: 4px;
                              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                              margin-bottom: 20px;
                              border-right:1px solid #d5d5d5 !important;
                              border-left:1px solid #d5d5d5 !important;">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="border:1px solid #ddd !important;">
                                                            <h4>Sr No.</h4>
                                                        </th>
                                                        <th style="border:1px solid #ddd !important;">
                                                            <h4>Description of Goods</h4>
                                                        </th>
                                                        <th style="border:1px solid #ddd !important;">
                                                            <h4>Model No.</h4>
                                                        </th>
                                                        <th style="border:1px solid #ddd !important;">
                                                            <h4>Quantity</h4>
                                                        </th>
                                                        <th style="border:1px solid #ddd !important;">
                                                            <h4>Rate</h4>
                                                        </th>
                                                        <th style="border:1px solid #ddd !important;">
                                                            <h4>Amount</h4>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                       $i='1';
                                       $totalquty='0';
                                       foreach ($order['items'] as $item) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $item['order_item_name'];?></td>
                                                        <td class="text-right"><?php echo $item['order_item_code'];?>
                                                        </td>
                                                        <td class="text-right"><?php echo $item['product_quantity'];?>
                                                        </td>
                                                        <td class="text-right"><i class="fa fa-inr"></i>
                                                            <?php echo number_format($item['product_item_price']);?>
                                                        </td>
                                                        <td class="text-right"><i class="fa fa-inr"></i>
                                                            <?php echo $item['product_item_price']*$item['product_quantity']?>
                                                        </td>
                                                    </tr>
                                                    <?php  $totalquty=($totalquty + $item['product_quantity']);$i++;}?>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-right" colspan="2"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4>TOTAL</h4>
                                                            </th>
                                                            <th style="border:1px solid #ddd !important;">
                                                                <h4></h4>
                                                            </th>
                                                            <th class="text-right"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4><?php echo $totalquty; ?></h4>
                                                            </th>
                                                            <th style="border:1px solid #ddd !important;">
                                                                <h4></h4>
                                                            </th>
                                                            <th class="text-right"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4><i class="fa fa-inr"></i>
                                                                    <?php echo number_format($order['sub_total']);?>
                                                                </h4>
                                                            </th>
                                                        </tr>
                                                        <?php if($order['coupondiscount'] !='0'){ ?>
                                                        <tr>
                                                            <th class="text-right" colspan="5"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4>Coupon Discount</h4>
                                                            </th>
                                                            <th class="text-right"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4><i class="fa fa-inr"></i>
                                                                    <?php echo number_format($order['coupondiscount']); ?>
                                                                </h4>
                                                            </th>
                                                        </tr>
                                                        <?php  } ?>
                                                        <tr>
                                                            <th class="text-right" colspan="5"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4>Grand Total</h4>
                                                            </th>
                                                            <th class="text-right"
                                                                style="border:1px solid #ddd !important;">
                                                                <h4><i class="fa fa-inr"></i>
                                                                    <?php echo number_format($order['order_total']);?>
                                                                </h4>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12 col-lg-12 border-1px"
                                        style="margin-left: 10px; width: 99%;border:1px solid #d5d5d5;">
                                        <div class="col-xs-12 col-md-6 col-lg-6" style="width: 50%;">
                                            Amount Chargeable (in words)
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6 text-right" style="width: 50%;">
                                            E. & O.E
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <h3 style="margin-top:10px;"> <strong>INR
                                                    <?php echo $totol_words; ?></strong></h3>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            Company's VAT TIN : 27670783970V w.e.f 27/07/2010
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            Company's CST TIN : 27670783970C w.e.f 27/07/2010
                                        </div>
                                        <!--<div class="col-xs-12 col-md-12 col-lg-12"> 
                              Company's PAN :
                              
                                             </div>-->
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center" style="margin-top:30px;">
                                            <span style=" text-decoration:underline">Declaration</span><br />
                                            We declare that this invoice shows the actual price of the
                                            goods described and that all particulars are true and correct.
                                        </div>
                                        <!--<div style="margin-top:30px;" class="col-xs-12 col-md-6 col-lg-6 text-center border-1px"> 
                              <span>  <strong>For just lifestyle Pvt Ltd</strong></span><br><br><br>
                                <span>Authorised Signatory</span>
                                 </div>-->
                                    </div>
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center" style="margin-top:10px;">
                                        This is a Computer Generated Invoice
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------End Print Div -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>

    <?php include('include/sidebar_right.php');?>
</div>
<div class="modal fade" id="create_label_modal" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content" id="create_label_html">
                                   
                                  </div>
                                  
                                </div>
                              </div>
<div class="modal fade" id="ready_to_dispatch_modal" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content" id="ready_to_dispatch_html">
                                    
                                  </div>
                                  
                                </div>
                              </div>
<!-- End #Main -->
<?php include('include/footer.php')?>

<!---- Start Delivered Slip ---->
<?php  /* ?>
<style>
.panel {
    margin-bottom: 0px !important;
    border-left: 3px dashed black !important;
    border-right: 3px dashed black !important;
}

.panel-heading {
    line-height: 30px !important;
    padding: 10px !important;
}

.invoice-title h2,
.invoice-title h3 {
    display: inline-block;
}

.table>tbody>tr>.no-line {
    border-top: none;
}

.table>thead>tr>.no-line {
    border-bottom: none;
}

.table>tbody>tr>.thick-line {
    border-top: 2px solid;
}

.table>thead>tr>.thick-line-bottom {
    border-bottom: 2px solid;
}


}
</style> */?>
<div class="panel" style="border:none !important; display:none;" id="printslip">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-lg-offset-3">
                <div class="panel panel-default height" style=" border-top: 3px dashed black !important;border-left: 3px dashed black !important;
border-right: 3px dashed black !important;
margin-bottom: 0 !important;border-bottom:1px solid #d5d5d5 !important;">
                    <div class="panel-heading" style="background-color: #f5f5f5;
border-color: #ddd;
color: #333;">Packing Slip</div>

                    <div class="panel-body">
                        <strong>DELIVERY ADDRESS:</strong><br>
                        <?php echo $order['user_name'];?>,<br>
                        <?php echo $order['address'].",<br>";?>
                        <?php echo $order['city'].",<br>";?>
                        <?php echo $order['state']."-".$order['zipcode'].",<br>";?>
                        <?php echo $order['country'].".<br>";?>
                        <?php echo "Mo - ".$order['mobno']."<br>";?>

                    </div>
                </div>
                <div class="panel panel-default height" style="border-left: 3px dashed black !important;
border-right: 3px dashed black !important;
margin-bottom: 0 !important;border-bottom:1px solid #d5d5d5 !important;">
                    <div class="panel-heading" style="background-color: #f5f5f5;
border-color: #ddd;
color: #333;">Courier Name: E-Kart Logistics<br />
                        Courier AWB No: FMPC0146442531
                    </div>
                    <div class="panel-body">
                        <strong>Sold By:</strong>
                        <strong>Just in Time Trading Pvt Ltd,</strong><br />
                        V N Sphere, Plot No.199,<br />
                        Vithalbhai Patel Road,<br />
                        TPS-III,<br />
                        Bandra(W)<br />
                        Mumbai - 400050<br />
                        Ph No: 65285700<br />
                        E-Mail: customercare@justintime.in<br />

                    </div>
                </div>

                <div class="panel panel-default height" style="border-left: 3px dashed black !important;
border-right: 3px dashed black !important;
margin-bottom: 0 !important;border-bottom:1px solid #d5d5d5 !important;">

                    <div class="panel-body">
                        <strong>VAT TIN No: 27670783970V w.e.f 27/07/2010</strong><br /> <span><strong>CST TIN No:
                                27670783970C w.e.f 27/07/2010</strong></span>


                    </div>


                </div>
                <div class="panel panel-default" style="border-left: 3px dashed black !important;
border-right: 3px dashed black !important;
margin-bottom: 0 !important;border-bottom:1px solid #d5d5d5 !important;">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Product</strong></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="text-center"><strong>Quantity</strong></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalquty='0';foreach ($order['items'] as $item) { ?>

                                    <tr>
                                        <td><?php echo $item['order_item_name'];?> |
                                            <?php echo $item['order_item_code'];?></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="text-center"><?php echo $item['product_quantity']; ?></td>

                                    </tr>
                                    <?php $totalquty=($totalquty + $item['product_quantity']); } ?>



                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-right"><strong>Total</strong></td>
                                        <td class="highrow text-center"><?php echo $totalquty; ?></td>

                                    </tr>


                                </tbody>
                            </table>
                            <!--<div class="panel-heading">
                    <h4 class="text-right">
                    <strong>(N) DEL/DSG</strong></h4>
                </div>-->
                        </div>
                    </div>

                </div>


                <div class="panel panel-default height" style="border-left: 3px dashed black !important;
border-right: 3px dashed black !important;
margin-bottom: 0 !important;border-bottom:1px solid #d5d5d5 !important;">

                    <div class="panel-body">
                        <!--                       <span style="background: black none repeat scroll 0% 0%; color: white; padding: 10px;"> <strong>Handover to E-Kart Logistics</strong> </span>   <span class="pull-right"><strong>REG</strong></span><br /><br />-->
                        <strong>Tracking ID:</strong> FMPC0146442531<br />
                        <strong>Order ID:</strong> OD506796207040523000

                    </div>


                </div>

                <div class="panel panel-default height" style=" border-bottom: 3px dashed black !important;border-left: 3px dashed black !important;
border-right: 3px dashed black !important;
margin-bottom: 0 !important;
border-top:1px solid #d5d5d5 !important;">

                    <div class="panel-body">
                        <span class="pull-right"><strong>Ordered Through</strong></span><br />
                        <img width="110" style="margin-top: 10px; float:right"
                            src="http://justintime.in/beta/upload/logo/logo.png" alt="Just In Time">

                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
<!---- Start Delivered Slip ---->


<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Add Tracking Information
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form method="post" class="form-horizontal" role="form" id="add_tracking_info_form">
                    <input type="hidden" class="form-control" name="action" value="add_tracking_info" />
                    <input type="hidden" class="form-control" name="id"
                        value="<?php if (isset($tracking_info['id']) and $tracking_info['id'] != null) { echo $tracking_info['id'];}?>" />
                    <input type="hidden" class="form-control" name="bulk_order_id" value="" />
                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tracking_id">Tracking ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                value="<?php if (isset($tracking_info['tracking_id']) and $tracking_info['tracking_id'] != null) { echo $tracking_info['tracking_id'];}?>"
                                id="tracking_id" name="tracking_id" />
                        </div>
                    </div>
                    <?php if (isset($tracking_info['dispach_date']) and $tracking_info['dispach_date'] != null) {?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="dispach_date">Dispach Date</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control"
                                value="<?php if (isset($tracking_info['dispach_date']) and $tracking_info['dispach_date'] != null) { echo $tracking_info['dispach_date'];}?>"
                                id="dispach_date" name="dispach_date" />
                        </div>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tracking_link">Tracking Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tracking_link" name="tracking_link"
                                value="<?php if (isset($tracking_info['tracking_link']) and $tracking_info['tracking_link'] != null) { echo $tracking_info['tracking_link'];}?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="last_guideline">Last Guideline</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="last_guideline" name="last_guideline"
                                value="<?php if (isset($tracking_info['last_guideline']) and $tracking_info['last_guideline'] != null) { echo $tracking_info['last_guideline'];}?>" />
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button id="add_tracking_info_submit" type="button" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- DATA TABES SCRIPT -->
<link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"
    type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript">
</script>
<link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<script>
$('#add_tracking_info_submit').click(function() {
    $('#add_tracking_info_form').submit();
});

$('.order_status').change(function() {
    var order_item_id = $(this).attr('data-order_id');
    var order_item_status = $(this).val();
    $.ajax({
        url: '<?php echo $this->config->item('base_url').'orders/changeItemStatus'?>',
        type: 'get',
        data: 'order_item_id=' + order_item_id + '&order_item_status=' + order_item_status,
        dataType: 'text',
        success: function(response) {
            if (response == 1) {
                var status =
                    '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Success!</b> Status of Item is changed.</div>';
                $('#content').children(':first-child').prepend(status);
            }
        }
    });
});

function create_label(itemid)
{

		var url ='<?php echo $base_url; ?>orders/create_label';
			jQuery.ajax({
			url:url,
			type:'post',
			data:'itemid='+itemid,
			success:function(msg)
			{	
			 $('#create_label_html').html(msg);	
			 $('#create_label_modal').modal('show');
			}
		  });
 
}

function create_label_new(itemid)
{

		var url ='<?php echo $base_url; ?>orders/create_label_new';
			jQuery.ajax({
			url:url,
			type:'post',
			data:'itemid='+itemid,
			success:function(msg)
			{	
			 $('#create_label_html').html(msg);	
			 $('#create_label_modal').modal('show');
			}
		  });
 
}

function ready_to_dispatch(ready_itemid)
{
	var url ='<?php echo $base_url; ?>orders/ready_to_dispatch';
			jQuery.ajax({
			url:url,
			type:'post',
			data:'ready_itemid='+ready_itemid,
			success:function(msg)
			{	
			 $('#ready_to_dispatch_html').html(msg);
			 $('#start_date').datetimepicker();			 
			 $('#ready_to_dispatch_modal').modal('show');
			 
			}
		  });
	
}

function track_package(id){
    var itemid = id;
	var url ='<?php echo $base_url; ?>orders/track_package';
		jQuery.ajax({
		url:url,
		type:'post',
		data:'itemid='+itemid,
		success:function(msg)
		{	
		 $('#create_label_html').html(msg);	
		 $('#create_label_modal').modal('show');
		}
	  });
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
//  $("#product_review_form").validate({
//    errorElement: 'div',
//    rules: {
//      user_name: {
//        required: true,
//      },
//      user_email: {
//        required: true,
//        email:true,
//      },
//      product_review_title: {
//        required: true,
//      },
//      product_review: {
//        required: true,
//      },
//    },
//    messages:
//    {
//        user_name:
//        {
//          required:"Please Enter Your Name",
//        },
//        user_email:
//        {
//          required:"Please Enter You Email ID",
//          email:"Please Enter Valid Email ID",
//        },
//        product_review_title:
//        {
//          required:"Please Enter Review Title",
//        },
//        product_review:
//        {
//          required:"Please Enter Review",
//        },
//    },
//    errorPlacement: function(error, element)
//    {
//          error.insertAfter(element.parent());
//    }
//});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    function approve_uti(url, is_active,oldVlaue,orderid,user_id) {
    var box = document.getElementById('allow_on_uti_' + orderid);
    if (is_active == '1') {
        var t = confirm('Are you sure you want to Active ?');
    } else
    {
        var t = confirm('Are you sure you want to Deactive  ?');
    }

    if (t) {
        window.location.href = url + "/" + is_active + "/" + orderid + "/" + user_id;
    } else {
        box.value = oldVlaue;
        return false;
    }
}
</script>

<script type="text/javascript">
    function approve_uti_exchange(url, is_active,oldVlaue,orderid,user_id) {
    var box = document.getElementById('allow_on_uti_' + orderid);
    if (is_active == '1') {
        var t = confirm('Are you sure you want to Active ?');
    } else
    {
        var t = confirm('Are you sure you want to Deactive  ?');
    }

    if (t) {
        window.location.href = url + "/" + is_active + "/" + orderid + "/" + user_id;
    } else {
        box.value = oldVlaue;
        return false;
    }
}
$(document).ready(function(){

    $("#product_shipment").change(function(){
        if(this.checked){
          $(".product_shipment").each(function(){
            this.checked=true;
          })              
        }else{
          $(".product_shipment").each(function(){
            this.checked=false;
          })              
        }
    });
    $(".product_shipment").click(function () {
        if ($(this).is(":checked")){
          var isAllChecked = 0;
          $(".product_shipment").each(function(){
            if(!this.checked)
               isAllChecked = 1;
          })              
          if(isAllChecked == 0){ $("#product_shipment").prop("checked", true); }     
        }else {
          $("#product_shipment").prop("checked", false);
        }
    });
    $("#create_shipment").click(function(){
        var select_id = [];
        $('.product_shipment:checkbox:checked').each(function(index){
          select_id.push($(this).val());
        });
        $('input[name=bulk_order_id]').val(select_id);
        var select_id_check = $('input[name=bulk_order_id]').val();
        if(select_id_check.length == 0){
            $(".alert-danger").html("At least one checkbox required!");
        }else{
            $(".alert-danger").html("");

            var sub_total = $("#sub_total").val();
            var url ='<?php echo $base_url; ?>orders/create_label_new';
            jQuery.ajax({
                url:url,
                type:'post',
                data:'itemid='+select_id + '&sub_total=' + sub_total,
                success:function(msg)
                {   
                    // console.log(msg);
                 $('#create_label_html').html(msg); 
                 $('#create_label_modal').modal('show');
                }
            });
        }
    });
});
</script>