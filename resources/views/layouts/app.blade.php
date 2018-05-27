<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon.png') }}">
    <title>Домашняя бухгалтерия</title>
    <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

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

						<span style="text-transform: capitalize;font-size: 20px;font-weight: 700;">
                        {{-- Auth::user()->name --}}
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
                            <a style="background:#fff;" class="has-arrow waves-effect waves-dark" href="{{ url('/') }}">
                                <i class="mdi mdi-home"></i>
                                <span class="hide-menu">Главная</span>
                            </a>
                        </li>
                        <?foreach($menu['MENU'] as $item){?>
                            <li class="<?if(isset($_GET['category_id'])){echo'active';}?>">
                                <a style="background:#fff;" class="has-arrow waves-effect waves-dark" href="/category/<?=$item['ID']?>" aria-expanded="false">
                                    <i class="<?=$item['CLASS']?>"></i>
                                    <span class="hide-menu"><?=$item['NAME']?></span>
                                </a>
                                <?if(!empty($item['CHILD'])){?>
                                    <ul aria-expanded="false" class="collapse">
                                        <?foreach($item['CHILD'] as $child){?>
                                            <li><a href="/category/<?=$child['ID']?>"><?=$child['NAME']?></a></li>
                                        <?}?>
                                    </ul>
                                <?}?>
                            </li>
                        <?}?>
					</ul>
				</nav>
            </div>
        </aside>


        <div class="page-wrapper">

            @yield('content')


            <footer class="footer"> © 2018 Домашняя бухгалтерия </footer>

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
    <script src="{{ asset('/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script>$('#min-date').bootstrapMaterialDatePicker({ format: 'DD.MM.YYYY HH:mm', minDate: new Date() });</script>
    <!-- <script src="{{ asset('/assets/plugins/sweetalert/jquery.sweet-alert.custom.js') }}"></script> -->
</body>

</html>
