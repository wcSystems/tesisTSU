<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>
            Fe y Alegria
        </title>
        <meta name="description" content="Page Titile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" media="screen, print" href="/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="/css/app.bundle.css">
        <link rel="stylesheet" media="screen, print" href="/css/miscellaneous/fullcalendar/fullcalendar.bundle.css">
        <link rel="stylesheet" media="screen, print" href="/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" media="screen, print" href="/css/estilo.css">
        <link rel="stylesheet" media="screen, print" href="/css/themes/cust-theme-13.css">
        <link rel="stylesheet" media="screen, print" href="/css/fa-regular.css">
        <link rel="stylesheet" media="screen, print" href="/css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="/css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="/css/formplugins/select2/select2.bundle.css">
        <link rel="stylesheet" media="screen, print" href="/css/ion-rangeslider.css">
        <link rel="stylesheet" media="screen, print" href="css/datagrid/datatables/datatables.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/notifications/toastr/toastr.css">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
        <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <title>HDTI</title>
    </head>
    <body class="mod-bg-1">
        <div class="page-wrapper" id="app">
            <div class="page-inner">
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <img src="/img/logo.svg" style="width:50px;height:50px" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">Fe y Alegria</span>
                    </div>
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="info-card">
                            <img src="{{ asset(Auth::user()->profile) }}" height="50px" width="50px" class="profile-image rounded-circle" alt="{{Auth::user()->firstname}} {{Auth::user()->lastname}}">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white" data-toggle="modal" data-target=".profile">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        {{Auth::user()->name}}
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">{{Auth::user()->email}}</span>
                            </div>
                            <img src="/img/card-backgrounds/cover-1-lg.png" class="cover" alt="cover">
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li>
                                <router-link to="/">
                                    <i class="fal fa-home"></i>
                                    <span class="nav-link-text" data-i18n="nav.application_intel">Inicio</span>  
                                </router-link>
                            </li>
                            @foreach(Auth::user()->access_list() as $item)
                                <li>
                                    <a href="#" title="{{$item["name"]}}" data-filter-tags="{{$item["name"]}}">
                                        <i class="{{$item["icon"]}}"></i>
                                        <span class="nav-link-text" data-i18n="nav.application_intel">{{$item["name"]}}</span>
                                    </a>
                                    <ul>
                                        @foreach($item["hijos"] as $item)
                                            <li>
                                                <router-link to="{{$item["url"]}}">
                                                    <span class="nav-link-text" data-i18n="nav.application_intel_introduction">{{$item["name"]}}</span>
                                                </router-link>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
                <div class="page-content-wrapper">
                    <main id="js-page-content" role="main" class="page-content">
                        <router-view/>
                    </main>
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down">Fey Alegria Venezuela - Copyright 2019.</span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Ir hacia arriba">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="/logout" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Cerrar Sesion">
                <i class="fal fa-sign-out"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Pantalla Completa">
                <i class="fal fa-expand"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="toggle" data-class="nav-function-hidden" data-toggle="tooltip" data-placement="left" title="Ocultar navegacion">
                <i class="ni ni-menu"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="toggle" data-class="nav-function-minify" data-toggle="tooltip" data-placement="left" title="Minificar navegacion">
                <i class="ni ni-minify-nav"></i>
            </a>
        </nav>
        <script src="{{asset('/js/app.js')}}"></script>
        <script src="/js/vendors.bundle.js"></script>
        <script src="/js/app.bundle.js"></script>
        <script src="js/formplugins/ion-rangeslider/ion-rangeslider.js"></script>
        <script src="/js/dependency/moment/moment.js"></script>
        <script src="/js/miscellaneous/fullcalendar/fullcalendar.bundle.js"></script>
        <script src="/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="/js/formplugins/select2/select2.bundle.js"></script>
        <script src="js/statistics/flot/flot.bundle.js"></script>
        <script src="js/statistics/sparkline/sparkline.bundle.js"></script>
        <script src="js/statistics/easypiechart/easypiechart.bundle.js"></script>
        <script src="js/statistics/flot/flot.bundle.js"></script>
        <script src="js/datagrid/datatables/datatables.bundle.js"></script>
        <script src="js/notifications/toastr/toastr.js"></script>
        <script src="js/configuracion.js"></script>
        <script src="js/validar.js"></script>
    </body>
</html>
