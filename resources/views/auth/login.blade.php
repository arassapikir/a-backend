
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>Giriş | {{config()->get('project')->name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    {!! \App\Helpers\Assets::version('css/login.min.css', 'css') !!}

    {!! \App\Helpers\Assets::version('css/plugins.bundle.css', 'css') !!}
    {!! \App\Helpers\Assets::version('css/prismjs.bundle.css', 'css') !!}
    {!! \App\Helpers\Assets::version('css/style.bundle.min.css', 'css') !!}

    {!! \App\Helpers\Assets::version('css/base.min.css', 'css') !!}
    {!! \App\Helpers\Assets::version('css/menu.min.css', 'css') !!}
    {!! \App\Helpers\Assets::version('css/brand.min.css', 'css') !!}
    {!! \App\Helpers\Assets::version('css/aside.min.css', 'css') !!}

    <link rel="shortcut icon" href="{{asset("images/projects/" . config()->get('project')->subdomain . "/favicon.png")}}" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Content-->
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Wrapper-->
            <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                <!--begin::Logo-->
                <a href="#" class="login-logo pb-xl-20 pb-15">
                    <img src="{{asset("images/projects/" . config()->get('project')->subdomain . "/logo_dark.png")}}" class="max-h-70px" alt="" />
                </a>
                <!--end::Logo-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="form" id="kt_login_singin_form" action="">
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Giriş</h3>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Telefon belgiňiz</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="number" name="phone" min="61000000" max="65000000" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Parol</label>
                                <a href="custom/pages/login/login-4/forgot.html" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Ýene ýatdan çykdy?</a>
                            </div>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Dawaý</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--begin::Content-->
        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url({{asset('images/login/1.svg')}});">
                <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-dark-75">
                    {{ strtoupper(config()->get('project')->name) }},
                    <br />
                    Hoş geldiňiz!
                </h3>
            </div>
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

{!! \App\Helpers\Assets::version('js/global.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/plugins.bundle.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/prismjs.bundle.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/scripts.bundle.min.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/login.min.js', 'js') !!}
</body>
<!--end::Body-->
</html>





{{--@if (session('status'))--}}
{{--    <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--        {{ session('status') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}

{{--    <div>--}}
{{--        <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--    </div>--}}

{{--    <div class="mt-4">--}}
{{--        <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--    </div>--}}

{{--    <div class="block mt-4">--}}
{{--        <label for="remember_me" class="flex items-center">--}}
{{--            <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--        </label>--}}
{{--    </div>--}}

{{--    <div class="flex items-center justify-end mt-4">--}}
{{--        @if (Route::has('password.request'))--}}
{{--            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                {{ __('Forgot your password?') }}--}}
{{--            </a>--}}
{{--        @endif--}}

{{--        <x-jet-button class="ml-4">--}}
{{--            {{ __('Log in') }}--}}
{{--        </x-jet-button>--}}
{{--    </div>--}}
{{--</form>--}}
