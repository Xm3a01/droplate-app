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
            url: '{!! route('data.user') !!}',
            data: function(d) {
                d.item = $('#item').val();
            }
        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'phone',name: 'phone'},
            {data: 'age',name: 'age'},
            {data: 'address',name: 'address'},
            {data: 'gender',name: 'gender'},
          
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
                text: "Once deleted, you will not be able to recover Clint!",
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
                    swal("Poof! Your Clint has been deleted!", {
                        icon: "success",
                    });
                });
            } else {
                swal("Your Clint is safe!");
            }
        })
      })

      $('#loading-table').on('click', '.block[data-block]', function(e) {
            e.preventDefault();
            table.draw(false);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // })

            var url = $(this).data('block');
            // console.log(url);
             $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
              }).always(function(res) {
                //   then(function(res){ 
                    //   console.log(res)
                //   })
                table.draw(false);
                // console.log(data.then);
                swal('Sucess Operation', {
                    icon: "success",
                });
            })
      })
    });
  </script>