<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">

                <img class="img-circle"
                     src="{{url('/uploads/user.gif')}}"
                     alt="User Image" height="160px">
            </div>
            <div class="pull-left info">
                <p> @if(Auth::guard('employee')->check())
                        Hello {{Auth::guard('employee')->user()->name}}
                    @else
                        {{Auth::user()->name}}
                    @endif</p>
                <p style="font-size: 12px; margin-left: 10px;">Programmer</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li>
                @if(Auth::guard('employee')->check())
                    <a href="{{url('/employee/home')}}"><i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                        @else
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                        @endif
            </li>

            @can('isAdmin', auth()->user())
                <li>
                    <a href="{{url('/admin/employee')}}">
                        <i class="fa fa-users"></i>
                        <span>Employees</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/staff')}}">
                        <i class="fa fa-user-secret"></i>
                        <span>Kitchen Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/orderHistory')}}">
                        <i class="fa fa-list"></i>
                        <span>Order History</span>
                    </a>
                </li>
            @endcan

            @can('isStaff', auth()->user())
                <li>
                    <a href="{{url('/staff/category')}}">
                        <i class="fa fa-sitemap"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/staff/food')}}">
                        <i class="fa fa-list-alt"></i>
                        <span>Food Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/staff/todaysOrder')}}">
                        <i class="fa fa-list"></i>
                        <span>Today's Order</span>
                    </a>
                </li>
            @endcan

            @if(Auth::guard('employee')->check())
                <li>
                    <a href="{{url('/employee/todaysMenu')}}">
                        <i class="fa fa-bars"></i>
                        <span>Today's Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/employee/orderHistory')}}">
                        <i class="fa fa-bars"></i>
                        <span>Order History</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
</aside>
