@extends('layoutapp.mainmenu')
@section('title','Agreement')
<div class="page">
    <div class="page-header">
        <h4 class="page-title">Agreement Purchase Order</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('agreement/list') }}"> List </a></li>
            <li class="breadcrumb-item active">Input</li>
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
                                    <li><a class="nav-link {{ request()->is('agreement/detail') ? 'active' : null }}" href="{{ url('agreement/detail') }}">Detail</a></li>
                                </ul>
                                <div class="tab-content pt-20">
                                    <div id="{{ url('agreement') }}" class="tab-pane {{ request()->is('agreement') ? 'active' : null }}">
                                        <form action="{{ route('agreement.store')}}" method="POST">
                                        @csrf 
                                            <div class="row">        
                                                <div class="col-sm-9">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Number PO</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" id="code" name="code">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Amended</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-sm" id="amended" name="amended"> 
                                                                <option value="">Choose</option> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Contract</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-daterange input-group" >
                                                                    
                                                                    <input type='date' class="form-control form-control-sm " name="startcontract" id="startcontract" placeholder="Start Contract"/>
                                                                    
                                                                    <span class="input-group-addon">to</span>

                                                                    <input type='date' class="form-control form-control-sm " name="expiredcontract" id="expiredcontract" placeholder="Expired Contract" />
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Specification</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-sm" id="category_id" name="category_id">
                                                                @foreach($category as $ctg)
                                                                    <option value="{{ $ctg->id }}"> {{ $ctg->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Species</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-sm" id="species_id" name="species_id">
                                                                @foreach($speciess as $sp)
                                                                    <option value="{{ $sp->id }}"> {{ $sp->name }} </option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Volume M3</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" id="vol_m3" name="vol_m3" onkeypress="return onlyNumberKey(event)" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label">Status</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control form-control-sm" id="status" name="status">
                                                                <option value="0">Approved</option>
                                                                <option value="1"> Hold</option>
                                                                <option value="2"> Cancel</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6 b-r">
                                                    <h4 class="m-t-none m-b">Supplier</h4>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label> Code </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <select class="form-control form-control-sm" id="supplier_id" name="supplier_id" required onchange="get_infosupplier()"> 
                                                                <option value=""> </option>
                                                                @foreach($suppliers as $spl)
                                                                    <option value="{{ $spl->id }}"> {{ $spl->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label> Name</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control form-control-sm" id="name_supplier" name="name_supplier" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label> Address </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <textarea id="address_supplier" name="address_supplier" class="form-control form-control-sm" readonly> </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label> City </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control form-control-sm" id="city_supplier" name="city_supplier" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <h4 class="m-t-none m-b"> Payment</h4>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label class="font-normal">Bank</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" name="bank_supplier" id="bank_supplier" class="form-control form-control-sm" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label class="font-normal">Account No</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" name="accountno_supplier" id="accountno_supplier" class="form-control form-control-sm" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label>Account Name  </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" name="accountname_supplier" id="accountname_supplier" class="form-control form-control-sm" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label> Payment Note </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <textarea id="paymentnote" name="paymentnote" class="form-control form-control-sm"> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">   
                                                <div class="col-sm-9">
                                                <h4 class="m-t-none m-b">Beneficiary</h4>
                                                    <input type="hidden" class="form-control form-control-sm" id="beneficiary_id" name="beneficiary_id" value="{{ $companies->id }}" readonly>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Code</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" id="code_beneficiary" name="code_beneficiary" value="{{ $companies->code }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" id="name_beneficiary" name="name_beneficiary" value="{{ $companies->name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control form-control-sm" id="address_beneficiary" name="address_beneficiary" readonly> {{ $companies->address }} </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Province</label>
                                                        <div class="col-sm-5">
                                                            <select name="province_beneficiary" id="province_beneficiary" class="form-control form-control-sm" disabled>
                                                                @foreach($province as $prov)
                                                                <option value="{{ $prov->id }}" {{ $prov->id == $companies->province_id ? 'selected':''}}> {{ $prov->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <select name="city_beneficiary" id="city_beneficiary" class="form-control form-control-sm" disabled>
                                                                @foreach($cities as $cty)
                                                                    <option value="{{ $cty->id }}" {{ $cty->id == $companies->city_id ? 'selected':''}}> {{ $cty->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Contact Person</label>
                                                        <div class="col-sm-10">
                                                            <input name="contactperson_beneficiary" id="contactperson_beneficiary" class="form-control form-control-sm" readonly value="{{ $companies->contact_person }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 b-r">
                                                    <h4 class="m-t-none m-b"></h4>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label class="col-sm-2 col-form-label">TaxPPN</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <select id="taxppn_id" name="taxppn_id" class="form-control form-control-sm">
                                                                @foreach($taxs as $tax)
                                                                    <option value="{{ $tax->id }}"> {{ $tax->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                        <label class="col-sm-2 col-form-label">TaxPPH</label>
                                                        
                                                        <div class="col-lg-3">
                                                            <select id="taxpph_id" name="taxpph_id" class="form-control form-control-sm">
                                                                @foreach($taxs as $tx)
                                                                    <option value="{{ $tx->id }}"> {{ $tx->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label class="col-sm-2 col-form-label">Currency</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <select id="currency_id" name="currency_id" class="form-control form-control-sm">
                                                                @foreach($currency as $cur)
                                                                    <option value="{{ $cur->id}}"> {{ $cur->code }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label class="col-sm-2 col-form-label">Transport </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <select id="transport" name="transport" class="form-control form-control-sm">
                                                                <option value="ByCustomer"> By Customer</option>
                                                                <option value="ByVendor"> By Vendor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3">
                                                            <label class="col-sm-2 col-form-label">Certificate </label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <select id="certificate_id" name="certificate_id" class="form-control form-control-sm">
                                                                @foreach($certificate as $cert)
                                                                    <option value="{{ $cert->id }}"> {{ $cert->cert_code }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="row">     
                                                <div class="col-sm-6">   
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Volume Note</label>
                                                        <div class="col-sm-8">
                                                            <textarea id="volumenote" name="volumenote" class="form-control " style="height:110%"> </textarea>
                                                            
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Quality Note</label>
                                                        <div class="col-sm-8">
                                                            <textarea id="qualitynote" name="qualitynote" class="form-control " style="height:110%"> </textarea>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">   
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Measurement</label>
                                                        <div class="col-sm-8">
                                                            <textarea id="measurement" name="measurement" class="form-control" style="height:110%"> </textarea>
                                                            
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Document</label>
                                                        <div class="col-sm-8">
                                                            <textarea id=document name=document class="form-control " style="height:110%"> </textarea>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12 text-center">
                                                    <button class="btn btn-primary btn-sm" type="submit" id="savegeneral">Save</button>
                                                    <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="{{ url('agreement/detail') }}" class="tab-pane {{ request()->is('agreement/detail') ? 'active' : null }}">
                                        <form action="{{ route('agreement.detail.store')}}" method="POST">
                                        @csrf 
                                            <div class="row">        
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Number Agreement</label>
                                                        <div class="col-sm-10">
                                                            <select name="agreement_id" id="agreement_id" class="form-control form-control-sm">
                                                                @foreach($agreements as $a)
                                                                    <option value="{{ $a->id}}"> {{ $a->code }}</option>
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
                                                                <option value="{{ $dim->id}}">{{$dim->thick}} x {{ $dim->width}} x {{ $dim->length}} </option>
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
                                                                <option value="{{ $dims->id}}">{{$dims->thick}} x {{ $dims->width}} x {{ $dims->length}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Qty Pcs</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="qty_pcs" id="qty_pcs" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Price</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="price" id="price" class="form-control form-control-sm" onkeypress="return onlyNumberKey(event)">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <select id="currency_id" name="currency_id" class="form-control form-control-sm">
                                                                @foreach($currency as $cr)
                                                                    <option value="{{ $cr->id }}"> {{ $cr->code }} </option>
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

        @if(Route::current()->getName() == 'agreement.detail')
            <div class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">
                    List Detail
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th>Qty Pcs</th>
                                    <th>Phisic Dimention</th>
                                    <th>Invoice Dimention</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $det)
                                <tr>
                                    <td> {{ implode(',', $det->agreement()->get()->pluck('code')->toArray()) }} </td>
                                    <td> {{ $det->price }} {{ implode(',', $det->currency()->get()->pluck('code')->toArray()) }}</td>
                                    <td> {{ $det->qty_pcs }} </td>
                                    <td> {{ implode(',', $det->phisicDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $det->phisicDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $det->phisicDimention()->get()->pluck('length')->toArray()) }}</td>
                                    <td> {{ implode(',', $det->invDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $det->invDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $det->invDimention()->get()->pluck('length')->toArray()) }}</td>
                                    
                                    <td> 
                                        <a href="{{ route('agreement.detail.edit', $det->id) }}" class='float-center' title="Edit Detail">    
                                            <i class="icon wb-edit" aria-hidden="true"> </i>
                                        </a>
                                        
                                        &nbsp
                                        <a class="delete_detail" title="Delete Detail" data-id="{{ $det->id }}">    
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
        @endif
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>
    $('.delete_detail').on('click', function (event) {
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
                window.location = "/agreement/detail/delete/"+id;
            } else {
                swal("Your file is safe!");
            }
        });
    });

    function onlyNumberKey(evt) { 
          // Only ASCII charactar in that range allowed 
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
        }
    }

    function get_infosupplier(){
        var supplierid = document.getElementById('supplier_id').value;

        if(supplierid){
            $.ajax({
                url: '/agreement/get_infosupplier/'+supplierid,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#name_supplier').val(data[0]);
                    $('#address_supplier').val(data[1]);
                    $('#city_supplier').val(data[2]);
                    $('#bank_supplier').val(data[3]);
                    $('#accountno_supplier').val(data[4]);
                    $('#accountname_supplier').val(data[5]);
                }
            })
        }
    }
</script>