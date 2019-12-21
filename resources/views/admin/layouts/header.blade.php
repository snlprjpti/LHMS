<header class="main-header">
    <a href="{{url('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">

            Home</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

{{--                <li class="dropdown notifications-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-bell-o"></i>--}}
{{--                        @if(count($notifications)>0)--}}
{{--                            <span class="label label-warning">{{count($notifications)}}</span>--}}
{{--                        @endif--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have {{count($notifications)}} notifications</li>--}}
{{--                        @if(count($notifications)>0)--}}
{{--                            <li>--}}
{{--                                @foreach($notifications as $notification)--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li>--}}
{{--                                            <a href="">--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                @endforeach--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        <li class="footer"><a--}}
{{--                                href="{{url('/')}}">View--}}
{{--                                all</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}


                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img class="user-image"
                             src="{{url('/uploads/user.gif')}}"
                             alt="User Image" height="160px">
                        <span class="hidden-xs">
                            @if(Auth::guard('employee')->check())
                                {{Auth::guard('employee')->user()->name}}
                            @else
                                {{Auth::user()->name}}
                            @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">

                            <img class="img-circle"
                                 src="{{url('/uploads/user.gif')}}"
                                 alt="User Image" height="160px">
                            <p>
                                @if(Auth::guard('employee')->check())
                                    {{Auth::guard('employee')->user()->name}}
                                @else
                                    {{Auth::user()->name}}
                                @endif
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-right">

                                @if(Auth::guard('employee')->check())
                                    <form class="logout-form" action="{{ url('employee/logout') }}" method="POST">
                                        @else
                                            <form class="logout-form" action="{{ route('logout') }}" method="POST">
                                                @endif
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-default btn-flat">
                                                    Sign Out
                                                </button>
                                            </form>
                            </div>

                            <div class="pull-left">
                                @if(Auth::guard('employee')->check())
                                    <a href="{{url('/employee/profile')}}" class="btn btn-default btn-flat"> <i
                                            class="fa fa-user fa-lg"></i>
                                        Profile
                                    </a>
                                @else
                                    <a href="{{url('/profile')}}" class="btn btn-default btn-flat"> <i
                                            class="fa fa-user fa-lg"></i>
                                        Profile
                                    </a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
