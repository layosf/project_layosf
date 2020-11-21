@extends('layoutapp.mainmenu')
@section('title','Purchase Order')
<style>
    label{
        font-size: 10px;
    }
</style>
<?php 
    // $lang = App\Language::pluck('language')[0];
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $ordernumberr = Stichoza\GoogleTranslate\GoogleTranslate::trans('Order Number', $lang);
    // $orderdatee = Stichoza\GoogleTranslate\GoogleTranslate::trans('Order Date', $lang);
    // $buyerr = Stichoza\GoogleTranslate\GoogleTranslate::trans('Buyer', $lang);
    
?>
<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Purchase Order</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('po.list') }}">List</a></li>
          <li class="breadcrumb-item active">Input</li>
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

                                    <!-- <li><a class="nav-link {{ request()->is('po/requirement') ? 'active' : null }}" href="{{ url('po/requirement') }}" >Order Requirement</a></li> -->

                                    <li><a class="nav-link {{ request()->is('po/top') ? 'active' : null }}" href="{{ url('po/top') }}" > Top</a></li>

                                    <li><a class="nav-link {{ request()->is('po/core') ? 'active' : null }}" href="{{ url('po/core') }}" > Core</a></li>

                                    <li><a class="nav-link {{ request()->is('po/bottom') ? 'active' : null }}" href="{{ url('po/bottom') }}" > Bottom</a></li>
                                </ul>
                                <div class="tab-content pt-20">
                                    <div id="{{ url('po') }}" class="tab-pane {{ request()->is('po') ? 'active' : null }}">
                                        <form action="{{ route('po.general.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" id="order_number" name="order_number" disabled placeholder="Auto Generate">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Date</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="date" class="form-control form-control-sm" id="order_date" name="order_date" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyer_id" name="buyer_id" required>
                                                            @foreach($buyers as $buyer)
                                                                <option value="{{ $buyer->id }}"> {{ $buyer->name }} - {{ $buyer->code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-lg">
                                                <div class="col-lg-6 m-d">
                                                    <h4 class="example-title">Substrate Requirements</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Back Veneer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="back_veneer" name="back_veneer" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Core board</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="core_board" name="core_board" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Base Layer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="base_layer" name="base_layer">
                                                        </div>
                                                    </div>

                                                    <h4 class="example-title">Paint</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Paint Process</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="paint_process" name="paint_process" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Brightness</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="brightness" name="brightness" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Tenon</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tenon" name="tenon" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Chamfer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="chamfer" name="chamfer" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Back Groove</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether to keep the sample</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Finished surface thickness range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="surface_thickness" name="surface_thickness" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">MC Range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="mc_range" name="mc_range" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Total thickness tolerance range </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tolerance_thickness" name="tolerance_thickness" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Product description</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control form-control-sm" id="product_description" name="product_description"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer specifies the paint</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer follows the order</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <div class="col-lg-12 text-center">
                                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                                    <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>

                                    <div id="{{ url('po/orderdetail') }}" class="tab-pane {{ request()->is('po/orderdetail') ? 'active' : null }}">
                                        <form id="store_podetail" action="{{ route('po.orderdetail.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf   
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumber_id" name="ordernumber_id" required onchange="get_info()">
                                                            <option value=""> </option>
                                                            @foreach($pos as $poo)
                                                                <option value="{{ $poo->id }}"> {{ $poo->order_number }} </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="orderdate_info" name="orderdate_info" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyer_info" name="buyer_info" disabled>
                                                            <option value="">  </option>
                                                        </select>
                                                    </div>
                                                    <!-- <button type="button" id="add_detailorder" onclick="detailorders()" class="btn btn-icon btn-info btn-outline btn-round"><i class="icon wb-plus" title="Add Detail Order" aria-hidden="true"></i></button> -->
                                                </div>

                                                <br>
                                            </div>
                                            <h4 class="example-title">Order Detail</h4>
                                            <div class="row row-lg">
                                                
                                                <div class="col-lg-6 m-d">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Species</label>
                                                        <div class="col-md-8">
                                                            
                                                            <select class="form-control form-control-sm" id="species_id" name="species_id" required >
                                                                @foreach($species as $spcs)
                                                                    <option value="{{ $spcs->id }}"> {{ $spcs->name }} </option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Tenon</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tenon" name="tenon" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Surface Effect</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="surface_effect" name="surface_effect">
                                                        </div>
                                                    </div>
                                                    <h4 class="example-title">Size</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Thick</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="thick" name="thick" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Width</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="width" name="width" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Length</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="length" name="length" required>
                                                        </div>
                                                    </div>

                                                    <h4 class="example-title">Qty</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Pcs Order</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="pcs_order" name="pcs_order" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left"> Box</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="box_qty" name="box_qty" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left"> Pallet </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="pallet_qty" name="pallet_qty" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Colour</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="colour" name="colour" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Qty M2</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="qty_m2" name="qty_m2" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Veneer Grade</label>
                                                        <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control form-control-sm" id="veneer_grade" name="veneer_grade" > -->
                                                            <select class="form-control" id="veneer_grade" name="veneer_grade">
                                                                <option value=""> </option>
                                                                @foreach($grades as $gr)
                                                                    <option value ="{{ $gr->id }}"> {{ $gr->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Veneer Process</label>
                                                        <div class="col-md-8">
                                                            <select name="veneer_process" id="veneer_process" class="form-control">
                                                                <option value="Sliced"> Sliced</option>
                                                                <option value="Rotary Cut"> Rotary Cut</option>
                                                                <option value="Ripsaw"> Ripsaw</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Veneer Color</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="veneer_color" name="veneer_color" >
                                                        </div>
                                                    </div>
                                                    <h4 class="example-title">Packing</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Package</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="package" name="package" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Pallet</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="pallet" name="pallet" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Bracket Type</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="bracket_type" name="bracket_type" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="btn btn-primary btn-sm" id="save_podetail" type="submit">Save</button>
                                                            <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    
                                    <!-- <div id="{{ url('po/requirement') }}" class="tab-pane {{ request()->is('po/requirement') ? 'active' : null }}">
                                        <form action="{{ route('po.requirement.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumberid" name="ordernumberid" required>
                                                            <option value=""> </option>
                                                            @foreach($pos as $s)
                                                                <option value="{{ $s->id }}"> {{ $s->order_number }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-lg">
                                                <div class="col-lg-6 m-d">
                                                    <h4 class="example-title">Substrate Requirements</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Back Veneer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="back_veneer" name="back_veneer" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Core board</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="core_board" name="core_board" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Base Layer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="base_layer" name="base_layer">
                                                        </div>
                                                    </div>

                                                    <h4 class="example-title">Paint</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Paint Process</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="paint_process" name="paint_process" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Brightness</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="brightness" name="brightness" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Tenon</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tenon" name="tenon" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Chamfer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="chamfer" name="chamfer" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Back Groove</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether to keep the sample</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Finished surface thickness range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="surface_thickness" name="surface_thickness" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">MC Range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="mc_range" name="mc_range" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Total thickness tolerance range </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tolerance_thickness" name="tolerance_thickness" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Product description details</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control form-control-sm" id="product_description" name="product_description"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer specifies the paint</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer follows the order</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="Yes" checked/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="No"  />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                    
                                                <div class="col-lg-12">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="btn btn-primary btn-sm" id="save_podetail" type="submit">Save</button>
                                                            <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->

                                    <div id="{{ url('po/top') }}" class="tab-pane {{ request()->is('po/top') ? 'active' : null }}">
                                        <form action="{{ route('po.top.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernum_id" name="ordernum_id" required onchange="getinfo()">
                                                            <option value=""> </option>
                                                            @foreach($pos as $poo)
                                                                <option value="{{ $poo->id }}"> {{ $poo->order_number }} </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="orderdateinfo" name="orderdateinfo" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyerinfo" name="buyerinfo" disabled>
                                                            <option value="">  </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="material_name" name="material_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="delivery_size" name="delivery_size" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Settlement Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="settlement_size" name="settlement_size">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Feeding Quantity/Piece</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="feeding_quantity" name="feeding_quantity" required>
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
                                                                <input type="date" class="form-control form-control-sm" id="application_date" name="application_date" required>
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
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Remark</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="remark" name="remark" >
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

                                    <div id="{{ url('po/core') }}" class="tab-pane {{ request()->is('po/core') ? 'active' : null}} ">
                                        <form action="{{ route('po.core.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumbers_id" name="ordernumbers_id" required onchange="getinfos()">
                                                            <option value=""> </option>
                                                            @foreach($pos as $poo)
                                                                <option value="{{ $poo->id }}"> {{ $poo->order_number }} </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="orderdateinfos" name="orderdateinfos" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyerinfos" name="buyerinfos" disabled>
                                                            <option value="">  </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="material_name" name="material_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Structure</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="structure" name="structure" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Structure Legend</label>
                                                        <div class="col-md-8">
                                                            <!-- <input type="file" accept="image/*" id="structure_legend" name="structure_legend" required> -->
                                                            <input type="text" class="form-control form-control-sm" id="structure_legend" name="structure_legend" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="delivery_size" name="delivery_size" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Settlement Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="settlement_size" name="settlement_size">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Feeding Quantity/Piece</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="feeding_quantity" name="feeding_quantity" required>
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
                                                                <input type="date" class="form-control form-control-sm" id="application_date" name="application_date" required>
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
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Remark</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="remark" name="remark" >
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

                                    <div id="{{ url('po/bottom') }}" class="tab-pane {{ request()->is('po/bottom') ? 'active' : null}} ">
                                        <form action="{{ route('po.bottom.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumb_id" name="ordernumb_id" required onchange="getinfoo()">
                                                            <option value=""> </option>
                                                            @foreach($pos as $poo)
                                                                <option value="{{ $poo->id }}"> {{ $poo->order_number }} </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="orderdateinfoo" name="orderdateinfoo" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyerinfoo" name="buyerinfoo" disabled>
                                                            <option value="">  </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="material_name" name="material_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="delivery_size" name="delivery_size" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Settlement Size/mm</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="settlement_size" name="settlement_size">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Feeding Quantity/Piece</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="allownumericwithdecimal form-control form-control-sm" id="feeding_quantity" name="feeding_quantity" required>
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
                                                                <input type="date" class="form-control form-control-sm" id="application_date" name="application_date" required>
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
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Remark</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="remark" name="remark" >
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

        @if(Route::current()->getName() == 'po.index')
            <div class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List PO General
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Buyer</th>
                                    <th>Back Veneer</th>
                                    <th>Core Board</th>
                                    <th>Base Layer</th>
                                    <th>Paint Process</th>
                                    <th>Brightness</th>
                                    <th>Delivery Date</th>
                                    <th>Tenon</th>
                                    <th>Action</th>
                                    <th>Chamfer</th>
                                    <th>Product Description</th>
                                    <th>Surface Thickness</th>
                                    <th>MC Range</th>
                                    <th>Tolerance Thickness</th>
                                    <th>Back Groove</th>
                                    <th>Customer Specific Paint</th>
                                    <th>Customer Follow Order</th>
                                    <th>Keep Sample</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listpo as $po)
                                <tr>
                                    <td> {{ $po->order_number }} </td>
                                    <td> {{ $po->order_date }} </td>
                                    <td> {{ implode(',', $po->buyer()->get()->pluck('name')->toArray()) }} </td>
                                    <td> {{ $po->back_veneer }} </td>
                                    <td> {{ $po->core_board }} </td>
                                    <td> {{ $po->base_layer }} </td>
                                    <td> {{ $po->paint_process }} </td>
                                    <td> {{ $po->brightness }} </td>
                                    <td> {{ $po->delivery_date }} </td>
                                    <td> {{ $po->tenon }} </td>
                                    <td> 
                                        <a href="{{ route('po.general.edit', $po->id) }}" class='float-center' title="Edit General">    
                                            <i class="icon wb-edit" aria-hidden="true"> </i>
                                        </a>
                                        
                                        &nbsp
                                        <a class="delete_generals" title="Delete General" data-id="{{ $po->id }}">    
                                            <i class="icon wb-trash" aria-hidden="true"> </i>
                                        </a>
                                    </td>
                                    <td> {{ $po->chamfer }} </td>
                                    <td> {{ $po->product_description }} </td>
                                    <td> {{ $po->surface_thickness }} </td>
                                    <td> {{ $po->mc_range }} </td>
                                    <td> {{ $po->tolerance_thickness }} </td>
                                    <td> {{ $po->back_groove }} </td>
                                    <td> {{ $po->customer_specific_paint }} </td>
                                    <td> {{ $po->customer_follow_order }} </td>
                                    <td> {{ $po->keep_sample }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if(Route::current()->getName() == 'po.orderdetail')
            <div class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List PO Detail
                    </h4>
                </header>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table id="tbllistdetail" style="font-size:12px" class="table table-hover dataTable table-striped" data-plugin="dataTable" width="100%" >
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Buyer</th>
                                    <th>Species</th>
                                    <th>Tenon</th>
                                    <th>Surface Effect</th>
                                    <th>Thick</th>
                                    <th>Width</th>
                                    <th>Length</th>
                                    
                                    <th>Pcs Order</th>

                                    <th>Box Qty</th>
                                    <th>Action</th>
                                    <th>Pallet Qty</th>
                                    
                                    <th>Colour</th>
                                    <th>Qty M2</th>
                                    <th>Veneer Grade</th>
                                    <th>Veneer Process</th>
                                    <th>Veneer Color</th>
                                    <th>Package</th>
                                    <th>Pallet</th>
                                    <th>Bracket Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $detail)
                                <tr>
                                    <td> {{ $detail->order_number }} </td>
                                    <td> {{ $detail->order_date }} </td>
                                    <td> {{ $detail->buyername }} </td>
                                    <td> {{ $detail->speciesname }} </td>
                                    <td> {{ $detail->tenon }} </td>
                                    <td> {{ $detail->surface_effect }} </td>
                                    <td> {{ $detail->thick }} </td>
                                    <td> {{ $detail->width }} </td>
                                    <td> {{ $detail->length }} </td>
                                    <td> {{ $detail->pcs_order }} </td>
                                    <td> {{ $detail->box_qty }} </td>
                                    <td> 
                                        <a href="{{ route('po.orderdetail.edit', $detail->id) }}" class='float-center' title="Edit Detail">    
                                            <i class="icon wb-edit" aria-hidden="true"> </i>
                                        </a>
                                        &nbsp
                                        <a onclick="deletedetail('{{ $detail->id }}')" title="Delete Detail" data-id="{{ $detail->id }}">    
                                            <i class="icon wb-trash" aria-hidden="true"> </i>
                                        </a>
                                    </td>
                                    <td> {{ $detail->pallet_qty }} </td>
                                    
                                    <td> {{ $detail->colour }} </td>
                                    <td> {{ $detail->qty_m2 }} </td>
                                    <td> {{ $detail->veneergrade }} </td>
                                    <td> {{ $detail->veneer_process }} </td>
                                    <td> {{ $detail->veneer_color }} </td>
                                    <td> {{ $detail->package }} </td>
                                    <td> {{ $detail->pallet }} </td>
                                    <td> {{ $detail->bracket_type }} </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        
        @if(Route::current()->getName() == 'po.orderrequirement')
            <div class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List PO Requirement
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table style="font-size:12px" class="table table-hover dataTable table-striped" data-plugin="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Back Veneer</th>
                                    <th>Core Board</th>
                                    <th>Base Layer</th>
                                    <th>Paint Process</th>
                                    <th>Brightness</th>
                                    <th>Delivery Date</th>
                                    <th>Tenon</th>
                                    <th>Chamfer</th>
                                    <th>Action</th>
                                    <th>Product Description</th>
                                    <th>Surface Thickness</th>
                                    <th>MC Range</th>
                                    <th>Tolerance Thickness</th>
                                    <th>Back Groove</th>
                                    <th>Customer Specific Paint</th>
                                    <th>Customer Follow Order</th>
                                    <th>Keep Sample</th>
                                    
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($reqs as $req)
                                <tr>
                                    <td> {{ implode(',', $req->po()->get()->pluck('order_number')->toArray()) }} </td>
                                    <td> {{ $req->back_veneer }} </td>
                                    <td> {{ $req->core_board }} </td>
                                    <td> {{ $req->base_layer }} </td>
                                    <td> {{ $req->paint_process }} </td>
                                    <td> {{ $req->brightness }} </td>
                                    <td> {{ $req->delivery_date }} </td>
                                    <td> {{ $req->tenon }} </td>
                                    <td> {{ $req->chamfer }} </td>
                                    <td> 
                                        <a href="{{ route('po.requirement.edit', $req->id) }}" class='float-center' title="Edit Detail">    
                                            <i class="icon wb-edit" aria-hidden="true"> </i>
                                        </a>
                                        
                                        &nbsp
                                        <a class="delete_req" title="Delete Requirement" data-id="{{ $req->id }}">    
                                            <i class="icon wb-trash" aria-hidden="true"> </i>
                                        </a>
                                    </td>
                                    <td> {{ $req->product_description }} </td>
                                    <td> {{ $req->surface_thickness }} </td>
                                    <td> {{ $req->mc_range }} </td>
                                    <td> {{ $req->tolerance_thickness }} </td>
                                    <td> {{ $req->back_groove }} </td>
                                    <td> {{ $req->customer_specific_paint }} </td>
                                    <td> {{ $req->customer_follow_order }} </td>
                                    <td> {{ $req->keep_sample }} </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        @endif

        @if(Route::current()->getName() == 'po.top')
            <div class="panel" id="listtop">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List Top
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tbllisttop" style="font-size:12px" class="table table-hover dataTable table-striped" data-plugin="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Buyer</th>
                                    <th>Material Name</th>
                                    <th>Delivery Size/mm</th>
                                    <th>Settlement Size/mm</th>
                                    <th>Feeding Quantity/Piece</th>
                                    <th>Application Date </th>
                                    <th>Delivery Date</th>
                                    <th>Action</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tops as $top)
                            <tr>
                                <td> {{ $top->order_number }} </td>
                                <td> {{ $top->order_date }} </td>
                                <td> {{ $top->buyername }} </td>

                                <td> {{ $top->material_name }} </td>
                                <td> {{ $top->delivery_size }} </td>
                                <td> {{ $top->settlement_size }} </td>
                                <td> {{ $top->feeding_quantity }} </td>
                                <td> {{ $top->application_date }} </td>
                                <td> {{ $top->delivery_date }} </td>
                                
                                <td> 
                                    <a href="{{ route('po.top.edit', $top->id) }}" class='float-center' title="Edit Top">    
                                        <i class="icon wb-edit" aria-hidden="true"> </i>
                                    </a>
                                    
                                    &nbsp
                                    <a onclick="deletetop('{{$top->id}}')" title="Delete Top" data-id="{{ $top->id }}">    
                                        <i class="icon wb-trash" aria-hidden="true"> </i>
                                    </a>
                                </td>
                                <td> {{ $top->remark }} </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if(Route::current()->getName() == 'po.bottom')
            <div class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List Bottom
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tbllistbottom" style="font-size:12px" class="table table-hover dataTable table-striped" data-plugin="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Buyer</th>
                                    <th>Material Name</th>
                                    <th>Delivery Size/mm</th>
                                    <th>Settlement Size/mm</th>
                                    <th>Feeding Quantity/Piece</th>
                                    <th>Application Date </th>
                                    <th>Delivery Date</th>
                                    <th>Action</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($bottoms as $bot)
                            <tr>
                                <td> {{ $bot->order_number }} </td>
                                <td> {{ $bot->order_date }} </td>
                                <td> {{ $bot->buyername }} </td>

                                <td> {{ $bot->material_name }} </td>
                                <td> {{ $bot->delivery_size }} </td>
                                <td> {{ $bot->settlement_size }} </td>
                                <td> {{ $bot->feeding_quantity }} </td>
                                <td> {{ $bot->application_date }} </td>
                                <td> {{ $bot->delivery_date }} </td>
                                <td> 
                                    <a href="{{ route('po.bottom.edit', $bot->id) }}" class='float-center' title="Edit Bottom">    
                                        <i class="icon wb-edit" aria-hidden="true"> </i>
                                    </a>
                                    &nbsp
                                    <a onclick="deletebottom('{{ $bot->id }}')" class="delete_bottom" title="Delete Bottom" data-id="{{ $bot->id }}">    
                                        <i class="icon wb-trash" aria-hidden="true"> </i>
                                    </a>
                                </td>
                                <td> {{ $bot->remark }} </td>
                                
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if(Route::current()->getName() == 'po.core')
            <div class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List Core
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tbllistcore" style="font-size:12px" class="table table-hover dataTable table-striped" data-plugin="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Buyer</th>
                                    <th>Structure</th>
                                    <th>Structure Legend</th>
                                    <th>Material Name</th>
                                    <th>Delivery Size/mm</th>
                                    <th>Settlement Size/mm</th>
                                    <th>Feeding Quantity/Piece</th>
                                    <th>Action</th>
                                    <th>Application Date </th>
                                    <th>Delivery Date</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($core as $cor)
                            <tr>
                                <td> {{ $cor->order_number }} </td>
                                <td> {{ $cor->order_date }} </td>
                                <td> {{ $cor->buyername }} </td>

                                <td> {{ $cor->structure }} </td>
                                <td> {{ $cor->structure_legend }} </td>

                                <td> {{ $cor->material_name }} </td>
                                <td> {{ $cor->delivery_size }} </td>
                                <td> {{ $cor->settlement_size }} </td>
                                <td> {{ $cor->feeding_quantity }} </td>
                                <td> 
                                    <a href="{{ route('po.core.edit', $cor->id) }}" class='float-center' title="Edit Core">    
                                        <i class="icon wb-edit" aria-hidden="true"> </i>
                                    </a>
                                    &nbsp
                                    <a onclick="deletecore('{{ $cor->id }}')" title="Delete Core" data-id="{{ $cor->id }}">    
                                        <i class="icon wb-trash" aria-hidden="true"> </i>
                                    </a>
                                </td>
                                
                                <td> {{ $cor->application_date }} </td>
                                <td> {{ $cor->delivery_date }} </td>
                                <td> {{ $cor->remark }} </td>
                                
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
</body> 

<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>

    function deletetop(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/po/top/delete/"+id;
                
            } else {
                swal("Your file is safe!");
            }
        });
    }

    function deletebottom(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/po/bottom/delete/"+id;
                
            } else {
                swal("Your file is safe!");
            }
        });
    }

    function deletecore(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/po/core/delete/"+id;
                
            } else {
                swal("Your file is safe!");
            }
        });
    }

    function deletedetail(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/po/orderdetail/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    }

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

            var tbldetail = $('#tbllistdetail').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "destroy": true,
                            "paging": true,
                            "pageLength": 25,
                            "responsive": true,
                            "buttons": [

                            ],
                            
                            "ajax": {
                                url: '/po/list_detail/'+po_id,
                                type: 'get',
                            },      

                            "columns":[
                                { "data": "order_number"},
                                { "data": "order_date"},
                                { "data": "buyername"},
                                { "data": "speciesname"},
                                { "data": "tenon"},
                                { "data": "surface_effect"},
                                { "data": "thick"},
                                { "data": "width"},
                                { "data": "length"},
                                { "data": "pcs_order"},
                                { "data": "box_qty"},
                                
                                { "data": "id" , render : function (id, type, row, meta) {
                                    return type === 'display' ?
                                            '<a href="/po/orderdetail/edit/'+id+'" class="float-center" title="Edit Detail"><i class="icon wb-edit" aria-hidden="true"> </i> </a> <a onclick="deletedetail('+id+')" title="Delete Detail" data-id="'+id+'"> <i class="icon wb-trash" aria-hidden="true"> </i></a>' :data;
                                }},
                                { "data": "pallet_qty"},
                                { "data": "colour"},
                                { "data": "qty_m2"},
                                { "data": "veneer_grade"},
                                { "data": "veneer_process"},
                                { "data": "veneer_color"},
                                { "data": "package"},
                                { "data": "pallet"},
                                { "data": "bracket_type"},
                            ]

            }); 
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

            var tbltop = $('#tbllisttop').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "destroy": true,
                            "paging": true,
                            "pageLength": 25,
                            "responsive": true,
                            "buttons": [

                            ],
                            
                            "ajax": {
                                url: '/po/list_top/'+po_id,
                                type: 'get',
                            },      

                            "columns":[
                                { "data": "order_number"},
                                { "data": "order_date"},
                                { "data": "buyername"},

                                { "data": "material_name"},
                                { "data": "delivery_size"},

                                { "data": "settlement_size"},

                                { "data": "feeding_quantity"},
                                { "data": "application_date"},
                                { "data": "delivery_date"},
                                
                                { "data": "id" , render : function (id, type, row, meta) {
                                        return type === 'display' ?
                                            '<a href="/po/top/edit/'+id+'" class="float-center" title="Edit Top"><i class="icon wb-edit" aria-hidden="true"> </i> </a> <a onclick="deletetop('+id+')" title="Delete Top" data-id="'+id+'"> <i class="icon wb-trash" aria-hidden="true"> </i></a>' :data;
                                }},
                                { "data": "remark"},
                            ]

            });


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

            var tbllistbottom = $('#tbllistbottom').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "destroy": true,
                            "paging": true,
                            "pageLength": 25,
                            "responsive": true,
                            "buttons": [

                            ],
                            
                            "ajax": {
                                url: '/po/list_bottom/'+po_id,
                                type: 'get',
                            },      

                            "columns":[
                                { "data": "order_number"},
                                { "data": "order_date"},
                                { "data": "buyername"},

                                { "data": "material_name"},
                                { "data": "delivery_size"},

                                { "data": "settlement_size"},

                                { "data": "feeding_quantity"},
                                { "data": "application_date"},
                                { "data": "delivery_date"},
                                
                                { "data": "id" , render : function (id, type, row, meta) {
                                        return type === 'display' ?
                                            '<a href="/po/bottom/edit/'+id+'" class="float-center" title="Edit Bottom"><i class="icon wb-edit" aria-hidden="true"> </i> </a> <a onclick="deletebottom('+id+')" title="Delete Bottom" data-id="'+id+'"> <i class="icon wb-trash" aria-hidden="true"> </i></a>' :data;
                                }},
                                { "data": "remark"},
                            ]

            });

        }
    }

    function getinfos(){
        var po_id = document.getElementById('ordernumbers_id').value;

        if(po_id){
            $.ajax({
                    url: '/po/get_info/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('select[name="buyerinfos"]').empty();
                        
                        $.each(data, function(key, value){
                            $('select[name="buyerinfos"]').append('<option value="'+key+'">'+value+'</option>');
                        })
                        
                    }
            })

            $.ajax({
                url: '/po/get_infodate/'+po_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('#orderdateinfos').val(data[0]);
                    }
            })

            var tbllistcore = $('#tbllistcore').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "destroy": true,
                            "paging": true,
                            "pageLength": 25,
                            "responsive": true,
                            "buttons": [

                            ],
                            
                            "ajax": {
                                url: '/po/list_core/'+po_id,
                                type: 'get',
                            },      

                            "columns":[
                                { "data": "order_number"},
                                { "data": "order_date"},
                                { "data": "buyername"},

                                { "data": "structure"},
                                { "data": "structure_legend"},
                                { "data": "material_name"},
                                { "data": "delivery_size"},
                                { "data": "settlement_size"},
                                { "data": "feeding_quantity"},
                                { "data": "id" , render : function (id, type, row, meta) {
                                        return type === 'display' ?
                                            '<a href="/po/core/edit/'+id+'" class="float-center" title="Edit Core"><i class="icon wb-edit" aria-hidden="true"> </i> </a> <a onclick="deletecore('+id+')" title="Delete Core" data-id="'+id+'"> <i class="icon wb-trash" aria-hidden="true"> </i></a>' :data;
                                }},
                                { "data": "application_date"},
                                { "data": "delivery_date"},
                                { "data": "remark"},
                            ]

            });
        }
    }

    function detailorders(){
        var poid = document.getElementById('ordernumber_id').value;
        console.log('PO id '+poid);
    }

</script>

<script>

    $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
    });

    $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });


    $('.delete_bottom').on('click', function (event) {
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
                window.location = "/po/bottom/delete/"+id;
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });
    
    $('.delete_generals').on('click', function (event) {
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

    $('.delete_req').on('click', function (event) {
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
                window.location = "/po/requirement/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    });
</script>