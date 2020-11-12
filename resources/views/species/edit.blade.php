@extends('layoutapp.mainmenu')
@section('title','Species')

<?php 
<<<<<<< HEAD
    $lang = App\Language::pluck('language')[0];
    $form_species = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Species', $lang);
    $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    $update = Stichoza\GoogleTranslate\GoogleTranslate::trans('Update', $lang);
    $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    $namespecies = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name Species', $lang);
    $acode = Stichoza\GoogleTranslate\GoogleTranslate::trans('Auto Code', $lang);
   
    $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);
=======
    // $lang = App\Language::pluck('language')[0];
    // $form_species = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Species', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $namespecies = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name Species', $lang);
    // $acode = Stichoza\GoogleTranslate\GoogleTranslate::trans('Auto Code', $lang);
   
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);

    $lang = 'language';
    $form_species = 'Form Species';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $dashboard = 'Home';
    $namespecies = 'Name Species';
    $acode = 'Auto Code';
   
    $save = 'Save';
    $cancel = 'Cancel';
>>>>>>> 9b093b8a53b49b0594bb62dc323cf9e5042d23d2
?>

<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_species }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/species/list') }}"> {{ $list }} </a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/species') }}"> {{ $input }} </a></li>
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
               
                <form action="{{ url('master/species/update', ['speciess'=>$speciess->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        
                        <div class="col-lg-12">
                            <div class="example-wrap m-md-0">
                                <div class="example">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{ $namespecies }}</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name" name="name" required value="{{ $speciess->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{ $acode}}</label>
                                            <div class="col-md-9">
                                            <input type="text" class="form-control" id="autocode" name="autocode" value="{{ $speciess->autocode }}">
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