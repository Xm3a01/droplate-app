<html>

<head>
    <link rel="shortcut icon" href="{{ asset('images/ms.png') }}" style="width: 100%; " type="image/png">
    <title>Droplate</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-style.css') }}">

<body class="layer2">
    <div class="body-cover"></div>
    <div class="loginbox  layer1">
        <div>
            <img src="{{ asset('images/ms.png') }}" class="avatar">
        </div>

        <form role="form" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <p class="head-title">E-mail</p>
            <input type="text" name="email" placeholder="Enter E-mail" value="{{old('email')}}"
                class="{{ $errors->has('email') ? ' is-invalid' : '' }}">
            @if ($errors->has('email'))
                <span class="invalid-feedback" style="display: block; background:#fff; border-radius:2px; padding:4px; margin-bottom:4px" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password"
                class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
            @if ($errors->has('password'))
            <span class="invalid-feedback" style="display: block; background:#fff; border-radius:2px; padding:4px; margin-bottom:4px" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="submit" name="submit" value="LOGIN">
        </form>

    </div>

</body>
</head>

</html>
