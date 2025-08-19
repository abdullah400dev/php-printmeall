<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="google-site-verification" content="ldtWjAT0prkNLIm5z-8WYW_k32oHghiPwKElrjNhZWY" />
   <!-- bootstrap css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <!-- Link Swiper's CSS -->
    <link  rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="{{url('/')}}/images1/logo2.png" />

    <link rel="canonical" href="{{Request::url()}}" />

    @if(!Auth::check())
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    @endif
    <!-- google font -->

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
      @yield('styles')
      @yield('style')
   <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- font awesome -->
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60dcb9d965b7290ac638c345/1f9f3bv3t';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <!-- bootstrap script
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->
<style>

    .nav-links li a {
    font-size: 16px;
}

    .float{
    position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
    font-size:30px;
	box-shadow: 2px 2px 3px #999;
    z-index:100;
}

.fa-whatsapp{
	margin-top:15px;
}
</style>
@livewireStyles
</head>
<body>
    <div class="wrapper">
        <nav class="menubar">
            <div class="top-nav">
                <div class="content">
                    <div class="top-logo">
                        <a href="{{url('/')}}"><img src="{{ asset('images1/logo2.png')}}" alt=""></a>
                        <p>PRINTMEALL</p>
                    </div>
                    <div class="top-nav-links">
                        <ul class="links">
                            <li>
                                <a href="tel:+971 55 6997715" class="desktop-link">+971 58 2455012 <i class="fas fa-phone"></i></a>
                                 </li>
                                 @if(Auth::check() && Auth::user()->utype==='ADM')
                                 <li>
                                <a href="#" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                                <input type="checkbox" id="show-features">
                                <label for="show-features">Account <i class="fas fa-chevron-down"></i></label>
                                <ul>
                                <li><a href="{{ route('home') }}">Dashboard</a></li>
                                <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}</a></li>
                                       </ul>
                            </li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                    @elseif(Auth::check() && Auth::user()->utype==='USR')
                     <li>
                                <a href="{{url('/')}}/user-dashboards" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                                <input type="checkbox" id="show-features">
                                <label for="show-features">Account <i class="fas fa-chevron-down"></i></label>
                                <ul>
           <li><a href="{{ url('/orders') }}"> Orders <i class="fas fa-shopping-bag"></i></a></li>
            <li><a href="{{ route('wishlist') }}"> Whislist <i class="fas fa-heart"></i></a></li>
             <li><a href="{{ route('quotestatus') }}"> Quotes Status <i class="fas fa-envelope"></i></a></li>
            <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}</a></li>
                                       </ul>
                            </li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
             @elseif(Auth::check() && Auth::user()->utype==='ORG')
              <li>
                                <a href="{{url('/')}}/user-dashboards" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                                <input type="checkbox" id="show-features">
                                <label for="show-features">Account <i class="fas fa-chevron-down"></i></label>
                                <ul>
                            <li><a href="{{ url('/orders') }}"> Orders <i class="fas fa-shopping-bag"></i></a></li>
            <li><a href="{{ route('wishlist') }}"> Whislist <i class="fas fa-heart"></a></i></li>
             <li><a href="{{ route('quotestatus') }}"> Quotes Status <i class="fas fa-envelope"></i></a></li>
             <li><a href="{{ route('creditprocess') }}">Credit Process <i class="fas fa-coins"></i> </a></li>
            <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i></a></li>
                                       </ul>
                            </li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @elseif(Auth::check() && Auth::user()->utype==='DES')
                                     <li>
                                <a href="{{url('/')}}/user-dashboards" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                                <input type="checkbox" id="show-features">
                                <label for="show-features">Account <i class="fas fa-chevron-down"></i></label>
                                <ul>
            <li><a href="{{ url('/orders') }}">Orders <i class="fas fa-shopping-bag"></i> </a></li>
            <li><a href="{{ url('/venderorders') }}">Shop  Orders<i class="fas fa-shopping-bag"></i></a></li>
            <li><a href="{{ route('wishlist') }}"> Whislist<i class="fas fa-heart"></i></a></li>
            <li><a href="{{ url('/gigs') }}">  Your Gigs<i class="fas fa-shopping-bag"></i></a></li>
            <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}<i class="fas fa-sign-out-alt"></i></a></li>
                                       </ul>
                            </li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                  @elseif(Auth::check() && Auth::user()->utype==='VEN')
                                  <li>
                                <a href="{{url('/')}}/user-dashboards" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                                <input type="checkbox" id="show-features">
                                <label for="show-features">Account <i class="fas fa-chevron-down"></i></label>
                                <ul>
           <li><a href="{{ url('/orders') }}">Orders <i class="fas fa-shopping-bag"></i></a></li>
            <li><a href="{{ route('wishlist') }}">Whislist <i class="fas fa-heart"></i></a></li>
             <li><a href="{{ route('quotestatus') }}">Quotes Status <i class="fas fa-envelope"></i></a></li>
            <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i></a></li>
                                       </ul>
                            </li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                 @else
                                  <li>
                                <a href="#" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                                <input type="checkbox" id="show-features">
                                <label for="show-features">Account <i class="fas fa-chevron-down"></i></label>
                                <ul>
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('register') }}">Sign Up</a></li>
                                <li><a href="{{ route('wishlist') }}">Whishlist</a></li>
                                 </ul>
                            </li>
                                @endif
                            <li><a href="{{ url('/cart') }}">Cart <i class="fas fa-cart-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav-flex">
                <input type="checkbox" id="show-search">
                <input type="checkbox" id="show-menu">
                <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
                <div class="content">
                    <div class="logo"><a href="{{url('/')}}"><img src="{{asset('images1/logo2.png')}}" alt=""></a>
                        <p>PRINTMEALL</p>
                    </div>
                    <ul class="links">
                        <li>
                            <a href="{{url('/')}}/category/print-products" class="desktop-link">Business Material <i class="fas fa-chevron-down"></i></a>
                            <input type="checkbox" id="show-business-material">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/print-products">Business Material</a>
                                <label for="show-business-material">+</label>
                            </label>
                            <ul>
                                <li><a href="{{url('/')}}/subcategory/business-cards">Business Cards</a></li>
                                <li><a href="{{url('/')}}/subcategory/letter-heads">Letterheads</a></li>
                                <li><a href="{{url('/')}}/subcategory/flyers">Flyers</a></li>
                                <li><a href="{{url('/')}}/subcategory/file-folder">File Folders</a></li>
                                <li><a href="{{url('/')}}/subcategory/brochures">Brochures</a></li>
                                <li><a href="{{url('/')}}/subcategory/invoice-pads">Invoices (NCR)</a></li>
                                <li><a href="{{url('/')}}/subcategory/envelopes">Envelopes</a></li>
                                <li><a href="{{url('/')}}/subcategory/notebooks">Notepads</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/')}}/category/packaging" class="desktop-link">Packaging <i class="fas fa-chevron-down"></i></a>
                            <input type="checkbox" id="show-packaging">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/packaging">Packaging</a>
                                <label for="show-packaging">+</label>
                            </label>
                            <ul>
                                <li><a href="{{url('/')}}/subcategory/custom-boxes">Custom Boxes</a></li>
                                <li><a href="{{url('/')}}/subcategory/ecommerce-packaging">Ecommerce Packaging</a></li>
                                <li><a href="{{url('/')}}/subcategory/corrugated-boxes">Corrugated Boxes</a></li>
                                <li><a href="{{url('/')}}/subcategory/white-label-packaging">White Label Packaging </a></li>
                                <li>
                                    <a href="{{url('/')}}/category/food-packaging" class="desktop-link"> Food Packaging <i
                                            class="fas fa-chevron-right"></i></a>
                                    <input type="checkbox" id="show-food-packaging">
                                    <label class="phone-label">
                                        <a href="{{url('/')}}/category/food-packaging">Food Packaging</a>
                                        <label for="show-food-packaging">+</label>
                                    </label>
                                    <ul>
                                        <li><a href="{{url('/')}}/subcategory/pizza-box">Pizza Box</a></li>
                                        <li><a href="{{url('/')}}/subcategory/burger-box">Burger Box</a></li>
                                        <li><a href="{{url('/')}}/subcategory/sticker-labels">Stickers & Labels</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/')}}/category/16" class="desktop-link">Bottles & Jars </a>
                            <input type="checkbox" id="show-packaging">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/bottles-jars">Bottles & Jars</a>
                            </label>
                        </li>
                        <li>
                            <a href="{{url('/')}}/category/labels-and-stickers" class="desktop-link">Labels and Stickers </a>
                            <input type="checkbox" id="show-packaging">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/labels-and-stickers">Labels and Stickers</a>
                            </label>
                        </li>
                          <li>
                            <a href="{{url('/')}}/category/18" class="desktop-link">Invitations  <i class="fas fa-chevron-down"></i></a>
                            <input type="checkbox" id="show-promotional-items">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/invitations">Invitations</a>
                                <label for="show-promotional-items">+</label>
                            </label>
                            <ul>
                                <li><a href="{{url('/')}}/subcategory/birthday-invites">Birthday Invites</a></li>
                                <li><a href="{{url('/')}}/subcategory/wedding-invites">Wedding Invites</a></li>
                                <li><a href="{{url('/')}}/subcategory/baby-shower-invites">Baby Shower Invites</a></li>
                                <li><a href="{{url('/')}}/subcategory/bridal-shower">Bridal Shower</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/')}}/category/gift-items" class="desktop-link">Promotional Items <i class="fas fa-chevron-down"></i></a>
                            <input type="checkbox" id="show-promotional-items">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/gift-items">Promotional Items</a>
                                <label for="show-promotional-items">+</label>
                            </label>
                            <ul>
                                <li><a href="{{url('/')}}/subcategory/gift-sets">Gift Sets</a></li>
                                <li><a href="{{url('/')}}/subcategory/shirts">shirts</a></li>
                                <li><a href="{{url('/')}}/subcategory/mugs">Mugs</a></li>
                                <li><a href="{{url('/')}}/subcategory/bottles">Bottles</a></li>
                                <li><a href="{{url('/')}}/subcategory/wallets">Wallets</a></li>
                                <li><a href="{{url('/')}}/subcategory/tech-usb-accessories">Tech (USB, Accessories.)</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/')}}/category/large-prints" class="desktop-link">Large Prints <i class="fas fa-chevron-down"></i></a>
                            <input type="checkbox" id="show-large-prints">
                            <label class="phone-label">
                                <a href="{{url('/')}}/category/large-prints">Large Prints</a>
                                <label for="show-large-prints">+</label>
                            </label>
                            <ul>
                                <li><a href="{{url('/')}}/subcategory/vehicle-branding">Vehicle Branding</a></li>
                                <li><a href="{{url('/')}}/subcategory/kiosk-branding">Kiosk Branding</a></li>
                                <li><a href="{{url('/')}}/subcategory/roll-ups">Roll Ups</a></li>
                                <li><a href="{{url('/')}}/subcategory/banners">Banners</a></li>
                                <li><a href="{{url('/')}}/subcategory/in-store-branding">In store Branding</a></li>
                            </ul>
                        </li>
                        <div class="account-separator"></div>
                        <li class="account">
                            <a href="#" class="desktop-link">Account <i class="fas fa-chevron-down"></i></a>
                            <input type="checkbox" id="show-account">
                            <label for="show-account" class="phone-label">
                                <label for="show-account">Account</label>
                                <label for="show-account">+</label>
                            </label>
                            <ul>
                                @if(Auth::check() && Auth::user()->utype==='ADM')
                                <li><a href="{{ route('home') }}">Dashboard</a></li>
                                <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}</a></li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                    @elseif(Auth::check() && Auth::user()->utype==='USR')
           <li><a href="{{ url('/orders') }}"><i class="fas fa-shopping-bag"></i> Orders</a></li>
            <li><a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i> Whislist</a></li>
            <li> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>      {{ __('Logout') }}</a></li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                 @else
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('register') }}">Sign Up</a></li>
                                <li><a href="{{ route('wishlist') }}">Whishlist</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="search-section">
                <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
                <form action="#" class="search-box">
                    <input type="text" placeholder="Type Something to Search..." required>
                    <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
                </form>
            </div>

        </nav>
        <div class="nav-underline"></div>
    </div>

  @yield('content')

