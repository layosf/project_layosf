@extends('layoutapp.mainmenu')
@section('title','Raw Material')

<meta name="csrf-token" content="{{ csrf_token() }}">
<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Raw Material</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('rm.index') }}">Input</a></li>
          <li class="breadcrumb-item active">List</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
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
                                <th>To Warehouse</th>
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
                                        @if($rm->approval_to == Auth::user()->id && $rm->status == '0' )
                                            <a class="approve" title="Approve" data-id="{{$rm->id}}"> <i class="icon fa-check"> </i> </a>
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
                                        
                                        @elseif($rm->approval_to == Auth::user()->id && $rm->status == '1')
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

                                        @elseif($rm->approval_to != Auth::user()->id && $rm->status == '2' || $rm->status == '3')
                                            <a href="{{ route('rm.edit', $rm->id) }}" class='float-center'  data-placement="top" data-toggle="tooltip" data-original-title="Edit">    
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
                                    <td> {{ implode(',', $rm->toWarehouse()->get()->pluck('code')->toArray()) }} </td>
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