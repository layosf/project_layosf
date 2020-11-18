@extends('layoutapp.mainmenu')
@section('title','Raw Material')

<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Raw Material</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('rm.index') }}">Input</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form action="{{ url('rm/update', ['rme'=>$rme->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        <div class="col-lg-6 m-d">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Arrival Date</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        <input type="date" class="form-control form-control-sm" id="arrival_date" name="arrival_date" value="{{ $rme->arrival_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Partai</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="partai" name="partai" required value="{{ $rme->partai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Species</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="species_id" name="species_id" required>
                                        @foreach($species as $spcs)
                                            <option value="{{ $spcs->id }}" {{$spcs->id == $rme->species_id ? 'selected':''}}> {{ $spcs->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h4 class="example-title">Size Invoice</h4>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Dimention (mm)</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="invoice_dimention" name="invoice_dimention" required>
                                        @foreach($dimentions as $dim)
                                        <option value="{{ $dim->id}}" {{ $dim->id == $rme->invoice_dimention_id ? 'selected':''}}>{{$dim->thick}} x {{ $dim->width}} x {{ $dim->length}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <h4 class="example-title">Size Phisic</h4>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Dimention (mm)</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="phisic_dimention" name="phisic_dimention" required>
                                        @foreach($dimentions as $dims)
                                        <option value="{{ $dims->id}}" {{ $dims->id == $rme->phisic_dimention_id ? 'selected':'' }}>{{$dims->thick}} x {{ $dims->width}} x {{ $dims->length}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Spec</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="spec" name="spec" required>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" {{$cat->id == $rme->category_id ? 'selected':''}}> {{ $cat->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Supplier</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="supplier_id" name="supplier_id" required>
                                        @foreach($suppliers as $sup)
                                            <option value="{{ $sup->id}}" {{$sup->id == $rme->supplier_id ? 'selected':''}}> {{ $sup->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Pcs</label>
                                <div class="col-md-8">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-sm" id="pcs" name="pcs" required value="{{ $rme->pcs }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Grade</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="grade_id" name="grade_id">
                                        <option value=""> </option>
                                    @foreach($grade as $grd)
                                        <option value="{{ $grd->id }}" {{ $grd->id == $rme->grade_id ? 'selected':''}}> {{ $grd->name }} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">M2</label>
                                <div class="col-md-8">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-sm" id="m2" name="m2" required value="{{ $rme->m2 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">M3</label>
                                <div class="col-md-8">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-sm" id="m3" name="m3" required value="{{ $rme->m3 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Approval to</label>
                                <div class="col-md-8">
                                    <select id="approval_to" name="approval_to" class="form-control form-control-sm">
                                        @foreach($users as $user)
                                        <option value="{{ $user->id}}" {{$user->id == $rme->approval_to ? 'selected':''}}> {{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-12 text-center">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function onlyNumberKey(evt) { 
          // Only ASCII charactar in that range allowed 
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
        }
    }
</script>