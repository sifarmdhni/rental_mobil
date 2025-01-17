<!-- Sidebar -->
<div class="sidebar bg-dark">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block text-white">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <!-- Users -->
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-address-book"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>

            <!-- Kategori -->
            <li class="nav-item">
                <a href="{{ route('admin.types.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-inbox"></i>
                    <p>{{ __('Kategori') }}</p>
                </a>
            </li>

            <!-- Mobil -->
            <li class="nav-item">
                <a href="{{ route('admin.cars.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-car"></i>
                    <p>{{ __('Mobil') }}</p>
                </a>
            </li>

            <!-- Testimonial -->
            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-quote-left"></i>
                    <p>{{ __('Testimonial') }}</p>
                </a>
            </li>

            <!-- Blog -->
            <li class="nav-item">
                <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-rss"></i>
                    <p>{{ __('Blog') }}</p>
                </a>
            </li>

            <!-- Team -->
            <li class="nav-item">
                <a href="{{ route('admin.teams.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>{{ __('Team') }}</p>
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item">
                <a href="{{ route('admin.settings.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-cog"></i>
                    <p>{{ __('Setting') }}</p>
                </a>
            </li>

            <!-- Pesan -->
            <li class="nav-item">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-comments"></i>
                    <p>{{ __('Pesan') }}</p>
                </a>
            </li>

            <!-- Booking -->
            <li class="nav-item">
                <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-credit-card"></i>
                    <p>{{ __('Booking') }}</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
