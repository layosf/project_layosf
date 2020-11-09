@extends('layoutapp.mainmenu')
@section('title','Item Product')
<?php 
    $lang = 'language';
    $form_itemproduct = 'Form Item Product';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $listitemproduct = 'List Item Product';
    $dashboard = 'Home';
    $codeitemproduct = 'Code';
    $Species = 'Species';
    $Category = 'Category';
    $Grade = 'Grade';
    $invDimension = 'Invoice Dimension';
    $phisDimension = 'Physical Dimension';
    $action = 'Action';
    $save = 'Save';
    $cancel = 'Cancel';

    // $lang = App\Language::pluck('language')[0];
    // $form_itemproduct = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Item Product', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $listitemproduct = Stichoza\GoogleTranslate\GoogleTranslate::trans('List Item Product', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $codeitemproduct = Stichoza\GoogleTranslate\GoogleTranslate::trans('Code', $lang);
    // $descitemproduct = Stichoza\GoogleTranslate\GoogleTranslate::trans('Desc', $lang);
    // $action = Stichoza\GoogleTranslate\GoogleTranslate::trans('Action', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);
?>
<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_itemproduct }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item active">{{$list}}</li>
            <!-- <li class="breadcrumb-item "><a href="{{ url('master/itemproduct') }}">{{$input}}</a></li> -->
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                {{ $listitemproduct }}
            </h3>
            </header>
            <div class="panel-body">
            
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>{{$codeitemproduct}}</th>
                        <th>{{$Species}}</th>
                        <th>{{$Category}}</th>
                        <th>{{$Grade}}</th>
                        <th>{{$invDimension}}</th>
                        <th>{{$phisDimension}}</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($listitems as $listitem)
                        <tr>
                            <td>{{ $listitem->productcode }}</td>
                            <td>{{ $listitem->namaspecies}}</td>
                            <td>{{ $listitem->namacat }}</td>
                            <td>{{ $listitem->namagrade}}</td>
                            <td>{{ $listitem->invdimensi }}</td>
                            <td>{{ $listitem->fisikdimensi }}</td>

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
                window.location = "/master/itemproduct/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>
