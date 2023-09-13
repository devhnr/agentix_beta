<?php include('include/header.php');?>

<style>
.rfa_multiple_select #prod1 .multiple {
    padding: 0;
    margin-bottom: 15px;
}
</style>
<link href="<?php echo $base_url_views; ?>css/fSelect.css" rel="stylesheet">
<link href="<?php echo $base_url_views; ?>css/mediaBoxes.css" rel="stylesheet">
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);">Add Product Repository Policies</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>policies_product_repository/lists">Product Repository Policies</a></li>

                    <li class="crumb-trail">Add Product Repository Policies</li>

                </ol>

            </div>

        </div>
        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Add Product Repository Policies  </span> </div>

                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                            </div>
                            <?php }  ?>


                            <?php if($this->session->flashdata('flashError')!='') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('flashError'); ?>
                            </div>
                            <?php }  ?>


                            <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> &nbsp; </b><span id="error_msg1"></span>
                            </div>


                            <div class="col-md-12">

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>policies_product_repository/add"
                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_policies_product_repository">
									<div class="form-group">                                    <label for="blog_cate_id">Category</label>                                                          <select id="cat_id" name="cat_id"  class="form-control">                                            <option value="">Select Category</option>                                            <?php  if($policy_category !='' && count($policy_category) > 0){                                             foreach($policy_category as $policy_category_data){ ?>                                            <option value="<?php echo $policy_category_data->id; ?>"><?php echo $policy_category_data->name; ?></option>                                              <?php } }  ?>                                                     </select>                                </div>
                                    
                                    <div class="form-group">
                                    <label for="blog_cate_id">Company Name</label>
                                        <span id="prod1">
                                        <select id="company_id" name="company_id"  class="form-control">
                                            <option value="">Select Company Name</option>
                                            <?php  if($all_company_name !='' && count($all_company_name) > 0){ 
                                            foreach($all_company_name as $company_name){ ?>
                                            <option value="<?php echo $company_name->id; ?>"><?php echo $company_name->name; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                    </span>
                                </div>

                                    <div class="form-group">
                                        <label for="plan_name">Plan Name</label>
                                        <input id="plan_name" name="plan_name" type="text" class="form-control" placeholder="Enter Plan Name" />
                                    </div>

                                    <div class="form-group col-md-6" style="display:none">
                                    <label for="blog_cate_id">Sum Insured</label>
                                        <span id="prod1">
                                        <select id="sum_insured_id" name="sum_insured_id[]" class="form-control">
                                            <option value="">Select Sum Insured</option>
                                            <?php  if($all_sum_insured !='' && count($all_sum_insured) > 0){ 
                                            foreach($all_sum_insured as $sum_insured){ ?>
                                            <option value="<?php echo $sum_insured->id; ?>"><?php echo $sum_insured->name; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                    </span>
                                </div>

                                <div class="row" style="display:none">
                                    <div class="form-group col-md-3">
                                        <label for="price">Price</label>
                                        <input id="test_price" name="test_price[]" type="text" class="form-control" placeholder="Enter Price" />
                                    </div>
                                </div>

                                    <div class="input_fields_wrap17">
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -50px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button17">Add More</button>
                                        </div>
                                    </div>

                                   <!--   <div class="form-group">
                                        <label for="price">Price per Year</label>
                                        <input id="price" name="price" type="text" class="form-control" placeholder="Enter Price Per Year" />
                                    </div> -->

                                     <div class="form-group" style="display:none">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Score Detail Image (Size :300px X 300px)</label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                    </div>

                                    <div class="form-group" style="display:none">
                                    <label for="description">Production Description </label>
                                    <textarea type="text" id="pro_desc" name="pro_desc" class="form-control" placeholder="Enter Note"/></textarea>
                                </div>

                       <!---------------- Top Feature -------------- -->

                       <div class="col-md-12" style="margin: 0;padding: 0;display:none">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Top Feature</h3>
                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="top_feature">Title</label>
                                       <input id="top_feature" name="top_feature[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>
                        </div>

                        <div class="input_fields_wrap16">
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button16">Add More</button>
                                        </div>
                                    </div>

                                    <!--------------------------<   __START__ADD__MORE__   >------------------------->

                        <div class="col-md-12" style="margin: 0;padding: 0;display:none">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Coverage</h3>
                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="name">Title</label>
                                       <input id="name" name="name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                                <div class="col-md-10"> 
                                <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" id="description" name="description[]" class="form-control" placeholder="Enter Description"/></textarea>
                                    </div>
                                </div>
                        </div>

                        <div class="input_fields_wrap12">
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12">Add More</button>
                                        </div>
                                    </div>

                         <div class="col-md-12" style="margin: 0;padding: 0;display:none">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Exclusions</h3>
                         <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="title">Title</label>
                                       <input id="title" name="title[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                                <div class="col-md-10"> 
                                <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" id="desc" name="desc[]" class="form-control" placeholder="Enter Description"/></textarea>
                                    </div>
                                </div>
                        </div>
                                <div class="input_fields_wrap13">
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button13">Add More</button>
                                        </div>
                                    </div>

                        <!--    ---   END  ADD MORE   ---  product_emp_benifit update_insurance  -->

                        
                        <div class="form-group" style="display:none">
                                <label for="description">Other Description</label>
                                <textarea type="text" id="other_description" name="other_description" class="form-control" placeholder="Enter Other Description"/></textarea>
                            </div>


                        <div class="form-group" style="display:none">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Download Policy wording</label>
                            <input id="pdf_file" name="pdf_file" type="file" class="form-control" value="" />
                        </div>

                        <div class="form-group" style="display:none">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Download Brochure</label>
                            <input id="brochure" name="brochure" type="file" class="form-control" value="" />
                        </div>

                        <div class="form-group" style="display:none">
                            <label for="csum_insure">Compare Sum Insurer</label>
                            <input id="csum_insure" name="csum_insure" type="text" class="form-control" placeholder="Enter Compare Sum Insurer" value=""/>
                        </div>

                        <div class="col-md-12 " style="margin: 0;padding: 0;display:none">
                            <h3 style="margin-top: 25px;margin-bottom: 0px;">Compare Detail</h3>
                        <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Compare </label>
                                                <select id="compare_id" name="compare_id[]" class="form-control jobtext" Onchange="subcatefory(this.value,0);" jobtext>
                                                    <option value="" >Select Compare</option>
                                                    <?php if ($compare_name != '') {
                                                        for ($k = 0; $k < count($compare_name); $k++) {
                                                            ?>
                                                    <option value='<?php echo $compare_name[$k]->id; ?>'>
                                                        <?php echo $compare_name[$k]->name; ?>
                                                    </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Title </label>

                                                <span id="show_title_ajax_0">
                                                <select id="title_id" name="title_id[]" class="form-control jobtext">
                                                    <option value="" >Select Title</option>
                                                    <?php if ($all_title != '') {
                                                        for ($k = 0; $k < count($all_title); $k++) {
                                                            ?>
                                                    <option value='<?php echo $all_title[$k]->id; ?>'>
                                                        <?php echo $all_title[$k]->name; ?>
                                                    </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">YES/NO</label>
                                                <select id="yes_no" name="yes_no[]" class="form-control jobtext">
                                                    <option value="" selected>Select</option>
                                                    <option value='1'>YES</option>
                                                    <option value='2'>NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Name</label>
                                                <input id="cname" name="cname[]" type="text" class="form-control"
                                                    placeholder="Enter  Name" />
                                            </div>
                                        </div>

                        </div>
                    </div>
                                     <div class="input_fields_wrap15">
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <div class="col-sm-12">
                                            <button style="border: medium none; margin-right: -12px; line-height: 23px;margin-bottom: 10px;" class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button15">Add More </button>
                                        </div>
                                    </div>

                    <div class="col-md-12 " style="margin: 0;padding: 0;display:none">
                        <h3 style="margin-top: 25px;margin-bottom: 0px;">Score Detail</h3><br>
                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">No of coverages Detail</label>
                                    <input id="coverage_detail" name="coverage_detail" type="text" class="form-control" placeholder="Enter No of coverages Score" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">No of coverages Score</label>
                                    <input id="coverage_score" name="coverage_score" type="text" class="form-control" placeholder="Enter No of coverages Score" value="" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Sub limits Detail</label>
                                    <input id="sub_limit_detail" name="sub_limit_detail" type="text" class="form-control" placeholder="Enter Sub limits Detail" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Sub limits Score</label>
                                    <input id="sub_limit_score" name="sub_limit_score" type="text" class="form-control" placeholder="Enter Sub limits Score" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Flexibility of coverage selection Detail</label>
                                    <input id="flexibility_detail" name="flexibility_detail" type="text" class="form-control" placeholder="Enter Flexibility of coverage selection Detail" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Flexibility of coverage selection Score</label>
                                    <input id="flexibility_score" name="flexibility_score" type="text" class="form-control" placeholder="Enter Flexibility of coverage selection Detail" value="" />
                                </div>
                            </div>

                             <div class="col-md-6">
                               <div class="form-group">
                                    <label for="categoryname">Discounts Detail</label>
                                    <input id="discount_detail" name="discount_detail" type="text" class="form-control" placeholder="Enter Discounts Detail" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Discounts Score</label>
                                    <input id="discount_score" name="discount_score" type="text" class="form-control" placeholder="Enter Discounts Score" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="categoryname">Premium (per lac) for Individual Detail</label>
                                    <input id="premium_detail" name="premium_detail" type="text" class="form-control" placeholder="Enter Premium (per lac) for Individual Detail" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Premium (per lac) for Individual Score</label>
                                    <input id="premium_score" name="premium_score" type="text" class="form-control" placeholder="Enter Premium (per lac) for Individual Score" value="" />
                                </div>
                            </div>
                    </div>

                    <div class="form-group" style="display:none">
                    <label for="description">Note </label>
                    <textarea type="text" id="note" name="note" class="form-control" placeholder="Enter Note"/></textarea>
                </div>

                          <div class="form-group">

                                    <div class="form-group">

                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />

                                        <a href="<?php echo $base_url;?>policies_product_repository/lists" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>


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
function validate() {		var cat_id = $("#cat_id").val();    if(cat_id == '')    {        $("#error_msg1").html("Please Enter Category.");        $("#validator").css("display","block");        return false;    }
    var company_id = $("#company_id").val();
    if(company_id == '')
    {
        $("#error_msg1").html("Please Select Company Name.");
        $("#validator").css("display","block");
        return false;
    }
    var plan_name = $("#plan_name").val();
    if(plan_name == ''){
        $("#error_msg1").html("Please Enter Plan Name.");
        $("#validator").css("display","block");
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
<?php include('include/footer.php');?>
</body>
</html>
<!-----------------------------------<  Top Feature  >-------------------------------------------->
<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap16");
    var add_button = $("#add_field_button16");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="top_feature"><div class="col-md-10"> <div class="form-group"><label for="top_feature">Title</label><input id="top_feature" name="top_feature[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/></div></div><a href="#" class="btn btn-danger pull-right remove_field16" style="margin-right: 87px; margin-top: 50px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field16", function(e) {
        e.preventDefault();
        $(this).parent('.top_feature').remove();
        b--;
    })

});

</script>
<!-----------------------------------<  Coverage  >-------------------------------------------->

<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap12");
    var add_button = $("#add_field_button12");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="coverage"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="name" name="name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"><div class="form-group"><label for="description">Description</label><textarea id="description" name="description[]" type="text" class="form-control" placeholder="Enter Description" /></textarea></div></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $(this).parent('.coverage').remove();
        b--;
    })

});

</script>

<!-----------------------------------<  Exclusions  >-------------------------------------------->

<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap13");
    var add_button = $("#add_field_button13");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="exclusions"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="title" name="title[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"><div class="form-group"><label for="description">Description</label><textarea type="text" id="desc" name="desc[]" class="form-control" placeholder="Enter Description"/></textarea></div></div></div><a href="#" class="btn btn-danger pull-right remove_field2" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field2", function(e) {
        e.preventDefault();
        $(this).parent('.exclusions').remove();
        b--;
    })

});

