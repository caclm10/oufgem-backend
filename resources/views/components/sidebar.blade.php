<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @foreach (config('pages.sidebar.menus') as $menu)
                    <li class="sidebar-title">{{ $menu['title'] }}</li>

                    @foreach ($menu['items'] as $item)
                        <li class="sidebar-item @if (request()->routeIs($item['activeRoute'])) active @endif">
                            <a href="{{ route($item['route']) }}" class='sidebar-link'>
                                <i class="bi bi-{{ $item['icon'] }}"></i>
                                <span>{{ $item['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @endforeach



                {{-- <li class="sidebar-title">Users</li>

                <li class="sidebar-item  ">
                    <a href="{{ route('roles.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-title">Products</li>

                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Types</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-list-ul"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li class="sidebar-title">Payment</li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-wallet2"></i>
                        <span>E-Wallets</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-credit-card-fill"></i>
                        <span>Banks</span>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
