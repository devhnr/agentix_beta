<?php include('includes/header.php');?>
 <section>

        <div class="container">

            <div class="row">

                <div class="col-lg-4">

                    

                    <h3 class="mb-3"><?php echo $policy_cat_data->name;?></h3>

                </div>

                

                <?php


                if($all_policy != ''){
                ?>

                <div class="col-lg-8">

                    <form id="search_mini_form" name="search_mini_form" action="<?php echo $base_url_search; ?>" method="get">

                        <input type="hidden" name="sort_by" id="test" value="<?php echo $sort_by;  ?>">

                        <input type="hidden" name="insurer" id="insurer_test" value="<?php echo $insurer;  ?>">

                        <input type="hidden" name="sum_insurer" id="sum_insurer_test" value="<?php echo $sum_insurer;  ?>">

                        <input type="hidden" name="menu" id="menu" value="<?php echo $this->input->get('menu');  ?>">

                    <div class="drop-flex">

                        <!-- <select name="" id="sort_by" onchange='document.getElementById("test").value = this.value;allfilter();'>

                            <option value="default" <?php if($this->input->get('sort_by') == '') echo 'selected';  ?>>Sort by Price</option>

                            <option value="hightolow" <?php if($this->input->get('sort_by') == 'hightolow') echo 'selected'; ?>>Price High to low</option>

                            <option value="lowtohigh" <?php if($this->input->get('sort_by') == 'lowtohigh') echo 'selected'; ?>>Price Low to High</option>

                        </select> -->



                        <select name="insurer" id="insurer" onchange='document.getElementById("insurer_test").value = this.value;allfilter();'>

                            <option value="" <?php if($this->input->get('insurer') == '') echo 'selected';  ?>>Select Insurer</option>

                            <?php  if($all_company_name !='' && count($all_company_name) > 0){ 

                                foreach($all_company_name as $company_name){ ?>

                                <option value="<?php echo $company_name->id; ?>" <?php if($this->input->get('insurer') == $company_name->id) echo 'selected'; ?>><?php echo $company_name->name; ?></option>

                            <?php } } ?>

                            <!-- <option value="">HDFC</option> -->

                        </select>



                        <select name="sum_insurer" id="sum_insurer" onchange='document.getElementById("sum_insurer_test").value = this.value;allfilter();'>

                            <option value="" <?php if($this->input->get('sum_insurer') == '') echo 'selected';  ?>>Select Sum Insured</option>

                            <?php  if($get_sum_insured_detail !='' && count($get_sum_insured_detail) > 0){ 

                                foreach($get_sum_insured_detail as $sum_insured_detail){ ?>

                            <option value="<?php echo $sum_insured_detail->id; ?>" <?php if($this->input->get('sum_insurer') == $sum_insured_detail->id) echo 'selected'; ?>><?php echo $sum_insured_detail->name; ?></option>
                            <?php } } ?>

                            <!-- <option value="">2000000</option> -->

                        </select>

                    </div>

                </form>

                </div>

            <?php } ?>

            </div>

            <div class="row">

                <?php


                if($all_policy != ''){

                    foreach($all_policy as $all_policy_data){

                        $company_data = $this->agent_admin_model->get_company_logo($all_policy_data->company_id);
                        //echo"<pre>";print_r($company_data);echo"</pre>";
                ?>

                <div class="col-lg-4">

                    <div class="insur-list">

                        <div class="insur-img-head">

                            <div class="insure-logo">

                                <img src="<?php echo $http_host?>upload/policies_image/medium/<?php echo $company_data->image?>" alt="">

                            </div>

                            <div class="insure-title">

                                <span>Plan Name</span>

                                <h6><?php echo $all_policy_data->plan_name;?></h6>

                            </div>

                            

                        </div>

                        <?php 

                        $top_feature = $this->agent_admin_model->get_top_feature($all_policy_data->id);

                        if($top_feature != ''){
                        ?>

                        <div class="insur-feat">

                            <h6>Top Features</h6>

                            <ul>

                                <?php foreach($top_feature as $top_feature_detail){

                                        if($top_feature_detail->name !=''){

                                ?>

                                        <li><?php echo $top_feature_detail->name;?></li>

                                <?php } }?>

                                <!-- <li>IT Consultant Services cover</li>

                                <li>Cyber Extortion</li> -->

                            </ul>

                            <button type="button" class="btn" data-toggle="modal" data-target="#featuresmodal_<?php echo $all_policy_data->id;?>"> <i class="feather icon-feather-arrow-up-right"></i> More Features</button>

                        </div>

                    <?php } 

                        $get_sum_insured_using_min_price = $this->agent_admin_model->get_sum_insured_using_min_price($all_policy_data->id,$all_policy_data->minprice_policies);

                        //echo"<pre>";print_r($all_policy_data);echo"</pre>";

                        $sum_insuranced_name = $this->agent_admin_model->get_sum_insuranced($get_sum_insured_using_min_price->sum_insured_id);
                    ?>

                        <div class="insur-desc">

                            <!--<div class="insur-feat-cta" >

                                <span>Premium Amount</span>

                                <h6>₹ <?php 
                                    $premium_amount_filter = $all_policy_data->minprice_policies;

                                    if($premium_amount_filter != 0){
                                    echo $all_policy_data->minprice_policies;
                                    }else{
                                        echo "-";
                                    }
                                    
                                    ?></h6>

                            </div> -->

                            <div class="insur-rate">

                                <span>Sum Insured</span>

                                <h6>₹ <?php 
                                    $sum_insured_filter = $sum_insuranced_name->name;
                                    echo $sum_insuranced_name->name; ?></h6>

                            </div>



                            

                        </div>

                        <div class="insur-cta">

                            <!-- <button type="button" class="btn com-cta" data-toggle="modal" data-target="#exampleModal"><i class="feather icon-feather-repeat"></i> Compare</button> -->

                            <button type="button" class="btn com-cta" onclick="compare_policy('<?php echo $all_policy_data->id;?>','<?php echo $premium_amount_filter;?>','<?php echo $sum_insured_filter;?>','<?php echo $all_policy_data->plan_name;?>');"><i class="feather icon-feather-repeat"></i> Compare</button>

                            <!-- <a href="#" class="btn buy-cta">Buy Now</a> -->

                        </div>

                    </div>

                </div>

            <?php }  }else{?>


                <?php echo "No Policies Available For this";} ?>

                <!-- <div class="col-lg-4">

                    <div class="insur-list">

                        <div class="insur-img-head">

                            <div class="insure-logo">

                                <img src="<?php echo $base_url_views ?>agent-admin/img/inslogo1.jpg" alt="">

                            </div>

                            <div class="insure-title">

                                <span>Plan Name</span>

                                <h6>Retail Cyber Liability Insurance</h6>

                            </div>

                            

                        </div>

                        <div class="insur-feat">

                            <h6>Top Features</h6>

                            <ul>

                                <li>Counselling Services</li>

                                <li>IT Consultant Services cover</li>

                                <li>Cyber Extortion</li>

                            </ul>

                            <button type="button" class="btn" data-toggle="modal" data-target="#featuresmodal"> <i class="feather icon-feather-arrow-up-right"></i> More Features</button>

                        </div>



                        <div class="insur-desc">

                            <div class="insur-feat-cta">

                                <span>Premium Amount</span>

                                <h6>₹ 736.32</h6>

                            </div>

                            <div class="insur-rate">

                                <span>Sum Insured</span>

                                <h6>₹ 10,000/-</h6>

                            </div>

                            

                            

                        </div>

                        <div class="insur-cta">

                            <a href="#" class="btn com-cta"><i class="feather icon-feather-repeat"></i> Compare</a>

                            <a href="#" class="btn buy-cta">Buy Now</a>

                        </div>

                    </div>

                </div> -->

                <!-- <div class="col-lg-4">

                    <div class="insur-list">

                        <div class="insur-img-head">

                            <div class="insure-logo">

                                <img src="<?php echo $base_url_views ?>agent-admin/img/inslogo1.jpg" alt="">

                            </div>

                            <div class="insure-title">

                                <span>Plan Name</span>

                                <h6>Retail Cyber Liability Insurance</h6>

                            </div>

                            

                        </div>

                        <div class="insur-feat">

                            <h6>Top Features</h6>

                            <ul>

                                <li>Counselling Services</li>

                                <li>IT Consultant Services cover</li>

                                <li>Cyber Extortion</li>

                            </ul>

                            <button type="button" class="btn" data-toggle="modal" data-target="#featuresmodal"> <i class="feather icon-feather-arrow-up-right"></i> More Features</button>

                        </div>



                        <div class="insur-desc">

                            <div class="insur-feat-cta">

                                <span>Premium Amount</span>

                                <h6>₹ 736.32</h6>

                            </div>

                            <div class="insur-rate">

                                <span>Sum Insured</span>

                                <h6>₹ 10,000/-</h6>

                            </div>

                            

                            

                        </div>

                        <div class="insur-cta">

                            <a href="#" class="btn com-cta"><i class="feather icon-feather-repeat"></i> Compare</a>

                            <a href="#" class="btn buy-cta">Buy Now</a>

                        </div>

                    </div>

                </div> -->

            </div>

        </div>

    </section>

    <div class="compare-float">

        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal"><i class="feather icon-feather-repeat"></i></button>

    </div>

    





