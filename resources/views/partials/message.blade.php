@if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}">
    {!! session('msg') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
        <i class="zmdi zmdi-close"></i>
        </span>
    </button>
    </div>
@endif