<a href="https://api.whatsapp.com/send?phone=971582455012" class="float" target="_blank">
<i class="fab fa-whatsapp my-float1"></i>
</a>
    <footer id="footer">
        <div class="inner-footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col footer-links">
                        <h3>QUICK LINKS</h3>
                        <hr>
                          <a href="{{ url('/') }}">Home</a>
                          <a href="https://printmeall.com/">Our Blog</a>
                          <a href="{{ url('/about-us') }}">About Us</a>
                          <a href="{{ url('/cate') }}">All Products</a>
                         <a href="{{ url('/contact-us') }}">Get in touch</a>
                    </div>
                    <div class="footer-col footer-links">
                        <h3>CATEGORIES</h3>
                        <hr>
                        <a href="{{url('category/4')}}">Business Material</a>
                        <a href="{{url('category/5')}}">Packaging</a>
                        <a href="{{url('category/9')}}">Promotional Items</a>
                        <a href="{{url('category/12')}}">Large Prints</a>
                    </div>
                    <div class="footer-col footer-links">
                        <h3>PRODUCTS</h3>
                        <hr>
                        <div class="row">
                            <div class="links-">
                         <a href="{{url('products/flyer-premium-a4')}}">Flyer Premium A4</a>
                        <a href="{{url('products/flyer-standard-a4')}}">Flyer Standard A4</a>
                        <a href="{{url('products/express-business-card')}}">Express Business Card</a>
                        <a href="{{url('products/glossy-shiny-business-card')}}">Glossy Shiny Business Card</a>
                            </div>
                        </div>


                    </div>

                    <div class="footer-col footer-contact">
                        <h3>CONTACT US</h3>
                        <hr>
                        <p class="web-name">PRINTMEALL</p>
                        <div class="container-fluid footer-about">
                            <div class="row">
                                <div class="footer-icon-col">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="footer-detail-col">
                                    <p>1509, Burlington Towers, Business Bay, Dubai</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="footer-icon-col">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="footer-detail-col">
                                    <p>+971 55 6997715</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="footer-icon-col">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="footer-detail-col">
                                    <p>info@printmeall.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="icons">
                            <a class="icon" href="https://www.facebook.com/printmeall/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="icon" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="icon" href="https://www.instagram.com/printmeall/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a class="icon" href="https://www.linkedin.com/company/printmeall-com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="credits">
                <p>Copyright <strong>© Printmeall</strong> 2022 , All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- end footer -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1N9ELNL41B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1N9ELNL41B');
</script>
  <!-- swiper js -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"  crossorigin="anonymous"></script>
  <script src="{{asset('js/header.js')}}"></script>
@yield('script')
  @yield('scripts')
</body>

</html>
