<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Product</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>product/lists">Product</a></li>
                    <li class="crumb-trail">Add a Product</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Product </span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>product/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_product">

                                     <div class="form-group">
                                    <label for="category_id" style="width:100%;margin:15px 0 5px;">Category</label>
                                        <span id="prod1">
                                        <select id="category_id" name="category_id"  class="form-control">
                                            <option value="">Select Category</option>
                                            <?php  if($all_category !='' && count($all_category) > 0){ 
                                            foreach($all_category as $category_detail){ ?>
                                            <option value="<?php echo $category_detail->id; ?>"><?php echo $category_detail->name; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                    </span>
                                </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Name" value="" />
                                    </div>

                                     <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Page Url
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Name" value="" />
                                    </div>

                                    <div class="col-md-12" style="margin-top:10px;">
                                    <h4>Group Health Insurance</h4>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Title
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="title_1" name="title_1" type="text" class="form-control"
                                            placeholder="Enter Title" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Title 2
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="title_2" name="title_2" type="text" class="form-control"
                                            placeholder="Enter Title 2" value="" />
                                    </div>


                                        <div class="form-group">
                                            <label for="short_description" style="margin:15px 0 5px 0px; width:100%;">Short Description</label>
                                            <textarea id="short_description" name="short_description" class="form-control"
                                                placeholder="Enter Short Description"></textarea>
                                        </div>

                                        <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Get a Quote
                                        </label>
                                        <input id="get_quote" name="get_quote" type="radio"
                                            placeholder="Enter Name" value="1" <?php if($get_quote == 1){echo "checked";}?>/> Popup &nbsp;&nbsp;

                                        <input id="get_quote" name="get_quote" type="radio"
                                            placeholder="Enter Name" value="2" /> Form
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size : 500px X 500px)
                                        </label>
                                        <input type="file" id="image" name="image" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Universe of Employee Benefits</h3>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title1" name="main_title1" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                            <div class="col-md-10">
                             <div class="form-group">
                                <label for="group_ins_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="uniemp_desc" name="uniemp_desc" class="form-control"
                                           placeholder="Enter Short Description"></textarea>
                              </div>
                            </div>


                            <div class="col-md-10" style="padding-left: 0;">
                                <div class="form-group">
                                    <label style="width:100%; margin:15px 0 5px;" for="emp_image">
                                    Image (Size : 100px X 100px ) </label>
                                    <input id="emp_image" name="s_image_0" type="file" class="form-control " value =""/>
                                </div>
                           </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="title" name="title[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="emp_benefit_desc" name="emp_benefit_desc[]" class="form-control"
                                           placeholder="Enter Short Description"></textarea>
                              </div>
                            </div>
                       

                        <div class="input_fields_wrap12">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12">Add More</button>
                                        </div>
                                    </div>
                                     </div>
                                     <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">


                         <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;">Table of Content</h3>
                        <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_1">Section 1</label>
                               <input id="section_1" name="section_1" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="name">Display</label>
                               <select id="display_1" name="display_1" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                      <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_2">Section 2</label>
                               <input id="section_2" name="section_2" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="name">Display</label>
                               <select id="display_2" name="display_2" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_3">Section 3</label>
                               <input id="section_3" name="section_3" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_3">Display</label>
                               <select id="display_3" name="display_3" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_4">Section 4</label>
                               <input id="section_4" name="section_4" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_4">Display</label>
                               <select id="display_4" name="display_4" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_5">Section 5</label>
                               <input id="section_5" name="section_5" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_5">Display</label>
                               <select id="display_5" name="display_5" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_6">Section 6</label>
                               <input id="section_6" name="section_6" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_6">Display</label>
                               <select id="display_6" name="display_6" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_7">Section 7</label>
                               <input id="section_7" name="section_7" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_7">Display</label>
                               <select id="display_7" name="display_7" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_8">Section 8</label>
                               <input id="section_8" name="section_8" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_8">Display</label>
                               <select id="display_8" name="display_8" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1">Yes</option>
                                   <option value="2">No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                        </div>

                        <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Section 1</h3>

                             <div class="form-group">
                                       <label for="name">Title</label>
                                       <input id="group_title" name="group_title" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>

                                <div class="form-group">
                                    <label for="description" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                    <textarea id="description" name="description" class="form-control"
                                        placeholder="Enter Description"></textarea>
                                </div>

                                  <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size : 500px X 502px)
                                        </label>
                                        <input type="file" id="gimage" name="gimage" class="form-control"/>
                                    </div>
                        </div>

                        <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                         <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;margin-bottom: 0;">Section 2</h3>

                             <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title2" name="main_title2" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                             <div class="form-group">
                                <label for="section_two_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="section_two_desc" name="section_two_desc" class="form-control"
                                           placeholder="Enter Short Description"></textarea>
                              </div>

                            <div class="col-md-10" style="padding-left: 0;">
                                <div class="form-group">
                                    <label style="width:100%; margin:15px 0 5px;" for="emp_image">
                                    Image (Size : 100px X 100px ) </label>
                                    <input id="section2_" name="section2_0" type="file" class="form-control " value =""/>
                                </div>
                           </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="sec2_title" name="sec2_title[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="group_ins_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="group_ins_desc" name="group_ins_desc[]" class="form-control"
                                           placeholder="Enter Short Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap13">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button13">Add More</button>
                                        </div>
                                    </div>
                            </div>
                            <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                                <!--------------- Advantages of Group Health Insurance ------------>

                                    <div class="col-md-12" style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 3</h3>

                                    <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title3" name="main_title3" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                                    <div class="col-md-10">
                                    <div class="form-group">
                                    <label for="advantage_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                    <textarea id="advantage_desc" name="advantage_desc" class="form-control"
                                               placeholder="Enter Short Description"></textarea>
                                     </div>
                                </div>

                                     <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Display
                                        </label>
                                        <input id="for_employee" name="for_employee[]" type="radio" value="1" checked/>&nbsp;&nbsp;For Employer &nbsp;&nbsp;

                                        <input id="for_employee" name="for_employee[]" type="radio" value="2" /> For Employees
                                    </div>

                                    <div class="col-md-10" style="padding-left: 0;">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="emp_image">
                                            Image (Size : 100px X 100px ) </label>
                                            <input id="emp_image" name="sec3_image_0" type="file" class="form-control " value =""/>
                                        </div>
                                   </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="section3_name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="section3_name" name="section3_name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="section3_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="section3_desc" name="section3_desc[]" class="form-control"
                                           placeholder="Enter Short Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap14">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button14">Add More</button>
                                        </div>
                                    </div>
                            </div>
                            <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">
                                 <!--------------- Features of Group Health Insurance ------------>

                                    <div class="col-md-12" style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 4</h3>

                                     <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title4" name="main_title4" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>
                                    

                                    <div class="col-md-10" style="padding-left: 0;">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="emp_image">
                                            Image (Size : 100px X 100px ) </label>
                                            <input id="feature_image" name="feature_image_0" type="file" class="form-control " value =""/>
                                        </div>
                                   </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="feature_name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="feature_name" name="feature_name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="feature_desc" name="feature_desc[]" class="form-control"
                                           placeholder="Enter Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap15">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button15">Add More</button>
                                        </div>
                                    </div>
                        </div>
                        <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">
                        <!--------------- Why buy Group Health Insurance from Raghnall ? ------------>

                                    <div class="col-md-12" style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 5</h3>

                                    <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title5" name="main_title5" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                                   <!--   <div class="col-md-10">
                                    <div class="form-group">
                                    <label for="whybuygroup_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                    <textarea id="whybuygroup_desc" name="whybuygroup_desc" class="form-control"
                                               placeholder="Enter Short Description"></textarea>
                                     </div>
                                </div> -->

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="feature_name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="whybuy_name" name="whybuy_name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="whybuy_desc" name="whybuy_desc[]" class="form-control"
                                           placeholder="Enter Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap16">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button16">Add More</button>
                                        </div>
                                    </div>
                        </div>
                        <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                                     <!--------------- Who should buy Group Health Insurance ? ------------>

                                    <div class="col-md-12" style="margin: 0;padding: 0;">
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 6</h3>
                                    
                                     <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title6" name="main_title6" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                                    <!-- <div class="col-md-10">
                                    <div class="form-group">
                                    <label for="whoshouldgroup_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                    <textarea id="whoshouldgroup_desc" name="whoshouldgroup_desc" class="form-control"
                                               placeholder="Enter Short Description"></textarea>
                                     </div>
                                </div> -->

                                    <div class="col-md-10" style="padding-left: 0;">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="emp_image">
                                            Image (Size : 530px X 440px ) </label>
                                            <input id="whyshould_image" name="whyshould_image_0" type="file" class="form-control " value =""/>
                                        </div>
                                   </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="feature_name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="whyshould_name" name="whyshould_name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="whyshould_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="whyshould_desc" name="whyshould_desc[]" class="form-control"
                                           placeholder="Enter Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap17">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button17">Add More</button>
                                        </div>
                                    </div>
                        </div>
                        <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">
                         <!--------------- Purchasing Group Health Insurance for your employees ------------>

                                    <div class="col-md-12" style="margin: 0;padding: 0;">
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 7</h3>
                                   
                                   <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title7" name="main_title7" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="purchase_name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="purchase_name" name="purchase_name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="purchase_desc" name="purchase_desc[]" class="form-control"
                                           placeholder="Enter Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap18">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button18">Add More</button>
                                        </div>
                                    </div>
                        </div>
                        <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">
                        <!--------------- FAQ (Frequently Asked Questions) ------------>

                                    <div class="col-md-12" style="margin: 0;padding: 0;">
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 8</h3>

                                        <div class="col-md-10"> 
                                    <div class="form-group">
                                       <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                       <input id="main_title8" name="main_title8" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                            <div class="col-md-10"> 
                             <div class="form-group">
                                       <label for="faq_name">Title<!-- <span color="red">*</span> --></label>
                                       <input id="faq_name" name="faq_name[]" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value=""/>
                                    </div>
                                </div>

                           <div class="col-md-10">
                             <div class="form-group">
                                <label for="faq_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="faq_desc" name="faq_desc[]" class="form-control"
                                           placeholder="Enter Description"></textarea>
                              </div>
                            </div>
                        

                        <div class="input_fields_wrap19">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button19">Add More</button>
                                        </div>
                                    </div>

                                    </div>
                        <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tags" style="margin:15px 0 5px 0px; width:100%;">Search
                                                Tags</label>
                                            <textarea id="tags" name="tags" class="form-control"
                                                placeholder="Search Tags"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="metatitle" style="margin:15px 0 5px 0px; width:100%;">Meta
                                                Title</label>
                                            <textarea id="metatitle" name="metatitle" class="form-control"
                                                placeholder="Meta Title"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="metakeywords" style="margin:15px 0 5px 0px; width:100%;">Meta
                                                Keywords</label>
                                            <textarea id="metakeywords" name="metakeywords" class="form-control"
                                                placeholder="Meta Keywords"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="metadescription" style="margin:15px 0 5px 0px; width:100%;">Meta
                                                Description</label>
                                            <textarea id="metadescription" name="metadescription" class="form-control"
                                                placeholder="Meta Description"></textarea>
                                        </div>
                                    </div>
                                   <!--  <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Description </label>
                                        <textarea id="description" name="description" type="text" class="form-control"
                                            placeholder="Enter Description" value=""></textarea>
                                    </div> -->
                                    
                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>product/lists"
                                            class="submit btn bg-purple pull-right"
                                            style="margin-right: 10px;" />Cancel</a>
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

    var category_id = $("#category_id").val();
    if (category_id == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Select Category.");
        $("#validator").css("display", "block");
        return false;
    }
    var name = $("#name").val();
    if (name == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Enter Name.");
        $("#validator").css("display", "block");
        return false;
    }

    var page_url = $("#page_url").val();
    if (page_url == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Enter Page URL.");
        $("#validator").css("display", "block");
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
<script>
    function hideAndShow(display_div){
        if(display_div == 1){
            $('#div_first').show();
            $('#div_two').hide();
            $('#div_three').hide();
        }else if(display_div == 2){
            $('#div_two').show();
            $('#div_first').hide();
            $('#div_three').hide();
        }else if(display_div == 3){
            $('#div_three').show();
            $('#div_first').hide();
            $('#div_two').hide();
        }
    }
    var show_price = $("#show_price").val();
    if(show_price == 1){
         $('#div_two').hide();
         $('#div_three').hide();
    }
</script>
<!-----------------------------------<  Universe of Employee Benefits  >-------------------------------------------->

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
                '<div class="test"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="emp_image">Image(Size : 100px X 100px ) </label><input id="emp_image" name="s_image_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="title" name="title[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="emp_benefit_desc_' + b + '" name="emp_benefit_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field1", function(e) {

        e.preventDefault();

        $(this).parent('.test').remove();
        b--;

    })

});

