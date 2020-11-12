@extends('layoutapp.mainmenu')
@section('title','Supplier')

<?php 
<<<<<<< HEAD
    $lang = App\Language::pluck('language')[0];
    $form_supplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Supplier', $lang);
    $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    $update = Stichoza\GoogleTranslate\GoogleTranslate::trans('Update', $lang);
    $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    $namesupplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name Supplier', $lang);
    $addressupplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Address Supplier', $lang);
    $country = Stichoza\GoogleTranslate\GoogleTranslate::trans('Country', $lang);
    $province = Stichoza\GoogleTranslate\GoogleTranslate::trans('Province', $lang);
    $city = Stichoza\GoogleTranslate\GoogleTranslate::trans('City', $lang);
    $phone = Stichoza\GoogleTranslate\GoogleTranslate::trans('Phone', $lang);
    $email = Stichoza\GoogleTranslate\GoogleTranslate::trans('Email', $lang);
    $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);
=======
    // $lang = App\Language::pluck('language')[0];
    // $form_supplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Form Supplier', $lang);
    // $list = Stichoza\GoogleTranslate\GoogleTranslate::trans('List', $lang);
    // $input = Stichoza\GoogleTranslate\GoogleTranslate::trans('Input', $lang);
    // $update = Stichoza\GoogleTranslate\GoogleTranslate::trans('Update', $lang);
    // $general = Stichoza\GoogleTranslate\GoogleTranslate::trans('General', $lang);
    // $dashboard = Stichoza\GoogleTranslate\GoogleTranslate::trans('Home', $lang);
    // $namesupplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Name Supplier', $lang);
    // $addressupplier = Stichoza\GoogleTranslate\GoogleTranslate::trans('Address Supplier', $lang);
    // $country = Stichoza\GoogleTranslate\GoogleTranslate::trans('Country', $lang);
    // $province = Stichoza\GoogleTranslate\GoogleTranslate::trans('Province', $lang);
    // $city = Stichoza\GoogleTranslate\GoogleTranslate::trans('City', $lang);
    // $phone = Stichoza\GoogleTranslate\GoogleTranslate::trans('Phone', $lang);
    // $email = Stichoza\GoogleTranslate\GoogleTranslate::trans('Email', $lang);
    // $save = Stichoza\GoogleTranslate\GoogleTranslate::trans('Save', $lang);
    // $cancel = Stichoza\GoogleTranslate\GoogleTranslate::trans('Cancel', $lang);

    $lang = 'language';
    $form_supplier = 'Form Supplier';
    $list = 'List';
    $input = 'Input';
    $update = 'Update';
    $general = 'General';
    $dashboard = 'Home';
    $namesupplier = 'Name Supplier';
    $addressupplier = 'Address Supplier';
    $country = 'Country';
    $province = 'Province';
    $city = 'City';
    $phone = 'Phone';
    $email = 'Email';
    $save = 'Save';
    $cancel = 'Cancel';

>>>>>>> 9b093b8a53b49b0594bb62dc323cf9e5042d23d2
?>
<div class="page">
    <div class="page-header">
        <h4 class="page-title">{{$form_supplier}}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $dashboard }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/supplier/list') }}">{{$list}}</a></li>
            <li class="breadcrumb-item"> <a href="{{ url('master/supplier') }}"> {{$input}} </a> </li>
            <li class="breadcrumb-item active">{{ $update}}</li>
        </ol>
    </div>
    

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{$general}}</h3>
            </div>
            <div class="panel-body">
               

                <form action="{{ url('master/supplier/update', ['suplr' => $suplr->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsForm" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        
                        <div class="col-lg-6">
                            <div class="example-wrap m-md-0">
                                <div class="example">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{$namesupplier}}</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name" name="name" required value="{{ $suplr->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{$addressupplier}}</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="address" id="address" rows="5" required> {{ $suplr->address }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{$country}}</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="country_id" name="country_id" required onchange="get_province()">
                                                    @foreach($countries as $country)
                                                
                                                    <option value="{{ $country->id }}" {{$country->id == $suplr->country_id ?'selected':''}}> {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{$province}}</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="province_id" name="province_id" required onchange="get_city()">
                                                    @foreach($province as $prov)
                                                        <option value="{{ $prov->id }}" {{$prov->id == $suplr->province_id ?'selected':''}}> {{ $prov->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">{{$city}}</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="city_id" name="city_id" required>
                                                    @foreach($city as $cty)
                                                        <option value="{{ $cty->id }}" {{$cty->id == $suplr->city_id ?'selected':''}}> {{ $cty->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    <!-- </form> -->
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-6">
                            <div class="example-wrap">
                                <div class="example">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">{{$phone}}</label>
                                            <div class="col-md-9">
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $suplr->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">{{$email}}</label>
                                            <div class="col-md-9">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $suplr->email }}">
                                            </div>
                                        </div>
                                        
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-primary btn-sm" type="submit">{{$save}}</button>
                                    <button class="btn btn-white btn-sm" type="reset">{{$cancel}}</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    

    function get_province(){
        var countryid = document.getElementById('country_id').value;

        if(countryid){
            $.ajax({
                    url: '/master/supplier/get_province/'+countryid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('select[name="province_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="province_id"]').append('<option value="'+key+'">'+value+'</option>');
                        })
                    }
                })
        }
    }

    function get_city(){
        var provinceid = document.getElementById('province_id').value;
        if(provinceid){
            console.log(provinceid);
            $.ajax({
                    url: '/master/supplier/get_city/'+provinceid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="city_id"]').append('<option value="'+key+'">'+value+'</option>');
                        })
                    }
                })
        }
    }
</script>

