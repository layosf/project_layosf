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
                                    <li><a class="nav-link active" data-toggle="tab" href="#general" aria-controls="general" role="tab">General</a></li>

                                    <li><a class="nav-link {{ request()->is('po/orderdetail') ? 'active' : null }}" href="{{ url('po/orderdetail') }}" >Order Detail</a></li>

                                    <li><a class="nav-link {{ request()->is('po/requirement') ? 'active' : null }}" href="{{ url('po/requirement') }}" >Order Requirement</a></li>

                                    <li><a class="nav-link {{ request()->is('po/top') ? 'active' : null }}" href="{{ url('po/top') }}" > Top</a></li>
                                    <li><a class="nav-link {{ request()->is('po/core') ? 'active' : null }}" href="{{ url('po/core') }}" > Core</a></li>

                                    <li><a class="nav-link {{ request()->is('po/bottom') ? 'active' : null }}" href="{{ url('po/bottom') }}" > Bottom</a></li>
                                </ul>
                                <div class="tab-content pt-20">
                                    <div class="tab-pane active" id="general" role="tabpanel">
                                        <form action="{{ url('po/update', ['po' => $po->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" id="order_number" name="order_number" disabled placeholder="Auto Generate" value="{{ $po->order_number }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Date</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="date" class="form-control form-control-sm" id="order_date" name="order_date" required value="{{ $po->order_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyer_id" name="buyer_id" required>
                                                            @foreach($buyers as $buyer)
                                                                <option value="{{ $buyer->id }}" {{$buyer->id == $po->buyer_id ?'selected':''}}> {{ $buyer->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-12 text-center">
                                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                                        <button class="btn btn-white btn-sm" type="reset">Cancel</button>
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
