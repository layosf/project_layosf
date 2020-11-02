@extends('layoutapp.mainmenu')
@section('title','Category')
<?php 
    $lang = App\Language::pluck('language')[0];
    $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    $categoryname = Stichoza\GoogleTranslate\GoogleTranslate::trans('Category Name', $lang);
?>

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Category</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="">List</a></li>
          <li class="breadcrumb-item active">Input</li>
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
                <form action="{{ route('master.category.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">{{ $categoryname }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>