</script>
<!-----------------------------------<  Importance of Group Health Insurance  >-------------------------------------------->

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
                '<div class="test"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="emp_image">Image(Size : 100px X 100px ) </label><input id="section2" name="section2_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="sec2_title" name="sec2_title[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="group_ins_desc_' + b + '" name="group_ins_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_field2" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_field2", function(e) {

        e.preventDefault();

        $(this).parent('.test').remove();
        b--;

    })

});

</script>

<!-----------------------------------<  Advantages of Group Health Insurance  >-------------------------------------------->

<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap14");
    var add_button = $("#add_field_button14");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="sec_3"><div class="col-md-12" style="padding: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="name">Display</label><input id="for_employee" name="for_employee[]'+ b +'" type="radio" value="1"/>&nbsp;&nbsp;For Employer &nbsp;&nbsp;<input id="for_employee" name="for_employee[]'+ b +'" type="radio" value="2" /> For Employees</div><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="sec3_image">Image(Size : 100px X 100px ) </label><input id="sec3_image" name="sec3_image_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="section3_name" name="section3_name[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="section3_desc_' + b + '" name="section3_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec3" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_sec3", function(e) {

        e.preventDefault();

        $(this).parent('.sec_3').remove();
        b--;

    })

});

</script>

<!-----------------------------------<  Features of Group Health Insurance  >-------------------------------------------->

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
                '<div class="sec_4"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="feature_image">Image(Size : 100px X 100px ) </label><input id="feature_image" name="feature_image_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="feature_name" name="feature_name[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="feature_desc_' + b + '" name="feature_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec4" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_sec4", function(e) {

        e.preventDefault();

        $(this).parent('.sec_4').remove();
        b--;

    })

});

