@extends('layoutapp.mainmenu')
@section('title','Agreement')

<div class="page">
    <div class="page-header">
        <h4 class="page-title">List Agreement</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">List</li>
            <li class="breadcrumb-item "><a href="{{ route('agreement.index') }}">Input</a></li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                List Agreement
            </h3>
            </header>
            <div class="panel-body">
                <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>PO</th>
                            <th>Contract</th>
                            <th>Specification</th>
                            <th>Volume M3</th>
                            <th>Supplier</th>
                            <th>Beneficiary</th>
                            <th>Transport</th>
                            <th>Certificate</th>
                            <th>Action</th>
                            <th>Quality Note</th>
                            <th>Measurement</th>
                            <th>Document</th>
                            <th>Payment Note</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $l)
                        <tr>
                            <td> {{ $l->code }}</td>
                            <td> {{ $l->startcontract }} - {{ $l->expiredcontract }} </td>
                            <td> {{ $l->categoryname }} <br>
                                {{ $l->speciesname }} 
                            </td>
                            <td> {{ $l->vol_m3 }} </td>
                            <td> {{ $l->suppliername }} <br>
                                {{ $l->supplieraddress }} <br>
                                {{ $l->accountno }}
                                {{ $l->namebank }} <br>
                                CP : {{ $l->suppliercp }}
                            </td>
                            <td> {{ $l->beneficiaryname }} <br> {{ $l->beneficiary_cp }}</td>
                            <td> {{ $l->transport }} </td>
                            <td> {{ $l->cert_code }} </td>
                            
                            <td> 
                                <a href="{{ route('agreement.edit', $l->id) }}" class='float-center' data-placement="top" data-toggle="tooltip" data-original-title="Edit">    
                                    <i class="icon wb-edit" aria-hidden="true"> </i>
                                </a>
                                &nbsp
                                <a class="demo1" data-placement="top" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $l->id }}">    
                                    <i class="icon wb-trash" aria-hidden="true"> </i>
                                </a>
                            </td>
                            <td> {{ $l->qualitynote }} </td>
                            <td> {{ $l->measurement }} </td>
                            <td> {{ $l->document }} </td>
                            <td> {{ $l->paymentnote }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>

    $('.demo1').on('click', function (event) {
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
                window.location = "/agreement/delete/"+id;
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>
