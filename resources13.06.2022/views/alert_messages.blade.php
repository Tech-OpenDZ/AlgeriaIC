<!-- @if ($errors->any()) -->
<!-- <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div> -->
<!-- <div class="alert alert-custom alert-notice alert-light-danger fade show mb-5" role="alert">
    @foreach ($errors->all() as $error)
        <div class="alert-text">{{ $error }}</div>
    @endforeach
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div>
@endif -->

@if( Session::has( 'success' ))
<!-- <div class="alert alert-success">
    <span class="glyphicon glyphicon-ok">{{ Session::get( 'success' ) }}</span>
</div> -->
<div class="alert alert-custom alert-notice alert-light-primary fade show mb-5" role="alert">
    <div class="alert-text">{{ Session::get( 'success' ) }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div><br />
@elseif( Session::has( 'error' ))
<!-- <div class="alert alert-danger">
    <span class="glyphicon glyphicon-ok">{{ Session::get( 'error' ) }}</span>
</div> -->
<div class="alert alert-custom alert-notice alert-light-danger fade show mb-5" role="alert">
    <div class="alert-text">{{ Session::get( 'error' ) }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div>
@endif