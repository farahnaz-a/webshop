<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>@yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('dashboard_asset/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    @yield('css')


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/starlight.css') }}">
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo" style="background: #fcb800">
        <a href=""><i class="icon ion-android-star-outline"></i> Webshop</a></div>
    <div class="sl-sideleft">
        {{-- <div class="input-group input-group-search">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn"><i class="fa fa-search"></i></button>
            </span><!-- input-group-btn -->
        </div><!-- input-group --> --}}

        {{-- <label class="sidebar-label">View Website</label>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">View Website</span>
            </div><!-- menu-item -->
        </a> --}}


       
        <div class="sl-sideleft-menu">
            <label class="sidebar-label">Dashboard</label>
            <a href="{{ route('admin.dashboard')}}" class="sl-menu-link @yield('dashboard')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div>
            </a>
           

            <label class="sidebar-label">Product</label>
            <a href="{{ route('userProducts.index') }}" class="sl-menu-link @yield('shop')">
                <div class="sl-menu-item">
                    <i class="fa fa-bank"></i>
                    <span class="menu-item-label">Product</span>
                </div>
            </a>
        </div>
        <br>
    </div>
    < <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header" style="background: #fcb800">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down" style="background: #fcb800">
                    <a id="btnLeftMenu" href="">
                        <i class="icon ion-navicon-round"></i>
                    </a>
                </div>
                <div class="navicon-left hidden-lg-up">
                    <a id="btnLeftMenuMobile" href="">
                        <i class="icon ion-navicon-round"></i>
                    </a>
                </div>
            </div><!-- sl-header-left -->
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li>
                                    <a href="{{ route('user.profile') }}">
                                        <i class="icon ion-ios-person-outline"></i> Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('shopDetails.index') }}">
                                        <i class="icon ion-navicon-round"></i>Shop Details
                                    </a>
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                           this.closest('form').submit();"><i class="icon ion-power"></i>
                                            Sign Out
                                        </a>
                                    </li>
                                </form>
                              
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>
                {{-- <div class="navicon-right" style="background: #fcb800">
                    <a id="btnRightMenu" href="" class="pos-relative">
                        <i class="icon ion-ios-bell-outline"></i>
                        <!-- start: if statement -->
                        <span class="square-8 bg-danger"></span>
                        <!-- end: if statement -->
                    </a>
                </div><!-- navicon-right --> --}}
            </div><!-- sl-header-right -->
        </div><!-- sl-header -->
        <!-- ########## END: HEAD PANEL ########## -->



     

        <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">

            @yield('breadcrumb')


            <div class="sl-pagebody">

                @yield('content')
             
            </div>
            <!-- sl-pagebody -->
        </div>
        <!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

        <script src="{{ asset('dashboard_asset/lib/jquery/jquery.js') }}"></script>
        <script src="{{ asset('dashboard_asset/lib/popper.js/popper.js') }}"></script>
        <script src="{{ asset('dashboard_asset/lib/bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('dashboard_asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/starlight.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @yield('js')

</body>

</html>