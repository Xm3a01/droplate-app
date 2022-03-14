<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading Reports</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered table-hover">
            <thead class="">
                <tr>
                    <th>Form</th>
                    <th>Form</th>
                    <th>Form</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transfers as $transfer)
                    <tr>
                        <td>{{ $transfer->id }}</td>
                        <td>{{ $transfer->created_at }}</td>
                        <td>{{ $transfer->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script>
        
    </script>
</body>

</html>
