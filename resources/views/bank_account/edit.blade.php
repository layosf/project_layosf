@extends('layoutapp.mainmenu')
@section('title','Bank Account')

<div class="page">
    <div class="page-header">
        <h4 class="page-title">Form Bank Account</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('master/bankaccount/list') }}"> List</a></li>
            <li class="breadcrumb-item "><a href="{{ route('master.bankaccount') }}">Input</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">General</h3>
            </div>

            <div class="panel-body">
               
                <form action="{{ url('master/bankaccount/update', ['ba'=>$ba->id]) }}" method="post" class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                @csrf
                    <div class="row row-lg">
                        
                        <div class="col-lg-6">
                            <div class="example-wrap m-md-0">
                                <div class="example">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left"> Account Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="accountname" name="accountname" required value="{{ $ba->accountname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">Account No</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="accountno" id="accountno" required value="{{ $ba->accountno}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label text-left">Bank</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="bank_id" name="bank_id" required >
                                                    @foreach($banks as $bank)
                                                    <option value="{{ $bank->id }}" {{ $bank->id == $ba->bank_id ? 'selected':''}} > {{ $bank->namebank }}</option>
                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-6">
                            <div class="example-wrap">
                                <div class="example">
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Phone</label>
                                        <div class="col-md-9">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$ba->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Address</label>
                                        <div class="col-md-9">
                                        <textarea class="form-control" id="address" name="address"> {{ $ba->address}} </textarea>
                                        </div>
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
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


