@if (Session::has('success'))
    <script>
    $(document).Toasts('create', {
            title: 'Sucess',
            class: 'bg-green px-5 m-2',
            daley: '3000',
            autohide: true,
            body: '{{ Session::get("success") }}'
        })
    </script>
@endif

<style>
    .tost {
        padding: 20px;
    }
</style>