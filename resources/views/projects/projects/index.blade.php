@extends("layouts.app")

@section("title", "Proýektler")

@section("subheader")
    @include('components.layout.sub', [
        'page' => 'Proýektler',
        'breadcrumb' => [
            [false, "Projects"],
            [false, "Proýektler"],
        ],
        'total' => count($projects)
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
                            Proýektler
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
                                <th>Proýekt</th>
                                <th>Görnüşi</th>
                                <th>Layoutlar</th>
                                <th>Font</th>
                                <th>Icon</th>
                                <th>Reňkler</th>
                                <th>Aktiwmi?</th>
                                <th>Goşulan wagty</th>
                                <th>Goşmaça</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {!! $item->group_label !!}
                                    </td>
                                    <td>
                                        {{ $item->project_type->title }}
                                    </td>
                                    <td>
                                        @foreach($item->layouts as $layout)
                                            <span>
                                                <div class="font-weight-bolder font-size-lg mb-0">{{$layout->title}}</div>
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$item->font->title ?? "-"}}
                                    </td>
                                    <td>
                                        {{$item->icon->title ?? "-"}}
                                    </td>
                                    <td>
                                        {{$item->color->title ?? "-"}}
                                    </td>
                                    <td>
                                        {!! $item->active_label !!}
                                    </td>
                                    <td>{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                    <td>
                                        @include('components.datatable.update', ['url' => route('fonts.update', $item->id), "body" => implode(" ", [

                                        ])])
                                        @include('components.datatable.delete', ['url' => route('fonts.destroy', $item->id)])
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
                {data: 'group', name: 'group', searchable: false, orderable: false},
                {data: 'type', name: 'type', searchable: false, orderable: false},
                {data: 'layout', name: 'layout', searchable: false, orderable: false},
                {data: 'font', name: 'font', searchable: false, orderable: false},
                {data: 'icon', name: 'icon', searchable: false, orderable: false},
                {data: 'color', name: 'color', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at', searchable: false, orderable: false},
                {data: 'actions', name: 'actions', searchable: false, orderable: false},
            ]
        });
    </script>
@endsection
