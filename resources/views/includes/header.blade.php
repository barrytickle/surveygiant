@if(!Auth::guest())
    @foreach(Auth::user()->role as $role)
        @if($role->name == 'Admin')
            <nav class="admin-bar">
                <div class="row">
                    <ul class="menu-left">
                        <li>Welcome, Admin</li>
                    </ul>
                    <ul class="menu-right">
                        <li><a href="/admin/user">Modify Users</a></li>
                        <li><a href="/admin/category">Modify Categories</a></li>
                        <li><a href="/admin/role">Modify Roles</a></li>
                        <li><a href="/admin/survey">Modify Surveys</a></li>
                    </ul>
                </div>
            </nav>
        @endif
    @endforeach
@endif

<header>
    <nav class="row clearfix">
        <ul class="menu-left">
            <li class="logo">Survey Giant</li>
        </ul>


        <ul class="menu-right">
            <li><a href="/">Home</a></li>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Sign In</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li><a href="/me/{{Auth::id()}}">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            @endif
        </ul>
    </nav>
</header>
<section class="section-sub">
    <ul class="row">
        @if(Auth::guest())
        <li>Sport</li>
        <li>Technology</li>
        <li>Science</li>
        <li>Social</li>
        <li>Education</li>
        <li>Politics</li>
        <li>Gaming</li>
        <li>Nature</li>
        @else
        <li><a href="/survey/create">Create Survey</a></li>
        <li><a href="/me/{{Auth::id()}}">View Your Surveys</a></li>
        @endif
    </ul>
</section>