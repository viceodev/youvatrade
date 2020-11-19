@if(count($errors->all()) > 0)
@foreach($errors->all() as $error)
    <div class=" alert alert-danger alert-dismissible" style="position: fixed; right: 20px; bottom: 10px; z-index: 2000000;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{$error}}
    </div>
@endforeach
@endif

@if(session('error'))
    <div class=" alert alert-danger alert-dismissible show" style="position: fixed; right: 20px; bottom: 10px; z-index: 2000000;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{session('error')}}
    </div>
@endif


@if(session('success'))
    <div class=" alert alert-success alert-dismissible" style="position: fixed; right: 20px; bottom: 10px; z-index: 2000000;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{session('success')}}
    </div>
@endif

@if(session('warning'))
    <div class=" alert alert-danger alert-dismissible" style="position: fixed; right: 20px; bottom: 10px; z-index: 2000000;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{session('warning')}}
    </div>
@endif


@if(session('info'))
    <div class=" alert alert-danger alert-dismissible" style="position: fixed; right: 20px; bottom: 10px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{session('info')}}
    </div>
@endif