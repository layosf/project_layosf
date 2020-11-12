@extends('layoutapp.mainmenu')
@section('title','Purchase Order')

<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Purchase Order</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('po.list') }}">List</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-xl-12">
                        <div class="example-wrap">
                            <div class="nav-tabs-horizontal" data-plugin="tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li><a class="nav-link {{ request()->is('po') ? 'active' : null }}" href="{{ url('po') }}" >General</a></li>

                                    <li><a class="nav-link {{ request()->is('po/orderdetail') ? 'active' : null }}" href="{{ url('po/orderdetail') }}" >Order Detail</a></li>

                                    <li><a class="nav-link {{ request()->is('po/requirement') ? 'active' : null }}" href="{{ url('po/requirement') }}" >Order Requirement</a></li>

                                    <li><a class="nav-link {{ request()->is('po/top') ? 'active' : null }}" href="{{ url('po/top') }}" > Top</a></li>

                                    <li><a class="nav-link {{ request()->is('po/core') ? 'active' : null }}" href="{{ url('po/core') }}" > Core</a></li>

                                    <li><a class="nav-link {{ request()->is('po/bottom') ? 'active' : null }}" href="{{ url('po/bottom') }}" > Bottom</a></li>
                                </ul>
                                <div class="tab-content pt-20">

                                    <div class="tab-pane active" id="core" role="tabpanel">
                                        <form action="{{ url('po/core/update', ['cores'=>$cores->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumbers_id" name="ordernumbers_id" required onchange="getinfos()">
                                                            <option value=""> </option>
                                                            @foreach($pos as $poo)
                                                                <option value="{{ $poo->id }}" {{ $poo->id == $cores->po_id ?'selected':'' }}> {{ $poo->order_number }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                   
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Date</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" class="form-control form-control-sm" id="orderdateinfos" name="orderdateinfos" disabled value="{{ implode(',', $cores->po()->get()->pluck('order_date')->toArray()) }} ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyerinfos" name="buyerinfos" disabled>
                                                            <option value="">  </option>
                                                            @foreach($buyers as $buyer)
                                                                <option value="{{ $buyer->id }}" {{ $buyer->id == implode(',', $cores->po()->get()->pluck('buyer_id')->toArray()) ? 'selected': '' }}> {{ $buyer->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="row row-lg">
                                                <div class="col-lg-6 m-d">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Material Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="material_name" name="material_name" required value="{{ $cores->material_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Structure</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="structure" name="structure" required value="{{ $cores->structure }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Structure Legend</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="structure_legend" name="structure_legend" required value="{{ $cores->structure_legend }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="delivery_size" name="delivery_size" required value="{{ $cores->delivery_size }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Settlement Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="settlement_size" name="settlement_size" value="{{ $cores->settlement_size }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Feeding Quantity/Piece</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="feeding_quantity" name="feeding_quantity" required value="{{ $cores->feeding_quantity }}">
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Application Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="date" class="form-control form-control-sm" id="application_date" name="application_date" required value="{{ $cores->application_date }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" value="{{ $cores->delivery_date }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Remark</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="remark" name="remark" value="{{ $cores->remark }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                    
                                                <div class="col-lg-12">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="btn btn-primary btn-sm"  type="submit">Save</button>
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
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>
</body>

<script>

    function get_info(){
        var po_id = document.getElementById('ordernumber_id').value;

        if(po_id){
            console.log(po_id);
            $.ajax({
                    url: '/po/get_info/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('select[name="buyer_info"]').empty();
                        
                        $.each(data, function(key, value){
                            $('select[name="buyer_info"]').append('<option value="'+key+'">'+value+'</option>');
                            $('select[name="buyerinfo"]').append('<option value="'+key+'">'+value+'</option>');
                        })
                        
                    }
            })

            $.ajax({
                url: '/po/get_infodate/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('#orderdate_info').val(data[0]);
                        $('#orderdateinfo').val(data[0]);
                    }
            })
        }
    }

    function getinfo(){
        var po_id = document.getElementById('ordernum_id').value;

        if(po_id){
            $.ajax({
                    url: '/po/get_info/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('select[name="buyerinfo"]').empty();
                        
                        $.each(data, function(key, value){
                            $('select[name="buyerinfo"]').append('<option value="'+key+'">'+value+'</option>');
                        })
                        
                    }
            })

            $.ajax({
                url: '/po/get_infodate/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('#orderdateinfo').val(data[0]);
                    }
            })
        }
    }

    function getinfoo(){
        var po_id = document.getElementById('ordernumb_id').value;

        if(po_id){
            $.ajax({
                    url: '/po/get_info/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('select[name="buyerinfoo"]').empty();
                        
                        $.each(data, function(key, value){
                            $('select[name="buyerinfoo"]').append('<option value="'+key+'">'+value+'</option>');
                        })
                        
                    }
            })

            $.ajax({
                url: '/po/get_infodate/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('#orderdateinfoo').val(data[0]);
                    }
            })
        }
    }

    function detailorders(){
        var poid = document.getElementById('ordernumber_id').value;
        console.log('PO id '+poid);
    }
</script>