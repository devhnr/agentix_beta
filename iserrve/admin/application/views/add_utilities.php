<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
   <?php include('include/sidebar_left.php');?>
   <!-- Start: Content -->
   <section id="content_wrapper">
      <div id="topbar">
         <div class="topbar-left">
            <ol class="breadcrumb">
               <li class="crumb-active"><a href="javascript:void(0);"> Add Utilities</a></li>
               <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                  class="glyphicon glyphicon-home"></span></a></li>
               <li class="crumb-link"><a href="<?php echo $base_url; ?>utilities/lists">Utilities</a></li>
               <li class="crumb-trail">Add a Utilities</li>
            </ol>
         </div>
      </div>
      <div id="content">
         <div class="row">
            <div class="col-md-12">
               <div class="panel">
                  <div class="panel-heading"> <span class="panel-title"> <span
                     class="glyphicon glyphicon-lock"></span> Add Utilities</span> </div>
                  <div class="panel-body">
                     <?php if($this->session->flashdata('L_strErrorMessage')){ ?>
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
                        <form role="form" id="form" method="post" action="<?php echo $base_url;?>utilities/add"
                           enctype="multipart/form-data">
                           <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                           <INPUT TYPE="hidden" NAME="action" VALUE="add_utilities">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="corporate_id" style="width:100%; margin:15px 0 5px;">Corporate <span class="mandatory_field">*</span></label>
                                 <select id="corporate_id" name="corporate_id"
                                    class="form-control" onChange="showpolicy(this.value)">
                                    <option value="">Select Corporate</option>
                                    <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                       foreach ($allcorporate as $corporate) {
                                           ?>
                                    <option value="<?php echo $corporate->id; ?>"><?php echo $corporate->co_name; ?>
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
                                                   
                                    </select>
                                 </span>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group rfa_multiple_select">
                                 <label for="document_type" style="width:100%; margin:15px 0 5px;">Document Type <span class="mandatory_field">*</span></label>
                                 <select id="document_type" name="document_type" class="form-control multiple-select">
                                    <option value="">Select Document Type</option>
                                    <?php  if($alldocument_type !='' && count($alldocument_type) > 0){ 
                                       foreach($alldocument_type as $alldocument_type_data){ ?>
                                    <option value="<?php echo $alldocument_type_data->id; ?>"><?php echo $alldocument_type_data->name; ?></option>
                                    <?php } }  ?>             
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group rfa_multiple_select">
                                 <label for="policy_type" style="width:100%; margin:15px 0 5px;">Policy Type <span class="mandatory_field">*</span></label>
                                 <span id="product_type_ajax">
                                 <select id="policy_type" name="policy_type" class="form-control multiple-select">
                                    <option value="">Select Policy Type</option>
                                    <?php  if($allproduct_type !='' && count($allproduct_type) > 0){ 
                                       foreach($allproduct_type as $allproduct_type_data){ ?>
                                    <option value="<?php echo $allproduct_type_data->id; ?>"><?php echo $allproduct_type_data->name; ?></option>
                                    <?php } }  ?>             
                                 </select>
                                 </span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="inception_premium_amount">Note</label>
                                 <!-- <input type="text" name="inception_premium_amount" id="inception_premium_amount" class="form-control" placeholder="Enter Inception Premium Amount "> -->
                                 <textarea name="note" id="note" class="form-control" placeholder="Enter Note"></textarea>
                              </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label style="width:100%; margin:15px 0 5px;" for="document" >Attach Documents <span class="mandatory_field">*</span></label>
                                 <input type="file" name="document" id="document" class="form-control">
                              </div>
                           </div>
                           
                           <div class="col-md-12">
                              <div class="form-group">
                                 <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                    onclick="javascript:validate();return false;" />
                                 <a href="<?php echo $base_url;?>utilities/lists"
                                    class="submit btn bg-purple pull-right"
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
   
       // var insurer= $("#insurer").val();
       // if (insurer == '') {
       //     //alert('Please Enter sum_insured ');
       //     $("#error_msg1").html("Please Select Insurer.");
       //     $("#validator").css("display", "block");
       //     $('html, body').animate({
       //         'scrollTop': $("#error_msg1").position().top
       //     });
       //     return false;
       // }
       var corporate_id = $("#corporate_id").val();
       if (corporate_id == '') {
           $("#error_msg1").html("Please Select Corporate.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   

       var policy_no = $("#policy_no").val();
       if (policy_no == '') {
           $("#error_msg1").html("Please Select Policy Number.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }
   
       var document_type = $("#document_type").val();
       if (document_type == '') {
           $("#error_msg1").html("Please Select Document Type.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }

       var policy_type = $("#policy_type").val();
       if (policy_type == '') {
           $("#error_msg1").html("Please Select Policy Type.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }

       var document = $("#document").val();
       if (document == '') {
           $("#error_msg1").html("Please Attach Document ");
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
       var url = '<?php echo $base_url; ?>utilities/show_policy_number';
   
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
       var url = '<?php echo $base_url; ?>utilities/show_policy_using_corporate';
   
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
       var url = '<?php echo $base_url; ?>utilities/get_product_type';
   
         $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
               //$('#insurer').val(msg);
               //alert(msg)
               document.getElementById('product_type_ajax').innerHTML = msg;
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
   
   function check_box_radio_att_click(id, value){
   
       //alert('sd');
       if (value.checked){
           $('#checkbox_radio_att_hidden_' + id).val(1);
      }else{
           $('#checkbox_radio_att_hidden_' + id).val(0);
      }
   }
   
   
   function radio_hide_show_Attrdiv(id, value){
       
       if(value == 'Yes' || value == 'yes'){
           $('#hide_radio_attr' + id).show();
       }else{
           $('#hide_radio_attr' + id).hide();
       }
   }
</script>