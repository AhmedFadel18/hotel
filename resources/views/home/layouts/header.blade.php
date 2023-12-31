<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"><img src="{{asset ('home/image/Logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="accomodation.html">Accomodation</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                    @if (Session::has('customerLogin'))
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('home.logout') }}">Logout</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('home.register') }}">Register</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('home.login') }}">Log In</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="elements.html">Elemests</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
