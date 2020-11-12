@extends('layoutapp.mainmenu')
@section('title','Category')
<?php 

    // $lang = App\Language::pluck('language')[0];
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $categoryname = Stichoza\GoogleTranslate\GoogleTranslate::trans('Category Name', $lang);

    $dashboard = 'Home';
    $general = 'General';
    $categoryname = 'Name';
    $categorycode = 'Code';
?>

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Category</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          
          <li class="breadcrumb-item active">Update</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $general }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ url('master/category/update', ['cat'=>$cat->id ]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">{{ $categorycode }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="code" name="code" required value="{{ $cat->code }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">{{ $categoryname }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="name" name="name" required value="{{ $cat->name }}">
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
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</div>
