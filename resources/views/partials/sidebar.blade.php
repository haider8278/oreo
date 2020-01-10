<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-bar">
        <a class="ml-3 mr-3 navbar-brand" href="/home"><img src="/images/{{$setting->logo}}" alt="{{$setting->title}}" style="max-height: 50px;"></a>
    </ul>
    <div class="stretchRight active" id="dashboard">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        <div class="image"><a
                                href="#"><img
                                    src="/images/<?php echo Auth::user()->avatar;?>" alt="User"></a></div>
                        <div class="detail">
                            <h4><?php echo Auth::user()->name;?></h4>
                            <small><?php echo  Auth::user()->roles()->first()->name;?></small>
                        </div>
                    </div>
                </li>
                <li class="header">MAIN</li>

                <li class="active open">
                    <a href="/home">
                        <i class="zmdi zmdi-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="/users"><i
                            class="zmdi zmdi-account-add"></i><span>All Users</span></a></li>
                {{-- <li class="">
                    <a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-account-add"></i><span>Doctors</span></a>
                    <ul class="ml-menu">
                        <li class=""><a
                                href="https://thememakker.com/templates/oreo/hospital/laravel/public/doctor/doctors">All
                                Doctors</a></li>
                        <li class=""><a
                                href="https://thememakker.com/templates/oreo/hospital/laravel/public/doctor/add-doctor">Add
                                Doctor</a></li>
                        <li class=""><a
                                href="https://thememakker.com/templates/oreo/hospital/laravel/public/doctor/profile">Doctor
                                Profile</a></li>
                        <li class=""><a
                                href="https://thememakker.com/templates/oreo/hospital/laravel/public/doctor/events">Doctor
                                Schedule</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</aside>
