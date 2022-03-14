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
        "lengthChange": false, 
        "autoWidth": false, 
        "paging": true, 
        "info":true,
        serverSide: true,
        processing: true,

        ajax: {
            url: '{!! route($route) !!}',
            data: function(d) {
                d.year = $('#year').val();
                d.month = $('#month').val();
                d.name = $('#name').val();
            }
        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'descripton',name: 'descripton'},
            {data: 'purchasing_price',name: 'purchasing_price'},
            {data: 'selling_price',name: 'selling_price'},
            {data: 'vat',name: 'vat'},
            {data: 'wholesale_price',name: 'wholesale_price'},
            {data: 'quantity',name: 'quantity'},
            {data: 'category',name: 'category'},
            {data: 'sub_category',name: 'sub_category'},
            {data: 'status',name: 'status'},
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
                text: "Once deleted, you will not be able to recover Bale!",
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
                    swal("Poof! Your Bale has been deleted!", {
                        icon: "success",
                    });
                });
            } else {
                swal("Your Bale is safe!");
            }
        })
      })
    });
  </script>