<section class="container-fluid site-nav">
    <div class="navbar">
        <div class="col-md-10">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4">
                    <div class="brand-nav">
                        <a href="index.html">
                            <img src="{{asset('/frontend/images/logo.png')}}" alt="logo-picture" />
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-2">
                    <div class="search-nav">
                        <div class="search-input">
                            <input type="text" name="search" placeholder="Search ...." class="form-control" />
                        </div>
                        <button class="btn-theme">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="account-nav">
                        <p class="mb-0 d-none d-lg-block">
                            <a href="login.html">Login</a>
                        </p>
                        <p class="mb-0 text-white d-none d-lg-block">/</p>
                        <p class="mb-0 d-none d-lg-block">
                            <a href="register.html">Signup</a>
                        </p>
                        <p class="mb-0 text-white d-lg-none d-block">
                            <i class="fas fa-bars show-sidebar-btn"></i>
                        </p>
                        <p class="mb-0 text-white d-md-none d-block">
                            <a href=""><i class="fas fa-search"></i></a>
                        </p>
                        <p class="mb-0 text-white d-lg-none d-block">
                            <a href="login.html"><i class="fas fa-user"></i></a>
                        </p>
                        <p class="mb-0 text-white">
                            <a href=""><i class="fas fa-shopping-cart"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="search-nav-two">
                        <div class="search-input">
                            <input type="text" name="search" placeholder="Search ...." class="form-control" />
                        </div>
                        <button class="btn-theme">
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

                <li class="ml-xl-5 ml-lg-5 text-center dropdown show">
                    <a class="dropdown-toggle" href="product.html" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Smart Phone
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($brands->where('category_id',1) as $brand)
                        <a class="dropdown-item" href="/brands/{{$brand->id}}">{{$brand->name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="ml-xl-5 ml-lg-5 text-center dropdown show">
                    <a class="dropdown-toggle" href="product.html" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Tablet
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($brands->where('category_id',2) as $brand)
                        <a class="dropdown-item" href="/brands/{{$brand->id}}">{{$brand->name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="ml-xl-5 ml-lg-5 text-center">
                    <a href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</section>