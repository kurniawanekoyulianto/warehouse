    <!-- /.container-fluid -->
    <footer class="footer text-center"> {{ date("Y") }} &copy; HR - Business Analyst | PT. Solo Murni</footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/') }}/ampleadmin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ url('/') }}/ampleadmin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{ url('/') }}/ampleadmin/js/waves.js"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ url('/') }}/ampleadmin/js/custom.min.js"></script>
    <script src="{{ url('/') }}/ampleadmin/js/jasny-bootstrap.js"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
    <!-- Data tables -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!--Style Switcher -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{ url('/') }}/ampleadmin/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="{{ url('/') }}/ampleadmin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Data Mask -->
    <script src="{{ url('/') }}/ampleadmin/js/mask.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        //Datatable
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });


        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();

        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
    </script>
    
</body>

</html>