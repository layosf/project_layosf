@extends('layoutapp.mainmenu')
@section('title','Raw Material')
<style>
    label{
        font-size : 5px;
    }
</style>
<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Raw Material</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid" >
                <form action="{{ route('rm.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        <div class="col-lg-6 m-d">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Arrival Date</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        <input type="date" class="form-control form-control-sm" id="arrival_date" name="arrival_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Partai</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="partai" name="partai" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Species</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="species_id" name="species_id" required>
                                        @foreach($species as $spcs)
                                            <option value="{{ $spcs->id }}"> {{ $spcs->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <h4 class="example-title">Size Invoice</h4>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Dimention (mm)</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="invoice_dimention" name="invoice_dimention" required>
                                        @foreach($dimentions as $dim)
                                        <option value="{{ $dim->id}}">{{$dim->thick}} x {{ $dim->width}} x {{ $dim->length}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <h4 class="example-title">Size Phisic</h4>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Dimention (mm)</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="phisic_dimention" name="phisic_dimention" required>
                                        @foreach($dimentions as $dims)
                                        <option value="{{ $dims->id}}">{{$dims->thick}} x {{ $dims->width}} x {{ $dims->length}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Spec</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="spec" name="spec" required>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Supplier</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="supplier_id" name="supplier_id" required>
                                        @foreach($suppliers as $sup)
                                            <option value="{{ $sup->id}}"> {{ $sup->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Pcs</label>
                                <div class="col-md-8">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-sm" id="pcs" name="pcs" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Grade</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="grade_id" name="grade_id">
                                        <option value=""> </option>
                                    @foreach($grade as $grd)
                                        <option value="{{ $grd->id }}"> {{ $grd->name }} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">M2</label>
                                <div class="col-md-8">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-sm" id="m2" name="m2" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">M3</label>
                                <div class="col-md-8">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-sm" id="m3" name="m3" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label text-left">Approval to</label>
                                <div class="col-md-8">
                                    <select id="approval_to" name="approval_to" class="form-control form-control-sm">
                                        @foreach($users as $user)
                                        <option value="{{ $user->id}}"> {{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
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
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
                <h4 class="panel-title">
                List Raw Material
                </h4>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table style="font-size:12px" id="list_rm" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Arrival</th>
                                <th>Partai</th>
                                <th>Species</th>
                                <th>Category</th>
                                <th>Supplier</th>
                                <th>Grade</th>
                                <th>Pcs</th>
                                <th>M2</th>
                                <th>M3</th>

                                <th>Approval to</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                                <th>Invoice Size</th>
                                <th>Phisic Size</th>
                                <th>Item Product</th>
                                <th>Reason Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rawmaterials as $rm)
                                <tr>
                                    <td> {{ $rm->arrival_date}} </td>
                                    <td> {{ $rm->partai}} </td>
                                    <td> {{ implode(',', $rm->species()->get()->pluck('name')->toArray()) }} </td>
                                    <td> {{ implode(',', $rm->category()->get()->pluck('name')->toArray()) }} </td>
                                    <td> {{ implode(',', $rm->supplier()->get()->pluck('name')->toArray()) }} </td>
                                    <td> {{ implode(',', $rm->grade()->get()->pluck('name')->toArray()) }} </td>

                                    <td>{{ $rm->pcs}}</td>
                                    <td>{{ $rm->m2}}</td>
                                    <td>{{ $rm->m3}}</td>

                                    <td> {{ implode(',', $rm->approvalto()->get()->pluck('username')->toArray()) }} </td>
                                    <td align="center">
                                        @if($rm->status == '0')
                                            <span class="badge badge-info">Waiting</span>
                                        @elseif($rm->status == '1')
                                            <span class="badge badge-primary">Approved</span>
                                        @elseif($rm->status == '2')
                                            <span class="badge badge-danger">Rejected</span>
                                        @else
                                            <span class="badge badge-warning">Send Approval</span>
                                            &nbsp
                                            <a class="sendforapprove" data-placement="top" data-toggle="tooltip" data-original-title="Click. Send for Approval" data-id="{{ $rm->id }}">    
                                                <i class="icon fa-send-o" aria-hidden="true"> </i>
                                            </a>
                                        @endif
                                    </td>

                                    <td align="center">
                                        @if($rm->approval_to == Auth::user()->id)
                                            <a class="approve" title="Approve"  data-id="{{$rm->id}}"> <i class="icon fa-check"> </i> </a>

                                            <a class="reasonreject" title="Reject" data-target="#fieldreason" data-toggle="modal" data-id="{{ $rm->id }}"> <i class="icon fa-times"> </i> </a>

                                            <div id="fieldreason" class="modal fade" aria-hidden="true" aria-labelledby="fieldreason" role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-simple modal-center">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title">Reason Reject</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" id="rm_id"  class="form-control" disabled>

                                                            <textarea id="reason_reject" name="reason_reject" required class="form-control">  </textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>

                                                            <a class="savefieldreason" title="Save" onclick=savefieldreason()> <button type="submit" class="btn btn-sm btn-primary"> Save </button> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @elseif($rm->status == '2' || $rm->status == '3')
                                            <a href="{{ route('rm.edit', $rm->id) }}" class='float-center' data-placement="top" data-toggle="tooltip" data-original-title="Edit">    
                                                <i class="icon wb-edit" aria-hidden="true"> </i>
                                            </a>
                                            
                                            &nbsp
                                            <a class="delete_generals" data-placement="top" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $rm->id }}">    
                                                <i class="icon wb-trash" aria-hidden="true"> </i>
                                            </a>

                                        @else

                                        @endif
                                    </td>

                                    <td>{{ implode(',', $rm->invDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $rm->invDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $rm->invDimention()->get()->pluck('length')->toArray()) }}</td>
                                    <td>{{ implode(',', $rm->phisDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $rm->phisDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $rm->phisDimention()->get()->pluck('length')->toArray()) }}</td>
                                    <td> {{ implode(',', $rm->itemProduct()->get()->pluck('productcode')->toArray()) }}</td>
                                    <td> {{ $rm->reason_reject }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>
    function onlyNumberKey(evt) { 
          // Only ASCII charactar in that range allowed 
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
        }
    }
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
                window.location = "/rm/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

    $('.reasonreject').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: "/rm/get_reason/"+id,
            method:"get",
            dataType: "json",
            success:function(data){
                $('#rm_id').val(data[0]);
                $('#reason_reject').val(data[1]);
                // document.getElementById('fieldreason').style.display = 'block';
            }
        });

    });

    function savefieldreason(){
        var id = $('#rm_id').val();
        // window.location = "/rm/reasonreject/"+id;

        let reason_reject = $("#reason_reject").val();

        $.ajax({
            url: "/rm/reasonreject/"+id,
            method:"POST",
            data:{
                reason_reject:reason_reject,
                _token: '{{csrf_token()}}'
            },
            dataType: "json",
            success:function(data){
                console.log(data);

                if(data.success){
                    $('#fieldreason').modal('hide');
                    
                    swal({
                        title: "Data has been reject",
                        icon: "success",
                        buttons: true,
                    })
                    .then((ok) => {
                        if (ok) {
                            window.location = "/rm/list";
                        } else {

                        }
                    });
                }
                else{
                    swal('Error.');
                }
            },
        });
    }

    $('.approve').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Are you sure to approve?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/rm/approve/"+id;
            } else {

            }
        });
    });

    $('.reject').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Are you sure to reject?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/rm/reject/"+id;
            } else {

            }
        });
    });

    $('.sendforapprove').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Are you sure send this for approval?",
            text: "You can't edit after send for approval. Please check data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/rm/sendapproval/"+id;
            } else {

            }
        });
    })
</script>