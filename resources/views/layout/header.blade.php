{{-- ---------------------------------------------------- HEADER SECTION --------------------------------------------------------------- --}}
<div class="header">

    <div class="header-left">
        <a href="#" class="logo">
            <img src="{{ url('/img/logo.png') }}" alt="Logo">
        </a>
        <a href="#" class="logo logo-small">
            <img src="{{ url('/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    

    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>


    <ul class="nav user-menu">

        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-bell"></i> <span class="badge badge-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    {{-- <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ url('/img/profiles/avatar-02.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                            approved <span class="noti-title">your estimate</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="assets/img/profiles/avatar-11.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">International Software
                                                Inc</span> has sent you a invoice in the amount of <span
                                                class="noti-title">$218</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ url('/img/profiles/avatar-17.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">John Hendry</span> sent a
                                            cancellation request <span class="noti-title">Apple iPhone XR</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ url('/img/profiles/avatar-13') }}.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Mercury Software Inc</span>
                                            added a new product <span class="noti-title">Apple MacBook Pro</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul> --}}
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>


        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="{{ url('/uploads/profiles/'.Auth::user()->profile_pic) }}"
                        width="31" alt="Seema Sisty"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ url('/uploads/profiles/'.Auth::user()->profile_pic) }}" alt="User Image"
                            class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ Auth::user()->name }}</h6>
                        <p class="text-muted mb-0">
                            @if (Auth::user()->user_type == 1)
                                Administrator
                            @elseif(Auth::user()->user_type == 2)
                                Staff
                            @elseif(Auth::user()->user_type == 3)
                                Student
                            @elseif(Auth::user()->user_type == 4)
                                Parent
                            @endif
                        </p>
                    </div>
                </div>
                <a class="dropdown-item"
                @if (Auth::user()->user_type == 1)
                    href="{{ url('admin/change_password') }}"
                @elseif(Auth::user()->user_type == 2)
                    href="{{ url('teacher/change_password') }}"
                @elseif(Auth::user()->user_type == 3)
                    href="{{ url('student/change_password') }}"
                @elseif(Auth::user()->user_type == 4)
                    href="{{ url('parent/change_password') }}"
                @endif 
                >Change Password</a>
                <a class="dropdown-item"
                @if (Auth::user()->user_type == 1)
                    href="{{ url('admin/account') }}"
                @elseif(Auth::user()->user_type == 2)
                    href="{{ url('teacher/account') }}"
                @elseif(Auth::user()->user_type == 3)
                    href="{{ url('student/account') }}"
                @elseif(Auth::user()->user_type == 4)
                    href="{{ url('parent/account') }}"
                @endif 
                >Account Settings</a>         
                <a class="dropdown-item" href="general.html">My Profile</a>
                <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
            </div>
        </li>

    </ul>

</div>s

