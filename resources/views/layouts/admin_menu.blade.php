<div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="{{ request()->segment(2) == '' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.home') }}">
                <i class="feather icon-home"></i>
                Home
            </a>
        </li>
        <li class="{{ request()->segment(2) == 'barang' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.barang.index') }}">
                <i class="feather icon-package"></i>
                Barang
            </a>
        </li>
        <li class="{{ request()->segment(2) == 'transaksi' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.transaksi.index') }}">
                <i class="feather icon-shopping-cart"></i>
                Transaksi
            </a>
        </li>
        <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.user.index') }}">
                <i class="feather icon-users"></i>
                User
            </a>
        </li>
        <li class="{{ request()->segment(2) == 'kategori' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.kategori.index') }}">
                <i class="feather icon-paper"></i>
                Kategori
            </a>
        </li>
        <li class="{{ request()->segment(2) == 'merk' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.merk.index') }}">
                <i class="feather icon-users"></i>
                Merk
            </a>
        </li>
        <li class="{{ request()->segment(2) == 'supplier' ? 'active' : '' }}">
            <a class="item" href="{{ route('admin.supplier.index') }}">
                <i class="feather icon-users"></i>
                Supplier
            </a>
        </li>

        {{-- <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle item" href="#" data-toggle="dropdown">
                <i class="feather icon-settings"></i>
                <span data-i18n="Setting">Setting</span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ request()->segment(2) == 'setting' ? 'active' : '' }}" data-menu="">
                    <a class="dropdown-item item" href="" data-toggle="dropdown">
                        <i class="feather icon-circle"></i>
                        Kategori
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'setting' ? 'active' : '' }}" data-menu="">
                    <a class="dropdown-item item" href="" data-toggle="dropdown">
                        <i class="feather icon-circle"></i>
                        Merk
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'setting' ? 'active' : '' }}" data-menu="">
                    <a class="dropdown-item item" href="" data-toggle="dropdown">
                        <i class="feather icon-circle"></i>
                        Barang
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'setting' ? 'active' : '' }}" data-menu="">
                    <a class="dropdown-item item" href="" data-toggle="dropdown">
                        <i class="feather icon-circle"></i>
                        Supplier
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</div>