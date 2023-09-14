<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="content-header" style="padding-top: 0px !important;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active">Endorsement Calculation</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row p-tb-30px">
                        <div class="col-12">
                            <div class="card border-1px new-border-radius">
                                <div class="card-body">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <h5>Endorsement Calculation</h5>
                                            <table class="table table-responsive w-100">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Endorsement Title</th>
                                                        <th>Endorsement Number</th>
                                                        <th>Transaction Statement</th>
                                                        <th>Export Addition</th>
                                                        <th>Export Deletion</th>
                                                        <th>View Details</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($calculation)) { foreach ($calculation as $key => $value) { ?>
                                                    <tr>
                                                        <td><?=$key+1?></td>
                                                        <td><?=$value['endersoment_title']?></td>
                                                        <td><?=$value['endersoment_number']?></td>
                                                        <td><?=$value['transaction_statement']?></td>
                                                        <td><button type="button" data-id="<?=base64_encode($value['id'])?>_addition" class="btn btn-sm btn-primary calculation">Export Addition</button></td>
                                                        <td><button type="button" data-id="<?=base64_encode($value['id'])?>_deletion" class="btn btn-sm btn-primary calculation" href="#">Export Deletion</button></td>
                                                        <td><a class="btn btn-sm btn-info" href="<?=site_url('rack-rate?ecd=').base64_encode($value["id"])?>">View Details</a></td>
                                                        <td><?=$value['created_date']?></td>
                                                    </tr>
                                                  <?php } }else{ ?>
                                                    <tr>
                                                      <td>No Record found</td>
                                                    </tr>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
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

        $(document).on('click', '.calculation', function(){
            var id =$(this).data('id');
            $.ajax({
                url : '<?=site_url("download-calculation")?>',
                type : 'post',
                data : {id: id},
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data == 'not_exist'){
                      swal({
                           title: "Oops!",
                           text: "No records found..!",
                           icon: "error",
                           buttons: false,
                           timer :2500,
                       });
                    }else{
                        var $a = $("<a>");
                        $a.attr("href",data.file);
                        $("body").append($a);
                        $a.attr("download",data.filename);
                        $a[0].click();
                        $a.remove();
                    }

                }
            });
            return false;
        });


  });
</script>
