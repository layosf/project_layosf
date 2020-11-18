@extends('layoutapp.mainmenu')
@section('title','Supplier')
<?php 

    // $lang = App\Language::pluck('language')[0];
    // $form_species = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Species', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $listspecies = Stichoza\GoogleTranslate\GoogleTranslate::trans('List Species', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $namespecies = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name Species', $lang);
    // $acode = Stichoza\GoogleTranslate\GoogleTranslate::trans('Auto Code', $lang);
    // $action = Stichoza\GoogleTranslate\GoogleTranslate::trans('Action', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);

    $lang = 'language';
    $form_species = 'Form Species';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $listspecies = 'List Species';
    $dashboard = 'Home';
    $namespecies = 'Name Species';
    $acode = 'Auto Code';
    $action = 'Action';
    $save = 'Save';
    $cancel = 'Cancel';
?>
<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_species }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item active">{{$list}}</li>
            <li class="breadcrumb-item "><a href="{{ url('master/species') }}">{{$input}}</a></li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                {{ $listspecies }}
            </h3>
            </header>
            <div class="panel-body">
            
            <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>{{$namespecies}}</th>
                        <th>{{$acode}}</th>
                        
                        <th>{{$action}}</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($species as $s)
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->autocode}}</td>

                        <td> 
                            <a href="{{ route('master.species.edit', $s->id) }}" class='float-center' title="Edit">    
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
                window.location = "/master/species/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>
