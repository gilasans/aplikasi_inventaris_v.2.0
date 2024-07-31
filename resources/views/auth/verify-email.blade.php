{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
data-assets-path="{{ asset('admin') }}/assets/" data-template="vertical-menu-template-free">

<head>
<meta charset="utf-8" />
<meta name="viewport"content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

<title>Verify email</title>

<meta name="description" content="" />

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/fonts/boxicons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/css/core.css"
    class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/css/theme-default.css"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/css/pages/page-auth.css" />
<!-- Helpers -->
<script src="{{ asset('admin') }}/assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('admin') }}/assets/js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="#" class="app-brand-link gap-2">
                            <img src="{{asset('admin')}}/assets/img/avatars/petik.png"  alt="" style="width: 8rem">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">veriy email 🔒</h4>
                    <p class="mb-4">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t 
                        receive the email, we will gladly send you another.</p>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form class="mb-3" method="POST"
                    action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary d-grid w-100">Resend Verification Email</button>
                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <div class="text-center">
                        <a href="{{ route('logout') }}" class="d-flex align-items-center justify-content-center" 
                        onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Log out
                        </a>
                    </div>
                </form>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin') }}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('admin') }}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('admin') }}/assets/vendor/js/bootstrap.js"></script>
<script src="{{ asset('admin') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('admin') }}/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{ asset('admin') }}/assets/js/main.js"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
