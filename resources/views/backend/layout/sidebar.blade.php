<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li class="mb-2">
                    <a href="{{route('admin.home')}}" class="@yield('home-active')">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Admin Dashboard
                    </a>
                </li>
                @can('view')
                <li class="mb-2">
                    <a href="{{route('admin.admin-user.index')}}" class="@yield('admin-active')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Admin User
                    </a>
                </li>
                @endcan
                <li>
                    <a href="{{route('admin.duration.index')}}" class="@yield('duration-active')">
                        <i class="metismenu-icon pe-7s-clock"></i>
                        Duration
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.city.index')}}" class="@yield('city-active')">
                        <i class="metismenu-icon pe-7s-culture"></i>
                        City
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.customer.index')}}" class="@yield('customer-active')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Customer
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.category.index')}}" class="@yield('category-active')">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Category
                    </a>
                </li>
                <li>
                <li>
                    <a href="{{route('admin.brand.index')}}" class="@yield('brand-active')">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Brand
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.product.index')}}" class="@yield('product-active')">
                        <i class="metismenu-icon pe-7s-config"></i>
                        Product
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.add-to-cart.index')}}" class="@yield('add_to_cart-active')">
                        <i class="metismenu-icon pe-7s-cart"></i>
                        Add To Cart
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.order_item.index')}}" class="@yield('order_item-active')">
                        <i class="metismenu-icon pe-7s-drop"></i>
                        Order Item
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.order.index')}}" class="@yield('order-active')">
                        <i class="metismenu-icon pe-7s-edit"></i>
                        Order
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.contact')}}" class="@yield('contact-active')">
                        <i class="metismenu-icon   pe-7s-paper-plane"></i>
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>