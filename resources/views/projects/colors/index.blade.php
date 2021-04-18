@extends("layouts.app")

@section("title", "Reňkler")

@section("subheader")
    @include('components.layout.sub', [
        'page' => 'Reňkler',
        'breadcrumb' => [
            [false, "Projects"],
            [false, "Reňkler"],
        ],
        'total' => count($colors)
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
                            Reňkler
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
                                <th>Ady</th>
                                <th>Reňkler</th>
                                <th>Goşulan wagty</th>
                                <th>Goşmaça</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colors as $item)
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
                                    <td>
                                        <span class="label label-xl mr-2" style="color:#fff; background-color: {{$item->color_1}}; border: 1px solid black;"></span>
                                        <span class="label label-xl mr-2" style="color:#fff; background-color: {{$item->color_2}}; border: 1px solid black;"></span>
                                        <span class="label label-xl mr-2" style="color:#fff; background-color: {{$item->color_3}}; border: 1px solid black;"></span>
                                        <span class="label label-xl mr-2" style="color:#fff; background-color: {{$item->color_4}}; border: 1px solid black;"></span>
                                    </td>
                                    <td>{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                    <td>
                                        @include('components.datatable.update', ['url' => route('fonts.update', $item->id), "body" => implode(" ", [
                                            \App\Helpers\Form::input("Suraty", "image", "accept='image/*'", "", "col-md-12", "file"),
                                            \App\Helpers\Form::input("Ady", "title", "required", $item->title),
                                            \App\Helpers\Form::input("1. Reňk", "color_1", "required", $item->color_1, "col-md-6", "color"),
                                            \App\Helpers\Form::input("2. Reňk", "color_2", "required", $item->color_2, "col-md-6", "color"),
                                            \App\Helpers\Form::input("3. Reňk", "color_3", "required", $item->color_3, "col-md-6", "color"),
                                            \App\Helpers\Form::input("4. Reňk", "color_4", "required", $item->color_4, "col-md-6", "color"),
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
                {data: 'image', name: 'image', searchable: false, orderable: false},
                {data: 'title', name: 'title', searchable: false, orderable: false},
                {data: 'colors', name: 'colors', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at', searchable: false, orderable: false},
                {data: 'actions', name: 'actions', searchable: false, orderable: false},
            ]
        });
    </script>
@endsection
