<?php include('includes/header.php');?>
 <section>

        <div class="container">
		
			<form action="<?php echo $base_url;?>compare_policies/compare_policies_remove" id="remove_form" method="post">
			<input type="hidden" name="hidden_array" id="hidden_array" value="<?php echo $_GET['compareids']?>" >
			<input type="hidden" name="hidden_policy_id" id="hidden_policy_id" value="" >
			<input type="hidden" name="hidden_policy_price" id="hidden_policy_price" value="" >
			</form>

            <?php 
			
			
			
			$create_array = explode(",",$_GET['compareids']);
			
			/* echo "<pre>";print_r($create_array);echo"</pre>";
			exit; */
			
			if($_GET['compareids']  != ''){ 
                
                
                //echo"<pre>";print_r($cat_data);echo"</pre>";
                ?>


                <div class="row">

                <div class="col-lg-12">

                    <div class="mb-3">

                       

                        <div class="d-flex align-items-center justify-content-between">

                            <h1>Compare</h1>


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

                                        foreach($create_array as $key => $value){
											
											//

                                            $explode = explode('-',$value);

                                            $policies_data = $this->compare_policies_model->get_policies_new($explode[0],$explode[1]);
//echo "<pre>";print_r($policies_data);echo "</pre>";exit;
												
                                            
                                            $company_logo = $this->compare_policies_model->get_company_image($policies_data->company_id);
                                    ?>

                                    <th>

                                       

                                            <div class="policy-info">

                                               <button class="close" onclick="remove_compare_data('<?php echo $explode[0] ?>','<?php echo $explode[1] ?>');"> &times; </button>

                                                

                                            <div class="policy-img">

                                                <?php if($company_logo !=''){?>
                                                    <img src="<?php echo $http_host?>upload/policies_image/medium/<?php echo $company_logo?>" alt="">
                                                <?php } else {?>

                                                    <img src="<?php echo $http_host?>upload/policies_image/medium/noimage.jpg">

                                                <?php } ?>

                                                <h6 class="mt-2"><?php echo $policies_data->plan_name?></h6>

                                            </div>

                                            <div class="policy-chart">
                                            
                                                <?php if($policies_data->image !=''){?>

                                                    <img src="<?php echo $http_host?>upload/policies_image/score_detail/medium/<?php echo $policies_data->image?>" class="w-100" alt="">

                                                <?php } else {?>
                                                    <img src="<?php echo $http_host?>upload/policies_image/score_detail/medium/noimage.jpg">
                                                <?php } ?>
                                                

                                                <span>Score Details</span>

                                               

                                            </div>

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

                                        foreach($create_array as $key => $value){

                                            $explode = explode('-',$value);

                                            $policies_data = $this->compare_policies_model->get_policies_new($explode[0],$explode[1]);
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

                                $compare_name = $this->compare_policies_model->get_compare_name(); 

                                //echo"<pre>";print_r($compare_name);echo"</pre>";

                                ?>

                                <?php 

                                $ct = 0;
                                foreach($compare_name as $compare_name_data){ 

                                    $get_compare_id_new = $this->compare_policies_model->get_compare_title_detail($compare_name_data->id);
                                ?>

                               
                                <tr>

                                    <td scope="row" colspan="4" class="dark"><?php echo $compare_name_data->name?></td>

                                    

                                </tr>
                            
                            <?php    
                            $i=1;
                            foreach($get_compare_id_new as $get_compare_name_new){ 

                                

                            ?>

                                <tr>

                                    <td scope="row"><?php echo $i;?>. <?php echo $get_compare_name_new->name ?></td>

                                    <?php 


                                    foreach($create_array as $key1 => $value1){

                                            $explode = explode('-',$value1);

                                $attribute = $this->compare_policies_model->get_attribute($compare_name_data->id,$get_compare_name_new->id,$explode[0]);

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
                                                <?php } else{ ?>
                                                    <div class="check-wrong">

                                                        <span>&times;</span>

                                                    </div>
                                                <?php }?>

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
                            <?php $i++;} ?>
                            <?php $ct++;} ?>
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

                

            </div>

        <?php }else { echo "No data Available";} ?>

        </div>

    </section>

   
<?php include('includes/footer.php');?>
<script>
    function remove_compare_data(policy_id,policy_price) {

    

    var conf = confirm("Are you sure you want to delete");

    if (conf == true) {
		$('#hidden_policy_id').val(policy_id);
		$('#hidden_policy_price').val(policy_price);
        $('#remove_form').submit();

    } else {

        return false;

    }

}
</script>
