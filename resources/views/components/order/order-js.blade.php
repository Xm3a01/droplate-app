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
            url: '{!! route("data.orders") !!}',
            data: function(d) {
                d.year = $('#year').val();
                d.client = $('#client').val();
            }
        },

        columns: [
            {data: 'id', name: 'id'},
            {data: 'client_phone',name: 'client_phone'},
            {data: 'client_name',name: 'client_name'},
            {data: 'delivery_price',name: 'delivery_price'},
            {data: 'total_selling_price',name: 'total_selling_price'},
            {data: 'order_status',name: 'order_status'},
            {data: 'address',name: 'address'},
            {data: 'quantity',name: 'quantity'},
            {data: 'order_progress',name: 'order_progress'},
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
                text: "Once deleted, you will not be able to recover order!",
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
                    swal("Poof! Your order has been deleted!", {
                        icon: "success",
                    });
                });
            } else {
                swal("Your order is safe!");
            }
        })
      })

      $('#loading-table').on('change', '.form-control[data-update]', function(e) {
             console.log(this.value);
            e.preventDefault();
            table.draw(false);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var url = $(this).data('update');
            swal({
                title: "Are you sure?",
                text: "Once Change, your order progress change!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    $.ajax({
                    url: url,
                    type: 'PUT',
                    dataType: 'json',
                    data: {
                        method: '_PUT',
                        submit: true,
                        progress: this.value
                    }
                }).always(function(data) {
                    table.draw(false);
                    swal("Poof! Your Progress has Move on", {
                        icon: "success",
                    });
                });
            } else {
                swal("Your Progess still here");
            }
        })
      })
    });
  </script>