@extends('layoutapp.mainmenu')
@section('title','Productionline')

<?php 
    $lang = 'language';
    $form_productionline = 'Form Production Line';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $update = 'Update';
    $dashboard = 'Home';
    $nameproductionline = 'Name';
    $codeproductionline = 'Code';
    $save = 'Save';
    $cancel = 'Cancel';

    // $lang = App\Language::pluck('language')[0];
    // $form_productionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Production Line', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $update = Stichoza\GoogleTranslate\GoogleTranslate::trans('Update', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $nameproductionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name', $lang);
    // $codeproductionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('Code', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);
?>

<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_productionline }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/productionline/list') }}"> {{ $list }} </a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/productionline') }}"> {{ $input }} </a></li>
            <li class="breadcrumb-item active">{{ $update }}</li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $general }}</h3>
            </div>

            <div class="panel-body">
               
                <form action="{{ url('master/productionline/update', ['productionlines'=>$productionlines->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        
                        <div class="col-lg-12">
                            <div class="example-wrap m-md-0">
                                <div class="example">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{ $nameproductionline }}</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name" name="name" required value="{{ $productionlines->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{ $codeproductionline}}</label>
                                            <div class="col-md-9">
                                            <input type="text" class="form-control" id="codeprodline" name="codeprodline" value="{{ $productionlines->code }}">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-primary btn-sm" type="submit">{{$save}}</button>
                                    <button class="btn btn-white btn-sm" type="reset">{{$cancel}}</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>