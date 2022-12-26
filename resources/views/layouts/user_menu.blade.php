<div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="{{ request()->segment(1) == '' ? 'active' : '' }}">
            <a class="item" href="{{ route('user.home') }}">
                <i class="feather icon-home"></i>
                Home
            </a>
        </li>
        <li class="{{ request()->segment(1) == 'barang' ? 'active' : '' }}">
            <a class="item" href="{{ route('user.barang.index') }}">
                <i class="feather icon-package"></i>
                Barang
            </a>
        </li>
        <li class="{{ request()->segment(1) == 'transaksi' ? 'active' : '' }}">
            <a class="item" href="{{ route('user.transaksi.index') }}">
                <i class="feather icon-shopping-cart"></i>
                Transaksi
            </a>
        </li>
        <li class="{{ request()->segment(1) == 'user' ? 'active' : '' }}">
            <a class="item" href="{{ route('user.user.index') }}">
                <i class="feather icon-users"></i>
                User
            </a>
        </li>
    </ul>
</div>