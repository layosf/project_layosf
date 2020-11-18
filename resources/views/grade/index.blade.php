@extends('layoutapp.mainmenu')
@section('title','Grade')

<?php 
    // $lang = App\Language::pluck('language')[0];
    // $form_grade = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Grade', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $namegrade = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name', $lang);
    // $action = Stichoza\GoogleTranslate\GoogleTranslate::trans('Action', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);

    // $lang = App\Language::pluck('language')[0];
    $form_grade = 'Form Grade';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $dashboard = 'Home';
    $namegrade = 'Name';
    $action = 'Action';
    $save = 'Save';
    $cancel = 'Cancel';
?>

<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_grade }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/grade/list') }}"> {{ $list }} </a></li>
            <li class="breadcrumb-item active">{{ $input }}</li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $general }}</h3>
            </div>

            <div class="panel-body">
               
                <form id="act" action="{{ route('master.grade.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        
                        <div class="col-lg-12">
                            <div class="example-wrap m-md-0">
                                <div class="example">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{ $namegrade }}</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name" name="name" required>
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
        <div class="panel">
            <div class="panel-body">
                <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" id="listgrade">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>{{ $namegrade }}</th>
                            <th>{{ $action }}</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($grades as $g)
                        <tr class="data-row">
                            <td class="align-middle id" style="display:none"> {{ $g->id }}</td>
                            <td class="align-middle names">{{ $g->name }}</td>
                            <td> 
                                <a href="{{ route('master.grade.edit', $g->id) }}" class='float-center' title="Edit">    
                                    <i class="icon wb-edit" aria-hidden="true"> </i>
                                </a>

                                
                                &nbsp
                                <a class="demo1" title="Delete" data-id="{{ $g['id'] }}">    
                                    <i class="icon wb-trash" aria-hidden="true"> </i>
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

    
    $('.demo1').on('click', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                
                window.location = "/master/grade/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>