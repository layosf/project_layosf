@extends('layoutapp.mainmenu')
@section('title','Dimention')

<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Dimention</h1>
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
                <form action="{{ url('master/dimention/update', ['dim'=>$dim->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label text-left">Thick</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control form-control-sm" id="thick" name="thick" required value="{{ $dim->thick }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label text-left">Width</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control form-control-sm" id="width" name="width" required value="{{ $dim->width }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label text-left">Length</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control form-control-sm" id="length" name="length" required value="{{ $dim->length }}">
                            </div>
                        </div>
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