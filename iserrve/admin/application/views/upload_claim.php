<?php include('include/header.php');?><!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="javascript:void(0);"> Upload Claims Data</a>
                        </li>
                        <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li class="crumb-link"><a href="<?php echo $base_url; ?>city/lists">Upload Claims Data</a></li>
                </ol>
                </div>
                </div>

                <div id="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">
                                        <span class="glyphicon glyphicon-lock"></span>  Upload Claims Data </span>
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

                                            <form role="form" id="form" method="post" action="<?php echo $base_url;?>claim/add_file" enctype="multipart/form-data">

                                            <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                            <INPUT TYPE="hidden" NAME="action" VALUE="add_XLS">

                                            <div class="form-group col-md-6">
                                                <label for="corporate_id">Corporate</label>
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
                                                <label for="policy_no">Policy Number</label>
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

                                            <div class="form-group col-md-12">
                                                <label style="width:100%; margin:15px 0 5px;" for="categoryname">Upload Claims XLS <!-- <span style="color:red"> *<span>--></label>
                                                <input id="csvfile" name="csv" type="file" class="form-control" placeholder="XLS" required  />
                                            </div>
                                            <a style="margin-top: 20px" href="<?php echo $front_base_url;?>upload/XLS_file/claim-mis-template.csv" class="btn btn-alert pull-left">Download Template Format</a>
                                            
                                            <div class="col-lg-12">
                                                <div class="admin-notes">
                                         <h5>Note:</h5>
                                         <ul class="">
                                             <li>Relationships acceptable in the Relation Column of the template: Employee, Spouse, Son, Daughter, Mother, Father, Mother-in-Law, Father-in-Law: </li>
                                             <li>he claim type should be:  “Cashless” or “Reimbursement”

</li>
<li>
    Claim status should be: “paid”, “closed”, “under process” or “rejected”


</li>
<li>
   It is mandatory to have one of these in the template: TPA Claim Number or Insurance claim number 


</li>
<li>Date Format: dd-mm-yyyy.
</li>
<li>Gender to be mentioned:
    <ul class="inner-ul">
        <li>M for Male</li>
        <li>F for Female</li>
    </ul>
</li>
                                         </ul>
                                     </div>
                                            </div>

                                            <div class="form-group">

                                                <input class="submit btn bg-purple pull-right" type="submit" value="Submit" onclick="javascript:validate();return false;"/>

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

    var file = $("#csvfile").val();
    if(file == ''){
        $("#error_msg1").html("Please Select Upload Claim Data XLS file.");
        $("#validator").css("display","block");
        return false;
    }

    if (!(/\.(xlsx|xls|xlsm|csv)$/i).test(file)) {
        $("#error_msg1").html("Please upload valid excel file .xlsx, .xlsm, .xls, .csv only.");
        $("#validator").css("display", "block");
        $('html, body').animate({
        'scrollTop': $("#error_msg1").position().top
        });
        return false;
        }
        
    $('#form').submit();
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
            //if(data != ''){
                var html = '<option value="" selected>--Select Policy No.--</option>';
                var i;
                for(i=0; i<data.length; i++){
                    console.log(data[i]);
                    html += '<option value='+data[i].id+'>'+data[i].policy_no+'</option>';
                }
                $('#policy_no').html(html);
            //}
        }
    });
});


</script>
