<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">PEX CARGO | ADMIN JAYAPURA</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link @yield('dashboard')" href="{{route('jayapura.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('invoice')" href="{{route('jayapura.invoice.index')}}">
                        <i class="far fa-file-alt"></i>
                        Data Pengiriman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('reports')" href="{{route('jayapura.reports.index')}}">
                        <i class="fas fa-plane"></i>
                        Data Tracking
                    </a>
                </li>
                <li class="nav-item @yield('harga')">
                    <a class="nav-link" href="{{route('jayapura.harga.index')}}">
                        <i class="far fa-money-bill-alt"></i>
                        Data Harga
                    </a>
                </li>
                <li class="nav-item @yield('kontak')">
                    <a class="nav-link" href="{{route('jayapura.kontak.index')}}">
                        <i class="fas fa-address-book"></i>
                        Kontak
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('jayapura.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Admin, <b>Logout</b></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>
