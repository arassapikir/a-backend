<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    @include("components.layout.header")
    <title>Giriş | {{config()->get('project')->name}}</title>
    {!! \App\Helpers\Assets::version('css/login.min.css', 'css') !!}
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
                    <form class="form">
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Parol ýene ýatdan çykdy? <br/> Mesele däl!</h3>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label for="phone" class="font-size-h6 font-weight-bolder text-dark">Telefon belgiňiz</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="number" required id="phone" name="phone" placeholder="65123456" min="61000000" max="65000000" autofocus />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group d-none">
                            <label for="otp" class="font-size-h6 font-weight-bolder text-dark">Telefon belgiňize gelen kod</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" id="otp" placeholder="123456" type="number" name="otp" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5" >
                            <button id="sendBtn" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">SMS ugrat</button>
                        </div>
                        <div class="pb-lg-0 pb-5 d-none" >
                            <button id="submitBtn" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Parol çalyş</button>
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
<script>
    const subdomain = "{{config()->get('project')->subdomain}}";
    $("form").submit(function (event){
        event.preventDefault();
    });

    $("#sendBtn").click(function (){
        let phone = $("#phone").val();
        phone = parseInt(phone == null || phone === "" ? 0 : phone);
        if (!phone || phone < 61000000 || phone > 65999999){
            toastr.error("Dogry telefon belgisini ýazmagyňyzy haýyş edýaris.");
            return 0;
        }
        sendPostMethodRequest(
            "{{route('forgot.send')}}",
            { phone: phone, subdomain: subdomain },
            function (response){
                alert("success");
                console.log(response.body);
            }
        );
    });
</script>

<script>

</script>
</body>
<!--end::Body-->
</html>
