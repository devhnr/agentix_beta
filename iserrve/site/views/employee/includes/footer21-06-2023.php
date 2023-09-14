<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="footer-logo">
          <img src="<?=base_url('assets/employee_assets/')?>img/logo-iserrve.png" alt="">
        </div>
        <div class="footer-menu">
          <ul>
            <!-- <li><a href="#">ABOUT US</a></li> -->
            <!-- <li><a href="#">PURCHASES</a></li> -->
            <li><a href="https://www.raghnall.co.in/privacy-policy">PRIVACY POLICY</a></li>
            <li><a href="<?=base_url('employee/claim_form')?>">INTIMATE CLAIM</a></li>
            <!-- <li><a href="#">DIGITAL LOCKER</a></li> -->
            <!-- <li><a href="#">TERMS & CONDITIONS</a></li> -->
            <li><a href="#feedback" data-bs-toggle="modal" data-bs-target="#feedback">FEEDBACK</a></li>
            <?php if($policy_data['tpa'] == 'Health India Insurance TPA Services Private Limited') { ?>
            <li><a href="<?=base_url('employee/network_hospitals')?>">Cashless Hospital</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="footer-desc text-center">
          <p>iSerrve is a Product by Raghnall Insurance Broking and Risk Management Pvt. Ltd. (CIN - U74900MH2014PTC254164) IRDA License Code: IRDA/DB-599/14, IRDA License Number: 536 valid till 23/08/2024.</p>
        </div>
        <div class="footer-copy text-center">
          <p>Copyrights © 2022 All Rights Reserved By <span class="text-orange">Mititek</span>.</p>
        </div>
      </div>
    </div>
  </div>
</footer>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?=base_url('assets/employee_assets/')?>js/jquery.min.js"></script>


<script src="<?=base_url('assets/employee_assets/')?>js/navmain.js"></script>
<script src="<?=base_url('assets/employee_assets/')?>js/headerscroll.js"></script>
<script src="<?=base_url('assets/employee_assets/')?>js/mousedrag.js"></script>


<script type="text/javascript" src="<?=base_url('assets/employee_assets/')?>js/main.js"></script>
<script type="text/javascript" src="<?=base_url('assets/employee_assets/')?>js/theme-vendors.min.js"></script>

<script src="<?=base_url('assets/employee_assets/')?>sweetalert@2.1.2/sweetalert.min.js"></script>


<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
// function myFunction() {
//   document.getElementById("vDropdown").classList.toggle("vdropshow");
// }
//
// // Close the dropdown if the user clicks outside of it
// window.onclick = function(e) {
//   if (!e.target.matches('.vdropbtn')) {
//   var myDropdown = document.getElementById("vDropdown");
//     if (myDropdown.classList.contains('vdropshow')) {
//       myDropdown.classList.remove('vdropshow');
//     }
//   }
// }
</script>

<!--<script>
      var swiper = new Swiper(".iAssessSec", {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: false,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          340: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          640: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 50,
          },
        },
      });
    </script>-->


   <!--  <script>
      var swiper = new Swiper(".empprod", {
        slidesPerView: 5,
        spaceBetween:10,
        freeMode: {
          enabled: true,
          sticky: true
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          340: {
            slidesPerView: 2,
            spaceBetween: 20,
            spaceBetween:30,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 50,
          }
        }
      });
    </script>-->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="<?=base_url('assets/employee_assets/')?>js/accordion.js"></script>

    <script>
      $(document).ready( function () {
          $('.dataTables_info').html('Showing 0 to 0 of 0 entries');
          var cashTable = $('#cashless_hosp').DataTable(
              {                  
                lengthChange: false,
                dom: 'Blfrtip',
                buttons: ['excel']
              }
          );
       
        $('.dt-button').css({"display": "none"});

          $('#searchBTN').click(function () {
             cashTable.search('').columns().search('').draw();
             var oTable = $('#cashless_hosp').dataTable();
             if($('#hospital_search').val() != '' && $('#state_search').val() != '' && $('#city_search').val() != ''){
                oTable.fnFilter($('#hospital_search').val(),1,true,false);
                oTable.fnFilter($('#state_search').val(),6,true,false);
                oTable.fnFilter($('#city_search').val(),5,true,false);
             }else if($('#hospital_search').val() != '' && $('#state_search').val() != '' && $('#city_search').val() == ''){
                 oTable.fnFilter($('#hospital_search').val(),1,true,false);
                 oTable.fnFilter($('#state_search').val(),6,true,false);
             }else if($('#hospital_search').val() != '' && $('#state_search').val() == '' && $('#city_search').val() != ''){
                 oTable.fnFilter($('#hospital_search').val(),1,true,false);
                 oTable.fnFilter($('#city_search').val(),5,true,false);
             }else if($('#hospital_search').val() != '' && $('#state_search').val() == '' && $('#city_search').val() == ''){
                 oTable.fnFilter($('#hospital_search').val(), 1);
             }else if($('#hospital_search').val() == '' && $('#state_search').val() != '' && $('#city_search').val() != ''){
                 oTable.fnFilter($('#state_search').val(),6,true,false);
                 oTable.fnFilter($('#city_search').val(),5,true,false);
             }else if($('#hospital_search').val() == '' && $('#state_search').val() != '' && $('#city_search').val() == ''){
                 oTable.fnFilter($('#state_search').val(), 6);
             }else if($('#hospital_search').val() == '' && $('#state_search').val() == '' && $('#city_search').val() != ''){
                 oTable.fnFilter($('#city_search').val(), 5);
             }else if($('#pincode').val() != ''){
                 oTable.fnFilter($('#pincode').val(), 7);
             }
          });

          $('#resetBTN').click(function () {
              $('#cashless_hosp').dataTable().fnFilter('');
              $('#hospital_search,#city_search,#state_search,#pincode').val('');
              get_data_call();
              var policy_id = $('.select_policy option')[1].value;
              get_cashless_hospital(policy_id);
          });

          $('#downloadBTN').click(function () {
              get_data_call();
              $('#hospital_search,#state_search,#pincode').val('');
              $('.buttons-excel').trigger('click');

          });

          var policy_id = $('.select_policy option')[1].value;
          get_cashless_hospital(policy_id);

          function get_cashless_hospital(policy_id) {
              $('#cashless_hosp').DataTable().clear().destroy();
              $('#cash_dat').html('Loading...');
              $.ajax({
                  url: '<?=base_url()?>employee/get_cashless_hospital_by_tpa',
                  type: 'post',
                  dataType:'json',
                  data : 'policy_id=' + policy_id,
                  success: function(data){
                      //console.log(data);
                      $('#cash_dat').html(data);
                      $("#cashless_hosp").dataTable().ajax.reload();
                  }
              });
            return false;
          }

          $('#state_search').change(function(){
              var state= $(this).val();
              var url = '<?=base_url()?>employee/get_cities';
              $.ajax({
                  url : url,
                  method : "POST",
                  data : {state: state},
                  async : true,
                  dataType : 'json',
                  success: function(data){
                      console.log(data)
                      oTable.search('').columns().search('').draw();
                      var html = '<option value="" selected readonly>--Select City--</option>';
                      var i;
                      for(i=0; i<data.length; i++){
                          html += '<option value='+data[i].city+'>'+data[i].city+'</option>';
                      }
                      $('#city_search').html(html);

                  }
              });
              return false;
          });

          function get_data_call() {
              var url = '<?=base_url()?>employee/get_all_cities';
              $.ajax({
                  url : url,
                  method : "GET",
                  async : true,
                  dataType : 'json',
                  success: function(data){
                      console.log(data)
                      var html = '<option value="" selected readonly>--Select City--</option>';
                      var i;
                      for(i=0; i<data.length; i++){
                          html += '<option value='+data[i].city+'>'+data[i].city+'</option>';
                      }
                      $('#city_search').html(html);

                  }
              });
              return false;
          }

          $(document).on('change', '.select_policy', function(){
              $('#cashless_hosp').DataTable().clear().destroy();
              $('#cash_dat').html('Loading...');
              var policy_id = $(".select_policy option:selected").val();
              get_cashless_hospital(policy_id);
          });

          // $(document).on('change', '.select_policy', function(){
          //     $('#cashless_hosp').DataTable().clear().destroy();
          //     $('#cash_dat').html('Loading...');
          //     var url = '<?=base_url()?>employee/get_cashless_hospital_by_tpa';
          //     var policy_id = $(this).val();
          //     if(policy_id != ''){
          //       $('#name_err').hide();
          //     }else{
          //         $('#name_err').show();
          //     }
          //     $.ajax({
          //         url: url,
          //         type: 'post',
          //         dataType:'json',
          //         data : 'policy_id=' + policy_id,
          //         success: function(data){
          //             //console.log(data);
          //             $('#cash_dat').html(data);
          //             $("#cashless_hosp").dataTable().ajax.reload();
          //         }
          //     });
          // //
          //     return false;
          // });

      });
    </script>


