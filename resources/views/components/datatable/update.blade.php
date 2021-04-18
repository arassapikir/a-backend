<?php
    $uniqId = uniqid();
?>
<a href="javascript:void(0)" data-toggle="modal" data-target="#update-{{$uniqId}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 mb-2" title="Üýtget">
    <i class="la la-edit"></i>
</a>
<div class="modal fade" id="update-{{$uniqId}}" tabindex="-1" role="dialog" aria-labelledby="update-label-{{$uniqId}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-label-{{$uniqId}}">Üýtget</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group row">
                        {!! $body !!}
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
