<?php
$setting = \DB::table('settings')->where('id',1)->first();

?>
@include('partials.head')
<body class="theme-{{$setting->theme}}">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="/images/{{$setting->logo}}" style="max-height: 50px;"
                    alt="{{$setting->title}}"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <nav class="navbar p-l-5 p-r-5">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="bars"></a>

                </div>
            </li>
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
            </li>
            <li class="d-none d-md-inline-block">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-addon">
                        <i class="zmdi zmdi-search"></i>
                    </span>
                </div>
            </li>
            <li class="float-right">
                <form class="d-inline-block" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout" data-close="true"><i class="zmdi zmdi-power"></i></button>
                </form>
                <a href="/settings" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
            </li>
        </ul>
    </nav> <!-- Left Sidebar -->
    @include('partials.sidebar')
    <!-- Right Sidebar -->
    {{-- @include('partials.right-sidebar'); --}}
