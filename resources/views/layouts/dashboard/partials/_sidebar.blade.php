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
                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('tambahmobil') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tampilmobil') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Cars</span>
            </a>
        </li>
    </ul>
</nav>
