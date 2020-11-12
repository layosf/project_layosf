@extends('layoutapp.mainmenu')
@section('title','Buyer')
<?php 

    // $lang = App\Language::pluck('language')[0];
    // $form_buyer = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Buyer', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $namebuyer = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name ', $lang);
    // $addressbuyer = Stichoza\GoogleTranslate\GoogleTranslate::trans('Address ', $lang);
    // $country = Stichoza\GoogleTranslate\GoogleTranslate::trans('Country', $lang);
    // $province = Stichoza\GoogleTranslate\GoogleTranslate::trans('Province', $lang);
    // $city = Stichoza\GoogleTranslate\GoogleTranslate::trans('City', $lang);
    // $phone = Stichoza\GoogleTranslate\GoogleTranslate::trans('Phone', $lang);
    // $email = Stichoza\GoogleTranslate\GoogleTranslate::trans('Email', $lang);
    // $postalcode = Stichoza\GoogleTranslate\GoogleTranslate::trans('Postal Code', $lang);
    // $bankaccount = Stichoza\GoogleTranslate\GoogleTranslate::trans('Bank Account', $lang);
    // $fax = Stichoza\GoogleTranslate\GoogleTranslate::trans('Fax', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);

    $lang = 'language';
    $form_buyer = 'Form Buyer';
    $list = 'List';
    $input = 'Input';
    $general = 'General';
    $dashboard = 'Home';
    $namebuyer = 'Name ';
    $addressbuyer = 'Address ';
    $country = 'Country';
    $province = 'Province';
    $city = 'City';
    $phone = 'Phone';
    $email = 'Email';
    $postalcode = 'Postal Code';
    $bankaccount = 'Bank Account';
    $fax = 'Fax';
    $save = 'Save';
    $cancel = 'Cancel';
?>
<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{ $form_buyer }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item active">{{$list}}</li>
            <li class="breadcrumb-item "><a href="{{ url('master/buyer') }}">{{$input}}</a></li>
        </ol>
    </div>
    @include('layoutapp.alerts')
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
            <h3 class="panel-title">
                {{ $listbuyer }}
            </h3>
            </header>
            <div class="panel-body">
            
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>{{$namebuyer}}</th>
                        <th>{{$addressbuyer}}</th>
                        
                        <th>{{$phone}}</th>
                        <th>{{$fax}}</th>
                        <th>{{$email}}</th>
                        <th>{{$postalcode}}</th>
                        <th>{{$bankaccount}}</th>
                        <th>{{$action}}</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($buyers as $b)
                    <tr>
                        <td> {{ $b->name }}</td>
                        <td> {{ $b->address }}. 
                            <br> {{ $b->countryname }} {{ $b->provname }} {{ $b->cityname }}
                        </td>
                        
                        <td> {{ $b->phone}}</td>
                        <td> {{ $b->fax }}</td>
                        <td> {{ $b->email}}</td>
                        <td> {{ $b->postal_code}} </td>
                        <td> {{ $b->namebank }} {{ $b->accountname }} {{ $b->accountno }}</td>
                        
                        <td> 
                            <a href="{{ route('master.buyer.edit', $b->id) }}" class='float-center' title="Edit">    
                                <i class="icon wb-edit" aria-hidden="true"> </i>
                            </a>
                            
                            &nbsp
                            
                            <a class="demo1" title="Delete" data-id="{{ $b->id }}">    
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
                
                window.location = "/master/buyer/delete/"+id;
                
                
            } else {
                swal("Your file is safe!");
            }
        });
    
    });

</script>
