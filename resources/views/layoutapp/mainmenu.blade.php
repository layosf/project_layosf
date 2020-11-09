<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title> @yield('title','Dashboard')</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/site.min.css')}}">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('global/vendor/animsition/animsition.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('global/vendor/chartist/chartist.css')}}"> -->
    <link rel="stylesheet" href="{{asset('global/vendor/jvectormap/jquery-jvectormap.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}"> -->
    <link rel="stylesheet" href="{{asset('examples/css/dashboard/v1.css')}}">

    <link rel="stylesheet" href="{{asset('global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/slidepanel/slidePanel.css')}}">
    
    <link rel="stylesheet" href="{{asset('examples/css/uikit/icon.css')}}">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('global/fonts/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('global/fonts/weather-icons/weather-icons.css')}}">
    <link rel="stylesheet" href="{{asset('global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min.css')}}">
  
    
    <script src="{{asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
    </script>
    <!-- Core  -->
    <script src="{{asset('global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
    <script src="{{asset('global/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('global/vendor/popper-js/umd/popper.min.js')}}"></script>
    <script src="{{asset('global/vendor/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('global/vendor/animsition/animsition.js')}}"></script>
    <script src="{{asset('global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
    <script src="{{asset('global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
    <script src="{{asset('global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
    <link rel="stylesheet" href="{{asset('global/vendor/flag-icon-css/flag-icon.css') }}">
    <!-- Plugins -->
    <script src="{{asset('global/vendor/switchery/switchery.js')}}"></script>
    <script src="{{asset('global/vendor/intro-js/intro.js')}}"></script>
    <!-- <script src="{{asset('global/vendor/screenfull/screenfull.js')}}"></script> -->
    <script src="{{asset('global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
    <!-- <script src="{{asset('global/vendor/skycons/skycons.js')}}"></script> -->
    <!-- <script src="{{asset('global/vendor/chartist/chartist.min.js')}}"></script> -->
    <!-- <script src="{{asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js')}}"></script> -->
    <script src="{{asset('global/vendor/aspieprogress/jquery-asPieProgress.min.js')}}"></script>
    <!-- <script src="{{asset('global/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js')}}"></script>
    <script src="{{asset('global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script> -->
    
    <!-- Scripts -->
    <script src="{{asset('global/js/Component.js')}}"></script>
    <script src="{{asset('global/js/Plugin.js')}}"></script>
    <script src="{{asset('global/js/Base.js')}}"></script>
    <script src="{{asset('global/js/Config.js')}}"></script>
    
    <script src="{{asset('js/Section/Menubar.js')}}"></script>
    <script src="{{asset('js/Section/GridMenu.js')}}"></script>
    <script src="{{asset('js/Section/Sidebar.js')}}"></script>
    <script src="{{asset('js/Section/PageAside.js')}}"></script>
    <script src="{{asset('js/Plugin/menu.js')}}"></script>
    
    <script src="{{asset('global/js/config/colors.js')}}"></script>
    <script src="{{asset('js/config/tour.js')}}"></script>
    
    <!-- Page -->
    <script src="{{asset('js/Site.js')}}"></script>
    <script src="{{asset('global/js/Plugin/asscrollable.js')}}"></script>
    <!-- <script src="{{asset('global/js/Plugin/slidepanel.js')}}"></script> -->
    <script src="{{asset('global/js/Plugin/switchery.js')}}"></script>
    <script src="{{asset('global/js/Plugin/matchheight.js')}}"></script>
    <!-- <script src="{{asset('global/js/Plugin/jvectormap.js')}}"></script> -->

    <script src="{{asset('examples/js/dashboard/v1.js')}}"></script>
    <script src="{{asset('examples/js/forms/validation.js') }}"></script>
    <link rel="stylesheet" href="{{asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
   
    <script src="{{asset('examples/js/forms/advanced.js') }}"></script>

    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('examples/css/tables/datatable.css')}}">

    <script src="{{asset('examples/js/tables/datatable.js') }}"></script>

    <script src="{{asset('global/vendor/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-scroller/dataTables.scroller.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-buttons/dataTables.buttons.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-buttons/buttons.html5.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-buttons/buttons.flash.js') }}"></script>
    <!-- <script src="{{asset('global/vendor/datatables.net-buttons/buttons.print.js') }}"></script> -->
    <script src="{{asset('global/vendor/datatables.net-buttons/buttons.colVis.js') }}"></script>
    <script src="{{asset('global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js') }}"></script>

    <script src="{{asset('global/js/Plugin/datatables.js')}}"></script>
    <script src="{{asset('global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js')}}"></script>
    <script src="{{ asset('examples/js/tables/footable.js') }}"></script>
    <script src="{{ asset('global/vendor/footable/footable.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('global/vendor/footable/footable.core.css') }}">
    <link rel="stylesheet" href="{{ asset('examples/css/tables/footable.css') }}">
