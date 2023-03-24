<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <!-- <div class="copyright">
                <p style="color: #450b5a;">Copyright © Designed &amp; Developed by <a href="#" target="_blank">Victor</a> 2021</p>
            </div> -->
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>    
    <script src="{{ asset('/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/custom.min.js') }}"></script>
	<script src="{{ asset('/js/deznav-init.js') }}"></script>

	<!-- Apex Chart -->
	<script src="{{ asset('/vendor/apexchart/apexchart.js') }}"></script>
    <!-- Chartist -->
    <script src="{{ asset('/vendor/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
	
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('/js/dashboard/dashboard-1.js') }}"></script>
	<!-- Datatable -->
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>
    <!--datepicker-->
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
  
    <script src="{{ asset('/js/moment.min.js') }}"></script>    
    <script src="{{ asset('/js/fullcalendar.js') }}"></script>

    <script>
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                height: 700,
                editable: true,
                displayEventTime: true,
                selectable: true,
                selectHelper: true,
                events:'dashcal',
                fixedWeekCount:false,
                contentHeight:"auto",
                handleWindowResize:true
            });
        });
    </script>


    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat:"yy-mm-dd",
                numberOfMonths:2,
                showNonCurrentDates:false

            })
            } ); 
  </script>







	
</body>
</html>