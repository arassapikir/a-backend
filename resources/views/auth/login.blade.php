
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    @include("components.layout.header")

    {!! \App\Helpers\Assets::version('css/login.min.css', 'css') !!}

    <title>Giriş | {{config()->get('project')->name}}</title>
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
                <a href="javascript:void(0)" class="login-logo pb-xl-20 pb-15">
                    <img src="{{asset("images/projects/" . config()->get('project')->subdomain . "/logo_dark.png")}}" class="max-h-70px" alt="" />
                </a>
                <!--end::Logo-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{route("login")}}">
                        @csrf
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Giriş</h3>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label for="phone" class="font-size-h6 font-weight-bolder text-dark">Telefon belgiňiz</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('phone') is-invalid @enderror" type="number" name="phone" id="phone" min="61000000" max="65000000" placeholder="65123456" required autofocus value="{{old("phone")}}" />
                            @error('phone')
                                <span class="form-text text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label for="password" class="font-size-h6 font-weight-bolder text-dark pt-5">Parol</label>
                                <a href="{{route('forgot.index')}}" class="text-primary font-size-h7 font-weight-bolder text-hover-primary pt-5">Ýene ýatdan çykdy?</a>
                            </div>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" type="password" placeholder="Parol" name="password" id="password" required />
                            @error('password')
                                <span class="form-text text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox-inline">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" id="remember_me">
                                    <span></span>Meni ýatda saklaý
                                </label>
                            </div>
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

@include("components.layout.scripts")

{!! \App\Helpers\Assets::version('js/login.js', 'js') !!}
</body>
<!--end::Body-->
</html>
