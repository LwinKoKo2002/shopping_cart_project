<section class="container-fluid site-nav">
    <div class="navbar">
        <div class="col-md-10">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4">
                    <div class="brand-nav">
                        <a href="/">
                            <img src="{{asset('/frontend/images/logo.png')}}" alt="logo-picture" />
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-2">
                    <div class="search-nav">
                        <div class="search-input">
                            <input type="search" name="search" placeholder="Search ...."
                                class="form-control brand_search" id="brand_search" />
                        </div>
                        <button class="btn-theme submit_btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="account-nav">
                        @guest
                        <p class="mb-0 d-none d-lg-block">
                            <a href="{{ route('login') }}">Login</a>
                        </p>
                        <p class="mb-0 text-white d-none d-lg-block">/</p>
                        <p class="mb-0 d-none d-lg-block">
                            <a href="{{ route('register') }}">Signup</a>
                        </p>
                        @endguest
                        @auth
                        <div class="dropdown mb-0 d-none d-lg-block text-white mr-lg-2 ml-md-5">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}'s Account
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('myAccount') }}"><i
                                        class="fa-regular fa-face-smile ml-0 mr-3"></i>User Account</a>
                                <a class="dropdown-item" href="{{ route('myOrder') }}"><i
                                        class="fa-sharp fa-solid fa-box ml-0 mr-3"></i>My
                                    Orders</a>
                                <form action="{{ route('logout') }}" method="POST" id="submit_form">
                                    @csrf
                                    <button type="submit" class="dropdown-item logoutBtn"><i
                                            class="fa-sharp fa-solid fa-arrow-right-from-bracket ml-0 mr-3"></i>Logout</button>
                                </form>
                            </div>
                        </div>
                        @endauth
                        <p class="mb-0 text-white d-lg-none d-block ml-m-3">
                            <i class="fas fa-bars show-sidebar-btn"></i>
                        </p>
                        <div class="dropdown mb-0 text-white d-lg-none d-block dropleft ml-3">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @auth
                                <a class="dropdown-item" href="{{ route('myAccount') }}"><i
                                        class="fa-regular fa-face-smile ml-0 mr-3"></i>User Account</a>
                                <a class="dropdown-item" href="{{ route('myOrder') }}"><i
                                        class="fa-sharp fa-solid fa-box ml-0 mr-3"></i>My
                                    Orders</a>
                                <form action="{{ route('logout') }}" method="POST" id="submit_form">
                                    @csrf
                                    <button type="submit" class="dropdown-item logoutBtn"><i
                                            class="fa-sharp fa-solid fa-arrow-right-from-bracket ml-0 mr-3"></i>Logout</button>
                                </form>
                                @endauth
                                @guest
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                @endguest
                            </div>
                        </div>
                        <p class="mb-0 text-white cart">
                            <a href="{{ route('showCart') }}"><i class="fas fa-shopping-cart"></i></a>
                            @auth
                            <span class="badge badge-pill badge-light cart_count"></span>
                            @endauth
                        </p>
                        <span class="text-white ml-lg-2 ml-md-3 d-none d-md-block">Cart</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="search-nav-two">
                        <div class="search-input">
                            <input type="text" name="search" placeholder="Search ...." class="form-control"
                                id="brand_mini_search" class="brand_search" />
                        </div>
                        <button class="btn-theme submit_btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="category-nav shadow-sm d-lg-block d-none">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
            <ul class="nav-item d-flex px-3">
                <li class="ml-lg-1">
                    <a href="/">Home</a>
                </li>
                @foreach ($categories as $category)
                <li class="ml-xl-5 ml-lg-5 text-center dropdown show">
                    <a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="cursor: pointer">
                        {{ $category->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($category->brands as $brand)
                        <a class="dropdown-item" href="/brands/{{$brand->id}}">{{$brand->name}}</a>
                        @endforeach
                    </div>
                </li>
                @endforeach
                <li class="ml-xl-5 ml-lg-5 text-center">
                    <a href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</section>