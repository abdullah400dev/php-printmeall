@extends('layouts.app2')


@section('styles')
           <title>LogIn - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
  <!-- css file -->
    <link rel="stylesheet" href="css/signup.css?v=1.1">
    <style>
    .form-btn button {
    background-color: hsl(15, 79%, 70%) !important;
    }
    form i {
    margin-left: -30px;
    cursor: pointer;
}
    </style>
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
     <div class="form">
        <div class="form-top">
            <p>Log in to your accout</p>
        </div>
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
 {{Session::get('error')}}
</div>
        @endif
             <form method="POST" action="{{ route('login') }}">
                        @csrf
              <div class="email field">
                <label for="email">Email</label>
                    <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                <div class="password field">
                <label for="password">Password</label>
                      <input id="password" type="password" placeholder="********" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                 <i class="fas fa-eye" id="togglePassword"></i>
                <div class="forgot-password"><a href="{{url('password/reset')}}">Forgot Password?</a></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 </div>
            <div class="form-sign-btn">
                <!--<div class="custom-control custom-control-alternative custom-checkbox"> 
                   <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                  </label>
                </div>-->
                 <button type="submit">
                                    {{ __('Login') }}
                                </button></div>
            <div class="auth-login">
                <p>Log in with</p>
               <a href="{{route('login.facebook')}}" ><img src="{{asset('images/facbook.png')}}" alt=""></a> 
               <a href="{{route('login.google')}}"><img src="{{asset('images/google.png')}}" alt=""></a>
                <a href="{{route('login.github')}}"><img src="{{asset('images/github.png')}}" alt=""></a>
            </div>
             <div class="login-link">
                <a href="{{url('/')}}/register" id="submitbtn">Don't have an account?</a>
            </div>
              </form>
             </div>
 <br><br>           
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
@endsection
