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
          <li class="breadcrumb-item"><a href="{{ route('master.category') }}">List</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
</div>