<!-- Compare Modal -->

<div class="modal compare-modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Compare </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

            <div id="mydiv_pc">

           <div class="add-ins-list">

                <div class="row">

                    <div class="col-lg-12">

                        <?php

                        //echo"<pre>";print_r($this->session->userdata('compare_array'));echo"</pre>";
                        if($this->session->userdata('compare_array') != ''){
                        foreach($this->session->userdata('compare_array') as $key => $value){



                            $explode = explode('|',$value);

                            $policies_data = $this->agent_admin_model->get_policies_new($explode[0],$explode[1]);
                            
                            $company_logo = $this->agent_admin_model->get_company_image($policies_data->company_id);

                            //echo"<pre>";print_r($company_logo);echo"</pre>";
                        

                        ?>

                        <div class="added-ins">

                            <div class="ins-img">

                                <?php if($company_logo !=''){?>

                                    <img src="<?php echo $http_host?>upload/policies_image/medium/<?php echo $company_logo?>" alt="">
                                <?php } else {?>

                                    <img src="<?php echo $http_host?>upload/policies_image/medium/noimage.jpg">

                                <?php } ?>

                            </div>

                            <div class="ins-name">

                                <h6><?php echo $policies_data->plan_name?></h6>

                            </div>

                            <div class="ins-name">

                                <h6><?php echo number_format($policies_data->price,2,".","");?></h6>

                            </div>

                            <button type="button" class="close">

                                <span onclick="remove_compare_data('<?php echo $base_url; ?>agent_admin/delete_compare/<?php echo $explode[0]; ?>/<?php echo $explode[1]; ?>/<?php echo $explode[2]; ?>/<?php echo $policy_cat_data->page_url;?>');">&times;</span>

                              </button>

                        </div>

                    <?php } }else{ echo "No Data Available";}?>

                        <!-- <div class="added-ins">

                            <div class="ins-img">

                                <img src="<?php echo $base_url_views ?>agent-admin/img/inslogo1.jpg" alt="">

                            </div>

                            <div class="ins-name">

                                <h6>Retail Cyber Liability Insurance</h6>

                            </div>

                            <button type="button" class="close">

                                <span >&times;</span>

                              </button>

                        </div> -->

                    </div>

                </div>

           </div>

            </div>

        </div>

        <div class="modal-footer">

          
            <a href="<?php echo $base_url?>agent-admin/compare" class="btn compare-btn" style="
    width: 100%;
    text-align: center;
    background: var(--altcolor);
    color: #fff;
    padding: 10px;
