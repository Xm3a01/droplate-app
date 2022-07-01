<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $(function () {
      var table = $("#region-table").DataTable({
        "responsive": true, 
        "searching": false,
        "lengthChange": false, 
        "autoWidth": false, 
        "paging": true, 
        "info":true,
        serverSide: true,
        processing: true,

        ajax: {
            url: '{!! route("data.regions") !!}',
            data: function(d) {
                d.name = $('#name').val();
            }
        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'ar_name', name: 'ar_name'},
            {data: 'city_ar_name', name: 'city_ar_name'},
            {data: 'city_en_name', name: 'city_en_name'},
            {data: 'queck', name: 'queck'},
            {data: 'normal', name: 'normal'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action'},
            // Recived
          ],
      });

      $('#filter-form').on('submit', function(e) {
            table.draw();
            e.preventDefault();
            console.log($('#name').val());
        });

        $('#region-table').on('click', '.btn-danger[data-url]', function(e) {
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
                text: "Once deleted, you will not be able to recover Category!",
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
                    swal("Poof! Your Category has been deleted!", {
                        icon: "success",
                    });
                });
            } else {
                swal("Your Category is safe!");
            }
        })
      })
    });
  </script>