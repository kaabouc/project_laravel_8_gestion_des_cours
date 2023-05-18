<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/livre.png') }}"/>
    <title>BMK</title>

    <!-- Scripts -->
    <script src="../../js/bootstrap.min.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}"rel="stylesheet">
     <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
    <div id="app">
    <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="#">
            <span>
          bibliotheque
            </span>
          </a>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/page/about"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/page/service"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactLink">Contact Us</a>
                </li>
              
              </ul>
              <form  action="{{ route('search') }}">
                     <table>  <tr><td> <div class="form-outline">
                       <input type="search" id="form1" class="form-control" name="term" placeholder="Search" />
                              </div></td>
                              <td> <button type="submit" class="btn btn-primary">Search</button></td></tr>
                           </table>
             </form>
                     
            </div>
            <div class="quote_btn-container ">
            <div class="input-group">
                       
            <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ">
                                <a   href="{{ route('user',Auth::user()->id)}}"  role="button"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                             <li class="nav-item">

                                <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> -->
                                    <div>
                                    <a class="dropdown-item" class="nav-link dropdown-toggle"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail_box">
                    <h1>
                      The best librery
                    </h1>
                    <p>
                      It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Contact Us
                      </a>
                      <a href="" class="btn-2">
                        Get A Quote
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ url('images/slider-img.png')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail_box">
                    <h1>
                    The best librery
                    </h1>
                    <p>
                      It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Contact Us
                      </a>
                      <a href="" class="btn-2">
                        Get A Quote
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail_box">
                    <h1>
                    The best librery
                    </h1>
                    <p>
                      It is a long established fact that a reader will be distracted by the readable content of a page
                      when looking
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Contact Us
                      </a>
                      <a href="" class="btn-2">
                        Get A Quote
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
     </section>
    <!-- end slider section -->
  </div>


        <main class="py-4">
            @yield('content')
        </main>
         

  


  <!-- service section -->
  
    </div>
    <div class="footer_bg">

<!-- contact section -->
<section class="contact_section layout_padding" id="contactLink">
  <div class="container">
    <div class="heading_container">
      <h2>
        Get In touch
      </h2>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 mx-auto">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputName4" placeholder="Name ">
            </div>
            <div class="form-group col-md-6">
              <input type="email" class="form-control" id="inputEmail4" placeholder="Email id">
            </div>

          </div>
          <div class="form-row">
            <div class="form-group col">
              <input type="text" class="form-control" id="inputSubject4" placeholder="Subject">
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="inputMessage" placeholder="Message">
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- end contact section -->



<!-- info section -->
<section class="info_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="info_logo">
          <h3>
            Seotech
          </h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor indidunt ut labore et
            dolore magna
          </p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_links">
          <h4>
            BASIC LINKS
          </h4>
          <ul class="  ">
            <li class=" active">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="{{ url('/page/about')}}"> About</a>
            </li>
            <li class="">
              <a class="" href="{{ asset('/page/service')}}"> Services </a>
            </li>
            <li class="">
              <a class="" href="#contactLink">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_contact">
          <h4>
            CONTACT DETAILS
          </h4>
          <a href="">
            <div class="img-box">
              <img src="{{ url('images/telephone-white.png')}}" width="12px" alt="">
            </div>
            <p>
            0600468073
            </p>
          </a>
          <a href="">
            <div class="img-box">
              <img src="{{ url('images/envelope-white.png')}}" width="18px" alt="">
            </div>
            <p>
              medka_biblitheque@gmail.com
            </p>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_form ">
          <h4>
            NEWSLETTER
          </h4>
          
          <div class="social_box">
            <a href="">
              <img src="{{ asset('images/info-fb.png')}}" alt="">
              
          facebook   </a>
            <a href="">
              <img src="{{ url('images/info-twitter.png')}}" alt="">
            twitter</a>
            <a href="">
              <img src="{{url('images/info-linkedin.png')}}" alt="">
           linkedin </a>
            <a href="">
              <img src="{{url('images/info-youtube.png')}}" alt="">
           youtube </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end info_section -->




</div>
<script type="text/javascript"  src="{{ url('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript"  src="{{ url('js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{ url('js/custom.js')}}"></script>
</body>
<script src="../../js/jquery.min.js" ></script>
</html>
