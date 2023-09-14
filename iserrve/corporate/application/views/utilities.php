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
                      <div class="col-md-8">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                              <li class="breadcrumb-item active">Utilities</li>
                          </ol>
                      </div>
                  </div>
                  <div class="row p-tb-30px">
                      <div class="col-12">
                          <div class="card ">
                              <div class="card-body">
                                <div class="row" id="utiliti_table">
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
    getUtilies();
    function getUtilies(){
        var policy_id = $(".select_policy option:selected").val();
        $.ajax({
            url : '<?= site_url("show-utilities")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                if(data != ''){
                  $('#utiliti_table').html(data);
                }
            }
        });
        return false;
    }

    $(document).on('change', '.select_policy', function(){
      getUtilies();
    });
});
</script>
