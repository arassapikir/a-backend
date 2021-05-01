@extends("layouts.app")

@section("title", "Kategoriýalar")

@section("subheader")
    @include('components.layout.sub', [
        'page' => 'Kategoriýalar',
        'breadcrumb' => [
            [false, "Harytlar"],
            [route('categories.index'), "Kategoriýalar"],
            [$parent ? route('categories.index', ['category', $parent->id]) : false, $parent->title->tk ?? null]
        ],
        'total' => count($categories)
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
                            Kategoriýalar
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
                                {!! \App\Datatable\Project::header() !!}
                                <th>Podkategoriýa</th>
                                <th>Goşulan wagty</th>
                                <th>Goşmaça</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {!! \App\Datatable\Label::image($item->image) !!}
                                    </td>
                                    <td>
                                        {!! \App\Datatable\Label::multiLanguageLabel($item->title) !!}
                                    </td>
                                    {!! \App\Datatable\Project::body($item->project) !!}
                                    <td class="pl-0">
                                        @if($item->children->count() > 0)
                                            <a href="{{route('categories.index', ['category' => $item->id])}}">
                                                <span class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$item->children->count()}} sany</span>
                                                <span class="text-muted font-weight-bold d-block">
                                                    Seret <i class=" fa fa-arrow-right icon-nm"></i>
                                                </span>
                                            </a>
                                        @else
                                            <span class="text-muted font-weight-bold d-block">Ýok</span>
                                        @endif
                                    </td>
                                    <td>{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                    <td>

                                        @include('components.datatable.delete', ['url' => route('categories.destroy', $item->id)])
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
                {!! \App\Datatable\Project::js() !!}
                {data: 'subs', name: 'subs', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at', searchable: false, orderable: false},
                {data: 'actions', name: 'actions', searchable: false, orderable: false},
            ]
        });
    </script>
@endsection