<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $('.slick-assess').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow: null,
  nextArrow: null,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>

<div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
      <form class="v-form feedback-form" action="" method="post">
        <div class="modal-contain">
        <div class="row align-items-center">
          <div class="col-10 mb-4 ">
            <h5>Feedback</h5>
          </div>
          <div class="col-2">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="col-lg-12">
           <label class="select" for="slct">
             <span class="disabled-label">Your Name *</span>
             <input type="text" name="name" class="custominput1" id="feedback_name" placeholder="Enter Name" >
             <p class="error m-0" id="name1_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
            <label class="select" for="slct">
             <span class="disabled-label">Your Email Address *</span>
             <input type= "text" name="email" class="custominput1" id="feedback_email" placeholder="Enter Email" >
             <p class="error m-0" id="email1_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
             <label class="select" for="slct">
             <span class="disabled-label">Your Phone Number *</span>
             <input type="tel" name="contact_no" class="custominput1" id="feedback_phone" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
             <p class="error m-0" id="phone1_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
            <label class="select" for="slct">
              <span class="disabled-label">Message *</span>
              <textarea name="message" id="feedback_msg" class="custominput1" cols="30" rows="4"></textarea>
              <p class="error m-0" id="msg1_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary w-100" id="btnFeedback">Send Request</button>
          </div>

      </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).on("click", "#btnFeedback", function () {
        var url = "<?=base_url()?>employee/send_feedback";
        var name = $("#feedback_name").val();
        var email = $("#feedback_email").val();
        var mobile = $("#feedback_phone").val();
        var message = $("#feedback_msg").val();
        if (name == "") {
            $("#name1_err").html("Please enter your name").show();
            return false;
        }
        if (email == "") {
            $("#email1_err").html("Please enter your email").show();
            return false;
        }
        if (IsEmail(email) == false) {
            $("#email1_err").html("Please enter valid email").show();
            return false;
        }
        if (mobile == "") {
            $("#phone1_err").html("Please enter your mobile no").show();
            return false;
        }
        if (mobile.length != 10) {
            $("#phone1_err").html("Please enter correct mobile no").show();
            return false;
        }
        if (message == "") {
            $("#msg1_err").html("Please enter your feedback").show();
            return false;
        }
        $.ajax({
            url: url,
            type: "post",
            data: "name=" + name + "&email=" + email + "&contact_no=" + mobile + "&message=" + message,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response == "success") {
                    $("#feedback").modal("hide");
                    $(".feedback-form")[0].reset();
                    swal({
                        title: "Success!",
                        text: "Your feedback submitted successfully!",
                        icon: "success",
                        buttons: false,
                        //timer: 1800,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 1800);
                }
            },
        });
        return false;
    });

    $(".custominput1").bind("change", function () {
        var name = $("#feedback_name").val();
        var email = $("#feedback_email").val();
        var mobile = $("#feedback_phone").val();
        var message = $("#feedback_msg").val();
        if (name == "") {
            $("#name1_err").html("Please enter your name").show();
            return false;
        } else {
            $("#name1_err").html("").show();
        }
        if (email == "") {
            $("#email1_err").html("Please enter your email").show();
            return false;
        } else {
            $("#email1_err").html("").show();
        }
        if (IsEmail(email) == false) {
            $("#email1_err").html("Please enter valid email").show();
            return false;
        } else {
            $("#email1_err").html("").show();
        }
        if (mobile == "") {
            $("#phone1_err").html("Please enter your mobile no").show();
            return false;
        } else {
            $("#phone1_err").html("").show();
        }
        if (mobile.length != 10) {
            $("#phone1_err").html("Please enter correct mobile no").show();
            return false;
        } else {
            $("#phone1_err").html("").show();
        }
        if (message == "") {
            $("#msg1_err").html("Please enter your feedback").show();
            return false;
        } else {
            $("#msg1_err").html("").show();
        }

    });

    $("#feedback_name").on("keypress", function () {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            return false;
        }
    });

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }

    $(document).on('change', '#slct_policy_1', function(){
        // $('.docm').html('');
        var url = '<?=base_url()?>employee/get_documents';
        var policy_id = $(this).val();

        $.ajax({
            url: url,
            type: 'post',
            dataType:'json',
            data : 'policy_id=' + policy_id,
            success: function(data){
                console.log(data);
                $('.docm1').html(data);
            }
        });
    //
        return false;
    });

    $(document).on('click', '.detailBTN', function(){
        // $('.docm').html('');
        var url = '<?=base_url()?>employee/track_claim_status';
        var claim_id = $(this).data('id');

        $.ajax({
            url: url,
            type: 'post',
            dataType:'json',
            data : 'claim_id=' + claim_id,
            success: function(data){
                console.log(data);
                $('#html_track_status').html(data);
            }
        });
    //
        return false;
    });
</script>
</body>
</html>
