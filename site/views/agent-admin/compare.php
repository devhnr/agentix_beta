    <?php include('includes/header.php');?>
 <section>

        <div class="container">

            <?php if($this->session->userdata('compare_array')  != ''){ 
                
                $policy_array = $this->session->userdata('compare_array');
                
                $explode = explode('|',$policy_array[0]);

                $policies_data = $this->agent_admin_model->get_policies_new($explode[0],$explode[1]);

                $cat_data = $this->agent_admin_model->get_catdata_usingid($policies_data->cat_id);
                //echo"<pre>";print_r($policies_data);echo"</pre>";
                ?>
                        

                <div class="row">

                <div class="col-lg-12">

                    <div class="mb-3">

                        <div class="back-btn">

                            <a href="<?php echo $base_url?>agent-admin/compare-list/<?php echo $cat_data->page_url;?>" class="btn"><i class="feather icon-feather-chevron-left"></i> Back</a>

                        </div>

                        <div class="d-flex align-items-center justify-content-between">

                            <h1>Compare</h1>

                        <div class="back-btn">

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#featuresmodal" class="btn bg-green"><i class="feather icon-feather-mail me-2"></i> Send Email</a>

                            <!-- <a href="javascript:void(0)" class="btn bg-green"><i class="feather icon-feather-mail me-2"></i> Send Email</a> -->

                        </div>

                        </div>

                        

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="table-responsive">

                        <table class="compare-tbl table  table-bordered ">

                            <thead>

                                <tr>

                                    <th>

                                        <div class="policies-compares-color-list">

                                            <h4>Score Legend</h4>

                                            <ul>

                                                <li><i class="fa fa-circle meta-high" aria-hidden="true"></i><span>High</span></li>

                                                <li><i class="fa fa-circle meta-low" aria-hidden="true"></i><span>Low</span></li>

                                            </ul>

                                        </div>

                                    </th>

                                    <?php

                                        foreach($this->session->userdata('compare_array') as $key => $value){

                                            $explode = explode('|',$value);

                                            $policies_data = $this->agent_admin_model->get_policies_new($explode[0],$explode[1]);

                                            //echo "<pre>";print_r($policies_data);echo "</pre>";
                                            
                                            $company_logo = $this->agent_admin_model->get_company_image($policies_data->company_id);
                                    ?>

                                    <th>

                                       

                                            <div class="policy-info">

                                               <button class="close" onclick="remove_compare_data('<?php echo $base_url; ?>agent_admin/delete_compare_page/<?php echo $explode[0]; ?>/<?php echo $explode[1]; ?>/<?php echo $explode[2]; ?>');"> &times; </button>

                                                

                                            <div class="policy-img">

                                                <?php if($company_logo !=''){?>
                                                    <img src="<?php echo $http_host?>upload/policies_image/medium/<?php echo $company_logo?>" alt="">
                                                <?php } else {?>

                                                    <img src="<?php echo $http_host?>upload/policies_image/medium/noimage.jpg">

                                                <?php } ?>

                                                <h6 class="mt-2"><?php echo $policies_data->plan_name?></h6>

                                            </div>

                                           <!--  <div class="policy-chart">
                                            
                                                <?php if($policies_data->image !=''){?>

                                                    <img src="<?php echo $http_host?>upload/policies_image/score_detail/medium/<?php echo $policies_data->image?>" class="w-100" alt="">

                                                <?php } else {?>
                                                    <img src="<?php echo $http_host?>upload/policies_image/score_detail/medium/noimage.jpg">
                                                <?php } ?>
                                                

                                                <span>Score Details</span>

                                               

                                            </div> -->

                                        </div>

                                            

                                            

                                  

                                    </th>

                                <?php } ?>

                                   <!--  <th>

                                       

                                        <div class="policy-info">

                                            <button class="close"> &times;</button>

                                        

                                        <div class="policy-img">

                                            <img src="<?php echo $base_url_views ?>agent-admin/img/inslogo1.jpg" alt="">

                                            <h6 class="mt-2">Shopaholic Plan</h6>

                                        </div>

                                        <div class="policy-chart">

                                            <img src="<?php echo $base_url_views ?>agent-admin/img/chart1.png" class="w-100" alt="">

                                            <span>Score Details</span>

                                           

                                        </div>

                                    </div>

                                        

                              

                                     </th>

                                     <th>

                                       

                                        <div class="policy-info">

                                            <button class="close"> &times;</button>

                                      

                                        <div class="policy-img">

                                            <img src="<?php echo $base_url_views ?>agent-admin/img/inslogo1.jpg" alt="">

                                            <h6 class="mt-2">Shopaholic Plan</h6>

                                        </div>

                                        <div class="policy-chart">

                                            <img src="<?php echo $base_url_views ?>agent-admin/img/chart1.png" class="w-100" alt="">

                                            <span>Score Details</span>

                                           

                                        </div>

                                    </div>

                                        

                              

                                     </th> -->

                                </tr>

                            </thead>



                            <tbody>


                                <tr>

                                    <td scope="row">Sum Insured</td>
                                <?php

                                        foreach($this->session->userdata('compare_array') as $key => $value){

                                            $explode = explode('|',$value);

                                            $policies_data = $this->agent_admin_model->get_policies_new($explode[0],$explode[1]);
                                            ?>

                                    <td >

                                        <div class="check-right">

                                            <!-- <i class="feather icon-feather-check"></i> -->
                                            <?php 

                                        if($policies_data->csum_insure !=''){

                                        echo $policies_data->csum_insure;

                                    } else{

                                        echo '-';

                                    }

                                        ?>

                                        </div>    

                                                                            

                                    </td>
                            <?php } ?>

                                    <!-- <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td> -->

                                </tr>

                                <?php 

                                $compare_name = $this->agent_admin_model->get_compare_name(); 

                                //echo"<pre>";print_r($compare_name);echo"</pre>";

                                ?>

                                <?php 
								/*$a=array();*/
								 $b =array(); 
								$blankArray = array();
								foreach($compare_name as $compare_name_data){ 
									
									
									$get_compare_id_new = $this->agent_admin_model->get_compare_title_detail($compare_name_data->id);
									
									
									
									foreach($get_compare_id_new as $get_compare_name_new){ 
									
									//echo "<pre>";print_r($get_compare_name_new);echo "</pre>";
									
									
										
										foreach($this->session->userdata('compare_array') as $key1 => $value1){
											
											

                                            $explode = explode('|',$value1);

											$attribute = $this->agent_admin_model->get_attribute($compare_name_data->id,$get_compare_name_new->id,$explode[0]);
											
											//echo "<pre>";print_r($attribute);echo "</pre>";
											
											if($attribute == ''){
												//echo "blank <br>";
												//unset($a[$get_compare_name_new->id]);
												unset($b[$compare_name_data->id]);
																					
											}else{
												//echo "Not blank <br>";
												//echo $get_compare_name_new->id;
												if($attribute->yes_no == '0' && $attribute->name == ''){
													//unset($a[$get_compare_name_new->id]);
													unset($b[$compare_name_data->id]);
												}else{
													/* if(!in_array($get_compare_name_new->id, $a)){
														$a[]=$get_compare_name_new->id;
													} */
													
													if(!in_array($compare_name_data->id, $b)){
														$b[]=$compare_name_data->id;
													}
													
													$blankArray[] = $get_compare_name_new->id;
												}
												
												
											}
										}
									
									}
								}
								
								$a = array_unique($blankArray);
								
								/* echo "<pre>";print_r($blankArray);echo "</pre>";
								echo "<pre>";print_r($b);echo "</pre>"; */
								


                                $ct = 0;
                                foreach($compare_name as $compare_name_data){ 
								
								//echo "<pre>";print_r($compare_name_data);echo "</pre>";
								
								if (in_array($compare_name_data->id, $b)) {

                                    $get_compare_id_new = $this->agent_admin_model->get_compare_title_detail($compare_name_data->id);
                                ?>

                               
                                <tr>

                                    <td scope="row" colspan="4" class="dark"><?php echo $compare_name_data->name?></td>

                                    

                                </tr>
                            
                            <?php    
                            $i=1;
                            foreach($get_compare_id_new as $get_compare_name_new){ 

                                //echo"<pre>";print_r($get_compare_name_new);echo"</pre>";
								
								if (in_array($get_compare_name_new->id, $a)) {

                            ?>
							

                                <tr>

                                    <td scope="row"><?php echo $i;?>. <?php echo $get_compare_name_new->name ?></td>

                                    <?php 


                                    foreach($this->session->userdata('compare_array') as $key1 => $value1){

                                            $explode = explode('|',$value1);

                                $attribute = $this->agent_admin_model->get_attribute($compare_name_data->id,$get_compare_name_new->id,$explode[0]);

                                //echo"<pre>";print_r($attribute);echo"</pre>";

                                ?>

                                    <td >

                                        <?php if($attribute != ''){ ?>


                                            <?php 
                                                if($attribute->name != ''){
                                            
                                                    echo $attribute->name;
                                            }else{ ?>

                                                <?php if($attribute->yes_no == '1'){ ?>
                                                    <div class="check-right">
                                                        <i class="feather icon-feather-check"></i>
                                                    </div> 
                                                <?php } elseif($attribute->yes_no == '2'){ ?>
                                                    <div class="check-wrong">

                                                        <span>&times;</span>

                                                    </div>
                                                <?php }else{?>
													<div class="">

                                                        <span>-</span>

                                                    </div>
												<?php } ?>
	
                                            <?php } ?>

                                            
                                                

                                                    <!--  -->

                                                  

                                               
                                        <?php }else{ echo "-";} ?>  
                                                                            

                                    </td>
                                <?php } ?>

                                    <!-- <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td> -->

                                </tr>
								<?php $i++; 
								} 
								} ?>
								<?php $ct++; 
								} 
								} ?>
<!-- 
                                <t r>

                                    <td scope="row">Financial loss as a result of phishing/ email spoofing</td>

                                    <td >

                                        <div class="check-right">

                                            <i class="feather icon-feather-check"></i>

                                        </div>    

                                                                            

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">Lost wages due to time taken off</td>

                                    <td >

                                        <div class="check-right">

                                            <i class="feather icon-feather-check"></i>

                                        </div>    

                                                                            

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">Legal costs</td>

                                    <td >

                                        <div class="check-right">

                                            <i class="feather icon-feather-check"></i>

                                        </div>    

                                                                            

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">Penalty imposed by a bank/credit organization</td>

                                    <td >

                                        <div class="check-right">

                                            <i class="feather icon-feather-check"></i>

                                        </div>    

                                                                            

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">IT Expert Cost</td>

                                    <td >

                                        <div class="check-right">

                                            <i class="feather icon-feather-check"></i>

                                        </div>    

                                                                            

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                    <td >

                                        <div class="check-wrong">

                                            <span>&times;</span>

                                        </div>

                                    </td>

                                </tr> -->

                            </tbody>

                        </table> 

                    </div>

                </div>

                <div class="col-lg-12 text-center mb-3">

                    <button type="submit" class="btn com-cta bg-blue" data-toggle="modal" data-target="#featuresmodal"><i class="feather icon-feather-mail"></i> Send Email</button>

                </div>

            </div>

        <?php }else{ ?>
			
			<h3>coming soon</h3>
		
		<?php } ?>

        </div>

    </section>

    <div class="modal feat-modal fade" id="featuresmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Send Mail</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <div class="row">

            <div class="col-lg-12">

                
            <form class="rep-form" method="post" action="<?php echo $base_url;?>agent_admin/compare_login"  enctype="multipart/form-data" id="mail_model" >

                    <div class="col-lg-12">

                        <input type="text" placeholder="Enter Name" name="name" id="name" class="w-100">

                    </div>

                    <div class="col-lg-12">

                        <input type="number" placeholder="Enter Mobile" name="mobile" id="mobile" class="w-100">

                    </div>

                    <div class="col-lg-12">

                        <input type="text" placeholder="Enter Email" name="email" id="email" class="w-100">

                    </div>

                    <div class="col-lg-12">

                        <input type="text" placeholder="Enter Location" name="location" id="location" class="w-100">

                    </div>
                    
                    <span id="contact_error_login" class="error alert-message valierror " style="display: none;"></span>
                            <span id="contact_success" class="successmain alert-message" style="display:none;"></span>

                    <button type="button" class="btn" onclick="javascript:login_validation();">Submit</button>
              
                </form>
            </div>

          </div>

            

        </div>

       

      </div>

    </div>

