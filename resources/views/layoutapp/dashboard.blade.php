@extends('layoutapp.mainmenu')
@section('title','Dashboard')

<link rel="stylesheet" href="{{asset('examples/css/dashboard/ecommerce.css') }}">

<div class="page">
    <div class="page-header">
        <h1 class="page-title font-size-26 font-weight-100">LAYO SF Overview</h1>
    </div>

    <div class="page-content container-fluid">
        <div class="row">
          <!-- First Row -->
            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-warning">
                    <i class="icon wb-shopping-cart"></i>
                    </button>
                    <span class="ml-15 font-weight-400">ORDERS</span>
                    <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                </i>
                    <span class="font-size-40 font-weight-100">399</span>
                    <p class="blue-grey-400 font-weight-100 m-0">+45% From previous month</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-danger">
                    <i class="icon fa-dollar"></i>
                    </button>
                    <span class="ml-15 font-weight-400">INCOM</span>
                    <div class="content-text text-center mb-0">
                    <i class="text-success icon wb-triangle-down font-size-20">
                </i>
                    <span class="font-size-40 font-weight-100">$18,628</span>
                    <p class="blue-grey-400 font-weight-100 m-0">+45% From previous month</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon wb-eye"></i>
                    </button>
                    <span class="ml-15 font-weight-400">VISITORS</span>
                    <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                </i>
                    <span class="font-size-40 font-weight-100">23,456</span>
                    <p class="blue-grey-400 font-weight-100 m-0">+25% From previous month</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-primary">
                    <i class="icon wb-user"></i>
                    </button>
                    <span class="ml-15 font-weight-400">CUSTOMERS</span>
                    <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                </i>
                    <span class="font-size-40 font-weight-100">4,367</span>
                    <p class="blue-grey-400 font-weight-100 m-0">+25% From previous month</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>