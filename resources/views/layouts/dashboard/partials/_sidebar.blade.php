<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaction" aria-expanded="false"
                aria-controls="transaction">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Transaction</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaction">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('payment') }}">Payment</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#verification" aria-expanded="false"
                aria-controls="verification">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Verification</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="verification">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::guard('webadmin')->user())
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('requestVerificationPage') }}">Verification
                                Request</a>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('formRequest') }}">Form
                            Request</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('chart') }}">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#mobil" aria-expanded="false" aria-controls="mobil">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Mobil</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mobil">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('tampilmobil') }}">Tampil</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tambahmobil') }}">Tambah</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
