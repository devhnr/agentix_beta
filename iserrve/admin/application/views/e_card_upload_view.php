<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> E-Card Upload</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>ecards/list">E-Card</a></li>
                    <li class="crumb-trail">Add a E-Card</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title">
                          <span class="glyphicon glyphicon-lock"></span> E- Card Upload </span> </div>
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
                                <form method="POST" action="<?php echo $base_url;?>ecards/multiple_upload" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="corporate_id">Corporate</label>
                                        <select id="corporate_id" name="corporate_id"
                                            class="form-control customcardinput">
                                            <option value="">--Select Corporate--</option>
                                            <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                foreach ($allcorporate as $corporate) { ?>
                                            <option value="<?php echo $corporate->id; ?>"><?php echo $corporate->co_name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                        <span class="errors" id="reg_err" style="color:red; font-size:13px;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_no">Policy Name</label>
                                        <select class="form-control" id="policy_id" name="policy_id" required>
                                            <option>--Selected--</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;">File Upload</label>
                                        <input type="file" class="form-control customcardinput" multiple="multiple" name="pdf_file[]" id="pdf_p">
                                        <span class="errors" id="reg1_err" style="color:red; font-size:13px;"></span>
                                    </div>
                                    <div class="form-group">
                                        <button class="submit btn bg-purple pull-right" type="submit" id="btnUpload">Submit</button>
                                        <a href="<?php echo $base_url;?>ecards/list" class="submit btn bg-purple pull-right"
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#corporate_id').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url('ecards/get_policy_details');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    console.log(data)
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+'>'+data[i].product_name+'</option>';
                    }
                    $('#policy_id').html(html);

                }
            });
            return false;
        });

        $(document).on('click','#btnUpload', function(){
            if($('#corporate_id').val() == ''){
                $("#reg_err").html("Please select corporate").show();
                return false;
            }
            if($('#pdf_p').val() == ''){
                $("#reg1_err").html("Please select file").show();
                return false;
            }

            var banner_ex = $('#pdf_p').val().split('.').pop().toLowerCase();
            if(banner_ex != '' && banner_ex != 'pdf' ){
                $("#reg1_err").html("Only support pdf file type").show();
                return false;
            }
        });

        $('.customcardinput').bind('change', function() {
            if($('#corporate_id').val() == ''){
                $("#reg_err").html("Please select corporate").show();
                return false;
            }else{
                $("#reg_err").html("").show();
            }

            if($('#pdf_p').val() == ''){
                $("#reg1_err").html("Please select file").show();
                return false;
            }else{
                $("#reg1_err").html("").show();
            }

            var banner_ex = $('#pdf_p').val().split('.').pop().toLowerCase();
            if(banner_ex != '' && banner_ex != 'pdf' ){
                $("#reg1_err").html("Only support pdf file type").show();
                return false;
            }else{
                $("#reg1_err").html("").show();
            }
        });
    });
</script>
