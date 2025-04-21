<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <h3 class="mt-3">Admin Dashboard</h3>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @can('admin_access_user')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">User Management</span>
                </li>
                <li class="sidebar-item {{ request()->is('admin/users*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.users.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu"> {{ __('User') }}
                        </span>
                    </a>
                </li>
                @endcan
                @can('admin_access_role')
                <li class="sidebar-item {{ request()->is('admin/roles*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.roles.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circles"></i>
                        </span>
                        <span class="hide-menu">
                            {{ __('Role') }}
                        </span>
                    </a>
                </li>
                @endcan
                @can('admin_access_permission')
                <li class="sidebar-item {{ request()->is('admin/permissions*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.permissions.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-license"></i>
                        </span>
                        <span class="hide-menu">{{ __('Permission') }}</span>
                    </a>
                </li>
                @endcan

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Blog Section</span>
                </li>

                @can('user_access_category')
                <li class="sidebar-item {{ request()->is('admin/categories*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-category"></i>
                        </span>
                        <span class="hide-menu"> {{ __('Category') }}</span>
                    </a>
                </li>
                @endcan

                @can('user_access_tag')
                <li class="sidebar-item {{ request()->is('admin/tags*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.tags.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-tags"></i>
                        </span>
                        <span class="hide-menu"> {{ __('Tag') }}
                        </span>
                    </a>
                </li>
                @endcan

                @can('user_access_post')
                <li class="sidebar-item {{ request()->is('admin/posts*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.posts.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">{{ __('Post') }}</span>
                    </a>
                </li>
                @endcan

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Auth</span>
                </li>
                <li class="sidebar-item">
                    <div class="d-flex sidebar-link">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="hide-menu" style="color: black;">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
