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
    <link href="{{ asset('dashboard_asset/lib/Ionicons/css/ionicons.cs') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Starlight CSS -->
    
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/starlight.css') }}">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span
                    class="tx-info tx-normal">admin</span></div>
            <div class="tx-center mg-b-60">Professional Admin Template Design</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your username"  name="name" value="{{ old('name') }}" required>
                </div><!-- form-group -->

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Enter your Email" name="email" value="{{ old('email') }}" required>
                </div><!-- form-group -->

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div><!-- form-group -->

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password"  name="password_confirmation" required>
                </div><!-- form-group -->

                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
            </form>
             

            <div class="mg-t-40 tx-center">Already have an account? 
                <a href="{{ route('login') }}" class="tx-info">SignIn</a>
            </div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->


    <script src="{{ asset('dashboard_asset/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard_asset/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('dashboard_asset/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard_asset/lib/select2/js/select2.min.js') }}"></script>
    {{-- <script>
        $(function () {
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script> --}}

</body>

</html>


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}