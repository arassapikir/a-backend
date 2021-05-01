<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

        <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold my-1 mr-5">{{$page}}</h5>
            <!--end::Page Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                @foreach($breadcrumb as $item)
                    @if($item[1])
                        <li class="breadcrumb-item text-muted">
                            <a href="{{$item[0] ?: "javascript:void(0)"}}" class="text-muted">{{$item[1]}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <!--end::Breadcrumb-->
            @if(isset($total))
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-5 mr-5 bg-gray-200"></div>
                <!--end::Separator-->

                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Jemi: <span id="totalRow">{{$total}}</span></span>
                </div>
            @endif

        </div>

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center flex-wrap">

        </div>

        <!--end::Toolbar-->
    </div>
</div>
