@extends('layouts.app2')


@section('styles')
           <title>Register - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
  <!-- css file -->
    <link rel="stylesheet" href="css/signup.css">
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
            <p>Create your account</p>
        </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                       <div class="full-name field">
                             <label for="name">Full Name</label>
                                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                     <div class="email field">
                         <label for="email">Email</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="repassword field">
                              <label for="account_type">Account Type</label>
                              <select name="account_type" style="width: 72%; padding: 9px;
                               border-radius: 2px;
                               transition: 0.2s all linear;
                               border: none;
                               background: #ebebeb;" class="@error('password') is-invalid @enderror" required>
                                  <option value="USR"> Individual (Customer)</option>
                                  <option value="ORG"> Organization (Customer)</option>
                                  <option value="VEN"> Vendor</option>
                                  <option value="DES"> Designer</option>
                              </select>
                             @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                   <div class="password field">
                             <label for="password">Password</label>

                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="********" required autocomplete="new-password">
                                 <i class="fas fa-eye" id="togglePassword"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
             <div class="repassword field">
                   <label for="re-password">Retype Password</label>
                                <input id="password-confirm" type="password"  name="password_confirmation" placeholder="********" required autocomplete="new-password">
                               <i class="fas fa-eye" id="togglePasswordONe"></i>
                            </div>
            <div class="form-sign-btn">
                                <button type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="form-divider"></div>
            <div class="account-link">
                <a href="https://printmeall.com/login">Already have an account?</a>
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
        const formone = document.querySelector("form");
        formone.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
    <script>
        const togglePasswordone = document.querySelector("#togglePasswordONe");
        const passwordtwo = document.querySelector("#password-confirm");

        togglePasswordone.addEventListener("click", function () {
            // toggle the type attribute
            const typeone = passwordtwo.getAttribute("type") === "password" ? "text" : "password";
            passwordtwo.setAttribute("type", typeone);

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
