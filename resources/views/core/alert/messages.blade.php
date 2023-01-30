@if(@$response && $response['status'] == "success")
<div class="alert alert-success">
    <span class="alert-icon"><i class="fa fa-check"></i></span>
    <strong> {!! $response['msg']; !!}</strong>
</div>
@elseif(@$response && $response['status'] == "error")
<div class="alert alert-danger">
    <span class="alert-icon"><i class="fa fa-remove"></i></span>
    {!! @$response['msg'] ? '<strong>'.$response['msg'].'</strong>' : '' !!}
    @if(is_object(@$response['errors']))
    {!! html_entity_decode(HTML::ul(@$response['errors']->all())) !!}
    @else
    <strong> {!! @$response['errors']; !!}</strong>
    @endif
</div>
@elseif(@$response && $response['status'] == "info")
<div class="alert alert-info">
    <span class="alert-icon"><i class="fa fa-info"></i></span>
    <strong> {!! $response['msg']; !!}</strong>
</div>
@elseif(@$response && $response['status'] == "warning")
<div class="alert alert-warning">
    <span class="alert-icon"><i class="fa fa-warning"></i></span>
    <strong> {!! $response['msg']; !!}</strong>
</div>
@elseif(@$response && $response['status'] == "success-short")
<div class="alert alert-success">
    {!! $response['msg']; !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(@$response && $response['status'] == "info-short")
<div class="alert alert-info">
    {!! $response['msg']; !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(@$response && $response['status'] == "warning-short")
<div class="alert alert-warning">
    {!! $response['msg']; !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(@$response && $response['status'] == "error-short")
<div class="alert alert-danger">
{!! @$response['msg'] ? $response['msg'] : '' !!}
    @if(is_object(@$response['errors']))
    {!! HTML::ul(@$response['errors']->all()) !!}
    @else
    <strong> {!! @$response['errors']; !!}</strong>
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif