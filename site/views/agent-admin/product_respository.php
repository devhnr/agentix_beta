<?php include('includes/header.php');?>
 
<section>

<div class="container">

    <div class="row">

        <div class="col-lg-12 text-center mb-3">

            <h1>Product Repository</h1>

        </div>

    </div>
        <form>
    <select name="insurer" id="insurer" onchange='reloadPageWithInsuid(this.value)'>

                            <option value="" <?php if($this->input->get('insurer') == '') echo 'selected';  ?>>Select Insurer</option>

                            <?php  if($all_company_name !='' && count($all_company_name) > 0){ 

                                foreach($all_company_name as $company_name){ ?>

                                <option value="<?php echo $company_name->id; ?>" <?php if($this->input->get('insuid') == $company_name->id) echo 'selected'; ?>><?php echo $company_name->name; ?></option>

                            <?php } } ?>

                            <!-- <option value="">HDFC</option> -->

                        </select>
                    </form>

    <div class="row">

        <?php if($all_policy_repository != ''){ ?>
        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>Policy</th>

                        <th>Policy Wording</th>

                        <th>Brochure</th>

                        <th>Send Email Document</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($all_policy_repository as $all_policy_repository_data){ 

                        //echo "<pre>";print_r($all_policy_repository_data);echo"</pre>";

                            $policy_data = $this->agent_admin_model->get_policy_usingid_new($all_policy_repository_data->policy_id);

                            if($_GET['insuid'] != ''){
                                if($_GET['insuid'] == $policy_data->company_id){
                                    $style = 0;
                                }else{
                                    $style = 1;
                                }
                            }else{
                                $style = 0;
                            }

                            $policy_wording_data = $this->agent_admin_model->policy_repository_data($policy_data->id,'1');

                            $policy_brochure_data = $this->agent_admin_model->policy_repository_data($policy_data->id,'2');

                            ///echo "<pre>";print_r($policy_data);echo"</pre>";
                        ?>
                        <?php if($style == 0){ ?>
                    <tr style="<?php echo $style; ?>">

                        <td><?php echo $policy_data->plan_name?></td>

                        <td>
                            <?php if($policy_wording_data->document_file != ''){ ?>
                                <a href="<?php echo $base_url?>agent_admin/policy_rep_doc_download/<?php echo $policy_wording_data->document_file?>" class="btn btn-warning"><i class="feather icon-feather-download"></i></a>

                                <!-- <input type="checkbox" name="wording_checkbox[]" value="<?php echo $policy_wording_data->document_file?>"> -->
                            <?php }else{ echo "-";} ?>
                        </td>

                        <td>
                            <?php if($policy_brochure_data->document_file != ''){ ?>
                            <a href="<?php echo $base_url?>agent_admin/policy_rep_doc_download/<?php echo $policy_brochure_data->document_file?>" class="btn btn-success"><i class="feather icon-feather-download"></i></a>

                            <!-- <input type="checkbox" name="wording_checkbox[]" value="<?php echo $policy_brochure_data->document_file?>"> -->

                            <?php }else{ echo "-";} ?>
                        </td>

                        <td>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#repform"><i class="feather icon-feather-envelope"></i> Send in Email</button> -->

                            <button type="button" class="btn btn-primary" id="send_mail" data-policy_id="<?php echo $all_policy_repository_data->policy_id;?>" data-policy_cat_id="<?php echo $all_policy_repository_data->cat_id;?>"><i class="feather icon-feather-envelope"></i> Send in Email</button>
                        </td>

                       

                    </tr>

                <?php } ?>

                <?php } ?>

                    <!-- <tr>

                        <td>Arogya Sanjeevani Policy,

                            Bajaj Allianz General Insurance Company Limited</td>

                        <td><a href="#" class="btn btn-warning"><i class="feather icon-feather-download"></i></a></td>

                        <td><a href="#" class="btn btn-success"><i class="feather icon-feather-download"></i></a></td>

                        <td>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#repform"><i class="feather icon-feather-envelope"></i> Send in Email</button>

                        </td>

                       

                    </tr>

                    <tr>

                        <td>Critical Illness</td>

                        <td><a href="#" class="btn btn-warning"><i class="feather icon-feather-download"></i></a></td>

                        <td><a href="#" class="btn btn-success"><i class="feather icon-feather-download"></i></a></td>

                        <td>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#repform"><i class="feather icon-feather-envelope"></i> Send in Email</button>

                        </td>

                       

                    </tr>

                    <tr>

                        <td>Extra Care</td>

                        <td><a href="#" class="btn btn-warning"><i class="feather icon-feather-download"></i></a></td>

                        <td><a href="#" class="btn btn-success"><i class="feather icon-feather-download"></i></a></td>

                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#repform"><i class="feather icon-feather-envelope"></i> Send in Email</button></td>

                       

                    </tr>

                    <tr>

                        <td>Health Guard</td>

                        <td><a href="#" class="btn btn-warning"><i class="feather icon-feather-download"></i></a></td>

                        <td><a href="#" class="btn btn-success"><i class="feather icon-feather-download"></i></a></td>

                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#repform"><i class="feather icon-feather-envelope"></i> Send in Email</button></td>

                       

                    </tr> -->

                </tbody>



            </table>

            <!-- <div class="col-lg-12 text-center mb-3">

                <button type="button" class="btn com-cta bg-blue" id="download_multiple">Download</button>

            </div> -->

        </div>

    <?php } ?>

    </div>

</div>

</section>
   
<?php include('includes/footer.php');?>

<div class="modal fade" id="repform_old" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

          <div class="modal-content">

            

            <div class="modal-body">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <form class="rep-form" method="post" action="<?php echo $base_url;?>agent_admin/product_repository_single_policy_mail"  enctype="multipart/form-data" id="mail_model" class="rep-form">

                    <div class="row">

                        <div class="col-lg-12">

                            <h3 class="mb-4">Send Documents in Email</h3>                      

                        </div>

                    </div>

                    <div class="row">

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
                        <input type="hidden" class="w-100" name="policy_id" id="policy_id">
                        <input type="hidden" class="w-100" name="policy_cat_id" id="policy_cat_id">
                        <input type="hidden" class="w-100" name="cate_page_url" id="cate_page_url" value="<?php echo $policy_cat_data->page_url;?>">

                        <span id="contact_error_login" class="error alert-message valierror " style="display: none;"></span>
                            <span id="contact_success" class="successmain alert-message" style="display:none;"></span>

                        <div class="col-lg-12">

                            <button type="button" class="btn" id="send_mail_validation">Submit</button>

                        </div>

                    </div>

                </form>

            </div>

            

          </div>

        </div>

      </div>

      <div class="modal fade" id="repform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

          <div class="modal-content">

            

            <div class="modal-body">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <form action="" class="rep-form">

                    <div class="row">

                        <div class="col-lg-12">

                            <h3 class="mb-4">Send Documents in Email</h3>                      

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <input type="text" class="w-100" placeholder="Enter Name">

                           

                        </div>

                        <div class="col-lg-12">

                            <input type="text" class="w-100" placeholder="Enter Email Address">

                            

                        </div>

                        <div class="col-lg-12">

                            <input type="text" class="w-100" placeholder="Enter Mobile Number">

                        </div>

                        <div class="col-lg-12">

                            <button type="button" class="btn ">Submit</button>

                        </div>

                    </div>

                </form>

            </div>

            

          </div>

        </div>

      </div>



<script>
     $(document).on('click', '#send_mail', function(){

        var policy_id = $(this).data('policy_id');
        var policy_cat_id = $(this).data('policy_cat_id');

        $('#policy_id').val(policy_id);
        $('#policy_cat_id').val(policy_cat_id);

        $('#repform_old').modal('show');

       
          
    });

     $(document).on('click', '#send_mail_validation', function(){

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

     });

     $(document).on('click', '#download_multiple', function(){


        var checkboxes = document.getElementsByName("wording_checkbox[]");
        var checkedValues = [];

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedValues.push(checkboxes[i].value);
            }
        }

        if (checkedValues.length === 0) {
            alert("Please check at least one checkbox.");
        } else {
            //alert("Checked values: " + checkedValues.join(", "));

            // Perform AJAX request to send checkedValues to the server
            // You can use a library like jQuery or fetch for AJAX
            // Example using jQuery:
            var url = '<?php echo $base_url?>agent_admin/zip_download'
            $.ajax({
                type: "POST",
                url: url,
                data: { checkboxes: checkedValues },
                success: function(response) {
                    if (response === 'error') {
                        alert("Error creating zip file.");
                    } else {

                        var downloadUrl = '<?php echo $base_url ?>agent_admin/zip_download';

                        // Add the filename to the URL
                        downloadUrl += '?download=' + response;
                        window.location.href = downloadUrl;
                    }
                }
            });
        }
       
          
    });

     function reloadPageWithInsuid(id) {
  var currentURL = window.location.href;

  var currentURL = window.location.href;

  // Check if the "insuid" parameter already exists in the URL
  if (currentURL.indexOf('insuid=') !== -1) {
    // "insuid" parameter already exists, so we'll update its value
    var regex = /(\?|&)insuid=[^&]*/;
    currentURL = currentURL.replace(regex, '$1insuid=' + id);
  } else {
    // "insuid" parameter doesn't exist, so we'll add it
    if (currentURL.indexOf('?') !== -1) {
      // URL already has other parameters, so we'll add "insuid" with "&" separator
      currentURL += '&insuid=' + id;
    } else {
      // URL doesn't have any parameters, so we'll add "insuid" with "?" separator
      currentURL += '?insuid=' + id;
    }
  }

  // Redirect to the updated URL
  window.location.href = currentURL;
}

</script>
