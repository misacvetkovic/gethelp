<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
                <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if (Auth::check())

                <li class="dropdown">
                    <a style="position: relative; padding-left: 50px;" href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a> <img class="img-circle avatar-nav-img" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="">
                    <ul class="dropdown-menu">
                        <li><a href="/" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> View Site</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('posts.index') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                        <li><a href="{{ route('categories.index') }}"><i class="fa fa-tags" aria-hidden="true"></i> Categories</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </li>

                @else
                
                <a class="btn btn-default btn-success navbar-btn" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                
                @endif

            </ul>
            
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>