 <!-- page Navigation -->
 <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
     <div class="container">
         <a class="navbar-brand" href="{{ route('home') }}">
             <img src="{{ asset('front_end_asset/assets') }}/imgs/logo.svg" alt="">
         </a>
         <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
             data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('home') }}">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#service">Services</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#about">How To Use</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="#contact">Contact</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                 </li>

             </ul>
         </div>
     </div>
 </nav>

 <!-- End Of Page Header -->
 <!-- End Of Second Navigation -->
