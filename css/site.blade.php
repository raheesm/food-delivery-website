<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery</title>
    <link rel="stylesheet" href="{{ asset('site/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/main.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        .search-txt-custom {
            width: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container container--px">
            <nav class="header__menu">
                <a href="{{ url('home') }}" class="logo"><img src="{{ asset('site/images/logo.png') }}" alt="almas-logo" width="100"></a>
                <a href="{{ url('order') }}" id="top-orderbtn">Order Now</a>
                <a href="{{ url('cart') }}" class="cart-count">
                    <div class="count">@if(session()->has('cart')){{ count(session()->get('cart')) }}@else {{ "0" }}@endif</div>
                    <div class="cart-hover">
                        <div class="cart-hover__div">
                            <div class="cart-hover__head">
                                <!-- <button class="btn btn-outline">X</button> -->
                                <div>
                                    <h2>Your Delicious Selection</h2>

                                </div>
                            </div>
                            <div class="cart-hover__body">
                                @php
                                    $total = 0;
                                @endphp
                                @if(session()->has('cart'))
                                @foreach(session()->get('cart') as $cart)
                                    @php
                                        $total = $total + $cart['qty']*$cart['rate'];
                                    @endphp
                                    <div class="cart__item">
                                        <div class="cart__item__body">
                                            <div class="img__div">
                                                <img src="{{ asset('assets/images/product/' . $cart['image']) }}" alt="cart-item">
                                            </div>
                                            <div class="content__div">
                                                <div class="ordered-items">
                                                    <h3 class="dish__name">{{ $cart['name'] }}</h3>
                                                </div>
                                                <div class="quantity-price">
                                                    <p>{{ $cart['qty'] ?? '' }} x {{ $cart['rate'] }}</p>
                                                </div>
                                                {{-- <div class="cart__item-action">
                                                    <div class="crud-actions">
                                                        <div class="reduce-quantiy">
                                                            <button>-</button>
                                                        </div>
                                                        <div class="add-item">
                                                            <button>+</button>
                                                        </div>
                                                        <div class="delete-item">
                                                            <button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-trash"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                    <path
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="cart-hover__bottom">
                                <div class="btn btn-lite br-0" type="submit" style="width:80%;margin:0 auto">Sub Total :
                                    {{ $total }}</div><br>
                                <div class="btn btn-primary br-0" style="width:80%;margin:0 auto">View Cart</div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ url('search') }}" class="search" id="search-bar">
                    <input class="search-txt" type="text" placeholder="Search..." disabled />
                    <button class="submit"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </a>
                <div id="menu-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <ul class="menu-list">
                    <button id="menuCloseBtn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('support') }}">Support</a></li>
                    <li><a href="{{ url('order') }}">Menu</a></li>
                    <li><a href="{{ url('offer') }}">Offers</a></li>
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container container--pall">
            <div class="footer">
                <a href="#" class="footer__logo"><img src="{{ asset('site/images/logo.png') }}" alt="logo"></a>
                <hr>
                <div class="footer__grid">

                    <div class="footer__card">
                        <h3>Menu</h3>
                        <ul>
                            <li><a href="{{ url('about') }}">About Us</a></li>
                            <li><a href="{{ url('order') }}">Menu</a></li>
                            <li><a href="{{ url('order') }}">Branches</a></li>
                            <li><a href="{{ url('offer') }}">Offers</a></li>
                            <li><a href="{{ url('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer__card">
                        <h3>Branches</h3>
                        <ul>
                            @php
                            $branches = \App\Models\Branch::get();
                            $setting = \App\Models\Setting::first();
                            @endphp
                            @foreach($branches as $branch)
                                <li><a href="{{ url('menu/'.$branch->id) }}">{{ $branch->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer__card">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="{{ url('support') }}">How to Order</a></li>
                            <li><a href="{{ url('support') }}">Where We Deliver</a></li>
                            <li><a href="{{ url('support#faq') }}">FAQs</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer__card">
                        <h3>Follow Us</h3>
                        <ul class="footer__social">
                            @if($setting->fb!="")
                            <li><a href="{{ $setting->fb }}"><svg id="Layer_1" width="24" height="24" data-name="Layer 1"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.52 22.52">
                                        <path
                                            d="M12,2A10,10,0,1,1,2,12,10,10,0,0,1,12,2ZM12,.74A11.26,11.26,0,1,0,23.26,12,11.26,11.26,0,0,0,12,.74ZM10,10H8v2h2v6h3V12h1.82L15,10H13V9.17c0-.48.1-.67.56-.67H15V6H12.6C10.8,6,10,6.79,10,8.31Z"
                                            transform="translate(-0.74 -0.74)" />
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if($setting->insta!="")
                            <li><a href="{{ $setting->insta }}"><svg id="Layer_1" width="24" height="24" data-name="Layer 1"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.52 22.52">
                                        <path
                                            d="M12,2A10,10,0,1,1,2,12,10,10,0,0,1,12,2ZM12,.74A11.26,11.26,0,1,0,23.26,12,11.26,11.26,0,0,0,12,.74Zm0,6.34c1.6,0,1.79,0,2.43,0a2.26,2.26,0,0,1,2.46,2.46c0,.63,0,.82,0,2.42s0,1.79,0,2.42a2.26,2.26,0,0,1-2.46,2.46c-.64,0-.83,0-2.43,0s-1.79,0-2.42,0a2.25,2.25,0,0,1-2.46-2.46c0-.63,0-.82,0-2.42s0-1.79,0-2.42A2.25,2.25,0,0,1,9.58,7.12C10.21,7.09,10.4,7.08,12,7.08Zm0-.86c-1.57,0-1.77,0-2.38,0A3.18,3.18,0,0,0,6.26,9.62c0,.61,0,.81,0,2.38s0,1.77,0,2.38a3.18,3.18,0,0,0,3.36,3.36c.61,0,.81,0,2.38,0s1.77,0,2.38,0a3.18,3.18,0,0,0,3.36-3.36c0-.61,0-.81,0-2.38s0-1.77,0-2.38a3.18,3.18,0,0,0-3.36-3.36C13.77,6.23,13.57,6.22,12,6.22Zm0,2.86A2.92,2.92,0,1,0,14.92,12,2.92,2.92,0,0,0,12,9.08ZM12,14a2,2,0,1,1,2-2A2,2,0,0,1,12,14Zm3.2-5.76a.56.56,0,1,0,.56.56A.56.56,0,0,0,15.2,8.24Z"
                                            transform="translate(-0.74 -0.74)" />
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if($setting->twitter!="")
                            <li><a href="{{ $setting->twitter }}"><svg id="Layer_1" width="24" height="24" data-name="Layer 1"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.73 22.73">
                                        <path
                                            d="M12,2A10,10,0,1,1,2,12,10,10,0,0,1,12,2ZM12,.64A11.36,11.36,0,1,0,23.36,12,11.35,11.35,0,0,0,12,.64ZM18.1,9a4.86,4.86,0,0,1-1.32.36,2.29,2.29,0,0,0,1-1.27,5,5,0,0,1-1.46.56,2.29,2.29,0,0,0-3.91,2.09,6.54,6.54,0,0,1-4.74-2.4,2.31,2.31,0,0,0,.71,3.07,2.31,2.31,0,0,1-1-.29A2.31,2.31,0,0,0,9.2,13.43a2.27,2.27,0,0,1-1,0,2.28,2.28,0,0,0,2.14,1.59,4.62,4.62,0,0,1-3.4,1,6.54,6.54,0,0,0,10-5.8A4.81,4.81,0,0,0,18.1,9Z"
                                            transform="translate(-0.64 -0.64)" />
                                    </svg>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="footer__copyright">
                    <p>&copy; 2023 Restaurant</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('site/js/header.js') }}"></script>
    <script src="{{ asset('site/js/star.js') }}"></script>
    <script src="{{ asset('site/js/swiper.min.js') }}"></script>
    <script>
        var swiper = new Swiper(".heroSwiper", {
            loop: true,
            fadeEffect: {
                crossFade: true
            },
            autoplay: 2500,
            autoplayDisableOnInteraction: true,
            slidersPerView: 1,
            effect: "fade",
            autoplay: {
                delay: 3000,
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".testimonialSwiper", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".gallerySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: true
            },
            breakpoints: {
                340: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".add_to_cart").click(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('data-id');
                var qty = $('input[name="quantity"]').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('check_branch') }}",
                    data: {_token: CSRF_TOKEN, id:id},
                    success: function( msg ) {
                        if(msg==1){
                            add_to_cart(id,qty);
                        }else{
                            Swal.fire({
                                title: 'Items already in cart',
                                text: "Your cart contains items from other restaurant. Would you like to reset your cart for adding items from this restaurant?",
                                icon: 'warning',
                                background : '#fff',
                                color: '#000',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, Start Afresh!',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    add_to_cart(id,qty);
                                }
                            })
                        }
                    },
                });
            });
        });
        function add_to_cart(id,qty){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ url('add_to_cart') }}",
                data: {_token: CSRF_TOKEN, id:id, qty:qty},
                success: function( msg ) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Good job!',
                        text: 'Item Added Cart Successfully',
                        background : '#fff',
                        color: '#000',
                        willClose: () => {
                            location.reload();
                        }
                    })
                },
            });
        }
        function plus_qty(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ url('plus_qty') }}",
                data: {_token: CSRF_TOKEN, id:id},
                success: function( msg ) {
                    // alert('sussecc')
                },
            });
            location.reload();
        }
        function minus_qty(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ url('minus_qty') }}",
                data: {_token: CSRF_TOKEN, id:id},
                success: function( msg ) {
                    // alert('sussecc')
                },
            });
            location.reload();
        }
        function delete_cart(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete?",
                icon: 'warning',
                background : '#fff',
                color: '#000',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete!',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('delete_cart') }}",
                        data: {_token: CSRF_TOKEN, id:id},
                        success: function( msg ) {
                            // alert('sussecc')
                        },
                    });
                    location.reload();
                }
            })
        }
    </script>
</body>
</html>

