{!! \App\Helpers\Assets::version('js/global.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/plugins.bundle.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/prismjs.bundle.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/scripts.bundle.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/datatables.bundle.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/datatable.scripts.js', 'js') !!}
{!! \App\Helpers\Assets::version('js/scripts.js', 'js') !!}

@yield("scripts")
<script>
    @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}", "Näsazlyk ýüze çykdy");
    @endforeach
    @endif
    $('.printReport').on('click', function(e) {
        e.preventDefault();
        dataTable.button(0).trigger();
    });
    $('.exportReportToExcel').on('click', function(e) {
        e.preventDefault();
        dataTable.button(1).trigger();
    });
    $('.exportReportToPdf').on('click', function(e) {
        e.preventDefault();
        dataTable.button(2).trigger();
    });
</script>
