                        <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center">
                            Copyright © 2022 <a href="https://ico.hrcrypto.org/">hrcrypto</a>. All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->      </div><!-- End Page -->
            <!-- Back to top -->
  
        <!-- Jquery js-->
<script src="{{ asset('assets/plugins/chart/chart.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/chart/utils.js')}}"></script>
		<script src="{{ asset('assets/js/chart.js')}}"></script>
        <!-- Bootstrap4 js-->
        <script src="{{ asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!--Othercharts js-->
        <script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

        <!-- Circle-progress js-->
        <script src="{{ asset('assets/js/circle-progress.min.js')}}"></script>

        <!-- Jquery-rating js-->
        <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
	
        <!--Sidemenu js-->
        <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>
        
        <!-- P-scroll js-->
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scroll.js')}}"></script>

        
<!--INTERNAL Peitychart js-->
<script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{ asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

<!--INTERNAL Apexchart js-->
<script src="{{ asset('assets/js/apexcharts.js')}}"></script>

<!--INTERNAL ECharts js-->
<script src="{{ asset('assets/plugins/echarts/echarts.js')}}"></script>

<!--INTERNAL Chart js -->
<script src="{{ asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{ asset('assets/plugins/chart/utils.js')}}"></script>

                <!-- INTERNAL Data tables -->
        <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/js/datatables.js')}}"></script>
<!-- INTERNAL Select2 js -->
<script src="{{ asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/js/select2.js')}}"></script>

<!--INTERNAL Moment js-->
<script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{ asset('assets/plugins/treeview/treeview.js')}}"></script>



<!--INTERNAL Index js-->
<script src="{{ asset('assets/js/index1.js')}}"></script>

        <!-- Simplebar JS -->
        <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
        <!-- Custom js-->
        <script src="{{ asset('assets/js/custom.js')}}"></script>

        <!-- Switcher js-->
        <script src="{{ asset('assets/switcher/js/switcher.js')}}"></script>          
<script>
var divs = ["Div1", "Div2", "Div3", "Div4","Div5","Div6"];
    var visibleDivId = null;
    function divVisibility(divId) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
    function hideNonVisibleDivs() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }
    

</script>

    </body>

</html>
        