<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
   <?php include('include/sidebar_left.php');?>
   <!-- Start: Content -->
   <section id="content_wrapper">
      <div id="topbar">
         <div class="topbar-left">
            <ol class="breadcrumb">
               <li class="crumb-active"><a href="javascript:void(0);"> Add Escalation Level</a></li>
               <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                  class="glyphicon glyphicon-home"></span></a></li>
               <li class="crumb-link"><a href="<?php echo $base_url; ?>escalation_level/lists">Escalation Level</a></li>
               <li class="crumb-trail">Add a Escalation Level</li>
            </ol>
         </div>
      </div>
      <div id="content">
         <div class="row">
            <div class="col-md-12">
               <div class="panel">
                  <div class="panel-heading"> <span class="panel-title"> <span
                     class="glyphicon glyphicon-lock"></span> Add Escalation Level</span> </div>
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
                        <form role="form" id="form" method="post" action="<?php echo $base_url;?>escalation_level/add"
                           enctype="multipart/form-data">
                           <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                           <INPUT TYPE="hidden" NAME="action" VALUE="add_escalation_level">
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
                                 <label for="level" style="width:100%; margin:15px 0 5px;">Level <span class="mandatory_field">*</span></label>
                                 <select id="level" name="level" class="form-control multiple-select" onChange="check_user_level()">
                                    <option value="">Select Level</option>
                                    
                                    <option value="1"> Level 1</option>
                                    <option value="2"> Level 2</option>
                                    <option value="3"> Level 3</option>
                                    <option value="4"> Level 4</option>
                                    <option value="5"> Level 5</option>
                                    <option value="6"> Level 6</option>
                                    <option value="7"> Level 7</option>
                                    <option value="8"> Level 8</option>        
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6" id="user_error_div" style="display:none;"> 
                           <span id="user_error_message" style="font-size: 17px;color: red;margin-top: 7%;display: inline-block;
"></span>    
                                          </div>         
                           <div class="col-md-6" id="user_div" style="display:none;">
                              <div class="form-group rfa_multiple_select">
                                 <label for="user_id" style="width:100%; margin:15px 0 5px;">User <span class="mandatory_field">*</span></label>
                                 <select id="user_id" name="user_id" class="form-control multiple-select">
                                    <option value="">Select User</option>
                                    <?php  if($alluser_escalation !='' && count($alluser_escalation) > 0){ 
                                       foreach($alluser_escalation as $alluser_escalation_data){ ?>
                                    <option value="<?php echo $alluser_escalation_data->id; ?>"><?php echo $alluser_escalation_data->name; ?> (<?php echo $alluser_escalation_data->email; ?>)</option>
                                    <?php } }  ?>             
                                 </select>
                              </div>
                           </div>
                           
                           <div class="col-md-12">
                              <div class="form-group">
                                 <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                    onclick="javascript:validate();return false;" />
                                 <a href="<?php echo $base_url;?>escalation_level/lists"
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

       var level = $("#level").val();
       if (level == '') {
           $("#error_msg1").html("Please Select Level.");
           $("#validator").css("display", "block");
           $('html, body').animate({
               'scrollTop': $("#error_msg1").position().top
           });
           return false;
       }

       var user_id = $("#user_id").val();
       if (user_id == '') {
           $("#error_msg1").html("Please Select User.");
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
       var url = '<?php echo $base_url; ?>escalation_level/show_policy_number';
   
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
       var url = '<?php echo $base_url; ?>escalation_level/show_policy_using_corporate';
   
       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id,
           success: function(msg){
               document.getElementById('show_policy_number').innerHTML = msg;

               check_user_level();
           }
       });
   }

   function check_user_level(){

      var corporate_id = $('#corporate_id').val();
      var level = $('#level').val();
      //alert(corporate_id);

      var url = '<?php echo $base_url; ?>escalation_level/check_user_level';
   
       $.ajax({
           url : url,
           type : 'post',
           //data : 'corporate_id=' + corporate_id,
           data: '&corporate_id=' + corporate_id + '&level=' + level  ,
           success: function(msg){

            if(msg == 0){
               document.getElementById('user_error_message').innerHTML = "";
               $('#user_error_div').hide();
               $('#user_div').show();
            }else{
               $('#user_error_div').show();
               document.getElementById('user_error_message').innerHTML = "User Already Asign To this Corporate"; 
               $('#user_div').hide();
               $('#user_id').val('');
           }
            
           }
       });
   }
   
   function showproduct_name(pro_id){
       // alert(pro_id);exit;
       var url = '<?php echo $base_url; ?>escalation_level/get_policy_data';
   
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
       var url = '<?php echo $base_url; ?>escalation_level/get_policy_insurer';
   
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
       var url = '<?php echo $base_url; ?>escalation_level/get_policy_suminsurance';
   
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
       var url = '<?php echo $base_url; ?>escalation_level/show_form_data';
   
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