{{-- ---------------------------------------------- SIDEBAR -------------------------------------------------------------------------- --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

{{---------------------------------------------- NAVLINK FOR ADMINs ---------------------------------------------------------------}}

                @if (Auth::user()->user_type == 1)
                    <li class="menu-title">
                    </li>
                    <li class="@if(Request::segment(2) == 'dashboard') active @endif">
                        <a href="{{ url('admin/dashboard') }}" class= nav-link >
                            <i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    {{-- <li class="submenu">
                        <a href="#"><i class="fe fe-users">
                            </i> <span> Admin</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                        </ul>
                    </li> --}}
                                        {{-- NAVIGATION LINK FOR ADMIN  --}}
                    <li class="@if(Request::segment(2) == 'admin') active @endif">
                        <a href="{{ url('admin/admin/list')}}" ><i class="fe fe-user"></i> <span> Admin </span></a>
                    </li>
                                        {{-- NAVIGATION LINK FOR TEACHER  --}}
                    <li class="@if(Request::segment(2) == 'teacher') active @endif">
                        <a href="{{ url('admin/teacher/list')}}" ><i class="fe fe-users"></i> <span> Teacher </span></a>
                    </li>
                                        {{-- NAVIGATION LINK FOR STUDENT  --}}
                    <li class="@if(Request::segment(2) == 'student') active @endif">
                        <a href="{{ url('admin/student/list')}}" ><i class="fe fe-users"></i> <span> Student </span></a>
                    </li>
                                        {{-- NAVIGATION LINK FOR PARENT  --}}
                    <li class="@if(Request::segment(2) == 'parent') active @endif">
                        <a href="{{ url('admin/parent/list')}}" ><i class="fe fe-users"></i> <span> Parent </span></a>
                    </li>
                                        {{-- NAVIGATION LINK FOR CLASSES  --}}
                    <li class="@if(Request::segment(2) == 'class') active @endif">
                        <a href="{{ url('admin/class/list') }}"><i class="fe fe-users"></i> <span> Class </span></a>
                    </li> 
                                        {{-- NAVIGATION LINK FOR SUBJECTS  --}}
                    <li class="@if(Request::segment(2) == 'subject') active @endif">
                        <a href="{{ url('admin/subject/list') }}"><i class="fe fe-book"></i> <span> Subjects </span></a>
                    </li>
                                        {{-- NAVIGATION LINK FOR ASSIGN SUBJECTS  --}}
                    <li class="@if(Request::segment(2) == 'assign_subject') active @endif">
                        <a href="{{ url('admin/assign_subject/list') }}"><i class="fe fe-book"></i> <span> Assign Subjects </span></a>
                    </li>
                                        {{-- NAVIGATION LINK FOR CHANGING PASSWORDS  --}}
                    <li class="@if(Request::segment(2) == 'change_password') active @endif">
                        <a href="{{ url('admin/change_password') }}"><i class="fe fe-key"></i> <span> Change Password </span></a>
                    </li>

                    
                    <li ><a href="{{ url('logout') }}"><i class="fe fe-lock"></i> <span> Logout </span></a></li>

{{-------------------------------------------- NAVLINK FOR TEACHERS ------------------------------------------------------------------}}

                @elseif(Auth::user()->user_type == 2)  
                    <li class="menu-title">
                    </li>
                    <li class="@if(Request::segment(2) == 'dashboard') active @endif">
                        <a href="{{ url('teacher/dashboard') }}" class="nav-link" >
                            <i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="@if(Request::segment(2) == 'account') active @endif">
                        <a href="{{ url('teacher/account') }}" class="nav-link" >
                            <i class="fe fe-home"></i> <span>My Account</span></a>
                    </li>

                    <li class="@if(Request::segment(2) == 'change_password') active @endif">
                        <a href="{{ url('teacher/change_password') }}"><i class="fe fe-key"></i> <span> Change Password </span></a>
                    </li>
                    <li ><a href="{{ url('logout') }}"><i class="fe fe-lock"></i> <span> Logout </span></a></li>

{{---------------------------------------------- NAVLINK FOR STUDENT ---------------------------------------------------------------}}

                @elseif(Auth::user()->user_type == 3) 
                    <li class="menu-title">
                    </li>
                    <li class="@if(Request::segment(2) == 'dashboard') active @endif">
                        <a href="{{ url('student/dashboard') }}" class="nav-link" >
                            <i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="@if(Request::segment(2) == 'account') active @endif">
                        <a href="{{ url('student/account') }}" class="nav-link" >
                            <i class="fe fe-home"></i> <span>My Account</span></a>
                    </li>

                    <li class="@if(Request::segment(2) == 'change_password') active @endif">
                        <a href="{{ url('student/change_password') }}"><i class="fe fe-key"></i> <span> Change Password </span></a>
                    </li>
                    <li ><a href="{{ url('logout') }}"><i class="fe fe-lock"></i> <span> Logout </span></a></li>

{{---------------------------------------------- NAVLINK FOR PARENTS ---------------------------------------------------------------}}

                @elseif(Auth::user()->user_type == 4)  
                    <li class="menu-title">
                    </li>
                    <li class="@if(Request::segment(2) == 'dashboard') active @endif">
                        <a href="{{ url('parent/dashboard') }}" class="nav-link" >
                            <i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="@if(Request::segment(2) == 'account') active @endif">
                        <a href="{{ url('parent/account') }}" class="nav-link" >
                            <i class="fe fe-home"></i> <span>My Account</span></a>
                    </li>

                    <li class="@if(Request::segment(2) == 'change_password') active @endif">
                        <a href="{{ url('parent/change_password') }}"><i class="fe fe-key"></i> <span> Change Password </span></a>
                    </li>
                    <li ><a href="{{ url('logout') }}"><i class="fe fe-lock"></i> <span> Logout </span></a></li>
                @endif
                
               
            </ul>
        </div>
    </div>
</div>
