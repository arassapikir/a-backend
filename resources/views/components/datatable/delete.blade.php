<form action="{{ $url }}" method="POST"
      class="d-inline-block">
    @csrf
    @method('DELETE')
    <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam şu maglumaty pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 mb-2" title="Delete">
        <i class="la la-trash"></i>
    </a>
</form>
