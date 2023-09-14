<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
   <?php include('include/sidebar_left.php');?>
   <!-- Start: Content -->
   <section id="content_wrapper">
      <div id="topbar">
         <div class="topbar-left">
            <ol class="breadcrumb">
               <li class="crumb-active"><a href="javascript:void(0);"> Edit Update Premium </a></li>
               <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                  class="glyphicon glyphicon-home"></span></a></li>
               <li class="crumb-link"><a href="<?php echo $base_url; ?>update_premium/lists">Update Premium</a></li>
               <li class="crumb-trail">Edit Update Premium</li>
            </ol>
         </div>
      </div>
      <div id="content">
         <div class="row">
            <div class="col-md-12">
               <div class="panel">
                  <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Update Premium</span> </div>
                  <div class="panel-body">
                     <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                     <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"
                           aria-hidden="true">&times;</button>
                        <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                     </div>
                     <?php } ?>
                     <?php if($this->session->flashdata('flashError')!='') { ?>
                     <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <button type="button" class="close" data-dismiss="alert"
                           aria-hidden="true">&times;</button>
                        <b>Error!</b> <?php echo $this->session->flashdata('flashError'); ?>
                     </div>
                     <?php }  ?>
                     <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                        <i class="fa fa-warning"></i>
                        <button type="button" class="close" data-dismiss="alert"
                           aria-hidden="true">&times;</button>
                        <b>Error &nbsp; </b><span id="error_msg1"></span>
                     </div>
                     <div class="col-md-12">
                        <form role="form" id="form" method="post"
                           action="<?php echo $base_url;?>update_premium/edit/<?php echo $id; ?>"
                           enctype="multipart/form-data">
                           <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                           <INPUT TYPE="hidden" NAME="action" VALUE="edit_update_premium">
                           <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="corporate_id" style="width:100%; margin:15px 0 5px;">Corporate <span class="mandatory_field">*</span></label>
                                 <select id="corporate_id" name="corporate_id"
                                    class="form-control" onChange="showpolicy(this.value)">
                                    <option value="">Select Corporate</option>
                                    <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                       foreach ($allcorporate as $corporate) {
                                           ?>
                                    <option value="<?php echo $corporate->id; ?>" <?php if ($corporate->id == $corporate_id) {
                                       echo "selected";
                                       } ?>><?php echo $corporate->co_name; ?>
                                    </option>
                                    <?php } } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group rfa_multiple_select">
                                 <label for="policy_no" style="width:100%; margin:15px 0 5px;">Policy Number <span class="mandatory_field">*</span></label>
                                 <span id="show_policy_number">
                                    <select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">
                                       <option value="">Select Policy No</option>
                                       <?php  if($allpolicy_using_corporate !='' && count($allpolicy_using_corporate) > 0){ 
                                          foreach($allpolicy_using_corporate as $policy_no_data){ ?>
                                       <option value="<?php echo $policy_no_data->id; ?>" <?php if ($policy_no_data->id == $policy_no) {
                                          echo "selected";
                                          } ?>><?php echo $policy_no_data->policy_no; ?></option>
                                       <?php } }  ?>             
                                    </select>
                                 </span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group rfa_multiple_select">
                                 <label for="policy_type" style="width:100%; margin:15px 0 5px;">Policy Type</label>
                                 <select id="policy_type" name="policy_type" class="form-control multiple-select">
                                    <option value="">Select Policy Type</option>
                                    <?php  if($allproduct_type !='' && count($allproduct_type) > 0){ 
                                       foreach($allproduct_type as $allproduct_type_data){ ?>
                                    <option value="<?php echo $allproduct_type_data->id; ?>" <?php if ($allproduct_type_data->id == $policy_type) {
                                       echo "selected";
                                       } ?>><?php echo $allproduct_type_data->name; ?></option>
                                    <?php } }  ?>             
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="inception_premium_amount">Inception Premium Amount <span class="mandatory_field">*</span></label>
                                 <input type="number" name="inception_premium_amount" id="inception_premium_amount" onkeyup="change_total_premium();" class="form-control" placeholder="Enter Inception Premium Amount " value="<?php echo $inception_premium_amount ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="addition_premium_amount" >Addition Premium Amount <span class="mandatory_field">*</span></label>
                                 <span id="show_insurer">
                                 <input type="number" onkeyup="change_total_premium();" name="addition_premium_amount" id="addition_premium_amount" class="form-control" placeholder="Enter Addition Premium Amount" value="<?php echo $addition_premium_amount ?>">
                                 </span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="deletion_premium_amount" >Deletion Premium Amount <span class="mandatory_field">*</span></label>
                                 <input type="number" name="deletion_premium_amount" id="deletion_premium_amount" class="form-control" onkeyup="change_total_premium();" placeholder="Enter Deletion Premium Amount" value="<?php echo $deletion_premium_amount ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="total_premium_amount" >Total Premium Amount</label>
                                 <input type="number" name="total_premium_amount" id="total_premium_amount" class="form-control" placeholder="Enter Total Premium Amount" value="<?php echo $total_premium_amount ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="reported_claim_amount" >Reported Claims Amount <span class="mandatory_field">*</span></label>
                                 <input type="number" name="reported_claim_amount" id="reported_claim_amount" class="form-control" placeholder="Enter Reported Claims Amount" value="<?php echo $reported_claim_amount ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="total_claim_paid_amount" >Total Caims Paid Amount <span class="mandatory_field">*</span></label>
                                 <input type="number" name="total_claim_paid_amount" id="total_claim_paid_amount" class="form-control" placeholder="Enter Total Caims Paid Amount" value="<?php echo $total_claim_paid_amount ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="claim_under_process_amount" >Claims Under-Process Amount <span class="mandatory_field">*</span></label>
                                 <input type="number" name="claim_under_process_amount" id="claim_under_process_amount" class="form-control" placeholder="Enter Claims Under-Process Amount" value="<?php echo $claim_under_process_amount ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="claim_closed_reject" >Claims Closed / Rejected <span class="mandatory_field">*</span></label>
                                 <input type="text" name="claim_closed_reject" id="claim_closed_reject" class="form-control" placeholder="Enter Claims Closed / Rejected " value="<?php echo $claim_closed_reject ?>">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <input class="submit btn bg-purple pull-right" type="button" value="Update"
                                    onclick="javascript:validate();return false;" />
                                 <a href="<?php echo $base_url;?>update_premium/lists" class="submit btn bg-purple pull-right"
                                    style="margin-right: 10px;" />Cancel</a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End: Content -->
   <?php include('include/sidebar_right.php');?>
</div>
<!-- End #Main -->
<?php include('include/footer.php')?>
<script>
   $(function() {
   
       $("#name").keyup(function() {
   
           var Text = $(this).val();
   
           Text = Text.toLowerCase();
   
           Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
   
           $("#page_url").val(Text);
   
       });
   
   });
</script>
<script>
   function validate() {
   
    var corporate_id = $("#corporate_id").val();
       if (corporate_id == '') {
           $("#error_msg1").html("Please Select Corporate.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       // var product_name = $("#product_name").val();
       // if (product_name == '') {
       //     $("#error_msg1").html("Please Select Product Name.");
       //     $("#validator").css("display", "block");
       //     $('html, body').animate({
       //         'scrollTop': $("#error_msg1").position().top
       //     });
       //     return false;
       // }
   
       var policy_no = $("#policy_no").val();
       if (policy_no == '') {
           $("#error_msg1").html("Please Select Policy Number.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
   
       var inception_premium_amount = $("#inception_premium_amount").val();
       if (inception_premium_amount == '') {
           $("#error_msg1").html("Please Enter Inception Premium Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
   
       var addition_premium_amount = $("#addition_premium_amount").val();
       if (addition_premium_amount == '') {
           $("#error_msg1").html("Please Enter Addition Premium Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var deletion_premium_amount = $("#deletion_premium_amount").val();
       if (deletion_premium_amount == '') {
           $("#error_msg1").html("Please Enter Deletion Premium Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var total_premium_amount = $("#total_premium_amount").val();
       if (total_premium_amount == '') {
           $("#error_msg1").html("Please Enter Total Premium Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var reported_claim_amount = $("#reported_claim_amount").val();
       if (reported_claim_amount == '') {
           $("#error_msg1").html("Please Enter Reported Claim Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var total_claim_paid_amount = $("#total_claim_paid_amount").val();
       if (total_claim_paid_amount == '') {
           $("#error_msg1").html("Please Enter Total Claim Paid Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var claim_under_process_amount = $("#claim_under_process_amount").val();
       if (claim_under_process_amount == '') {
           $("#error_msg1").html("Please Enter Claims Under-Process Amount");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var claim_closed_reject = $("#claim_closed_reject").val();
       if (claim_closed_reject == '') {
           $("#error_msg1").html("Please Enter Claims Closed / Rejected");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
       
       $('#form').submit();
   }
   
   function numbersonly(e) {
       var unicode = e.charCode ? e.charCode : e.keyCode
       if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
           if (unicode < 45 || unicode > 57) //if not a number
               return false //disable key press
       }
   }
</script>
<script type = "text/javascript">
   function showUser(pro_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>sum_insured/show_policy_number';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id,
           success: function(msg){
               document.getElementById('prod1').innerHTML = msg;
           }
       });
   }
   
   function showpolicy(pro_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>update_premium/show_policy_using_corporate';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id,
           success: function(msg){
               document.getElementById('show_policy_number').innerHTML = msg;
           }
       });
   }
   function showproduct_name(pro_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>update_premium/get_policy_data';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id,
           success: function(msg){
   
               showproduct_insurer(pro_id);
               get_suminsurence(pro_id);
               $('#product_name').val(msg);
               //alert(msg)
               //document.getElementById('prod1').innerHTML = msg;
           }
       });
   }
   
   function showproduct_insurer(pro_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>update_premium/get_policy_insurer';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id,
           success: function(msg){
               $('#insurer').val(msg);
               //alert(msg)
               //document.getElementById('prod1').innerHTML = msg;
           }
       });
   }
   
   function get_suminsurence(pro_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>update_premium/get_policy_suminsurance';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id,
           success: function(msg){
               //$('#insurer').val(msg);
               //alert(msg)
               document.getElementById('suminsure').innerHTML = msg;
           }
       });
   }
   
   function show_form_data(product_type_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>update_premium/show_form_data';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'product_type_id=' + product_type_id,
           success: function(msg){
   
               // showproduct_insurer(pro_id);
               // get_suminsurence(pro_id);
               // $('#product_name').val(msg);
               //alert(msg)
               document.getElementById('form_fill_data').innerHTML = msg;
           }
       });
   }
</script>
<script type="text/javascript" src="<?php echo $base_url_views; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function() {
       "use strict";
       Core.init();
       Ajax.init();
       CKEDITOR.replace('inclusions', {});
       CKEDITOR.disableAutoInline = false;
   });
   
   jQuery(document).ready(function() {
       "use strict";
       Core.init();
       Ajax.init();
       CKEDITOR.replace('exclusions', {});
       CKEDITOR.disableAutoInline = false;
   });
   
   function check_box_click(id, value){
       if (value.checked){
           $('#checkbox_hidden_' + id).val(1);
      }else{
           $('#checkbox_hidden_' + id).val(0);
      }
   }
   
   function check_box_radio_click(id, value){
       if (value.checked){
           $('#checkbox_radio_hidden_' + id).val(1);
      }else{
           $('#checkbox_radio_hidden_' + id).val(0);
      }
   }
   
   
   
   function radio_hide_show_Attrdiv(id, value){
       
       if(value == 'Yes' || value == 'yes'){
           $('#hide_radio_attr' + id).show();
       }else{
   		
   		$('.field_type_radio_attu_' + id).val('');
           $('#hide_radio_attr' + id).hide();
       }
   }
   
   function check_box_radio_att_click(id, value){
   
       //alert('sd');
       if (value.checked){
           $('#checkbox_radio_att_hidden_' + id).val(1);
      }else{
           $('#checkbox_radio_att_hidden_' + id).val(0);
      }
   }

   function change_total_premium(){
      var inception_amount = $('#inception_premium_amount').val();
      var addition_premium_amount = $('#addition_premium_amount').val();
      var deletion_premium_amount = $('#deletion_premium_amount').val();

      var total_premium = parseInt(inception_amount) + parseInt(addition_premium_amount) - parseInt(deletion_premium_amount);

      $('#total_premium_amount').val(total_premium);
   }
   
</script>