</script>


<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap15");
    var add_button = $("#add_field_button15");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                     '<div class="col-md-12 test"><div class="col-md-3"><div class="form-group"><label for="categoryname">Compare </label><select id="compare_id" name="compare_id[]" class="form-control jobtext" Onchange="subcatefory(this.value,'+b+');" jobtext><option value="" selected>Select Compare</option><?php 
                        if ($compare_name != "") { 

                for ($k = 0; $k < count($compare_name); $k++) { ?><option value="<?php echo $compare_name[$k]->id; ?>"><?php echo $compare_name[$k]->name; ?></option><?php 
                    } 
                    } ?></select></div></div><div class="col-md-3"><div class="form-group"><label for="categoryname">Title </label><span id="show_title_ajax_'+b+'"><select id="title_id" name="title_id[]" class="form-control jobtext"><option value="" selected>Select Compare</option><?php if ($all_title != "") { for ($k = 0; $k < count($all_title); $k++) { ?><option value="<?php echo $all_title[$k]->id; ?>"><?php echo $all_title[$k]->name; ?></option><?php } } ?></select></span></div></div><div class="col-md-3"><div class="form-group"><label for="categoryname">YES/NO</label><select id="yes_no" name="yes_no[]" class="form-control jobtext"><option value="" selected>Select</option><option value="1">YES</option><option value="2">NO</option></select></div></div><div class="col-md-3"><div class="form-group"><label for="categoryname">Name</label><input id="cname" name="cname[]" type="text" class="form-control" placeholder="Enter  Name" /></div></div><a href="#" class="btn btn-danger pull-right remove_field5" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field5", function(e) {
        e.preventDefault();
        $(this).parent('.test').remove();
        b--;
    })

});

