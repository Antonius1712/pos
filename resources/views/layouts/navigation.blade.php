<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ auth()->user()->role->id == 1 ? Route('admin.home') : Route('user.home') }}">
                        {{-- <div class="brand-logo"></div> --}}
                        <h2 class="brand-text mb-0">Cahaya Baru</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        @if( auth()->user()->role->id == 1 )
            @include('layouts.admin_menu')
        @else
            @include('layouts.user_menu')
        @endif
    </div>
</div>