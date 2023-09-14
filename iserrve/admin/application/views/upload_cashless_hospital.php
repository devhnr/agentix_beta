<?php include('include/header.php');?><!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="javascript:void(0);"> Upload Cashless Hospital</a>
                        </li>
                        <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li class="crumb-link"><a href="<?php echo $base_url; ?>city/lists">Upload Cashless Hospital</a></li>          <li class="crumb-trail">Upload Cashless Hospital</li>
                </ol>
                </div>
                </div>

                <div id="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">

                                <div class="panel-heading">
                                    <span class="panel-title">
                                        <span class="glyphicon glyphicon-lock"></span> Upload Cashless Hospital </span>
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

                                            <form role="form" id="form" method="post" action="<?php echo $base_url;?>cashless_hospital/add_file" enctype="multipart/form-data">

                                            <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                            <INPUT TYPE="hidden" NAME="action" VALUE="add_XLS">

                                            <div class="form-group col-md-6">
                                                <label for="name">Insurer <span class="mandatory_field">*</span></label>
                                                <!-- <select id="insurer" name="insurer" class="form-control">
                                                    <option value="">Select Insurer</option>
                                                    <option value="Acko General Insurance Ltd.">Acko General Insurance Ltd.</option>
                                                    <option value="Aditya Birla Health insurance Co Ltd.">Aditya Birla Health insurance Co Ltd.</option>
                                                    <option value="Aditya Birla SunLife Insurance Co. Ltd.">Aditya Birla SunLife Insurance Co. Ltd.</option>
                                                    <option value="Aegon Life Insurance Company Limited">Aegon Life Insurance Company Limited</option>
                                                    <option value="Agriculture Insurance Company of India Ltd.">Agriculture Insurance Company of India Ltd.</option>
                                                    <option value="Aviva Life Insurance Company India Ltd.">Aviva Life Insurance Company India Ltd.</option>
                                                    <option value="Bajaj Allianz General Insurance Co. Ltd">Bajaj Allianz General Insurance Co. Ltd</option>
                                                    <option value="Bajaj Allianz Life Insurance Co. Ltd.">Bajaj Allianz Life Insurance Co. Ltd.</option>
                                                    <option value="Bharti AXA Life Insurance Company Ltd">Bharti AXA Life Insurance Company Ltd</option>
                                                    <option value="Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited">Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited</option>
                                                    <option value="Care Health Insurance Ltd">Care Health Insurance Ltd</option>
                                                    <option value="Cholamandalam MS General Insurance Co. Ltd">Cholamandalam MS General Insurance Co. Ltd</option>
                                                    <option value="ECGC Ltd.">ECGC Ltd.</option>
                                                    <option value="Edelweiss General Insurance Company Limited ">Edelweiss General Insurance Company Limited </option>
                                                    <option value="Edelweiss Tokio Life Insurance Company Limited">Edelweiss Tokio Life Insurance Company Limited</option>
                                                    <option value="Exide Life Insurance Co. Ltd">Exide Life Insurance Co. Ltd</option>
                                                    <option value="Future Generali India Insurance Co. Ltd.">Future Generali India Insurance Co. Ltd.</option>
                                                    <option value="Future Generali India Life Insurance Company Limited">Future Generali India Life Insurance Company Limited</option>
                                                    <option value="Go Digit General Insurance Limited">Go Digit General Insurance Limited</option>
                                                    <option value="Go Digit General Insurance Limited">HDFC ERGO General Insurance Co. Ltd</option>
                                                    <option value="HDFC Life Insurance Co. Ltd">HDFC Life Insurance Co. Ltd</option>
                                                    <option value="ICICI Lombard General Insurance Co. Ltd.">ICICI Lombard General Insurance Co. Ltd.</option>
                                                    <option value="ICICI Prudential Life Insurance Co. Ltd.">ICICI Prudential Life Insurance Co. Ltd.</option>
                                                    <option value="IDBI Federal Life Insurance Company Limited">IDBI Federal Life Insurance Company Limited</option>
                                                    <option value="IFFCO-TOKIO General Insurance Co. Ltd.">IFFCO-TOKIO General Insurance Co. Ltd.</option>
                                                    <option value="IndiaFirst Life Insurance Company Ltd.">IndiaFirst Life Insurance Company Ltd.</option>
                                                    <option value="Kotak Mahindra General insurance co. Ltd.">Kotak Mahindra General insurance co. Ltd.</option>
                                                    <option value="Kotak Mahindra Life Insurance Co. Ltd.">Kotak Mahindra Life Insurance Co. Ltd.</option>
                                                    <option value="Liberty  General Insurance Co. Ltd.">Liberty  General Insurance Co. Ltd.</option>
                                                    <option value="Life Insurance Corporation of India">Life Insurance Corporation of India</option>
                                                    <option value="Magma HDI General Insurance Co. Ltd.">Magma HDI General Insurance Co. Ltd.</option>
                                                    <option value="Manipal Cigna Health Insurance Company Limited">Manipal Cigna Health Insurance Company Limited</option>
                                                    <option value="Max Life Insurance Co. Ltd.">Max Life Insurance Co. Ltd.</option>
                                                    <option value="National Insurance Co. Ltd.">National Insurance Co. Ltd.</option>
                                                    <option value="Navi General Insurance Ltd">Navi General Insurance Ltd</option>
                                                    <option value="Niva bupa health insurance company limited">Niva bupa health insurance company limited</option>
                                                    <option value="PNB MetLife India Insurance Co. Ltd">PNB MetLife India Insurance Co. Ltd</option>
                                                    <option value="Pramerica Life Insurance Co. Ltd.">Pramerica Life Insurance Co. Ltd.</option>
                                                    <option value="Raheja QBE General Insurance Co. Ltd.">Raheja QBE General Insurance Co. Ltd.</option>
                                                    <option value="Reliance General Insurance Co. Ltd.">Reliance General Insurance Co. Ltd.</option>
                                                    <option value="Reliance Nippon Life Insurance Company">Reliance Nippon Life Insurance Company</option>
                                                    <option value="Royal Sundaram General Insurance Co. Ltd">Royal Sundaram General Insurance Co. Ltd</option>
                                                    <option value="Sahara India Life Insurance Co. Ltd.">Sahara India Life Insurance Co. Ltd.</option>
                                                    <option value="SBI General Insurance Co. Ltd.">SBI General Insurance Co. Ltd.</option>
                                                    <option value="SBI Life Insurance Co. Ltd.">SBI Life Insurance Co. Ltd.</option>
                                                    <option value="Shriram General Insurance Co. Ltd.">Shriram General Insurance Co. Ltd.</option>
                                                    <option value="Shriram Life Insurance Co. Ltd.">Shriram Life Insurance Co. Ltd.</option>
                                                    <option value="Star Health & Allied Insurance Co. Ltd">Star Health & Allied Insurance Co. Ltd</option>
                                                    <option value="Star Union Dai-Ichi Life Insurance Co. Ltd.">Star Union Dai-Ichi Life Insurance Co. Ltd.</option>
                                                    <option value="TATA AIA Life Insurance Co. Ltd.">TATA AIA Life Insurance Co. Ltd.</option>
                                                    <option value="Tata-AIG General Insurance Co. Ltd.">Tata-AIG General Insurance Co. Ltd.</option>
                                                    <option value="The New India Assurance Co. Ltd.">The New India Assurance Co. Ltd.</option>
                                                    <option value="The Oriental Insurance Co. Ltd.">The Oriental Insurance Co. Ltd.</option>
                                                    <option value="United India Insurance Co. Ltd.">United India Insurance Co. Ltd.</option>
                                                    <option value="Universal Sompo General Insurance Co. Ltd.">Universal Sompo General Insurance Co. Ltd.</option>
                                                </select> -->

                                                <select id="insurer" name="insurer" class="form-control">
                                                      <option value="">Select Insurer</option>
                                                      <?php foreach(INSURER as $INSURER){ ?>
                                                        <option value="<?=$INSURER?>"><?=$INSURER?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="tpa">TPA <span class="mandatory_field">*</span></label>
                                                <select id="tpa" name="tpa" class="form-control">
                                                    <option value="">Select TPA</option>
                                                    <?php foreach(TPA as $TPA){ ?>
                                                      <option value="<?=$TPA?>"><?=$TPA?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="categoryname"> Upload Cashless Hospital XLS <span class="mandatory_field">*</span></label>
                                                <input id="csvfile" name="csv" type="file" class="form-control" placeholder="XLS" required  />
                                            </div>

                                            <div class="form-group">

                                                <input class="submit btn bg-purple pull-right btnSubmit" type="submit" value="Submit" onclick="javascript:validate();return false;"/>

                                                <a href="<?php echo $base_url;?>cashless_hospital/lists" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>
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
    var insurer = $("#insurer").val();
    if (insurer == '') {
        $("#error_msg1").html("Please Select Insurer.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var tpa = $("#tpa").val();
    if (tpa == '') {
        $("#error_msg1").html("Please Select TPA.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var file = $("#csvfile").val();
    if(file == ''){
        $("#error_msg1").html("Please Select Upload Cashless Hospital Data XLS file.");
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

    $('.btnSubmit').val('Processing...');
    $('.btnSubmit').attr('disabled', true);
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


</script>
