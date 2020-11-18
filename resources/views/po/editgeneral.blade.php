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

                                    <!-- <li><a class="nav-link {{ request()->is('po/requirement') ? 'active' : null }}" href="{{ url('po/requirement') }}" >Order Requirement</a></li> -->

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
                                            </div>

                                            <div class="row row-lg">
                                                <div class="col-lg-6 m-d">
                                                    <h4 class="example-title">Substrate Requirements</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Back Veneer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="back_veneer" name="back_veneer" value="{{ $po->back_veneer }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Core board</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="core_board" name="core_board" value="{{ $po->core_board }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Base Layer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="base_layer" name="base_layer" value="{{ $po->base_layer }}">
                                                        </div>
                                                    </div>

                                                    <h4 class="example-title">Paint</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Paint Process</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="paint_process" name="paint_process" required value="{{ $po->paint_process }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Brightness</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="brightness" name="brightness" required value="{{ $po->brightness }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" required value="{{ $po->delivery_date }}"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Tenon</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tenon" name="tenon" required value="{{ $po->tenon }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Chamfer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="chamfer" name="chamfer" required value="{{ $po->chamfer }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Back Groove</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="Yes" {{ $po->back_groove == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="No" {{ $po->back_groove == 'No' ? 'checked' : ''}} />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether to keep the sample</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="Yes" {{ $po->keep_sample == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="No" {{ $po->keep_sample == 'No' ? 'checked' : ''}} />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Finished surface thickness range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="surface_thickness" name="surface_thickness" value="{{ $po->surface_thickness }}" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">MC Range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="mc_range" name="mc_range" value="{{ $po->mc_range }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Total thickness tolerance range </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tolerance_thickness" name="tolerance_thickness" value="{{ $po->tolerance_thickness }}" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Product description</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control form-control-sm" id="product_description" name="product_description"> {{ $po->product_description }}</textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer specifies the paint</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="Yes" {{ $po->customer_specific_paint == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="No" {{ $po->customer_specific_paint == 'No' ? 'checked' : ''}} />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer follows the order</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="Yes" {{ $po->customer_follow_order == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="No" {{ $po->customer_follow_order == 'No' ? 'checked' : ''}} />
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
