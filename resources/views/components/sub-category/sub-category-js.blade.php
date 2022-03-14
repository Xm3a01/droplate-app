<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function() {
        var table = $("#category-table").DataTable({
            "responsive": true,
            "searching": false,
            // "lengthChange": true, 
            "autoWidth": false,
            "paging": true,
            "info": true,
            "serverSide": true,
            "processing": true,
            // "pagingType": "100",
            // "lengthChange": false

            ajax: {
                url: '{!! route('data.sub_categories') !!}',
                data: function(d) {
                    d.name = $('#name').val();
                }
            },

            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'ar_name',
                    name: 'ar_name'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'ar_category',
                    name: 'ar_category'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                // Recived
            ],
        });

        $('#filter-form').on('submit', function(e) {
            table.draw();
            e.preventDefault();
            // console.log('hi');
        });
        $('#category-table').on('click', '.btn-danger[data-url]', function(e) {
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
                text: "Once deleted, you will not be able to recover Sub Category!",
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
                        swal("Poof! Your Sub Category has been deleted!", {
                            icon: "success",
                        });
                    });
                } else {
                    swal("Your Sub Category is safe!");
                }
            })
        })
    });
</script>
