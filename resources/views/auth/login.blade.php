<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon.png') }}">
    <title>{{ config('app.name', 'Auth | Laravel') }}</title>
    <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
				
				
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
					
						{{ csrf_field() }}
					
					
					
                        <h3 class="box-title m-b-20">Войти в систему</h3>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="col-xs-12">
									
									<input id="email" type="email" placeholder="Логин" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
									
									
								</div>
							</div>
							
							
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="col-xs-12">

									<input id="password" placeholder="Пароль" type="password" class="form-control" name="password" required>

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif									
								</div>
							</div>
							
							
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
									<label for="checkbox-signup">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомни меня
                                    </label>
									
                                </div> <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right">
								<i class="fa fa-lock m-r-5"></i> Забыли пароль?</a> </div>
                        </div>
						
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Авторизоваться</button>
                            </div>
                        </div>
						
						
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>У вас нет учетной записи? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Зарегистрироваться</b></a></div>
                            </div>
                        </div>
                    </form>
					
					
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('/assets/js/waves.js') }}"></script>
    <script src="{{ asset('/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('/assets/js/dashboard1.js') }}"></script>
    <script src="{{ asset('/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>