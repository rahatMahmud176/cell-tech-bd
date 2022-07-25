   
        
        <script src="{{ asset('/') }}assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/node-waves/waves.min.js"></script>

        <script src="{{ asset('/') }}assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="{{ asset('/') }}assets/js/pages/form-validation.init.js"></script>
        <!-- apexcharts -->
        <script src="{{ asset('/') }}assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="{{ asset('/') }}assets/js/pages/dashboard.init.js"></script>


        <script src="{{ asset('/') }}assets/libs/select2/js/select2.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>

        <!-- form advanced init -->
        <script src="{{ asset('/') }}assets/js/pages/form-advanced.init.js"></script>
        <!-- dropzone plugin -->
        <script src="{{ asset('/') }}assets/libs/dropzone/min/dropzone.min.js"></script>
        <!-- Summernote js -->
        <script src="{{ asset('/') }}assets/libs/summernote/summernote-bs4.min.js"></script>
        <!-- init js -->
        <script src="{{ asset('/') }}assets/js/pages/form-editor.init.js"></script>
        <!-- Required datatable js -->
        <script src="{{ asset('/') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/jszip/jszip.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('/') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('/') }}assets/js/pages/datatables.init.js"></script>   
        <!-- App js -->
        <script src="{{ asset('/') }}assets/js/app.js"></script>



<script>
        $(document).on('change','#productCategory',function() {
                
                var category_id = $(this).val();
                
                $.ajax({
                type: 'GET',
                url: "{{ url('get-brand-by-category') }}",
                data: {id: category_id},
                dataType: 'json',
                success: function (res) {  
                        var selectElement = $('#productBrand');
                        selectElement.empty();
                        var option = ''; 
                        $.each(res, function (key, value) {
                        option += '<option value="'+value.id+'">'+value.title+'</option>';
                        });
                        selectElement.append(option);
                }
                });
        
        
        
        
        })       
                
</script>   
          