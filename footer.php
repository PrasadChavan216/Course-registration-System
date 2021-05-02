</body>
<!--   Core JS Files   -->
<script src="Assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="Assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="Assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="Assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<!-- <script src="Assets/js/plugins/chartist.min.js"></script> -->
<!--  Notifications Plugin    -->
<!-- <script src="Assets/js/plugins/bootstrap-notify.js"></script> -->
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<!-- <script src="Assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script> -->
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="Assets/js/demo.js"></script> -->
<script>
$(document).on('click','#enable_collapse',function(){
    // alert("hello");

var isExpanded = $("div.collapse").hasClass("show");
// alert(isExpanded);
if (isExpanded==true) {

    $("#collapseExample").collapse('hide');
    // $("#collapseExample").removeClass('show');
}
if (isExpanded==false){
    
    $('#collapseExample').collapse({
  toggle: true
}); 
}
});
// $('.collapse').collapse();

</script>
</html>
