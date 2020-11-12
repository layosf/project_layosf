@if($message = Session::get('warning'))
<div class="alert dark alert-icon alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
<i class="icon wb-alert" aria-hidden="true"></i> {{ $message }}
</div>
@endif

@if($message = Session::get('info'))
<div class="alert dark alert-icon alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
<i class="icon wb-info" aria-hidden="true"></i> {{ $message }}
</div>
@endif

@if($message = Session::get('success'))
<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="icon wb-check" aria-hidden="true"></i> {{ $message }}
</div>
@endif

@if($message = Session::get('error'))
<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="icon wb-close" aria-hidden="true"></i> {{ $message }}
</div>
@endif