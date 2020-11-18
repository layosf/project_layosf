@extends('layoutapp.mainmenu')
@section('title','Purchase Order')

<?php 
    // $lang = App\Language::pluck('language')[0];
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $list_po = Stichoza\GoogleTranslate\GoogleTranslate::trans('PO List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $ordernumberr = Stichoza\GoogleTranslate\GoogleTranslate::trans('Order Number', $lang);
    // $orderdatee = Stichoza\GoogleTranslate\GoogleTranslate::trans('Order Date', $lang);
    // $buyerr = Stichoza\GoogleTranslate\GoogleTranslate::trans('Buyer', $lang);
    // $action = Stichoza\GoogleTranslate\GoogleTranslate::trans('Action', $lang);
    
    $dashboard = 'Home';
    $list = 'List';
    $list_po = 'PO List';
    $input = 'Input';
    $ordernumberr = 'Order Number';
    $orderdatee = 'Order Date';
    $buyerr = 'Buyer';
    $action = 'Action';
?>

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Purchase Order</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $list }}</li>
            <li class="breadcrumb-item"><a href="{{ route('po.index') }}">{{ $input }}</a></li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">
                    {{ $list_po }}
                </h3>
            </header>
        
            <div class="panel-body">
                <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>{{$ordernumberr}}</th>
                            <th>{{$orderdatee}}</th>
                            <th>{{$buyerr}}</th>
                            
                            <th>{{$action}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listpo as $po)
                        <tr>
                            <td> {{ $po->order_number }} </td>
                            <td> {{ $po->order_date }} </td>
                            <td> {{ implode(',', $po->buyer()->get()->pluck('name')->toArray()) }} </td>
                            <td> 
                                <a href="{{ route('po.general.edit', $po->id) }}" class='float-center' title="Edit">    
                                    <i class="icon wb-edit" aria-hidden="true"> </i>
                                </a>
                                
                                &nbsp
                                <a class="demo1" title="Delete" data-id="{{ $po->id }}">    
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
                window.location = "/po/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>