">Compare Now <i class="feather icon-feather-chevrons-right"></i></a>
          <!-- <button type="button" class="btn compare-btn">Compare Now <i class="feather icon-feather-chevrons-right"></i></button> -->

        </div>

      </div>

    </div>

</div>


<?php


if($all_policy != ''){

    foreach($all_policy as $all_policy_data){

        $coverage_details = $this->agent_admin_model->get_covergae_detail($all_policy_data->id);

        $exclusion_details = $this->agent_admin_model->get_exclusions_attr_detail($all_policy_data->id);

?>

<div class="modal feat-modal fade" id="featuresmodal_<?php echo $all_policy_data->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">All Features </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <div class="row">

            <div class="col-lg-12">

                <div class="accordion" id="accordionExample">

                    <?php if($coverage_details !=''){?>

                    <div class="accordion-item">

                      <h2 class="accordion-header" id="headingOne">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                          Coverage

                        </button>

                      </h2>

                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                        <div class="accordion-body">

                            <ul class="more-feat">

                                <?php foreach($coverage_details as $coverage_details){ ?>

                                <li>

                                    <h5><?php echo $coverage_details->name?></h5>

                                    <p><?php echo $coverage_details->description?></p>

                                </li>
                                <?php }?>

                                <!-- <li>

                                    <h5>Protection From Legal Suits From A Family Member</h5>

                                    <p>Any claim arising to defend against legal suits from your family members, any person residing with you is not covered</p>

                                </li>

                                <li>

                                    <h5>Cost of Upgrading Devices</h5>

                                    <p>Any costs of betterment of your personal device beyond the state existing prior to the Insured Event, unless unavoidable, is not covered.</p>

                                </li> -->

                            </ul>

                        </div>

                      </div>

                    </div>

                <?php } ?>

                <?php if($exclusion_details !=''){?>

                    <div class="accordion-item">

                      <h2 class="accordion-header" id="headingTwo">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                          Exclusion

                        </button>

                      </h2>

                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

                        <div class="accordion-body">

                            <ul class="more-feat">

                                <?php foreach($exclusion_details as $exclusion_details){?>

                                <li>

                                    <h5><?php echo $exclusion_details->title?></h5>

                                    <p><?php echo $exclusion_details->description?></p>

                                </li>

                                <?php }?>
<!-- 
                                <li>

                                    <h5>Protection From Legal Suits From A Family Member</h5>

                                    <p>Any claim arising to defend against legal suits from your family members, any person residing with you is not covered</p>

                                </li>

                                <li>

                                    <h5>Cost of Upgrading Devices</h5>

                                    <p>Any costs of betterment of your personal device beyond the state existing prior to the Insured Event, unless unavoidable, is not covered.</p>

                                </li>
 -->
                            </ul>

                        </div>

                      </div>

                    </div>
                <?php } ?>
                    

                  </div>



                <div class="down-btn-flex mt-3">

                    <?php if($all_policy_data->pdf_file !=''){ ?>

                    <a href="<?php echo base_url().'agent_admin/download/'.$all_policy_data->pdf_file; ?>" class="btn"><i class="feather icon-feather-download"></i> Download Policy Wording </a>

                    <?php } ?>

                    <?php if($all_policy_data->brochure !=''){ ?>

                    <a href="<?php echo base_url().'agent_admin/download_brochure/'.$all_policy_data->brochure; ?>" class="btn"><i class="feather icon-feather-file"></i> Download Brochure </a>

                    <?php } ?>

                </div>

            </div>

          </div>

            

        </div>

       

      </div>

    </div>

</div>
<?php } } ?>

<?php include('includes/footer.php');?>
<script type="text/javascript">

function allfilter() {
    document.search_mini_form.submit();
}

function compare_policy(policy_id,premium_amount,sum_insured,plan_name){

    var url = '<?php echo $base_url?>agent_admin/compare_policy';

    $.ajax({

        url:url,
        type: 'POST',
        data:{

            'policy_id': policy_id,

            'plan_name': plan_name,

            'premium_amount': premium_amount,

            'sum_insured': sum_insured,

        },

        success : function(msg){
            $("#mydiv_pc").load(location.href + " #mydiv_pc");
            $('#exampleModal').modal('show');
        }
    })

}

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
