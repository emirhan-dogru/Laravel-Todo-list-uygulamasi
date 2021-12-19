<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
@if (session()->has('success'))
    <div class="container-fluid p-0">
        <div class="alert alert-success rounded-0 text-center" role="alert">
            <b>{{ session('success') }}</b>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="container-fluid p-0">
        <div class="alert alert-danger rounded-0 text-center" role="alert">
            <b>Hata!</b> {{ session('error') }}
        </div>
    </div>
@endif
<div class="container">
    <div class="omb_login">
        <div class="card">

            <div class="card-header">
                <h3 class="omb_authTitle"><a href="{{ route('user.Login') }}">Giriş Yap</a> veya Kaydol</h3>
            </div>
            <div class="card-body">
                <form class="omb_loginForm" action="{{ route('user.Create')  }}" autocomplete="off" method="POST">
                    @csrf
                    <div class="row omb_row-sm-offset-3">
                        <div class="col-xs-12 col-sm-6">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="lastname" placeholder="Ad Soyad" value="{{ old('lastname') }}">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Parola">
                            </div>
                            <span class="help-block"></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password_confirmed" placeholder="Parolayı Onayla">
                            </div>
                            @if (session()->has('error'))
                                <span class="help-block">{{ session('error') }}</span>
                            @endif

                            <span class="help-block"></span>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>

</body>
</html>
