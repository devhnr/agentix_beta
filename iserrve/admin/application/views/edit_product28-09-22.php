<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Product </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>product/lists">Product</a></li>
                    <li class="crumb-trail">Edit Product</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Product</span> </div>
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
                                    action="<?php echo $base_url;?>product/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_product">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">


                                     <div class="form-group">
                                        <label style="width:100%;margin:15px 0 5px;" for="product_name">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                        <option value=''>Select Category</option>
                                        <?php  if($all_category !='' && count($all_category) > 0){ 
                                        foreach($all_category as $category_detail){ ?>
                                        <option value="<?php echo $category_detail->id; ?>"
                                            <?php if($category_detail->id==$category_id){ echo "selected";} ?>>
                                            <?php echo $category_detail->name; ?>
                                        </option>
                                        <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name"> Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Name" value="<?php echo $name; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Page Url
                                        </label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page Url" value="<?php echo $page_url; ?>" />
                                    </div>

                                     <div class="col-md-12" style="margin-top:10px;">
                                    <h4>Group Health Insurance</h4>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Title
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="title_1" name="title_1" type="text" class="form-control"
                                            placeholder="Enter Title" value="<?php echo $title_1;?>" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Title 2
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="title_2" name="title_2" type="text" class="form-control"
                                            placeholder="Enter Title 2" value="<?php echo $title_2;?>" />
                                    </div>

                                        <div class="form-group">
                                            <label for="short_description" style="margin:15px 0 5px 0px; width:100%;">Short Description</label>
                                            <textarea id="short_description" name="short_description" class="form-control"
                                                placeholder="Enter Short Description"><?php echo $short_description?></textarea>
                                        </div>

                                        <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Get a Quote
                                        </label>
                                        <input id="get_quote" name="get_quote" type="radio"
                                            placeholder="Enter Name" value="1" <?php if($get_quote == 1){echo "checked";}?>/> Popup &nbsp;&nbsp;

                                        <input id="get_quote" name="get_quote" type="radio"
                                            placeholder="Enter Name" value="2"  <?php if($get_quote == 2){echo "checked";}?> /> Form
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size : 500px X 500px)
                                        </label>
                                        <input type="file" id="image" name="image" class="form-control"/>
                                        <img src="<?php echo $front_base_url; ?>upload/products/medium/<?php echo $image;?>" height="50px;" width="50px;">
                                    </div>
                                </div>

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Universe of Employee Benefits</h3>

                                         <div class="col-md-10"> 
                                            <div class="form-group">
                                                <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                                <input id="main_title1" name="main_title1" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title1;?>"/>
                                            </div>
                                        </div>

                                         <div class="col-md-10">
                                         <div class="form-group">
                                            <label for="uniemp_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="uniemp_desc" name="uniemp_desc" class="form-control" placeholder="Enter Short Description"><?php echo $uniemp_desc;?></textarea>
                                          </div>
                                        </div>

                                    <?php
                                    $k = 0;
                                     if ($addition_item != '') { ?>
                                       
                                        <input type="hidden" name="emp_benefit_desc1[]" value="">
                                        <input type="hidden" name="title1[]" value="">
                                        <input type="hidden" name="e_image1_<?php echo $k; ?>" value="">

                                    <?php for ($i = 0; $i < count($addition_item); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx[]" id="updateid1xxx<?php echo $i + 1; ?>" value="<?php echo $addition_item[$i]->id; ?>">

                                    <div class="col-md-12 ">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image">Image (Size : 100px X 100px ) </label>
                                        <input id="emp_image<?php echo $i + 1; ?>" name="s_imageu_<?php echo $k;?>" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url;?>upload/products/emp_benefit_image/medium/<?php echo $addition_item[$i]->emp_image; ?>" height="50" width="50">
                                            </div>
                                       </div>

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="name<?php echo $i + 1; ?>" name="titleu[]" type="text" class="form-control" value="<?php echo $addition_item[$i]->title; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="emp_benefit_descu_<?php echo $i + 1; ?>" name="emp_benefit_descu[]" class="form-control" placeholder="Enter Description"><?php echo $addition_item[$i]->emp_benefit_desc;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete('<?php echo $base_url."product/removeprice/";?><?php echo $addition_item[$i]->p_id; ?>/<?php echo $addition_item[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                        <div class="col-md-12 ">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image1"> Image (Size : 100px X 100px ) </label>
                                                <input id="s_image" name="e_image1_0" type="file" class="form-control" value="" />
                                            </div>
                                       </div>

                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="title1" name="title1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="emp_benefit_desc" name="emp_benefit_desc1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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


                                   <!--  </div> -->
                                </div>

                                <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                                <div class="col-md-12" style="margin: 0;padding: 0;">
                            <h3 style="margin-top: 25px;">Table of Content</h3>
                        <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_1">Section 1</label>
                               <input id="section_1" name="section_1" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_1?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="name">Display</label>
                               <select id="display_1" name="display_1" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_1 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_1 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                      <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_2">Section 2</label>
                               <input id="section_2" name="section_2" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_2?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="name">Display</label>
                               <select id="display_2" name="display_2" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_2 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_2 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_3">Section 3</label>
                               <input id="section_3" name="section_3" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_3?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_3">Display</label>
                               <select id="display_3" name="display_3" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_3 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_3 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_4">Section 4</label>
                               <input id="section_4" name="section_4" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_4?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_4">Display</label>
                               <select id="display_4" name="display_4" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_4 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_4 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_5">Section 5</label>
                               <input id="section_5" name="section_5" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_5?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_5">Display</label>
                               <select id="display_5" name="display_5" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_5 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_5 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_6">Section 6</label>
                               <input id="section_6" name="section_6" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_6?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_6">Display</label>
                               <select id="display_6" name="display_6" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_6 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_6 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_7">Section 7</label>
                               <input id="section_7" name="section_7" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_7?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_7">Display</label>
                               <select id="display_7" name="display_7" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_7 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2"<?php if($display_7 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                     <div class="row">
                            <div class="col-md-8">
                             <div class="form-group">
                               <label for="section_8">Section 8</label>
                               <input id="section_8" name="section_8" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $section_8?>"/>
                            </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="display_8">Display</label>
                               <select id="display_8" name="display_8" class="form-control">
                                   <option value="">-- Select --</option>
                                   <option value="1" <?php if($display_8 == 1){echo "selected";}?>>Yes</option>
                                   <option value="2" <?php if($display_8 == 2){echo "selected";}?>>No</option>
                               </select>
                            </div>
                         </div>
                     </div>

                        </div>

                                <div class="col-md-12">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 1</h3>

                                    <div class="form-group">
                                       <label for="name">Title</label>
                                       <input id="group_title" name="group_title" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $group_title;?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                        <textarea id="description" name="description" class="form-control"
                                            placeholder="Enter Description"><?php echo $description;?></textarea>
                                    </div>

                                     <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size : 500px X 502px)
                                        </label>
                                        <input type="file" id="gimage" name="gimage" class="form-control"/>
                                        <img src="<?php echo $front_base_url; ?>upload/products/medium/<?php echo $gimage;?>" height="50px;" width="50px;">
                                    </div>
                                </div>

                                <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                            <!----------------------<  Importance of Group Health Insurance (Section 2) ---------------------->
                            <div class="col-md-12 " style="margin: 0;padding: 0;"> 
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 2</h3>

                                <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title2" name="main_title2" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title2;?>"/>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                <div class="form-group">
                                <label for="section_two_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="section_two_desc" name="section_two_desc" class="form-control"
                                           placeholder="Enter Short Description"><?php echo $section_two_desc;?></textarea>
                                 </div>
                                </div>

                                    <?php
                                    $k = 0;
                                     if ($group_healthInsurance != '') { ?>
                                       
                                        <input type="hidden" name="emp_benefit_desc2[]" value="">
                                        <input type="hidden" name="title2[]" value="">
                                        <input type="hidden" name="gsection2_<?php echo $k; ?>" value="">

                                    <?php for ($s = 0; $s < count($group_healthInsurance); $s++) { ?>

                                    <input type="hidden" name="updateid1xxx11[]" id="updateid1xxx11<?php echo $s + 1; ?>" value="<?php echo $group_healthInsurance[$s]->id; ?>">

                                    <div class="col-md-12 ">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image">Image (Size : 100px X 100px ) </label>
                                        <input id="emp_image<?php echo $s + 1; ?>" name="section2u_<?php echo $k;?>" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url;?>upload/products/section2/medium/<?php echo $group_healthInsurance[$s]->image; ?>" height="50" width="50">
                                            </div>
                                       </div>

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="name<?php echo $s + 1; ?>" name="sec2_titleu[]" type="text" class="form-control" value="<?php echo $group_healthInsurance[$s]->title; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                            <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="group_health_descu_<?php echo $s + 1; ?>" name="group_health_descu[]" class="form-control" placeholder="Enter Description"><?php echo $group_healthInsurance[$s]->group_ins_desc;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete1('<?php echo $base_url."product/removeprice1/";?><?php echo $group_healthInsurance[$s]->pid; ?>/<?php echo $group_healthInsurance[$s]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image1"> Image (Size : 100px X 100px ) </label>
                                                <input id="gsection2" name="gsection2_0" type="file" class="form-control" value="" />
                                            </div>
                                       </div>

                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="title2" name="title2[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benefit_desc2" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="emp_benefit_desc2" name="emp_benefit_desc2[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
                                    <div class="input_fields_wrap_sec2">
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button
                                                            style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -35px;"
                                                            class="submit btn bg-purple pull-right" type="button"
                                                            id="add_field_button_sec2">Add More</button>
                                                    </div>

                                                </div>
                                            </div>

                            <hr style="border:1px solid;border-top: 2px solid;margin-top:26%;">

                        <div class="col-md-12 " style="margin: 0;padding: 0;"> 
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 3</h3>


                         <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Display
                                        </label>
                                        <input id="for_employee" name="for_employee" type="radio"
                                            placeholder="Enter Name" value="1" <?php if($for_employee == 1){echo "checked";}?>/>&nbsp;&nbsp;For Employer &nbsp;&nbsp;

                                        <input id="for_employee" name="for_employee" type="radio"
                                            placeholder="Enter Name" value="2" <?php if($for_employee == 2){echo "checked";}?>/> For Employees
                                    </div>

                                    <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title3" name="main_title3" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title3;?>"/>
                                    </div>
                                </div>

                             <div class="col-md-10">
                                <div class="form-group">
                                <label for="advantage_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                <textarea id="advantage_desc" name="advantage_desc" class="form-control"
                                           placeholder="Enter Short Description"><?php echo $advantage_desc;?></textarea>
                                 </div>
                            </div>


                                    <?php
                                    $k = 0;
                                     if ($advantage_group_ins != '') { ?>
                                       
                                        <input type="hidden" name="desctiption1[]" value="">
                                        <input type="hidden" name="section3_name1[]" value="">
                                        <input type="hidden" name="sec3_image1_<?php echo $k; ?>" value="">

                                    <?php for ($i = 0; $i < count($advantage_group_ins); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx33[]" id="updateid1xxx33<?php echo $i + 1; ?>" value="<?php echo $advantage_group_ins[$i]->id; ?>">

                                    <div class="col-md-12 ">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image">Image (Size : 100px X 100px ) </label>
                                        <input id="emp_image<?php echo $i + 1; ?>" name="sec3_imageu_<?php echo $k;?>" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url;?>upload/products/section3/medium/<?php echo $advantage_group_ins[$i]->image; ?>" height="50" width="50">
                                            </div>
                                       </div>

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="name<?php echo $i + 1; ?>" name="section3_nameu[]" type="text" class="form-control" value="<?php echo $advantage_group_ins[$i]->name; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="descriptionu_<?php echo $i + 1; ?>" name="descriptionu[]" class="form-control" placeholder="Enter Description"><?php echo $advantage_group_ins[$i]->description;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete('<?php echo $base_url."product/removeprice2/";?><?php echo $advantage_group_ins[$i]->pro_id; ?>/<?php echo $advantage_group_ins[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image1"> Image (Size : 100px X 100px ) </label>
                                                <input id="sec3_image1" name="sec3_image1_0" type="file" class="form-control" value="" />
                                            </div>
                                       </div>

                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="section3_name1" name="section3_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="desctiption1" name="desctiption1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 4</h3>

                                    <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title4" name="main_title4" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title4;?>"/>
                                    </div>
                                </div>

                                    <?php
                                    $k = 0;
                                     if ($feature_groupInsurance != '') { ?>
                                       
                                        <input type="hidden" name="feature_desc1[]" value="">
                                        <input type="hidden" name="feature_name1[]" value="">
                                        <input type="hidden" name="feature_image1_<?php echo $k; ?>" value="">

                                    <?php for ($i = 0; $i < count($feature_groupInsurance); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx44[]" id="updateid1xxx44<?php echo $i + 1; ?>" value="<?php echo $feature_groupInsurance[$i]->id; ?>">

                                    <div class="col-md-12 ">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="feature_image">Image (Size : 100px X 100px ) </label>
                                        <input id="feature_image<?php echo $i + 1; ?>" name="feature_imageu_<?php echo $k;?>" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url;?>upload/products/section4/medium/<?php echo $feature_groupInsurance[$i]->image; ?>" height="50" width="50">
                                            </div>
                                       </div>

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="feature_name<?php echo $i + 1; ?>" name="feature_nameu[]" type="text" class="form-control" value="<?php echo $feature_groupInsurance[$i]->name; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="feature_descu<?php echo $i + 1; ?>" name="feature_descu[]" class="form-control" placeholder="Enter Description"><?php echo $feature_groupInsurance[$i]->description;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete4('<?php echo $base_url."product/removeprice3/";?><?php echo $feature_groupInsurance[$i]->prod_id; ?>/<?php echo $feature_groupInsurance[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image1"> Image (Size : 100px X 100px ) </label>
                                                <input id="feature_image1" name="feature_image1_0" type="file" class="form-control" value="" />
                                            </div>
                                       </div>

                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="feature_name1" name="feature_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="feature_desc1" name="feature_desc1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                        <h3 style="margin-top: 25px;margin-bottom: 0;">Section 5</h3>

                                         <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title5" name="main_title5" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title5;?>"/>
                                    </div>
                                </div>

                                    <?php
                                    $k = 0;
                                     if ($whyBuy_groupInsurance != '') { ?>
                                       
                                        <input type="hidden" name="whybuy_desc1[]" value="">
                                        <input type="hidden" name="whybuy_name1[]" value="">

                                    <?php for ($i = 0; $i < count($whyBuy_groupInsurance); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx55[]" id="updateid1xxx55<?php echo $i + 1; ?>" value="<?php echo $whyBuy_groupInsurance[$i]->id; ?>">

                                    <div class="col-md-12 ">

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="feature_name<?php echo $i + 1; ?>" name="whybuy_nameu[]" type="text" class="form-control" value="<?php echo $whyBuy_groupInsurance[$i]->name; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="feature_descu<?php echo $i + 1; ?>" name="whybuy_descu[]" class="form-control" placeholder="Enter Description"><?php echo $whyBuy_groupInsurance[$i]->description;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete5('<?php echo $base_url."product/removeprice4/";?><?php echo $whyBuy_groupInsurance[$i]->proid; ?>/<?php echo $whyBuy_groupInsurance[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="whybuy_name1" name="whybuy_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="whybuy_desc1" name="whybuy_desc1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 6</h3>

                                     <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title6" name="main_title6" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title6;?>"/>
                                    </div>
                                </div>

                                    <?php
                                    $k = 0;
                                     if ($whoShould_groupInsurance != '') { ?>
                                       
                                        <input type="hidden" name="whyshould_desc1[]" value="">
                                        <input type="hidden" name="whyshould_name1[]" value="">
                                        <input type="hidden" name="whyshould_image1_<?php echo $k; ?>" value="">

                                    <?php for ($i = 0; $i < count($whoShould_groupInsurance); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx14[]" id="updateid1xxx14<?php echo $i + 1; ?>" value="<?php echo $whoShould_groupInsurance[$i]->id; ?>">

                                    <div class="col-md-12 ">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="feature_image">Image (Size : 530px X 440px ) </label>
                                        <input id="whyshould_image<?php echo $i + 1; ?>" name="whyshould_imageu_<?php echo $k;?>" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url;?>upload/products/who_shouldGroup/medium/<?php echo $whoShould_groupInsurance[$i]->image; ?>" height="50" width="50">
                                            </div>
                                       </div>

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="whyshould_name<?php echo $i + 1; ?>" name="whyshould_nameu[]" type="text" class="form-control" value="<?php echo $whoShould_groupInsurance[$i]->name; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="whyshould_descu<?php echo $i + 1; ?>" name="whyshould_descu[]" class="form-control" placeholder="Enter Description"><?php echo $whoShould_groupInsurance[$i]->description;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete6('<?php echo $base_url."product/removeprice5/";?><?php echo $whoShould_groupInsurance[$i]->produc_id; ?>/<?php echo $whoShould_groupInsurance[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image1"> Image (Size : 340px X 440px ) </label>
                                                <input id="feature_image1" name="whyshould_image1_0" type="file" class="form-control" value="" />
                                            </div>
                                       </div>

                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="whyshould_name1" name="whyshould_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="whyshould_desc1" name="whyshould_desc1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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

                                <div class="col-md-12 " style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 7</h3>

                                    <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title7" name="main_title7" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title7;?>"/>
                                    </div>
                                </div>

                                    <?php
                                    $k = 0;
                                     if ($purchase_groupInsurance != '') { ?>
                                       
                                        <input type="hidden" name="purchase_name1[]" value="">
                                        <input type="hidden" name="purchase_desc1[]" value="">

                                    <?php for ($i = 0; $i < count($purchase_groupInsurance); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx22[]" id="updateid1xxx22<?php echo $i + 1; ?>" value="<?php echo $purchase_groupInsurance[$i]->id; ?>">

                                    <div class="col-md-12 ">

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="purchase_name<?php echo $i + 1; ?>" name="purchase_nameu[]" type="text" class="form-control" value="<?php echo $purchase_groupInsurance[$i]->name; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="purchase_descu<?php echo $i + 1; ?>" name="purchase_descu[]" class="form-control" placeholder="Enter Description"><?php echo $purchase_groupInsurance[$i]->description;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete7('<?php echo $base_url."product/removeprice_purchase/";?><?php echo $purchase_groupInsurance[$i]->produ_id; ?>/<?php echo $purchase_groupInsurance[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="purchase_name1" name="purchase_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="purchase_desc1" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="purchase_desc1" name="purchase_desc1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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
                                
                                <!--------------  FAQ (Frequently Asked Questions) ------------------>

                                <div class="col-md-12" style="margin: 0;padding: 0;">
                                    <h3 style="margin-top: 25px;margin-bottom: 0;">Section 8</h3>

                                    <div class="col-md-10"> 
                                    <div class="form-group">
                                        <label for="name">Main Title<!-- <span color="red">*</span> --></label>
                                        <input id="main_title8" name="main_title8" type="text" class="form-control" placeholder="Enter Title" placeholder="Enter Title" value="<?php echo $main_title8;?>"/>
                                    </div>
                                </div>

                                    <?php
                                    $k = 0;
                                     if ($faq_additional_data != '') { ?>
                                       
                                        <input type="hidden" name="faq_name1[]" value="">
                                        <input type="hidden" name="faq_desc1[]" value="">

                                    <?php for ($i = 0; $i < count($faq_additional_data); $i++) { ?>

                                    <input type="hidden" name="updateid1xxx13[]" id="updateid1xxx13<?php echo $i + 1; ?>" value="<?php echo $faq_additional_data[$i]->id; ?>">

                                    <div class="col-md-12 ">

                                      <div class="col-md-10">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="name">
                                                Title</label>
                                            <input id="faq_nameu<?php echo $i + 1; ?>" name="faq_nameu[]" type="text" class="form-control" value="<?php echo $faq_additional_data[$i]->name; ?>" placeholder="Enter Title"/>
                                            </div>
                                       </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                            <textarea id="faq_descu<?php echo $i + 1; ?>" name="faq_descu[]" class="form-control" placeholder="Enter Description"><?php echo $faq_additional_data[$i]->description;?></textarea>
                                                </div>
                                          </div>
                                           <a href="javascript:void(0);" onclick="singledelete_faq('<?php echo $base_url."product/removeprice_faq/";?><?php echo $faq_additional_data[$i]->faq_pid; ?>/<?php echo $faq_additional_data[$i]->id; ?>');" style="margin-right: 87px; margin-top: 70px;" class="btn btn-danger pull-right"> 
                                        Remove</a>
                                    </div>
                                     <?php $k++; }
                                    } else { ?>
                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label for="name" >Title<!-- <span color="red">*</span> --></label>
                                            <input id="faq_name1" name="faq_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/>
                                        </div>
                                    </div>

                                       <div class="col-md-10">
                                         <div class="form-group">
                                                <label for="faq_desc1" style="margin:15px 0 5px 0px; width:100%;">Description</label>
                                                   <textarea id="faq_desc1" name="faq_desc1[]" class="form-control"
                                                       placeholder="Enter Description"></textarea>
                                                </div>
                                          </div>
                                           <?php } ?>
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
                                                placeholder="Search Tags"><?php  echo $tags; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="metatitle" style="margin:15px 0 5px 0px; width:100%;">Meta
                                                Title</label>
                                            <textarea id="metatitle" name="metatitle" class="form-control"
                                                placeholder="Meta Title"><?php  echo $metatitle; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="metakeywords" style="margin:15px 0 5px 0px; width:100%;">Meta
                                                Keywords</label>
                                            <textarea id="metakeywords" name="metakeywords" class="form-control"
                                                placeholder="Meta Keywords"><?php  echo $metakeywords; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="metadescription" style="margin:15px 0 5px 0px; width:100%;">Meta
                                                Description</label>
                                            <textarea id="metadescription" name="metadescription" class="form-control"
                                                placeholder="Meta Description"><?php  echo $metadescription; ?></textarea>
                                        </div>
                                    </div>


                            <div class="form-group">
                                <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                    onclick="javascript:validate();return false;" />
                                <a href="<?php echo $base_url;?>product/lists" class="submit btn bg-purple pull-right"
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
function singledelete(url) {
    window.location.href = url;
}
function singledelete1(url) {
    window.location.href = url;
}
function singledelete4(url) {
    window.location.href = url;
}

function singledelete5(url) {
    window.location.href = url;
}
function singledelete6(url) {
    window.location.href = url;
}
function singledelete7(url) {
    window.location.href = url;
}

function singledelete_faq(url) {
    window.location.href = url;
}
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
    }else if(show_price == 2){
        $('#div_first').hide();
        $('#div_three').hide();
    }else if(show_price == 3){
        $('#div_first').hide();
        $('#div_two').hide();
    }
</script>
<!--------------------------------------<  Universe of Employee Benefits  >------------------------------------------>

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
                '<div class="test"><div class="col-md-12"><div class="col-md-10"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="emp_image">Image(Size : 100px X 100px ) </label><input id="s_image" name="e_image1_' + b + '" type="file" class="form-control" value="" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name" >Title<!-- <span color="red">*</span> --></label><input id="title1" name="title1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="emp_benefit_desc' + b + '" name="emp_benefit_desc1[]"  class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );

        }
    });
    // $(wrapper).on("click", ".remove_field1", function(e) {
    //     e.preventDefault();
    //     $(this).parent('div').remove();
    //     b--;
    // })

    $(wrapper).on("click", ".remove_field1", function(e) {

        e.preventDefault();

        $(this).parent('.test').remove();
        b--;

    })
});
</script>


<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap_sec2");
    var add_button = $("#add_field_button_sec2");

    var b = 0;

    $(add_button).click(function(e) {

        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="test"><div class="col-md-12"><div class="col-md-10"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="emp_image">Image(Size : 100px X 100px ) </label><input id="gsection2" name="gsection2_' + b + '" type="file" class="form-control" value="" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name" >Title<!-- <span color="red">*</span> --></label><input id="title2" name="title2[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="emp_benifit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="emp_benefit_desc' + b + '" name="emp_benefit_desc2[]"  class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_field_sec2" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );

        }
    });
    // $(wrapper).on("click", ".remove_field1", function(e) {
    //     e.preventDefault();
    //     $(this).parent('div').remove();
    //     b--;
    // })

    $(wrapper).on("click", ".remove_field_sec2", function(e) {

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
                '<div class="sec_3"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="sec3_image">Image(Size : 100px X 100px ) </label><input id="sec3_image" name="sec3_image1_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="section3_name1" name="section3_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="emp_benefit_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="desctiption1_' + b + '" name="desctiption1[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec3" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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
                '<div class="sec_4"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="feature_image">Image(Size : 100px X 100px ) </label><input id="feature_image" name="feature_image1_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="feature_name" name="feature_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="feature_desc1_' + b + '" name="feature_desc1[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec4" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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
                '<div class="sec_5"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="whybuy_name" name="whybuy_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="whybuy_desc_' + b + '" name="whybuy_desc1[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec5" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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
                '<div class="sec_4"><div class="col-md-12" style="padding: 0;"><div class="col-md-10" style="padding-left: 0;"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="feature_image">Image(Size : 530px X 440px ) </label><input id="whyshould_image" name="whyshould_image1_' + b + '" type="file"  class="form-control jobtext" /></div> </div><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="whyshould_name1" name="whyshould_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="whyshould_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="whyshould_desc_' + b + '" name="whyshould_desc1[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec4" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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
                '<div class="sec_5"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="purchase_name" name="purchase_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="purchase_desc_' + b + '" name="purchase_desc1[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_sec7" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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
                '<div class="sec_faq"><div class="col-md-12" style="padding: 0;"><div class="col-md-10"><div class="form-group"><label for="name">Title</label><input id="faq_name" name="faq_name1[]" type="text" class="form-control" placeholder="Enter Title" value=""/></div></div><div class="col-md-10"> <div class="form-group"> <label for="feature_desc" style="margin:15px 0 5px 0px; width:100%;">Description</label> <textarea id="faq_desc_' + b + '" name="faq_desc1[] " class="form-control jobtext" placeholder="Enter Short Description" ></textarea> </div></div></div><a href="#" class="btn btn-danger pull-right remove_faq" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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