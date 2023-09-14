<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
          <div class="content-header" style="padding-top:0px !important;">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <select class="form-control select_policy">
                                  <?php if(!empty($this->policies)) {foreach ($this->policies as $p) { ?>
                                    <option value="<?=$p['id']?>"><?=$p['policy_no']?></option>
                                  <?php } } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <select class="form-control select_sum_insured">
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                              <li class="breadcrumb-item active">Policy Features</li>
                          </ol>
                      </div>
                  </div>
                  <div class="row p-tb-30px">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="activity">
                                        <div class="post">
                                            <div class="row mb-2 mt-2" id="policy_features_table"></div>
                                        </div>
                                    </div>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
$(document).ready(function() {
    getPolicyFeatures();
    getsumInsured();
    function getPolicyFeatures(){
        var policy_id = $(".select_policy option:selected").val();
        $.ajax({
            url : '<?= site_url("show-policy-features")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                if(data != ''){
                  $('#policy_features_table').html(data);
                }
            }
        });
        return false;
    }

    $(document).on('change', '.select_policy', function(){
      getPolicyFeatures();
      getsumInsured();
    });

    function getsumInsured(){
        var policy_id = $(".select_policy option:selected").val();
        $.ajax({
            url : '<?= site_url("get-sum-insured")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
			
            success: function(data){
                // console.log(data);
                if(data != ''){
                  var html = '<option value="" selected readonly>--Select sum Insured--</option>';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+data[i].id+'>'+data[i].sum_insured+'</option>';
                  }
                  $('.select_sum_insured').html(html);
                }
            }
        });
        return false;
    }
    

    $('.select_sum_insured').change(function(){
        var policy_features_id= $(this).val();
        var policy_id = $(".select_policy option:selected").val();
        $.ajax({
            url : '<?= site_url("show-policy-features")?>',
            type : 'post',
            data : {policy_features_id:policy_features_id,policy_id:policy_id} ,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                if(data != ''){
                  $('#policy_features_table').html(data);
                }
            }
        });
        return false;
    });
});
</script>