</head>
<body class="animsition dashboard">
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                <img class="navbar-brand-logo" width="50px" src="{{asset('/images/logo-layo.png') }}" title="Layo">
                <span class="navbar-brand-text hidden-xs-down"> Layo SF</span>
            </div>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
                <span class="sr-only">Toggle Search</span>
                <i class="icon wb-search" aria-hidden="true"></i>
            </button>
        </div>

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <li class="nav-item hidden-float" id="toggleMenubar">
                        <a class="nav-link" data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                    
                </ul>
                <!-- End Navbar Toolbar -->
            
                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    
                    <li class="nav-item dropdown">
                        
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" aria-expanded="false" role="button" title="Language">
                            <i class="icon wb-flag"> </i>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" id="language_id" name="language_id" value="en" onclick="getlanguage('en')" role="menuitem">
                                <span class="flag-icon flag-icon-gb"></span> English
                            </a>
                            <a class="dropdown-item" id="language_id" name="language_id" value="zh" onclick="getlanguage('zh')" role="menuitem">
                                <span class="flag-icon flag-icon-cn"></span> Chinese
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        
                        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="User" aria-expanded="false" data-animation="scale-up" role="button">
                            <i class="icon wb-user" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger up">1</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <div class="dropdown-menu-header">
                                <h5>
                                    Hello, {{ Auth::user()->username }}
                                </h5>
                            </div>
                
                            <div class="list-group">
                                <div data-role="container">
                                </div>
                            </div>
                            <div class="dropdown-menu-footer">
                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-frm').submit();">
                                    <i class="icon md-power"> Logout </i>
                                </a>
                                <form id="logout-frm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                    
                    
                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->
        
            <!-- Site Navbar Seach -->
            <div class="collapse navbar-search-overlap" id="site-navbar-search">
                <form role="search">
                    <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                        data-toggle="collapse" aria-label="Close"></button>
                    </div>
                    </div>
                </form>
            </div>
            <!-- End Site Navbar Seach -->
        </div>
    </nav>
    <?php 
        // $lang = App\Language::pluck('language')[0];
        // $setup = Stichoza\GoogleTranslate\GoogleTranslate::trans('SETUP', $lang);
        // $masterdata = Stichoza\GoogleTranslate\GoogleTranslate::trans('Master Data', $lang);
        // $supplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Supplier', $lang);
        // $buyer = Stichoza\GoogleTranslate\GoogleTranslate::trans('Buyer', $lang);
        // $species = Stichoza\GoogleTranslate\GoogleTranslate::trans('Species', $lang);
        // $grade = Stichoza\GoogleTranslate\GoogleTranslate::trans('Grade', $lang);
        // $bank = Stichoza\GoogleTranslate\GoogleTranslate::trans('Bank', $lang);
        // $category = Stichoza\GoogleTranslate\GoogleTranslate::trans('Category', $lang);
        // $bankaccount = Stichoza\GoogleTranslate\GoogleTranslate::trans('Bank Account', $lang);
        // $transactionmenu = Stichoza\GoogleTranslate\GoogleTranslate::trans('TRANSACTION', $lang);
        // $po_menu = Stichoza\GoogleTranslate\GoogleTranslate::trans('Purchase Order', $lang);
        // $rm = Stichoza\GoogleTranslate\GoogleTranslate::trans('Arrival Raw Material', $lang);
    ?>
    <div class="site-menubar">
        <div class="site-menubar-body">
            <div>
                <div>
                    <ul class="site-menu" data-plugin="menu">
                        <li class="site-menu-category">SETUP</li>
                        
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                <span class="site-menu-title">Master Data</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.supplier') }}">
                                        <span class="site-menu-title">Supplier</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.buyer') }}">
                                        <span class="site-menu-title">Buyer</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.species') }}">
                                        <span class="site-menu-title">Species</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.grade') }}">
                                        <span class="site-menu-title">Grade</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.category') }}">
                                        <span class="site-menu-title"> Category </span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.dimention') }}">
                                        <span class="site-menu-title"> Dimention </span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.itemproduct') }}">
                                        <span class="site-menu-title"> Item Product </span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.bank') }}">
                                        <span class="site-menu-title"> Bank </span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('master.bankaccount') }}">
                                        <span class="site-menu-title">Bank Account</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="site-menu-category"> TRANSACTION </li>
                        <li class="site-menu-item has-sub">
                            <a class="animsition-link" href="{{ route('po.index') }}">
                                <i class="site-menu-icon wb-shopping-cart" aria-hidden="true"></i>
                                <span class="site-menu-title"> Purchase Order</span>
                            </a>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a class="animsition-link" href="{{ route('rm.list') }}">
                                <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                                <span class="site-menu-title"> Arrival Raw Material</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="site-menubar-footer">
            <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
            data-original-title="Settings">
                <span class="icon wb-settings" aria-hidden="true"></span>
            </a>
            <a data-placement="top" data-toggle="tooltip" >
            <!-- <span class="icon wb-eye-close" aria-hidden="true"></span> -->
            </a>
            <a data-placement="top" data-toggle="tooltip" data-original-title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span class="icon wb-power" aria-hidden="true"></span> </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <div class="page">
    </div>
</body>
</html>
<script>
    function getlanguage(id){
        console.log(id);
        $.ajax({ 
                url: "{{ url('getlanguage') }}" + '/' + id,
                data: { id : id},
                type: 'get',
                dataType : "json",
                success: function(data)
                {
                    console.log('language '+id);
                    if(data.success)
                    {
                        console.log('berhasil');
                        location.reload();
                    }
                }
        });
    }
</script>