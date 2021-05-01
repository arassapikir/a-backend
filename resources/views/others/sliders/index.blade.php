@extends("layouts.app")

@section("title", "Slaýderler")

@section("subheader")
    @include('components.layout.sub', [
        'page' => 'Slaýderler',
        'breadcrumb' => [
            [false, "Sazlamalar"],
            [route('sliders.index'), "Slaýderler"],
        ],
        'total' => count($sliders)
    ])
@endsection

@section("content")
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Slaýderler
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            @include('components.datatable.export')
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
                                {!! \App\Datatable\Project::header() !!}
                                <th>Hereket</th>
                                <th>Goşulan wagty</th>
                                <th>Goşmaça</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {!! \App\Datatable\Label::image($item->image) !!}
                                    </td>
                                    {!! \App\Datatable\Project::body($item->project) !!}
                                    <td>
                                        -
                                    </td>
                                    <td>{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                    <td>

                                        @include('components.datatable.delete', ['url' => route('sliders.destroy', $item->id)])
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
        dataTable = $('#kt_datatable').DataTable({
            order: [],
            columns: [
                {data: 'id', name: 'id', searchable: false, orderable: false},
                {data: 'image', name: 'image', searchable: false, orderable: false},
                {!! \App\Datatable\Project::js() !!},
                {data: 'action', name: 'action', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at', searchable: false, orderable: false},
                {data: 'actions', name: 'actions', searchable: false, orderable: false},
            ]
        });
    </script>
@endsection
