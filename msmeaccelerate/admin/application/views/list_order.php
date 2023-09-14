<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
  <?php include('include/sidebar_left.php');?>
  <!-- Start: Content -->
 <!-- Start: Content -->
<section id="content_wrapper">
   <div id="topbar">
      <div class="topbar-left">
         <ol class="breadcrumb">
             <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="crumb-active"><a href="#">Get Quote Management</a></li>
            
         </ol>
      </div>
   </div>
   <div id="content">
      <div class="row">
         <?php if($this->session->flashdata('L_strErrorMessage'))
            { ?>
         <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>
         </div>
         <?php }
            ?>
         <?php if($this->session->flashdata('flashError')!='') { ?>
         <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-warning"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Error!</b> <?php echo $this->session->flashdata('flashError',5); ?>
         </div>
         <?php }  ?>
         <!-- <div class="col-md-12">
            <a href="<?php echo $base_url;?>orders/lists/SUCCESS" class="btn btn-alert pull-right" style="margin-left:10px"> Payment Success</a>
            <a href="<?php echo $base_url;?>orders/lists/FAILED" class="btn btn-alert pull-right" style="margin-left:10px"> Payment Failed</a>
            
            <a href="<?php echo $base_url;?>orders/lists/C" class="btn btn-alert pull-right" style="margin-left:10px"> Canceled</a>
            
            <a href="<?php echo $base_url;?>orders/lists/D" class="btn btn-alert pull-right" style="margin-left:10px"> Delivered</a>
            
            <a href="<?php echo $base_url;?>orders/lists/S" class="btn btn-alert pull-right" style="margin-left:10px"> Shipped</a>
            
            <a href="<?php echo $base_url;?>orders/lists/P" class="btn btn-alert pull-right" style="margin-left:10px"> Pending</a>
            
            <a href="<?php echo $base_url;?>orders/lists/" class="btn btn-alert pull-right" > All</a>
            
            </div> -->
         <div class="clearfix">&nbsp;</div>

         <!-- <form action="<?php echo $base_url . "orders/download_order_report"; ?>" method="post" enctype="multipart/form-data">   <input class="submit btn btn-danger pull-right " type="submit" value="Order Report">               
 	   </form> -->
         <!--
            <div class="col-md-12">
            	<a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right"  style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            -->
         <div class="clearfix">&nbsp;</div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span>Get Quote List</span> </div>
               <div class="panel-body">
                  <form action="<?php echo $base_url."orders/deleteOrders";?>" method="post" enctype="multipart/form-data" id="form">
                     <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                     <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Select</th>
                                 <th>Get Quote Number</th>
                                 <th>Get Quote Date</th>
                                 <th>Company Name</th>
                                 <th>Email</th>
								         <th>Industry Type</th>
                                 <th>Sub Industry Type</th>
                                 <th>Annual Turnover</th>
                                 <th>Asset Value</th>
                                <!--  <th>Amount</th> -->
                                 
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 if (isset($orders_list) and count($orders_list)) {
                                 foreach ($orders_list as $key => $orders) {
                                    //echo "<pre>";print_r($orders);echo "</pre>";
                                 ?>
                              <tr>
                                 <td><input name="selected[]" id="selected[]" value="<?php echo $orders['order_id']; ?>" type="checkbox"  class="minimal-red"></td>
                                 <td><?php echo $orders['order_number']; ?></td>
                                 <td style="text-align:left"><?php
                                 $order_date = strtotime( $orders['cdate'] );
								 echo $mysqldate = date( 'F d, Y', $order_date );?></td>
                                 <td style="text-align:left"><?php echo $orders['companyname']; ?></td>
                                 <td style="text-align:left"><?php echo $orders['email']; ?></td>

                                 <td>
                                    <?php 
                                    echo $industry = $this->orders_model->get_industry_name($orders['industry_id']);
                                    ?>
                                 </td>

                                 <td>
                                    <?php 
                                    echo $sub_industry = $this->orders_model->get_sub_industry_name($orders['sub_industry_id']);
                                    ?>
                                 </td>

                                 <td style="text-align:left"><?php echo $orders['annual_turnover']; ?></td>
                                 <td style="text-align:left"><?php echo $orders['asses_value']; ?></td>

                                 <!-- <td style="text-align:right">Rs.<?php echo number_format($orders['order_total']); ?></td> -->
								 
                                 <td  class="text-center">
                                    <a class="btn bg-purple2" href="<?php echo $base_url.'orders/detail/'.$orders['order_id']?>" title="Detail">
                                    <i class="fa fa-eye">Details</i>
                                    </a>
                                 </td>
                                 
                              </tr>
                              <?php
                                 }
                                 } else {
                                  //echo 'No Orders Available.';
                                 }



                                 ?>
                           </tbody>
                        </table>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</section>
  <?php include('include/sidebar_right.php');?>
 </div>
<!-- End #Main -->
<?php include('include/footer.php')?>


<!-- DATA TABES SCRIPT -->
	<link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>

 <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });

	   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });

      });
    </script>


<script>
   function approve(url, is_active) {
    if (is_active == '0') {
        var t = confirm('Are you sure you want to change Order Type ?');
    } else {
        var t = confirm('Are you sure you want to change Order Type ?');
    }

    if (t) {
         
        window.location.href = url + "/" + is_active;
    } else {
        return false;
    }
}
function deletecountry(){
	var checked = $("#form input:checked").length > 0;
    if (!checked)
	{
        alert("Please select at least one record to delete");
        return false;
    }
	else
	{
		var conf = confirm("Do you want to delete?");
		if(conf == true){
			$('#form').submit();
			return true;
		}else{
			return false;
		}

	}

    }
function statust(order_id,status)
{
		var conf = confirm("Are you sure want to change Status ?");
		if(conf == true){
		var base_url = '<?php echo $base_url.'orders/changeStatusmail'; ?>';
				window.location = base_url+"/"+order_id+"/"+status;
		return true;
		}else{
			return false;
		}
	
}	
</script>

