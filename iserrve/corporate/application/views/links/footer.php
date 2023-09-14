
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<script src="<?=base_url('assets/')?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets/')?>plugins/moment/moment.min.js"></script>
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->

<!--Chart-->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- <script src="dist/js/demo.js"></script> -->
<script src="<?=base_url('assets/')?>dist/js/pages/dashboard3.js"></script>
	<!--End Chart-->
<!--Start sparkline-->
<script src="<?=base_url('assets/')?>plugins/sparklines/sparkline.js"></script>

<script type="text/javascript">
    var multipleCardCarousel = document.querySelector(
      "#carouselExampleControls"
    );
    if (window.matchMedia("(max-width: 768px)").matches) {
      var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
      });
      var carouselWidth = $(".carousel-inner")[0].scrollWidth;
      var cardWidth = $(".carousel-item").width();
      var scrollPosition = 0;
      $("#carouselExampleControls .carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 4) {
          scrollPosition += cardWidth;
          $("#carouselExampleControls .carousel-inner").animate(
            { scrollLeft: scrollPosition },
            600
          );
        }
      });
      $("#carouselExampleControls .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
          scrollPosition -= cardWidth;
          $("#carouselExampleControls .carousel-inner").animate(
            { scrollLeft: scrollPosition },
            600
          );
        }
      });
    } else {
      $(multipleCardCarousel).addClass("slide");
    }
</script>

<script type="text/javascript">
    var multipleCardCarousel = document.querySelector(
      "#carouselExampleControls1"
    );
    if (window.matchMedia("(max-width: 768px)").matches) {
      var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
      });
      var carouselWidth = $(".carousel-inner")[0].scrollWidth;
      var cardWidth = $(".carousel-item1").width();
      var scrollPosition = 0;
      $("#carouselExampleControls1 .carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 4) {
          scrollPosition += cardWidth;
          $("#carouselExampleControls1 .carousel-inner").animate(
            { scrollLeft: scrollPosition },
            600
          );
        }
      });
      $("#carouselExampleControls1 .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
          scrollPosition -= cardWidth;
          $("#carouselExampleControls1 .carousel-inner").animate(
            { scrollLeft: scrollPosition },
            600
          );
        }
      });
    } else {
      $(multipleCardCarousel).addClass("slide");
    }
</script>
<script>
  $(function () {
    //INITIALIZE SPARKLINE CHARTS
    var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
    var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
    var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

    sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
    sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
    sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

  })

</script>
<!--End sparkline-->
<?php
    $dynamic = array('employees','claims','hospitals','cd-reports','list-view','corporate-buffer');
    $check = $this->uri->segment(1);
    if (in_array($check, $dynamic)) { ?>
        <script src="<?=base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/jszip/jszip.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php } ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.tablinks1', function(){
            $.ajax({
                url : '<?= site_url("show-cd-balance")?>',
                type : 'get',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#showCD').html(data);
                }
            });
            return false;
        });
    });
</script>


<script>
		$("#selectAll").click(function() {
    	$("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    });

    $("input[type=checkbox]").click(function() {
    	if (!$(this).prop("checked")) {
    		$("#selectAll").prop("checked", false);
    	}
    });


</script>
</body>
</html>
