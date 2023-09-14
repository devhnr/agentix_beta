<?php include('include/header.php');?><!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="javascript:void(0);"> Upload Claims Api Data</a>
                        </li>
                        <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li class="crumb-link"><a href="<?php echo $base_url; ?>city/lists">Upload Claims Api Data</a></li>
                </ol>
                </div>
                </div>

                <div id="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">
                                        <span class="glyphicon glyphicon-lock"></span>  Upload Claims Api Data </span>
                                </div>

                                <div class="panel-body">
                                    <?php if($this->session->flashdata('L_strErrorMessage'))   { ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                                        </div>

                                        <?php }   ?>

                                        <?php if($this->session->flashdata('flashError')!='') { ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <i class="fa fa-warning"></i>

                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error!</b> <?php echo $this->session->flashdata('flashError'); ?>
                                        </div><?php }  ?>

                                        <div id="validator"  class="alert alert-danger alert-dismissable" style="display:none;">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error &nbsp; </b><span id="error_msg1"></span> </div>
                                        <div class="col-md-12">

                                            <form role="form" id="form" method="post" action="<?php echo $base_url;?>claim/insert_claim_by_api" enctype="multipart/form-data">

                                            <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                            <INPUT TYPE="hidden" NAME="action" VALUE="add_XLS">

                                            <div class="form-group col-md-6">
                                                <label for="corporate_id">Corporate <span class="mandatory_field">*</span></label>
                                                <select id="corporate_id" name="corporate_id"
                                                    class="form-control" >
                                                    <option value="">--Select Corporate--</option>
                                                    <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                        foreach ($allcorporate as $corporate) {
                                                            ?>
                                                    <option value="<?php echo $corporate->id; ?>"><?php echo $corporate->co_name; ?>
                                                    </option>
                                                    <?php } } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="policy_no">Policy Number <span class="mandatory_field">*</span></label>
                                                <span id="show_policy_number">
                                                <select id="policy_no" name="policy_no" class="form-control">
                                                    <option value="">--Select Policy No--</option>
                                                    <?php  if($allproduct_name !='' && count($allproduct_name) > 0){
                                                    foreach($allproduct_name as $policy_no){ ?>
                                                    <option value="<?php echo $policy_no->id; ?>"><?php echo $policy_no->policy_no; ?></option>
                                                <?php } }  ?>
                                                </select>
                                                </span>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label >Policy Start Date</label>
                                                <input type="date" id="policy_start_date" name="policy_start_date" class="form-control" disabled/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label >Policy End Date</label>
                                                <input type="date" id="policy_end_date" name="policy_end_date" class="form-control" disabled/>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label style="width:100%; margin:15px 0 5px;" for="categoryname">TPA</label>
                                                <input id="tpa" name="tpa" type="text" class="form-control" required  disabled/>
                                            </div>
                                            
                                            

                                            <div class="form-group">
                                                <input class="submit btn bg-purple pull-right btnSubmit" type="submit" value="Submit" onclick="javascript:validate();return false;"/>
                                                <a href="<?php echo $base_url;?>claim/upload_claim_list" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>
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
</div><!-- End #Main -->
<?php include('include/footer.php')?>

<script>

function validate(){
    var corporate_id = $("#corporate_id").val();
    if (corporate_id == '') {
        $("#error_msg1").html("Please Select Corporate.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var policy_no = $("#policy_no").val();
    if (policy_no == '') {
        $("#error_msg1").html("Please Select Policy Number.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }


    $('.btnSubmit').val('Processing...');
    $('.btnSubmit').attr('disabled', true);
    $('#form').submit();



    // $.ajax({
    //     url : $('#form').attr('action'),
    //     type : 'post',
    //     data: $('#form').serialize(),
    //     dataType: 'json',
    //     success: function(data){
    //         console.log(data);
    //     }
    // });
}

$(document).on('change', '#corporate_id', function(){
    var corporate =  $(this).val();
    var url = '<?php echo $base_url; ?>claim/get_policy';
    $.ajax({
        url : url,
        type : 'post',
        data : 'corporate=' + corporate,
        dataType: 'json',
        success: function(data){
            console.log(data);
            if(data != ''){
                var html = '<option value="" selected>--Select Policy No.--</option>';
                var i;
                for(i=0; i<data.length; i++){
                    console.log(data[i]);
                    html += '<option value='+data[i].id+'>'+data[i].policy_no+'</option>';
                }
                $('#policy_no').html(html);
            }
        }
    });
});

$(document).on('change', '#policy_no', function(){
    var corporate =  $('#corporate_id').val();
    var policy_no = $(this).val();
    var url = '<?php echo $base_url; ?>claim/show_employee_data';
    $.ajax({
        url : url,
        type : 'post',
        data : 'corporate=' + corporate + '&policy_no=' + policy_no,
        dataType: 'json',
        success: function(data){
            console.log(data)
            if(data != ''){
                $("input[name*='policy_start_date']").val(data[0].policy_start_date);
                $("input[name*='policy_end_date']").val(data[0].policy_end_date);
                $("input[name*='tpa']").val(data[0].tpa);
            }else{
                $("#tpa,#policy_start_date,#policy_end_date").val('');
            }
        }
    });

});


</script>
