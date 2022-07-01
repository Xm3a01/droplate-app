{{-- <script src="{{asset('js/app.js')}}"></script> --}}
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script> --}}
{{-- <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}

<script>
    $(function () {
      var table = $("#loading-table").DataTable({
        "responsive": true, 
        "searching": false,
        // "lengthChange": false, 
        "autoWidth": false, 
        "paging": true, 
        "info":true,
        serverSide: true,
        processing: true,

        ajax: {
            url: '{!! route('data.driver') !!}',
            data: function(d) {
                d.item = $('#item').val();
                // d.month = $('#month').val();
                // d.day = $('#day').val();
            }
        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'phone',name: 'phone'},
            {data: 'region',name: 'region'},
            {data: 'city',name: 'city'},
            {data: 'busy',name: 'busy'},
            {data: 'address',name: 'address'},
          
            {data: 'action', name: 'action'},
            // Recived
          ],
      });

      $('#filter-form').on('submit', function(e) {
            table.draw();
            e.preventDefault();
            // console.log('hi');
        });

        $('#loading-table').on('click', '.btn-danger[data-url]', function(e) {
            e.preventDefault();
            table.draw(false);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var url = $(this).data('url');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover Employee!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        method: '_DELETE',
                        submit: true
                    }
                }).always(function(data) {
                    table.draw(false);
                    swal("Poof! Your Employee has been deleted!", {
                        icon: "success",
                    });
                });
            } else {
                swal("Your Employee is safe!");
            }
        })
      })
    });
  </script>