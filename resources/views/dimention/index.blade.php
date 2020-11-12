@extends('layoutapp.mainmenu')
@section('title','Dimention')

<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Dimention</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form action="{{ route('master.dimention.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label text-left">Thick</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control form-control-sm" id="thick" name="thick" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label text-left">Width</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control form-control-sm" id="width" name="width" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label text-left">Length</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control form-control-sm" id="length" name="length" required>
                            </div>
                        </div>
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
                List Dimention
                </h4>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Thick</th>
                                <th>Width</th>
                                <th>Length</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dimentions as $dm)
                                <tr>
                                    <td>{{ $dm->thick }}</td>
                                    <td>{{ $dm->width }}</td>
                                    <td>{{ $dm->length }}</td>
                                    <td>
                                        <a href="{{ route('master.dimention.edit', $dm->id) }}" class='float-center' title="Edit">    
                                            <i class="icon wb-edit" aria-hidden="true"> </i>
                                        </a>
                                        
                                        &nbsp
                                        <a class="delete" title="Delete " data-id="{{ $dm->id }}">
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
</div>
</body>

<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>

    $('.delete').on('click', function (event) {
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
                window.location = "/master/dimention/delete/"+id;
            } else {
                swal("Your file is safe!");
            }
        });
    
    });
</script>