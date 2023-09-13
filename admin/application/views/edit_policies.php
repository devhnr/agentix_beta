<?php include('include/header.php');?>
<!-- Start: Main -->
<style>
.rfa_multiple_select #prod1 .multiple {
    padding: 0;
    margin-bottom: 15px;
}
</style>
<link href="<?php echo $base_url_views; ?>css/fSelect.css" rel="stylesheet">
<link href="<?php echo $base_url_views; ?>css/mediaBoxes.css" rel="stylesheet">
<div id="main">

    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">

        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Policies</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>policies/lists">Policies</a></li>

                    <li class="crumb-trail">Edit Policies</li>

                </ol>

            </div>

        </div>

        <div id="content">

            <div class="row">

                <div class="col-md-12">


                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Edit Policies</span> </div>

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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>policies/edit/<?php echo $id; ?>" enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_policies">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">																											<div class="form-group">                                        <label style="width:100%;" for="product_name">Category</label>                                        <select name="cat_id" id="cat_id" class="form-control" />                                        <option value=''>Select Category</option>                                        <?php  if($policy_category !='' && count($policy_category) > 0){                                         foreach($policy_category as $policy_category_data){                                         ?>                                        <option value="<?php echo $policy_category_data->id; ?>"                                            <?php if($policy_category_data->id==$cat_id){ echo "selected";} ?>>                                            <?php echo $policy_category_data->name; ?>                                        </option>                                        <?php } } ?>                                        </select>                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%;" for="product_name">Company Name</label>
                                        <select name="company_id" id="company_id" class="form-control" placeholder="Select Company Name" />
                                        <option value=''>Select Company Name</option>
                                        <?php  if($all_company_name !='' && count($all_company_name) > 0){ 
                                        foreach($all_company_name as $company_name){ 
                                        ?>
                                        <option value="<?php echo $company_name->id; ?>"
                                            <?php if($company_name->id==$company_id){ echo "selected";} ?>>
                                            <?php echo $company_name->name; ?>
                                        </option>
                                        <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="plan_name">Plan Name</label>
                                        <input id="plan_name" name="plan_name" type="text" class="form-control" placeholder="Enter Plan Name" value="<?php echo $plan_name?>"/>
                                    </div>


                                    <!-- <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0px;">Compare Detail</h3> -->
                            <?php if ($sum_insuranc_data != '') { ?>
                                    <input type="hidden" name="sum_insured_id1[]" value="">
                                    <input type="hidden" name="test_price1[]" value="">
                                    <?php
                                        for ($i = 0; $i < count($sum_insuranc_data); $i++) {
                                            // echo "<pre>";print_r($sum_insuranc_data);echo "</pre>";exit;
                                            ?>
                                    <input type="hidden" name="updateid1xxx4141[]" id="updateid1xxx4141<?php echo $i + 1; ?>" value="<?php echo $sum_insuranc_data[$i]->id; ?>">

                                    <div class="col-md-12">
                                         <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label for="categoryname">Sum Insured </label>
                                                <select id="sum_insured_id<?php echo $i + 1; ?>" name="sum_insured_idu[]"
                                                    class="form-control jobtext">
                                                    <option value="" selected>Select Sum Insured</option>
                                                    <?php
                                                    if ($all_sum_insured != '') {
                                                        for ($k = 0; $k < count($all_sum_insured); $k++) {
                                                            ?>
                                                    <option value='<?php echo $all_sum_insured[$k]->id; ?>' <?php if ($sum_insuranc_data[$i]->sum_insured_id == $all_sum_insured[$k]->id) {
                                                                        echo "selected";
                                                                    } ?>>
                                                        <?php echo $all_sum_insured[$k]->name; ?>
                                                    </option>
                                                    <?php }
                                                                } ?>
                                                </select>
                                            </div>
                                        </div>                                

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input id="price<?php echo $i + 1; ?>" name="test_priceu[]" type="text"
                                                    class="form-control" placeholder="Enter Price"
                                                    value="<?php echo $sum_insuranc_data[$i]->price; ?>" />
                                            </div>
                                        </div>
                                        <a href="#"
                                            onclick="singledelete05('<?php echo $base_url . "policies/remove_sum_insuranc/"; ?><?php echo $sum_insuranc_data[$i]->sins_id; ?>/<?php echo $sum_insuranc_data[$i]->id; ?>');"
                                            href="javascript:void(0);" style="/* margin-right: 87px; */  margin-top: 22px; margin-bottom: 10px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                    </div>
                              
                                    <?php }
                                        } else { ?>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                    <label for="blog_cate_id">Sum Insured</label>
                                        <span id="prod1">
                                        <select id="sum_insured_id1" name="sum_insured_id1[]" class="form-control">
                                            <option value="">Select Sum Insured</option>
                                            <?php  if($all_sum_insured !='' && count($all_sum_insured) > 0){ 
                                            foreach($all_sum_insured as $sum_insured){ ?>
                                            <option value="<?php echo $sum_insured->id; ?>"><?php echo $sum_insured->name; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                        </span>
                                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Price</label>
                                                <input id="test_price1" name="test_price1[]" type="text" class="form-control"
                                                    placeholder="Enter Price" />
                                            </div>
                                        </div>

                                    </div>
                                    <?php } ?>

                                    <div class="input_fields_wrap17">

                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <button

                                                style="border: medium none; /* margin-right: -12px; */ line-height: 23px;  margin-top: -29px; "

                                                class="submit btn bg-purple pull-right" type="button"

                                                id="add_field_button17">Add More</button>

                                        </div>

                                    </div>

                                  <!--   <div class="form-group">
                                        <label for="price">Price per Year</label>
                                        <input id="price" name="price" type="text" class="form-control" placeholder="Enter Price Per Year" value="<?php echo $price?>"/>
                                    </div> -->

                                     <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Score Detail Image (Size :300px X 300px)</label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url; ?>upload/policies_image/score_detail/medium/<?php echo $image; ?>"
                                            height="50" width="50">
                                    </div>

                                    <div class="form-group">
                                    <label for="description">Production Description </label>
                                    <textarea type="text" id="pro_desc" name="pro_desc" class="form-control" placeholder="Enter Production Description"/><?php echo $pro_desc?></textarea>
                                </div>

                                    <!-- ---------- Top Feature ------- -->

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0px;">Top Feature</h3>
                                    <?php
                                    //echo "<pre>";print_r($exclusion_item);echo "</pre>";exit;
                                     if ($top_feature_item != '') { ?>
                                    <input type="hidden" name="top_feature1[]" value="">
                                    <?php
                                        for ($i = 0; $i < count($top_feature_item); $i++) {
                                            ?>
                                    <input type="hidden" name="updateid1xxx333[]" id="updateid1xxx333<?php echo $i + 1; ?>"
                                        value="<?php echo $top_feature_item[$i]->id; ?>">

                                    <div class="col-md-12">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input id="name<?php echo $i + 1; ?>" name="top_featureu[]" type="text"
                                                    class="form-control" placeholder="Enter Title"
                                                    value="<?php echo $top_feature_item[$i]->name; ?>" />
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-10"> 
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="descu[]" type="text" class="form-control" placeholder="Enter Description" /><?php echo $top_feature_item[$i]->description; ?></textarea>
                                        </div>
                                    </div> -->
                                        <a href="#"
                                            onclick="singledelete4('<?php echo $base_url . "policies/remove_topFeature/"; ?><?php echo $top_feature_item[$i]->p_id; ?>/<?php echo $top_feature_item[$i]->id; ?>');"
                                            href="javascript:void(0);" style="margin-right: 87px; margin-top: 22px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                    </div>

                                    <?php }
                                        } else { ?>
                                    <div class="col-md-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="top_feature1">Title</label>
                                                <input id="top_feature1" name="top_feature1[]" type="text" class="form-control"
                                                    placeholder="Enter Title" value="" />
                                            </div>
                                        </div>

                                       <!--  <div class="col-md-10"> 
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="desc1" name="desc1[]" type="text" class="form-control" placeholder="Enter Description" /></textarea>
                                            </div>
                                        </div> -->
                                    </div>

                                    <?php } ?>
                                    <div class="input_fields_wrap16">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button16">Add more</button>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0px;">Coverage</h3>
                                    <?php
                                    //echo "<pre>";print_r($addition_item);echo "</pre>";exit;
                                     if ($addition_item != '') { ?>
                                    <input type="hidden" name="title1[]" value="">
                                    <input type="hidden" name="description1[]" value="">
                                    <?php
                                        for ($i = 0; $i < count($addition_item); $i++) {
                                            ?>
                                    <input type="hidden" name="updateid1xxx[]" id="updateid1xxx<?php echo $i + 1; ?>"
                                        value="<?php echo $addition_item[$i]->id; ?>">

                                    <div class="col-md-12">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title<?php echo $i + 1; ?>" name="titleu[]" type="text"
                                                    class="form-control" placeholder="Enter Title"
                                                    value="<?php echo $addition_item[$i]->name; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-10"> 
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="descriptionu[]" type="text" class="form-control" placeholder="Enter Description" /><?php echo $addition_item[$i]->description; ?></textarea>
                                        </div>
                                    </div>
                                        <a href="#"
                                            onclick="singledelete('<?php echo $base_url . "policies/removeprice/"; ?><?php echo $addition_item[$i]->c_id; ?>/<?php echo $addition_item[$i]->id; ?>');"
                                            href="javascript:void(0);" style="margin-right: 87px; margin-top: 22px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                    </div>

                                    <?php }
                                        } else { ?>
                                    <div class="col-md-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" name="title1[]" type="text" class="form-control"
                                                    placeholder="Enter Title" value="" />
                                            </div>
                                        </div>

                                        <div class="col-md-10"> 
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description1" name="description1[]" type="text" class="form-control" placeholder="Enter Description" /></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>
                                    <div class="input_fields_wrap12">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12">Add more</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- ---------- Exclusions ------- -->

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0px;">Exclusions</h3>
                                    <?php
                                    //echo "<pre>";print_r($exclusion_item);echo "</pre>";exit;
                                     if ($exclusion_item != '') { ?>
                                    <input type="hidden" name="name1[]" value="">
                                    <input type="hidden" name="desc1[]" value="">
                                    <?php
                                        for ($i = 0; $i < count($exclusion_item); $i++) {
                                            ?>
                                    <input type="hidden" name="updateid1xxx1[]" id="updateid1xxx1<?php echo $i + 1; ?>"
                                        value="<?php echo $exclusion_item[$i]->id; ?>">

                                    <div class="col-md-12">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input id="name<?php echo $i + 1; ?>" name="nameu[]" type="text"
                                                    class="form-control" placeholder="Enter Title"
                                                    value="<?php echo $exclusion_item[$i]->title; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-10"> 
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="descu[]" type="text" class="form-control" placeholder="Enter Description" /><?php echo $exclusion_item[$i]->description; ?></textarea>
                                        </div>
                                    </div>
                                        <a href="#"
                                            onclick="singledelete1('<?php echo $base_url . "policies/remove_exclusion/"; ?><?php echo $exclusion_item[$i]->excl_id; ?>/<?php echo $exclusion_item[$i]->id; ?>');"
                                            href="javascript:void(0);" style="margin-right: 87px; margin-top: 22px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                    </div>

                                    <?php }
                                        } else { ?>
                                    <div class="col-md-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input id="name" name="name1[]" type="text" class="form-control"
                                                    placeholder="Enter Title" value="" />
                                            </div>
                                        </div>

                                        <div class="col-md-10"> 
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="desc1" name="desc1[]" type="text" class="form-control" placeholder="Enter Description" /></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>
                                    <div class="input_fields_wrap13">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button13">Add more</button>
                                        </div>
                                    </div>
                                </div>

                              <div class="form-group">
                                <label for="description">Other Description</label>
                                <textarea type="text" id="other_description" name="other_description" class="form-control" placeholder="Enter Other Description"/><?php echo $other_description?></textarea>
                            </div>

                            <div class="form-group">
                                <label style="width:100%; margin:15px 0 5px;" for="name">Download Policy worlding</label>
                                <input id="pdf_file" name="pdf_file" type="file" class="form-control" value="<?php echo $pdf_file?>" /> 
                                <input type="text" name="pdf_file" value="<?php echo $pdf_file?>" style="border:none;">
                            </div>

                            <div class="form-group">
                                <label style="width:100%; margin:15px 0 5px;" for="name">Download Brochure</label>
                                <input id="brochure" name="brochure" type="file" class="form-control" />
                                <input type="text" name="brochure" value="<?php echo $brochure?>" style="border:none;">
                            </div>

                            <div class="form-group">
                                <label for="csum_insure">Compare Sum Insurer</label>
                                <input id="csum_insure" name="csum_insure" type="text" class="form-control" placeholder="Enter Compare Sum Insurer" value="<?php echo $csum_insure?>"/>
                            </div>

                             <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0px;">Compare Detail</h3>
                            <?php if ($addition_detail != '') { ?>
                                    <input type="hidden" name="compare_id1[]" value="">
                                    <input type="hidden" name="title_id1[]" value="">
                                    <input type="hidden" name="yes_no1[]" value="">
                                    <input type="hidden" name="cname1[]" value="">
                                    <?php
                                        for ($i = 0; $i < count($addition_detail); $i++) {
                                            // echo "<pre>";print_r($addition_detail);echo "</pre>";exit;
                                            ?>
                                    <input type="hidden" name="updateid1xxx222[]" id="updateid1xxx222<?php echo $i + 1; ?>" value="<?php echo $addition_detail[$i]->id; ?>">

                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Compare </label>
                                                <select id="compare_id<?php echo $i + 1; ?>" Onchange="subcatefory_edit(this.value,'<?php echo $addition_detail[$i]->id; ?>');" name="compare_idu[]"
                                                    class="form-control jobtext">
                                                    <option value="" selected>Select Compare</option>
                                                    <?php
                                                            if ($compare_name != '') {
                                                                for ($k = 0; $k < count($compare_name); $k++) {
                                                                    ?>
                                                    <option value='<?php echo $compare_name[$k]->id; ?>' <?php if ($addition_detail[$i]->compare_id == $compare_name[$k]->id) {
                                                                        echo "selected";
                                                                    } ?>>
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

                                                <span id="show_title_ajax_<?php echo $addition_detail[$i]->id; ?>">
                                                <select id="title_id<?php echo $i + 1; ?>" name="title_idu[]"
                                                    class="form-control  jobtext" >
                                                    <option value="" selected>Select Title</option>
                                                    <?php
                                                            if ($all_title != '') {
                                                                for ($k = 0; $k < count($all_title); $k++) {
                                                                    ?>
                                                    <option value='<?php echo $all_title[$k]->id; ?>' <?php if ($addition_detail[$i]->title_id == $all_title[$k]->id) {
                                                                        echo "selected";
                                                                    } ?>>
                                                        <?php echo $all_title[$k]->name; ?>
                                                    </option>
                                                    <?php } } ?>
                                                </select>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">YES/NO </label>
                                                <select id="yes_no" name="yes_nou[]"
                                                    class="form-control jobtext">
                                                    <option value="" selected>Select</option>
                                                    <option <?php if($addition_detail[$i]->yes_no == '1'){echo "selected";}?> value='1'>YES</option>
                                                    <option <?php if($addition_detail[$i]->yes_no == '2'){echo "selected";}?> value='2' >NO</option>
                                                </select>
                                            </div>
                                        </div>                                       

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name<?php echo $i + 1; ?>" name="cnameu[]" type="text"
                                                    class="form-control" placeholder="Enter Name"
                                                    value="<?php echo $addition_detail[$i]->name; ?>" />
                                            </div>
                                        </div>
                                        <a href="#"
                                            onclick="singledelete3('<?php echo $base_url . "policies/remove_compare/"; ?><?php echo $addition_detail[$i]->policies_id; ?>/<?php echo $addition_detail[$i]->id; ?>');"
                                            href="javascript:void(0);" style="/* margin-right: 87px; */ /* margin-top: 22px; */margin-bottom: 10px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                    </div>
                              
                                    <?php }
                                        } else { ?>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Compare </label>
                                                <select id="compare_id1" name="compare_id1[]" class="form-control jobtext">
                                                    <option value="" selected>Select Compare</option>
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
                                                <select id="title_id1" name="title_id1[]" class="form-control jobtext" Onchange="subcatefory(this.value,0);">
                                                    <option value="" selected>Select Compare</option>
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
                                                <select id="yes_no" name="yes_no1[]" class="form-control jobtext">
                                                    <option value="" selected>Select</option>
                                                    <option value='1'>YES</option>
                                                    <option value='2'>NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoryname">Name</label>
                                                <input id="cname1" name="cname1[]" type="text" class="form-control"
                                                    placeholder="Enter  Name" />
                                            </div>
                                        </div>

                                    </div>
                                    <?php } ?>

                                    <div class="input_fields_wrap15">

                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <button

                                                style="border: medium none; /* margin-right: -12px; */ line-height: 23px; /* margin-top: -49px; */"

                                                class="submit btn bg-purple pull-right" type="button"

                                                id="add_field_button15">Add More</button>

                                        </div>

                                    </div>

                    <div class="col-md-12 " style="margin: 0;padding: 0;">
                        <h3 style="margin-top: 25px;margin-bottom: 0px;">Score Detail</h3><br>
                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">No of coverages Detail</label>
                                    <input id="coverage_detail" name="coverage_detail" type="text" class="form-control" placeholder="Enter No of coverages Score" value="<?php echo $coverage_detail?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">No of coverages Score</label>
                                    <input id="coverage_score" name="coverage_score" type="text" class="form-control" placeholder="Enter No of coverages Score" value="<?php echo $coverage_score?>" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Sub limits Detail</label>
                                    <input id="sub_limit_detail" name="sub_limit_detail" type="text" class="form-control" placeholder="Enter Sub limits Detail" value="<?php echo $sub_limit_detail?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Sub limits Score</label>
                                    <input id="sub_limit_score" name="sub_limit_score" type="text" class="form-control" placeholder="Enter Sub limits Score" value="<?php echo $sub_limit_score?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Flexibility of coverage selection Detail</label>
                                    <input id="flexibility_detail" name="flexibility_detail" type="text" class="form-control" placeholder="Enter Flexibility of coverage selection Detail" value="<?php echo $flexibility_detail?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Flexibility of coverage selection Score</label>
                                    <input id="flexibility_score" name="flexibility_score" type="text" class="form-control" placeholder="Enter Flexibility of coverage selection Detail" value="<?php echo $flexibility_score?>" />
                                </div>
                            </div>

                             <div class="col-md-6">
                               <div class="form-group">
                                    <label for="categoryname">Discounts Detail</label>
                                    <input id="discount_detail" name="discount_detail" type="text" class="form-control" placeholder="Enter Discounts Detail" value="<?php echo $discount_detail?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Discounts Score</label>
                                    <input id="discount_score" name="discount_score" type="text" class="form-control" placeholder="Enter Discounts Score" value="<?php echo $discount_score?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="categoryname">Premium (per lac) for Individual Detail</label>
                                    <input id="premium_detail" name="premium_detail" type="text" class="form-control" placeholder="Enter Premium (per lac) for Individual Detail" value="<?php echo $premium_detail?>" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryname">Premium (per lac) for Individual Score</label>
                                    <input id="premium_score" name="premium_score" type="text" class="form-control" placeholder="Enter Premium (per lac) for Individual Score" value="<?php echo $premium_score?>" />
                                </div>
                            </div>
                    </div>

                    <div class="form-group">
                    <label for="description">Note </label>
                    <textarea type="text" id="note" name="note" class="form-control" placeholder="Enter Note"/><?php echo $note?></textarea>
                </div>
                          <!--    <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Theft of funds</h3>
                        <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Theft of funds from bank account, credit/debit card or digital wallets</label>
                          <input id="theft_fund" <?php if($theft_fund == 1){echo "checked";}?> name="theft_fund" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="theft_fund" <?php if($theft_fund == 2){echo "checked";}?> name="theft_fund" type="radio" value="2" />&nbsp;NO
                      </div>

                      <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Financial loss as a result of phishing/ email spoofing</label>
                          <input id="result_phishing" <?php if($result_phishing == 1){echo "checked";}?> name="result_phishing" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="result_phishing" <?php if($result_phishing == 2){echo "checked";}?> name="result_phishing" type="radio" value="2" />&nbsp;NO
                      </div>
                       </div>


                        <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Identity Theft</h3>
                        <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Lost wages</label>
                          <input id="lost_wages" name="lost_wages" <?php if($lost_wages == 1){echo "checked";}?> type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="lost_wages" name="lost_wages" <?php if($lost_wages == 2){echo "checked";}?> type="radio" value="2" />&nbsp;NO
                      </div>
                       <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Costs incurred in credit monitoring services and identity monitoring</label>
                          <input id="monitoring_services" <?php if($monitoring_services == 1){echo "checked";}?> name="monitoring_services" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="monitoring_services" <?php if($monitoring_services == 2){echo "checked";}?> name="monitoring_services" type="radio" value="2" />&nbsp;NO
                      </div>
                  </div>


                  <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Data Restoration / Malware Decontamination</h3>
                        <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Data restoration cost</label>
                          <input id="restoration_cost" <?php if($restoration_cost == 1){echo "checked";}?> name="restoration_cost" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="restoration_cost" <?php if($restoration_cost == 2){echo "checked";}?> name="restoration_cost" type="radio" value="2" />&nbsp;NO
                      </div>
                       <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">IT expert cost</label>
                          <input id="expert_cost" <?php if($expert_cost == 1){echo "checked";}?>  name="expert_cost" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="expert_cost" <?php if($expert_cost == 2){echo "checked";}?> name="expert_cost" type="radio" value="2" />&nbsp;NO
                      </div>

                       <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Legal Costs</label>
                          <input id="legal_costs" <?php if($legal_costs == 1){echo "checked";}?> name="legal_costs" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="legal_costs" <?php if($legal_costs == 2){echo "checked";}?> name="legal_costs" type="radio" value="2" />&nbsp;NO
                      </div>

                       <div class="form-group">
                            <label style="width:100%; margin:15px 0 5px;" for="name">Lost Wages</label>
                          <input id="lost_wages2" <?php if($lost_wages2 == 1){echo "checked";}?> name="lost_wages2" type="radio" value="1" />&nbsp;YES&nbsp;&nbsp;
                          <input id="lost_wages2" <?php if($lost_wages2 == 2){echo "checked";}?> name="lost_wages2" type="radio" value="2" />&nbsp;NO
                      </div>
                  </div> -->
                           

                            <div class="form-group">

                                <input class="submit btn bg-purple pull-right" type="submit" value="Update" onclick="javascript:validate();return false;" style="margin-top: 15px;" />

                                <a href="<?php echo $base_url;?>policies/lists" class="submit btn bg-purple pull-right"
                                    style="margin-right: 10px;margin-top: 15px;" />Cancel</a>
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
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script>
function singledelete(url) {
    window.location.href = url;
}
</script>
<script>
function singledelete1(url) {
    window.location.href = url;
}
</script>
<script>
function singledelete3(url) {
    window.location.href = url;
}
</script>
<script>
function singledelete4(url) {
    window.location.href = url;
}
</script>
<script>
function singledelete05(url) {
    window.location.href = url;
}
</script>
<script>

function validate() {

    var cat_id = $("#cat_id").val();
    if(cat_id == '')
    {
        $("#error_msg1").html("Please Enter Category.");
        $("#validator").css("display","block");
        return false;
    }		var company_id = $("#company_id").val();
    if(company_id == '')
    {
        $("#error_msg1").html("Please Enter Company Name.");
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

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap17");
    var add_button = $("#add_field_button17");
    var b = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="form-group col-md-6"><label for="blog_cate_id">Sum Insured</label><span id="prod1"><select id="sum_insured_id1" name="sum_insured_id1[]" class="form-control"><option value="">Select Sum Insured</option><?php 
                if($all_sum_insured !='' && count($all_sum_insured) > 0){ 
                    foreach($all_sum_insured as $sum_insured){ ?><option value="<?php echo $sum_insured->id; ?>"><?php echo $sum_insured->name; ?></option><?php } }  ?></select></span></div><div class="col-md-3"><div class="form-group"><label for="categoryname">Price</label><input id="test_price1" name="test_price1[]" type="text" class="form-control"placeholder="Enter Price" /></div></div><a href="#" class="btn btn-danger pull-right remove_field5" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field5", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>

<!-----------------------------------<  Top Feature  >-------------------------------------------->
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap16");
    var add_button = $("#add_field_button16");
    var b = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-10"><div class="form-group"><label for="top_feature1">Title</label><input id="top_feature1" name="top_feature1[]" type="text" class="form-control" placeholder="Enter Title" value="" /></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap12");
    var add_button = $("#add_field_button12");
    var b = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-10"><div class="form-group"><label for="title">Title</label><input id="title" name="title1[]" type="text" class="form-control" placeholder="Enter Title" value="" /></div></div><div class="col-md-10"><div class="form-group"><label for="description">Description</label><textarea id="description1" name="description1[]" type="text" class="form-control" placeholder="Enter Description" /></textarea></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap13");
    var add_button = $("#add_field_button13");
    var b = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-10"><div class="form-group"><label for="title">Title</label><input id="name" name="name1[]" type="text" class="form-control" placeholder="Enter Title" value="" /></div></div><div class="col-md-10"><div class="form-group"><label for="description">Description</label><textarea id="desc1" name="desc1[]" type="text" class="form-control" placeholder="Enter Description" /></textarea></div></div><a href="#" class="btn btn-danger pull-right remove_field2" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field2", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
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

        e.preventDefault();

        if (b < max_fields) {

            b++;

            $(wrapper).append(

                '<div class="test"><div class="col-md-12"><div class="col-md-3"><div class="form-group"><label for="categoryname">Compare </label><select id="compare_id1' + b +'" name="compare_id1[]" Onchange="subcatefory(this.value,'+b+');" class="form-control jobtext"><option value="" selected>Select Compare</option><?php if ($compare_name != '') { for ($k = 0; $k < count($compare_name); $k++) { ?><option value="<?php echo $compare_name[$k]->id; ?>"><?php echo $compare_name[$k]->name; ?></option><?php } } ?></select></div></div><div class="col-md-3"><div class="form-group"><label for="categoryname">Title </label><span id="show_title_ajax_'+b+'"><select id="title_id1' + b +'" name="title_id1[]"  class="form-control jobtext"><option value="" selected>Select Compare</option><?php if ($all_title != "") { for ($k = 0; $k < count($all_title); $k++) { ?><option value="<?php echo $all_title[$k]->id; ?>"><?php echo $all_title[$k]->name; ?></option><?php } } ?></select></span></div></div><div class="col-md-3"><div class="form-group"><label for="categoryname">YES/NO</label><select id="yes_no' + b +'" name="yes_no1[]" class="form-control jobtext"><option value="" selected>Select</option><option value="1">YES</option><option value="2">NO</option></select></div></div><div class="col-md-3"><div class="form-group"><label for="categoryname">Name</label><input id="cname1" name="cname1[]" type="text" class="form-control" placeholder="Enter  Name" /></div></div></div><a href="#" class="btn btn-danger pull-right remove_field5" style="/* margin-right: 87px; */ /* margin-top: 24px; */margin-bottom: 10px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field5", function(e) {
        // alert('test');
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
        
    var url = "<?php echo $base_url; ?>policies/show_title_edit";
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

<script type="text/javascript">
    
     function subcatefory_edit(id,add_more_id) {
        // alert(id);
        // alert(add_more_id);
        
    var url = "<?php echo $base_url; ?>policies/show_title_update";
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
<script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
$('#grid').mediaBoxes({
    filterContainer: '#filter',
    search: '#search',
    selectAll: true,
    columns: 3,
    boxesToLoadStart: 9,
    boxesToLoad: 9,
    horizontalSpaceBetweenBoxes: 30,
    verticalSpaceBetweenBoxes: 30,
    minBoxesPerFilter: 20,
    deepLinkingOnFilter: false,
    fancybox: {
        thumbs: {
            autoStart: true
        }, // Display thumbnails on opening/closing
    }
});

$('#grid2').mediaBoxes({
    filterContainer: '#filter2',
    search: '#search',
    selectAll: true,
    columns: 3,
    boxesToLoadStart: 10,
    boxesToLoad: 9,
    horizontalSpaceBetweenBoxes: 20,
    verticalSpaceBetweenBoxes: 20,
    minBoxesPerFilter: 20,
    deepLinkingOnFilter: false,
});

$('.multiple-select').fSelect();
// $('.rfa_multiple_select .fs-wrap').addClass('col-sm-12');
// $('.rfa_multiple_select .fs-label').text('Select Category');
// $('#rfa_multiple_select2 .fs-label').text('Select Product');
// $('#rfa_multiple_selectOccasion .fs-label').text('Select Occasion');
// $('#rfa_multiple_selectFabric .fs-label').text('Select Fabric');
// $('#more_colors .fs-label').text('Select More Color Products');
</script>