</script>

<script type="text/javascript">
    
     function subcatefory(id,add_more_id) {
        // alert(id);
        // alert(add_more_id);
        
    var url = "<?php echo $base_url; ?>policies_product_repository/show_title";
    $.ajax({
        url: url,
        type: 'post',
        data: 'id=' + id,
        success: function(msg) {
            //$('#pro_color').val(color_id);
           document.getElementById('show_title_ajax_'+add_more_id+'').innerHTML = msg ;           

        }
    });
    //get_size_from_finish(product_id,finish_id, color_id);
}
</script>
<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap17");
    var add_button = $("#add_field_button17");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="exclusions"><div class="form-group col-md-6"><label for="blog_cate_id">Sum Insured</label><span id="prod1'+ b +'"><select id="sum_insured_id" name="sum_insured_id[]" class="form-control"><option value="">Select Sum Insured</option><?php  
                if($all_sum_insured !="" && count($all_sum_insured) > 0){ 
                    foreach($all_sum_insured as $sum_insured){ 
                        ?><option value="<?php echo $sum_insured->id; ?>"><?php echo $sum_insured->name; ?></option><?php } }  ?></select></span></div><div class="form-group col-md-3"><label for="price">Price per Year</label><input id="test_price" name="test_price[]" type="text" class="form-control" placeholder="Enter Price" /></div><a href="#" class="btn btn-danger pull-right remove_field2" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field2", function(e) {
        e.preventDefault();
        $(this).parent('.exclusions').remove();
        b--;
    })

});

</script>
<!-- <script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
$('.multiple-select').fSelect();
</script> -->

