@extends('layoutapp.mainmenu')
@section('title','Category')
<?php 
<<<<<<< HEAD
    $lang = App\Language::pluck('language')[0];
    $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    $categoryname = Stichoza\GoogleTranslate\GoogleTranslate::trans('Category Name', $lang);
=======
    // $lang = App\Language::pluck('language')[0];
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $categoryname = Stichoza\GoogleTranslate\GoogleTranslate::trans('Category Name', $lang);

    $dashboard = 'Home';
    $general = 'General';
    $categoryname = 'Name';
    $categorycode = 'Code';
>>>>>>> 9b093b8a53b49b0594bb62dc323cf9e5042d23d2
?>

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Form Category</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          
          <li class="breadcrumb-item active">Input</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $general }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('master.category.store') }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <div class="form-group row">
<<<<<<< HEAD
=======
                                <label class="col-md-3 form-control-label text-left">{{ $categorycode }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                            </div>

                            <div class="form-group row">
>>>>>>> 9b093b8a53b49b0594bb62dc323cf9e5042d23d2
                                <label class="col-md-3 form-control-label text-left">{{ $categoryname }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="name" name="name" required>
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
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="!00%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cats as $cat)
                        <tr>
                            <td> {{ $cat->name }} </td>
                            <td> 
                                <a href="{{ route('master.category.edit', $cat->id) }}" class='float-center' title="Edit">    
                                    <i class="icon wb-edit" aria-hidden="true"> </i>
                                </a>
                                
                                &nbsp
                                <a class="demo1" title="Delete" data-id="{{ $cat->id }}">    
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
                window.location = "/master/category/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>