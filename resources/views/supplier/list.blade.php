@extends('layoutapp.mainmenu')
@section('title','Supplier')
<?php 

    // $lang = App\Language::pluck('language')[0];
    // $form_supplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Supplier', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $listsupplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('List Supplier', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $name = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name', $lang);
    // $address = Stichoza\GoogleTranslate\GoogleTranslate::trans('Address', $lang);
    // $country = Stichoza\GoogleTranslate\GoogleTranslate::trans('Country', $lang);
    // $province = Stichoza\GoogleTranslate\GoogleTranslate::trans('Province', $lang);
    // $city = Stichoza\GoogleTranslate\GoogleTranslate::trans('City', $lang);
    // $phone = Stichoza\GoogleTranslate\GoogleTranslate::trans('Phone', $lang);
    // $email = Stichoza\GoogleTranslate\GoogleTranslate::trans('Email', $lang);
    // $action = Stichoza\GoogleTranslate\GoogleTranslate::trans('Action', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);

    $lang = 'language';
    $form_supplier = 'Supplier';
    $list = 'List';
    $input = 'Input';
    $listsupplier = 'List Supplier';
    $dashboard = 'Home';
    $name = 'Name';
    $address = 'Address';
    $country = 'Country';
    $province = 'Province';
    $city = 'City';
    $phone = 'Phone';
    $email = 'Email';
    $action = 'Action';
    $save = 'Save';
    $cancel = 'Cancel';
?>
<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_supplier }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item active">{{$list}}</li>
            <li class="breadcrumb-item "><a href="{{ url('master/supplier') }}">{{$input}}</a></li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                {{ $listsupplier }}
            </h3>
            </header>
            <div class="panel-body">
            
            <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>{{$name}}</th>
                        <th>{{$address}}</th>
                        <th>{{$country}}</th>
                        <th>{{$province}}</th>
                        <th>{{$city}}</th>
                        <th>{{$phone}}</th>
                        <th>{{$email}}</th>
                        <th>{{$action}}</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($suppliers as $s)
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->address}}</td>
                        <td> {{ implode(',', $s->country()->get()->pluck('name')->toArray()) }}</td>
                        <td> {{ implode(',', $s->province()->get()->pluck('name')->toArray()) }}</td>
                        <td> {{ implode(',', $s->city()->get()->pluck('name')->toArray()) }}</td>
                        <td>{{ $s->phone}}</td>
                        <td>{{ $s->email}}</td>
                        <td> 
                            <a href="{{ route('master.supplier.edit', $s->id) }}" class='float-center' title="Edit">    
                                <i class="icon wb-edit" aria-hidden="true"> </i>
                            </a>
                            
                            &nbsp
                            
                            <a class="demo1" title="Delete" data-id="{{ $s->id }}">    
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
                // $.ajax({
                //         type : "GET",
                //         url : "{{ url('prm/invoice/delete')}}" + '/' + id,
                //         data : {id:id},
                //         dataType : "json",
                //         success: function (data)
                //         {
                //             if(data.warning)
                //             {
                //                 console.log('not')
                //                 swal("Cancelled", "Cant delete data ready in use", "error");
                //                 location.reload();
                //             }
                //             else
                //             {
                //                 console.log('delete')
                //                 swal("Done!", "Your data has been delete.", "success");
                //                 location.reload();
                //                 // swal("Poof! Your imaginary file has been deleted!", {
                //                 //     icon: "success",
                //                 // });
                //             }
                //         }   
                // });
                window.location = "/master/supplier/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>
