<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->

    <link href="{{ asset('dashboard_asset/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/starlight.css') }}">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Webshop
                {{-- <span class="tx-info tx-normal">admin</span> --}}
            </div>
            <div class="tx-center mg-b-60"></div>


            <x-jet-validation-errors class="mb-2 text-danger" />


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your username"  name="email" value="{{ old('email') }}"
                    required>
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>

            {{-- <div class="mg-t-60 tx-center">Not yet a member? 
                <a href="{{ route('register') }}" class="tx-info">Sign Up</a>
            </div> --}}
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->


    <script src=" {{ asset('dashboard_asset/lib/jquery/jquery.js') }}"></script>
    <script src=" {{ asset('dashboard_asset/lib/popper.js/popper.js') }}"></script>
    <script src=" {{ asset('dashboard_asset/lib/bootstrap/bootstrap.js') }}"></script>

</body>

</html>
















{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}