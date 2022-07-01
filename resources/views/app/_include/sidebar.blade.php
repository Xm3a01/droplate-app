<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('images/ms.png') }}" alt="AdminLTE Logo" class="brand-image  elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-primary">Droplet</span> App
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('Manage-product')
                <li class="nav-item {{ Request::is('*employees*') ? 'menu-is-opening menu-open' : '' }} ">
                    <a href="#" class="nav-link  {{ Request::is('*employees*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa fa-road"></i> --}}
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview text-xs">
                        @role('Admin')
                        <li class="nav-item">
                            <a href="{{ route('employees.index') }}"
                                class="nav-link {{ Request::is('*employees') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-users"></i>
                                <p class="">Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('drivers.index') }}"
                                class="nav-link {{ Request::is('*drivers') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-users"></i>
                                <p class="">Driver</p>
                            </a>
                        </li>   
                        @endrole
                       
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ Request::is('*users') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-users"></i>
                                <p class="">Clinets</p>
                            </a>
                        </li>        
                        
                    </ul>
                </li>
              
                
                <li class="nav-item {{ Request::is('*products*') ? 'menu-is-opening menu-open' : '' }} ">
                    <a href="#" class="nav-link  {{ Request::is('*products*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa fa-road"></i> --}}
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}"
                                class="nav-link {{ Request::is('*products') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-file-alt"></i>
                                <p class="">Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Manage-categories')
                <li class="nav-item {{ Request::is('*categories*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ Request::is('*categories*') ? 'active' : '' }}"">
                        <i class="   nav-icon  fas fa-columns" aria-hidden="true"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                                class="nav-link {{ Request::is('categories.index') ? 'tabed' : '' }}">
                                <i class="  fa fa-file-alt nav-icon text-xs"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sub_categories.index') }}"
                                class="nav-link {{ Route::is('sub_categories.index') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-thumbtack"></i>
                                <p class="">Sub categories</p>
                            </a>
                        </li>

                    </ul>

                </li>
               

                <li class="nav-item {{ Request::is('*cities*') || Request::is('*regions*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ Request::is('*cities*') || Request::is('*regions*') ? 'active' : '' }}">
                        <i class=" nav-icon fa fa-map"></i>
                        <p>
                            Cities & Regions
                            <i class="right fas fa-angle-left"></i>
                            {{-- <span class="right badge badge-danger">{{ Route::is('tracing.index') ? $transfers->count() :  0}}</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('cities.index') }}"
                                class="nav-link {{ Route::is('cities.index') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-city"></i>
                                <p class="">cities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('regions.index') }}"
                                class="nav-link {{ Route::is('regions.index') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-map"></i>
                                <p class="">Regions</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('*promoes*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ Request::is('*promoes*') ? 'active' : '' }}">
                        <i class=" nav-icon fa fa-code"></i>
                        <p>
                            PromoCode
                            <i class="right fas fa-angle-left"></i>
                            {{-- <span class="right badge badge-danger">{{ Route::is('tracing.index') ? $transfers->count() :  0}}</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('promoes.index') }}"
                                class="nav-link {{ Route::is('promoes.index') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-code"></i>
                                <p class="">promo codes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('*ads*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ Request::is('*ads*') ? 'active' : '' }}">
                        <i class=" nav-icon  fa fa-thumbtack"></i>
                        <p>
                            Ads
                            <i class="right fas fa-angle-left"></i>
                            {{-- <span class="right badge badge-danger">{{ Route::is('tracing.index') ? $transfers->count() :  0}}</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('ads.index') }}"
                                class="nav-link {{ Route::is('ads.index') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fa fa-thumbtack"></i>
                                <p class="">ads</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                @endcan
                @can('Manage-reports')
                         
                <li class="nav-item {{ Request::is('*profits*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ Request::is('*profits*') ? 'active' : '' }}">
                        <i class=" nav-icon  fa fa-copy"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                            {{-- <span class="right badge badge-danger">{{ Route::is('tracing.index') ? $transfers->count() :  0}}</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('profits') }}"
                                class="nav-link {{ Route::is('profits') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fas fa-chart-line"></i>
                                <p class="">Profits reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('delivery.price') }}"
                                class="nav-link {{ Route::is('delivery.price') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fas fa-chart-pie"></i>
                                <p class="">Delivery price reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('clients') }}"
                                class="nav-link {{ Route::is('clients') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fas fa-chart-bar"></i>
                                <p class="">Clients reports</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                @endcan

                <li class="nav-item {{ Request::is('*orders*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ Request::is('*orders*') ? 'active' : '' }}">
                        <i class=" nav-icon  fa fa-copy"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                            {{-- <span class="right badge badge-danger">{{ Route::is('tracing.index') ? $transfers->count() :  0}}</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-xs">
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}"
                                class="nav-link {{ Route::is('orders.index') ? 'tabed' : '' }}">
                                <i class="nav-icon text-sm fas fa-chart-line"></i>
                                <p class="">Order</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('*setting*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('setting.index') }}" class="nav-link {{ Request::is('*setting*') ? 'active' : '' }}">
                        <i class=" nav-icon  fa fa-cog"></i>
                        <p>
                            Settings
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                            {{-- <span class="right badge badge-danger">{{ Route::is('tracing.index') ? $transfers->count() :  0}}</span> --}}
                        </p>
                    </a>
                </li>
                 <li class="nav-item {{ Route::is('notifications.create') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('notifications.create') }}" class="nav-link {{ Route::is('notifications.create') ? 'active' : '' }}">
                        <i class=" nav-icon  fa fa-bile"></i>
                        <p>
                            Notifications
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('*conditions*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('conditions.index') }}" class="nav-link {{ Request::is('*conditions*') ? 'active' : '' }}">
                        <i class=" nav-icon  fa fa-cog"></i>
                        <p>
                            Conditions&Privacy
                        </p>
                    </a>
                </li>

               
            </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <style>
        .tabed {
            color: #fff !important;
        }

    </style>
</aside>
