@extends('layoutapp.mainmenu')
@section('title','Agreement')
<div class="page">
    <div class="page-header">
        <h4 class="page-title">Agreement Purchase Order</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('agreement/list') }}"> List </a></li>
            <li class="breadcrumb-item"><a href="{{ url('agreement') }}"> Input </a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
                <div class="row row-lg">
                    <div class="col-xl-12">
                        <div class="example-wrap">
                            <div class="nav-tabs-horizontal" data-plugin="tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li><a class="nav-link {{ request()->is('agreement') ? 'active' : null }}" href="{{ url('agreement') }}" >General</a></li>

                                    <li><a class="nav-link active" data-toggle="tab" href="#detail" aria-controls="detail" role="tab">Detail</a></li>
                                </ul>
                                <div class="tab-content pt-20">
                                    
                                    <div class="tab-pane active" id="bottom" role="tabpanel">
                                        <form action="{{ url('agreement/detail/update', ['detail'=>$detail->id])}}" method="POST">
                                        @csrf 
                                            <div class="row">        
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Number Agreement</label>
                                                        <div class="col-sm-10">
                                                            <select name="agreement_id" id="agreement_id" class="form-control form-control-sm">
                                                                @foreach($agreements as $a)
                                                                    <option value="{{ $a->id }}" {{ $a->id == $detail->agreement_id ? 'selected':''}}> {{ $a->code }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <h4 class="example-title">Size Invoice</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Dimention (mm)</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control form-control-sm" id="invoice_dimention" name="invoice_dimention" required>
                                                                @foreach($dimentions as $dim)
                                                                    <option value="{{ $dim->id}}" {{ $dim->id == $detail->invoice_dimention ? 'selected':''}}> {{$dim->thick}} x {{ $dim->width}} x {{ $dim->length}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <h4 class="example-title">Size Cutting/Phisic</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Dimention (mm)</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control form-control-sm" id="phisic_dimention" name="phisic_dimention" required>
                                                                @foreach($dimentions as $dims)
                                                                <option value="{{ $dims->id}}" {{ $dim->id == $detail->invoice_dimention ? 'selection':''}}>{{$dims->thick}} x {{ $dims->width}} x {{ $dims->length}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Qty Pcs</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="qty_pcs" id="qty_pcs" class="form-control form-control-sm" value="{{ $detail->qty_pcs }}" onkeypress="return onlyNumberKey(event)">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Price</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="price" id="price" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)" value="{{ $detail->price }}">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <select id="currency_id" name="currency_id" class="form-control form-control-sm">
                                                                @foreach($currency as $cr)
                                                                    <option value="{{ $cr->id }}" {{ $cr->id == $detail->currency_id ? 'selection':''}}> {{ $cr->code }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="btn btn-primary btn-sm" type="submit" id="savedetail">Save</button>
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

<script>
    function onlyNumberKey(evt) { 
          // Only ASCII charactar in that range allowed 
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
        }
    }
</script>