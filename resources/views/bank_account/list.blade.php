@extends('layoutapp.mainmenu')
@section('title','Bank Account')

<div class="page">
    <div class="page-header">
        <h4 class="page-title">List Bank Account</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">List</li>
            <li class="breadcrumb-item "><a href="{{ url('master/bankaccount') }}">Input</a></li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                List Bank Account
            </h3>
            </header>
            <div class="panel-body">
            
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Bank</th>
                            <th>Account Name</th>
                            <th>Account No</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bankaccount as $ba)
                            <tr>
                                <td> {{ implode(',', $ba->banks()->get()->pluck('namebank')->toArray()) }} </td>
                                <td> {{ $ba->accountname }} </td>
                                <td> {{ $ba->accountno }} </td>
                                <td> {{ $ba->phone }} </td>
                                <td> {{ $ba->address }} </td>
                                <td> 
                                    <a href="{{ route('master.bankaccount.edit', $ba->id) }}" class='float-center' title="Edit">    
                                        <i class="icon wb-edit" aria-hidden="true"> </i>
                                    </a>
                                    
                                    &nbsp
                                    <a class="demo1" title="Delete" data-id="{{ $ba->id }}">    
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
                window.location = "/master/bankaccount/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>