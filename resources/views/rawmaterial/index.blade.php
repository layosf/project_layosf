@extends('layoutapp.mainmenu')
@section('title','Raw Material')

<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Raw Material</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form action="{{ route('rm.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
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
                                        <input type="date" class="form-control form-control-sm" id="arrival_date" name="arrival_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Partai</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="partai" name="partai" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Species</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="species_id" name="species_id" required>
                                        @foreach($species as $spcs)
                                            <option value="{{ $spcs->id }}"> {{ $spcs->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h4 class="example-title">Size</h4>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Size (mm)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="size" name="size" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Length (mm)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="length" name="length" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Width (mm)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="width" name="width" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Thick (mm)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="thick" name="thick" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Spec</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="spec" name="spec" required>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Supplier</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="supplier_id" name="supplier_id" required>
                                        @foreach($suppliers as $sup)
                                            <option value="{{ $sup->id}}"> {{ $sup->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Pcs</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="pcs" name="pcs" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Grade</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="grade" name="grade">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">M2</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="m2" name="m2" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">M3</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="m3" name="m3" required>
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