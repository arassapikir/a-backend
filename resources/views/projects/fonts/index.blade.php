@extends("layouts.app")

@section("title", "Fontlar")

@section("subheader")
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">Fontlar</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Projects</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Fontlar</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">

            </div>

            <!--end::Toolbar-->
        </div>
    </div>
@endsection

@section("content")
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Fontlar
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                                </g>
                                            </svg>
                                        </span>
                                Eksport
                            </button>

                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                        Seçiň:
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:void(0)" id="printReport" class="navi-link">
                                            <span class="navi-icon"><i class="la la-print"></i></span>
                                            <span class="navi-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:void(0)" id="exportReportToExcel" class="navi-link">
                                            <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                            <span class="navi-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:void(0)" id="exportReportToPdf" class="navi-link">
                                            <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Suraty</th>
                            <th>Ady</th>
                            <th>Goşulan wagty</th>
                            <th>Goşmaça</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fonts as $item)
                            <tr>
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>
                                    {{ $item->image ? asset($item->image) : "-" }}
                                </td>
                                <td>
                                    {{ $item->title }}
                                </td>
                                <td>{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                <td>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#update-{{$item->id}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 mb-2" title="Üýtget">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <div class="modal fade" id="update-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="update-label-{{$item->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="update-label-{{$item->id}}">Üýtget</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <form action="{{route('fonts.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Yza</button>
                                                        <button type="submit" class="btn btn-primary">Üýtget</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('fonts.destroy', $item->id) }}" method="POST"
                                          class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam şu maglumaty pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 mb-2" title="Delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let dataTable = $('#kt_datatable').DataTable({
            order: [],
            columns: [
                {data: 'id', name: 'id', searchable: false, orderable: false},
                {data: 'image', name: 'image', searchable: false, orderable: false},
                {data: 'title', name: 'title', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at', searchable: false, orderable: false},
                {data: 'actions', name: 'actions', searchable: false, orderable: false},
            ]
        });
        $('#printReport').on('click', function(e) {
            e.preventDefault();
            dataTable.button(0).trigger();
        });
        $('#exportReportToExcel').on('click', function(e) {
            e.preventDefault();
            dataTable.button(1).trigger();
        });
        $('#exportReportToPdf').on('click', function(e) {
            e.preventDefault();
            dataTable.button(2).trigger();
        });
    </script>
@endsection