</script>

<!-----------------------------------<  Why buy Group Health Insurance from Raghnall >-------------------------------------------->

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
                '<div class="sec_5"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="whybuy_name" name="whybuy_name[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="whybuy_desc_' + b + '" name="whybuy_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec5" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_sec5", function(e) {

        e.preventDefault();

        $(this).parent('.sec_5').remove();
        b--;

    })

});

</script>
<!----------------------------------<  Who should buy Group Health Insurance  >----------------------------------------->

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
                '<div class="sec_4"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="feature_image">Image(Size : 530px X 440px ) </label><input id="whyshould_image" name="whyshould_image_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="whyshould_name" name="whyshould_name[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="whyshould_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="whyshould_desc_' + b + '" name="whyshould_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec4" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_sec4", function(e) {

        e.preventDefault();

        $(this).parent('.sec_4').remove();
        b--;

    })

});

</script>
<!----------------< Factors to be considered before purchasing Group Health Insurance for your employees >---------------->

<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap18");
    var add_button = $("#add_field_button18");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="sec_5"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="purchase_name" name="purchase_name[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="purchase_desc_' + b + '" name="purchase_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec7" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_sec7", function(e) {

        e.preventDefault();

        $(this).parent('.sec_5').remove();
        b--;

    })

});

</script>
<!----------------< FAQ (Frequently Asked Questions) >---------------->

<script type="text/javascript" language="javascript">

$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap19");
    var add_button = $("#add_field_button19");

    var b = 0;
    $(add_button).click(function(e) {
        // alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="sec_faq"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="faq_name" name="faq_name[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="faq_desc_' + b + '" name="faq_desc[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_faq" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });

    $(wrapper).on("click", ".remove_faq", function(e) {

        e.preventDefault();

        $(this).parent('.sec_faq').remove();
        b--;

    })

});

</script>