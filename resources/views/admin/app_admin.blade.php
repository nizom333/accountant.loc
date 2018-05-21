<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
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

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
						<b>
                            <img src="{{ asset('/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                        </b>

						<span>
							{{ config('app.name', 'Laravel') }}
							<!-- <img src="{{ asset('/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" /> -->
						</span>
					 </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">

						@if (Auth::guest())
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="{{ route('login') }}">
								<i class="fa fa-sign-in"></i>
                                <div class="notify"><span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                        </li>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="{{ route('register') }}">
								<i class="fa fa-sign-out"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                        </li>
                        @else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i style="font-size: 28px;" class="mdi mdi-account"></i>
                                </a>
								<div class="dropdown-menu dropdown-menu-right scale-up">
									<ul class="dropdown-user">
										<li>
											<div class="dw-user-box">
												<div class="u-img"><i style="font-size: 45px;" class="mdi mdi-account"></i></div>
												<div class="u-text">
													<h4>{{ Auth::user()->name }}</h4>
												</div>
											</div>
										</li>
										<li role="separator" class="divider"></li>
										<li>
											<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
											   <i class="fa fa-power-off"></i> Logout
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>

										</li>
									</ul>
								</div>
							</li>
                        @endif






                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <div class="scroll-sidebar">
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<li class="nav-devider"></li>
						<li class="nav-small-cap">Категории</li>
						<li>
							<a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
								<i class="mdi mdi-book-open-variant"></i>
								<span class="hide-menu">test
									<span class="label label-rouded label-success pull-right">25</span>
								</span>
							</a>

							<ul aria-expanded="false" class="collapse">
								<li><a href="javascript:void(0)">Starter Kit</a></li>
								<li><a href="javascript:void(0)" class="has-arrow">Authentication <span class="label label-rounded label-success">6</span></a>
									<ul aria-expanded="false" class="collapse">
										<li><a href="javascript:void(0)">Login 1</a></li>
										<li><a href="javascript:void(0)">Login 2</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
            </div>
        </aside>


        <div class="page-wrapper">
			@component('component.breadcrumbs')
				@slot('name') Categories @endslot
				@slot('parent') main @endslot
				@slot('active') categories @endslot
			@endcomponent

            <div class="container-fluid">
				
				@yield('content')

            </div>

            <footer class="footer"> © 2018 Домашная бухгалтерия </footer>

        </div>

    </div>

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
