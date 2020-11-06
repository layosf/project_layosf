@extends('layoutapp.mainmenu')
@section('title','Raw Material')

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
                    <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
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
                                            <a class="sendforapprove" title="Send for Approve?" data-id="{{ $rm->id }}">    
                                                <i class="icon fa-send-o" aria-hidden="true"> </i>
                                            </a>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($rm->approval_to == Auth::user()->id)
                                            <a class="approve" title="Approve" data-id="{{$rm->id}}"> <i class="icon fa-check"> </i> </a>

                                            <a class="reject" title="Reject" data-id="{{$rm->id}}"> <i class="icon fa-times"> </i> </a>
                                        

                                        @elseif($rm->status == '2' || $rm->status == '3')
                                            <a href="{{ route('rm.edit', $rm->id) }}" class='float-center' title="Edit">    
                                                <i class="icon wb-edit" aria-hidden="true"> </i>
                                            </a>
                                            
                                            &nbsp
                                            <a class="delete_generals" title="Delete " data-id="{{ $rm->id }}">    
                                                <i class="icon wb-trash" aria-hidden="true"> </i>
                                            </a>
                                        @else

                                        @endif
                                    </td>
                                    <td>{{ implode(',', $rm->invDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $rm->invDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $rm->invDimention()->get()->pluck('length')->toArray()) }}</td>
                                    <td>{{ implode(',', $rm->phisDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $rm->phisDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $rm->phisDimention()->get()->pluck('length')->toArray()) }}</td>
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