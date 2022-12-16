<div>
    <section class="sidebar vh-100 col-12 p-0">
        <div class="brand d-flex justify-content-between align-items-center p-3 hide-sidebar-btn"
            style="font-size: 18px">
            <span class="text-white mr-1 text-uppercase">close</span>
            <i class="fa-solid fa-xmark text-white"></i>
        </div>
        <div class="sidebar-feature">
            <div class="sidebar-header">
                <h6 style="font-size: 20px">Menu</h6>
            </div>
            <div class="sidebar-item">
                <ul>
                    <li class="d-flex align-items-center">
                        <a href="/" class="active">Home</a>
                    </li>
                    <div class="divider"></div>
                    @foreach ($categories as $category)
                    <li class="dropdown show d-flex align-items-center">
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
                    <div class="divider"></div>
                    @endforeach
                    <li class="d-flex align-items-center">
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <div class="divider  mb-4"></div>
                    @auth
                    <li class="d-flex align-items-center" style="position: fixed;bottom:0;">
                        <img width="42" class="rounded-circle"
                            src="https://ui-avatars.com/api/?name={{auth()->user()->name}}" alt="">
                        <div class="dropdown mb-0  text-black ml-2">
                            <a class=" dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}'s Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('myAccount') }}"><i
                                        class="fa-regular fa-face-smile ml-0 mr-3 "></i>User Account</a>
                                <a class="dropdown-item" href="{{ route('myOrder') }}"><i
                                        class="fa-sharp fa-solid fa-box ml-0 mr-3 "></i>My
                                    Orders</a>
                                <form action="{{ route('logout') }}" method="POST" id="submit_form">
                                    @csrf
                                    <button type="submit" class="dropdown-item logoutBtn"><i
                                            class="fa-sharp fa-solid fa-arrow-right-from-bracket ml-0 mr-3 "></i>Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </section>
</div>