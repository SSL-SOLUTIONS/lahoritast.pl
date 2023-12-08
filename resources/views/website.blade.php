<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('website/css/bootstrap.css')}}" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="{{asset('website/css/font-awesome.min.css')}}" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Custom styles for this template -->
  <link href="{{asset('website/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('website/css/responsive.css')}}" rel="stylesheet" />

  <title>Lahori Taste</title>
  <style>
    /* Style the dropdown button */
    .user_link {
      font-size: 20px;
      color: #333;
      text-decoration: none;
    }

    /* Style the dropdown menu container */
    .dropdown-menu {
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      border-radius: 8px;
      min-width: 100px;
    }


    .dropdown-item:hover {
      background-color: #f2f2f2;
    }

    /* Style the logout button */
    .dropdown-item.logout-button {
      color: #ff3333;
    }

    /* Style the user icon */
    .fa-user {
      font-size: 24px;
    }

    .header_section {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      /* Adjust the z-index as needed */
      background-color: rgba(45, 23, 26, 1);
      background-size: cover;
    }

  </style>
</head>

<body>
  <!-- header section  -->

  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="{{route('main')}}">
          <span>
            <img class="img-fluid" style="height: 40px;" src="{{asset('images/new logo lahori taste 2 (1).png')}}" alt="">
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item @if(Route::currentRouteName() == 'main') active @endif">
              <a class="nav-link" href="{{ route('main') }}">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @if(Route::currentRouteName() == 'menus') active @endif">
              <a class="nav-link" href="{{ route('menus') }}">Menu</a>
            </li>
            <li class="nav-item @if(Route::currentRouteName() == 'about') active @endif">
              <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item @if(Route::currentRouteName() == 'orders') active @endif">
              <a class="nav-link" href="{{ route('orders') }}">My Orders</a>
            </li>
          </ul>
          <div class="user_option">
            <a class="cart_link" href="{{route('cart')}}">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg>

              @php
              $request = request();
              $cart = (array)$request->session()->get('cart', []);
              @endphp
              <span style="color: white;">({{ isset($cart) ? count($cart) : 0 }})</span>
            </a>
            @auth
            @php
            $fullName = Auth::user()->name;
            $firstName = strtok($fullName, ' ');
            @endphp
            @if (Auth::user()->image)
            <a href="{{ route('profile.show', ['profile' => Auth::id()]) }}" class="user_link">
              <img class="profile_image" src="{{ asset('/img/users/' . Auth::user()->image)}}">
              {{ $firstName }}
            </a>
            @else
            <a href="{{ route('profile.show', ['profile' => Auth::id()]) }}" class="user_link">
              <i class="fa fa-user" aria-hidden="true"></i> {{ $firstName }}
            </a>
            @endif
            <div class="dropdown-menu" aria-labelledby="userIcon">
              <a class="dropdown-item" href="{{ route('profile.show', ['profile' => Auth::id()]) }}">Profile</a>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </div>
            @else
            <a href="{{ route('login') }}" class="user_link">
              <i class="fa fa-user" aria-hidden="true"></i> Login
            </a>
            @endauth
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="container-fluid p-0">
  <div class="hero_area">
    
    <div class="bg-box">
    
      <div id="heroCarousel" class="carousel slide" data-ride="carousel">
      
        <div class="carousel-inner">
        
          @foreach ($categories as $key => $category)
          <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
          <div class="img-box media-img">
  <img class="img-fluid" src="{{ asset('img/categories/' . $category->image) }}" alt="">
</div>
          </div>
          @endforeach
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            @foreach ($categories as $key => $category)
            <li data-target="#heroCarousel" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<div> <!-- plz dont remove it -->
  <!-- @include('slider')
 <!-- plz dont remove it -->
 </div>

 
<!-- or slider -->



  <!-- end food section -->
  
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                 Land Mark Plaza, Jail Road, Lahore
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +923035660875
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                 info@thelahoritaste.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Lahori Taste
            </a>
            <p>
              Online Home Delivery At Your Doorstep
              (Your Event,Your Place,Our Exceptional Food,Any Occasion Any Location...)
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          Lahori Taste.PK

        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="{{asset('website/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="{{asset('website/js/bootstrap.js')}}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="{{asset('website/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

  </script>

  <script>
    document.getElementById('addToCartButton').addEventListener('click', function(event) {
      event.preventDefault();
      const quantity = parseInt(document.getElementById('inputQuantity').value);
      if (quantity > 0) {
        document.getElementById('addToCartForm').submit();
      } else {
        alert('Please enter a valid quantity.');
      }
    });
  </script>


  <script>
    $(document).ready(function() {
      // Show the scroll-to-top circle when user scrolls down
      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('#scroll-to-top').fadeIn();
        } else {
          $('#scroll-to-top').fadeOut();
        }
      });

      // Scroll to the top when the circle is clicked
      $('#scroll-to-top').click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 800);
        return false;
      });
    });
  </script>

</body>

</html>