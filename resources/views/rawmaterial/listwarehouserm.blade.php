@extends('layoutapp.mainmenu')
@section('title','Raw Material')

<meta name="csrf-token" content="{{ csrf_token() }}">
<body class="animsition">
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Warehouse Raw Material</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">List</li>
        </ol>
        <br>
        @include('layoutapp.alerts')
    </div>
    
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
                <h4 class="panel-title">
                    <!-- Warehouse Raw Material -->
                </h4>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table style="font-size:12px" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                        <thead>
                            <tr>
                                <th>Item Product</th>
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
                                
                                <th>Invoice Size</th>
                                <th>Phisic Size</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warehouserm as $w)
                               <tr>
                                    <td> {{ implode(',', $w->itemProduct()->get()->pluck('productcode')->toArray()) }}</td>
                                   <td> {{ $w->arrival_date }}</td>
                                   <td> {{ $w->partai }}</td>
                                   <td> {{ implode(',', $w->species()->get()->pluck('name')->toArray()) }} </td>
                                   <td> {{ implode(',', $w->category()->get()->pluck('name')->toArray()) }}</td>
                                   <td> {{ implode(',', $w->supplier()->get()->pluck('name')->toArray()) }}</td>
                                   <td> {{ implode(',', $w->grade()->get()->pluck('name')->toArray()) }}</td>

                                   <td> {{ $w->pcs }}</td>
                                   <td> {{ $w->m2 }}</td>
                                   <td> {{ $w->m3 }}</td>

                                   <td> {{ implode(',', $w->approvalto()->get()->pluck('username')->toArray()) }}</td>
                                   <td align="center">
                                        @if($w->status == '0')
                                            <span class="badge badge-info">Waiting</span>
                                        @elseif($w->status == '1')
                                            <span class="badge badge-primary">Approved</span>
                                        @elseif($w->status == '2')
                                            <span class="badge badge-danger">Rejected</span>
                                        @else
                                            <span class="badge badge-warning">Send Approval</span>
                                            &nbsp
                                            <a class="sendforapprove" data-placement="top" data-toggle="tooltip" data-original-title="Click. Send for Approval" data-id="{{ $w->id }}">    
                                                <i class="icon fa-send-o" aria-hidden="true"> </i>
                                            </a>
                                        @endif
                                    </td>


                                   
                                    <td>{{ implode(',', $w->invDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $w->invDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $w->invDimention()->get()->pluck('length')->toArray()) }}</td>
                                    <td>{{ implode(',', $w->phisDimention()->get()->pluck('thick')->toArray()) }} x {{ implode(',', $w->phisDimention()->get()->pluck('width')->toArray()) }} x {{ implode(',', $w->phisDimention()->get()->pluck('length')->toArray()) }}</td>
                                    
                                    
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
