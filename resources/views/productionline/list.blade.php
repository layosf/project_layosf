@extends('layoutapp.mainmenu')
@section('title','Supplier')
<?php 
    $lang = 'language';
    $form_productionline = 'Form Production Line';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $listproductionline = 'List Production Line';
    $dashboard = 'Home';
    $nameproductionline = 'Name';
    $codeproductionline = 'Code';
    $action = 'Action';
    $save = 'Save';
    $cancel = 'Cancel';

    // $lang = App\Language::pluck('language')[0];
    // $form_productionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Production Line', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $listproductionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('List Production Line', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $nameproductionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name', $lang);
    // $codeproductionline = Stichoza\GoogleTranslate\GoogleTranslate::trans('Code', $lang);
    // $action = Stichoza\GoogleTranslate\GoogleTranslate::trans('Action', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);
?>
<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_productionline }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item active">{{$list}}</li>
            <li class="breadcrumb-item "><a href="{{ url('master/productionline') }}">{{$input}}</a></li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                {{ $listproductionline }}
            </h3>
            </header>
            <div class="panel-body">
            
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>{{$nameproductionline}}</th>
                        <th>{{$codeproductionline}}</th>
                        
                        <th>{{$action}}</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($productionline as $s)
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->code}}</td>

                        <td> 
                            <a href="{{ route('master.productionline.edit', $s->id) }}" class='float-center' title="Edit">    
                                <i class="icon wb-edit" aria-hidden="true"> </i>
                            </a>
                            
                            &nbsp
                            <a class="demo1" title="Delete" data-id="{{ $s->id }}">    
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

<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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
                window.location = "/master/productionline/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>