</div>
<?php include('includes/footer.php');?>
<script>
    function remove_compare_data(base_url) {

    

    var conf = confirm("Are you sure you want to delete");

    if (conf == true) {

        window.location = base_url;

        return true;

    } else {

        return false;

    }

}
</script>

<script>
function login_validation() {
    var name = jQuery("#name").val();
    if (name == '') {
        jQuery('#contact_error_login').html("Please enter Name");
        jQuery('#contact_error_login').show().delay(0).fadeIn('show');
        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
        return false;
    }

    var mobile = jQuery("#mobile").val();

    if (mobile == '') {

        

        //alert ('message alert');

        jQuery('#contact_error_login').html("Please Enter Mobile No");

        jQuery('#contact_error_login').show().delay(0).fadeIn('show');

        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');

        return false;

    }



    var mo = jQuery('#mobile').val();

    var filter = /^\d{10}$/;

    if (!filter.test(mo)) {

        jQuery('#contact_error_login').html("Please enter valid Mobile No");

        jQuery('#contact_error_login').show().delay(0).fadeIn('show');

        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');

        return false;

    }

    var email = jQuery("#email").val();

        if (email == '') {

            jQuery('#contact_error_login').html("Please enter email");

            jQuery('#contact_error_login').show().delay(0).fadeIn('show');

            jQuery('#contact_error_login').show().delay(2000).fadeOut('show');

            return false;

        }



        var em = jQuery('#email').val();

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(em)) {

            jQuery('#contact_error_login').html("Please enter valid email");

            jQuery('#contact_error_login').show().delay(0).fadeIn('show');

            jQuery('#contact_error_login').show().delay(2000).fadeOut('show');

            return false;

        }

        var location = jQuery("#location").val();

        if (location == '') {

            jQuery('#contact_error_login').html("Please enter location");

            jQuery('#contact_error_login').show().delay(0).fadeIn('show');

            jQuery('#contact_error_login').show().delay(2000).fadeOut('show');

            return false;

        }


        $('#mail_model').submit();

}

</script>