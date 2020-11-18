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

                                    <li><a class="nav-link active" data-toggle="tab" href="#general" aria-controls="general" role="tab">Order Detail</a></li>

                                    <li><a class="nav-link {{ request()->is('po/top') ? 'active' : null }}" href="{{ url('po/top') }}" > Top</a></li>

                                    <li><a class="nav-link {{ request()->is('po/core') ? 'active' : null }}" href="{{ url('po/core') }}" > Core</a></li>

                                    <li><a class="nav-link {{ request()->is('po/bottom') ? 'active' : null }}" href="{{ url('po/bottom') }}" > Bottom</a></li>
                                </ul>
                                <div class="tab-content pt-20">
                                    
                                    <div class="tab-pane active" id="general" role="tabpanel">
                                        <form action="{{ url('po/orderdetail/update', ['pod'=>$pod->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                                        @csrf   
                                        
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Order Number</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="ordernumber_id" name="ordernumber_id" required onchange="get_info()">
                                                            <option value=""> </option>
                                                            @foreach($pos as $poo)
                                                                <option value="{{ $poo->id }}" {{ $poo->id == $pod->po_id ?'selected':'' }}> {{ $poo->order_number }} </option>
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
                                                            <input type="text" class="form-control form-control-sm" id="orderdate_info" name="orderdate_info" disabled value="{{ implode(',', $pod->po()->get()->pluck('order_date')->toArray()) }} ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label text-left">Buyer</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm" id="buyer_info" name="buyer_info" disabled>
                                                            <option value="">  </option>
                                                            @foreach($buyers as $buyer)
                                                                <option value="{{ $buyer->id }}" {{ $buyer->id == implode(',', $pod->po()->get()->pluck('buyer_id')->toArray()) ? 'selected': '' }}> {{ $buyer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <h4 class="example-title">Order Detail</h4>
                                            <div class="row row-lg">
                                                
                                                <div class="col-lg-6 m-d">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Species</label>
                                                        <div class="col-md-8">
                                                            
                                                            <select class="form-control form-control-sm" id="species_id" name="species_id" required>
                                                                @foreach($species as $spcs)
                                                                    <option value="{{ $spcs->id }}" {{ $spcs->id == $pod->species_id ? 'selected':''}}> {{ $spcs->name }} </option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Tenon</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="tenon" name="tenon" value="{{ $pod->tenon }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Surface Effect</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="surface_effect" name="surface_effect" value="{{ $pod->surface_effect }}">
                                                        </div>
                                                    </div>
                                                    <h4 class="example-title">Size</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Thick</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="thick" name="thick" onkeypress="return onlyNumberKey(event)" required value="{{ $pod->thick }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Width</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="width" onkeypress="return onlyNumberKey(event)" name="width" required value="{{ $pod->width }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Length</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)" id="length" name="length" required value="{{ $pod->length }}">
                                                        </div>
                                                    </div>

                                                    <h4 class="example-title">Qty</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Pcs Order</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)" id="pcs_order" name="pcs_order" value="{{ $pod->pcs_order }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left"> Box</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)" id="box_qty" name="box_qty" value="{{ $pod->box_qty }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left"> Pallet </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)" id="pallet_qty" name="pallet_qty" value="{{ $pod->pallet_qty }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Colour</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="colour" name="colour" value="{{ $pod->colour }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Qty M2</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)" id="qty_m2" name="qty_m2" value="{{ $pod->qty_m2 }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Veneer Grade</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" id="veneer_grade" name="veneer_grade">
                                                                <option value=""> </option>
                                                                @foreach($grades as $gr)
                                                                    <option value ="{{ $gr->id }}" {{ $gr->id == $pod->veneer_grade ? 'selected':''}}> {{ $gr->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Veneer Process</label>
                                                        <div class="col-md-8">
                                                            <select name="veneer_process" id="veneer_process" class="form-control">
                                                                <option value="Sliced" {{ $pod->veneer_process === 'Sliced' ? 'selected':'' }}> Sliced</option>
                                                                <option value="Rotary Cut" {{ $pod->veneer_process === 'Rotary Cut' ? 'selected':'' }}> Rotary Cut</option>
                                                                <option value="Ripsaw" {{ $pod->veneer_process === 'Ripsaw' ? 'selected':'' }}> Ripsaw</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Veneer Color</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="veneer_color" name="veneer_color" value="{{ $pod->veneer_color }}">
                                                        </div>
                                                    </div>
                                                    <h4 class="example-title">Packing</h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Package</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="package" name="package" value="{{ $pod->package }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Pallet</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="pallet" name="pallet" value="{{ $pod->pallet }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 form-control-label text-left">Bracket Type</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" id="bracket_type" name="bracket_type" value="{{ $pod->bracket_type }}">
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

<script>

    function onlyNumberKey(evt) { 
          // Only ASCII charactar in that range allowed 
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
        }
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
                        
                    }
            })
        }
    }

    function detailorders(){
        var poid = document.getElementById('ordernumber_id').value;
        console.log('PO id '+poid);
    }
</script>
