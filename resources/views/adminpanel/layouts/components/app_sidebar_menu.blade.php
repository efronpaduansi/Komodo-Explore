<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">{{ Auth::user()->role->role_name }} Panel</li>

        <li
            class="sidebar-item  {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if(Auth::user()->role->role_name === 'Admin')
        <li
            class="sidebar-item  has-sub {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-pin-map-fill"></i>
                <span>Data Lokasi</span>
            </a>

            <ul class="submenu ">
                <li class="submenu-item  {{ request()->is('admin/locations/add') ? 'active' : '' }}">
                    <a href="{{ route('admin.locations_create') }}" class="submenu-link">Tambah Lokasi</a>
                </li>
                <li class="submenu-item {{ request()->is('admin/locations') ? 'active' : '' }} ">
                    <a href="{{ route('admin.locations_index') }}" class="submenu-link">Semua Lokasi</a>
                </li>
            </ul>
        </li>

        <li
            class="sidebar-item  has-sub {{ request()->is('admin/packages') || request()->is('admin/packages/*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-box-fill"></i>
                <span>Paket Wisata</span>
            </a>

            <ul class="submenu ">
                <li class="submenu-item {{ request()->is('admin/packages/add') ? 'active' : '' }} ">
                    <a href="{{ route('admin.packages_create') }}" class="submenu-link">Tambah Baru</a>
                </li>
                <li class="submenu-item  {{ request()->is('admin/packages') ? 'active' : '' }}">
                    <a href="{{ route('admin.packages_index') }}" class="submenu-link">Semua Paket</a>
                </li>
            </ul>
        </li>
        @endif

        <li
            class="sidebar-item {{ request()->is('admin/guests') || request()->is('admin/guests/*') ? 'active' : '' }}">
            <a href="{{ route('admin.guests_index') }}" class='sidebar-link'>
                <i class="bi bi-suitcase2-fill"></i>
                <span>Customer</span>
            </a>
        </li>

        <li
            class="sidebar-item {{ request()->is('admin/bookings') || request()->is('admin/bookings/*') ? 'active' : '' }}">
            <a href="{{ route('admin.bookings_index') }}" class='sidebar-link'>
                <i class="bi bi-ticket-fill"></i>
                <span>Pemesanan</span>
            </a>
        </li>

        <li
            class="sidebar-item  has-sub {{ request()->is('admin/sales/*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-receipt"></i>
                <span>Penjualan</span>
            </a>

            <ul class="submenu ">
                <li class="submenu-item {{ request()->is('admin/sales/invoices') ? 'active' : '' }} ">
                    <a href="{{ route('admin.invoices_index') }}" class="submenu-link">Faktur</a>
                </li>
                @if(Auth::user()->role->role_name === 'Admin')
                <li class="submenu-item {{ request()->is('admin/sales/payment-channels') || request()->is('admin/sales/payment-channels/*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.payment_channels_index') }}" class="submenu-link">Channel Bank</a>
                </li>
                @endif
                <li class="submenu-item {{ request()->is('admin/sales/payments') ? 'active' : '' }} ">
                    <a href="{{ route('admin.payments_index') }}" class="submenu-link">Data Pembayaran</a>
                </li>
            </ul>
        </li>

        @if(Auth::user()->role->role_name === 'Admin')
        <li
            class="sidebar-item  has-sub {{ request()->is('admin/users/*') || request()->is('admin/users') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Pengguna</span>
            </a>

            <ul class="submenu ">
                <li class="submenu-item  {{ request()->is('admin/users/add') ? 'active' : '' }}">
                    <a href="{{ route('admin.users_create') }}" class="submenu-link">Pengguna Baru</a>
                </li>
                <li class="submenu-item  {{ request()->is('admin/users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users_index') }}" class="submenu-link">Data Pengguna</a>
                </li>
            </ul>
        </li>
        @endif

        <li
            class="sidebar-item  has-sub {{ request()->is('admin/settings/*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-gear-fill"></i>
                <span>Pengaturan</span>
            </a>

            <ul class="submenu ">
                <li class="submenu-item  {{ request()->is('admin/settings/web-setting') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings_index') }}" class="submenu-link">Website</a>
                </li>
                <li class="submenu-item  ">
                    <a href="component-alert.html" class="submenu-link">Akun</a>
                </li>
            </ul>
        </li>

        <li
            class="sidebar-item ">
            <a href="/" class='sidebar-link' target="_blank">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>Lihat Web</span>
            </a>
        </li>

    </ul>
</div>
