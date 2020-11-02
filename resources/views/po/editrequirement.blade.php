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

                                    <li><a class="nav-link active" data-toggle="tab" href="#requirement" aria-controls="requirement" role="tab">Order Requirement</a></li>
                                    
                                </ul>
                                <div class="tab-content pt-20">
                                    <div class="tab-pane active" id="requirement" role="tabpanel">
                                        <form action="{{ url('po/requirement/update', [ 'req'=>$req->id ]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumberid" name="ordernumberid" required>
                                                            <option value=""> </option>
                                                            @foreach($pos as $s)
                                                                <option value="{{ $s->id }}" {{ $s->id == $req->po_id ? 'selected':'' }}> {{ $s->order_number }} </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="back_veneer" name="back_veneer" required value="{{ $req->back_veneer }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Core board</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="core_board" name="core_board" required value="{{ $req->core_board }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Base Layer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="base_layer" name="base_layer" value="{{ $req->base_layer }}">
                                                        </div>
                                                    </div>

                                                    <h4 class="example-title">Paint</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Paint Process</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="paint_process" name="paint_process" required value="{{ $req->paint_process }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Brightness</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="brightness" name="brightness" required value="{{ $req->brightness }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Delivery Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date" required value="{{ $req->delivery_date }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Tenon</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tenon" name="tenon" required value="{{ $req->tenon }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Chamfer</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="chamfer" name="chamfer" required value="{{ $req->chamfer }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Back Groove</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="Yes" {{ $req->back_groove == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="back_groove" name="back_groove" value="No" {{ $req->back_groove == 'No' ? 'checked' : ''}} />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether to keep the sample</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="Yes" {{ $req->keep_sample == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="keep_sample" name="keep_sample" value="No" {{ $req->keep_sample == 'No' ? 'checked' : ''}} />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Finished surface thickness range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="surface_thickness" name="surface_thickness" value="{{ $req->surface_thickness }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">MC Range</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="mc_range" name="mc_range" value="{{ $req->mc_range }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Total thickness tolerance range </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tolerance_thickness" name="tolerance_thickness" value="{{ $req->tolerance_thickness }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Product description details</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control form-control-sm" id="product_description" name="product_description"> {{ $req->product_description }}</textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer specifies the paint</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="Yes" {{ $req->customer_specific_paint == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_specific_paint" name="customer_specific_paint" value="No" {{ $req->customer_specific_paint == 'No' ? 'checked' : ''}} />
                                                            <label for="inputRadiosChecked">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-6 form-control-label text-left">Whether the customer follows the order</label>
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="Yes" {{ $req->customer_follow_order == 'Yes' ? 'checked' : ''}}/>
                                                            <label for="inputRadiosUnchecked">Yes</label>
                                                        </div>
                                                        &nbsp
                                                        
                                                        <div class="radio-custom radio-primary">
                                                            <input type="radio" id="customer_follow_order" name="customer_follow_order" value="No" {{ $req->customer_follow_order == 'No' ? 'checked' : ''}}/>
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