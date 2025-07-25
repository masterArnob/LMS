@extends('admin.layout.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Manage Orders
                    </h2>
                </div>
            
            
            </div>
        </div>
    </div>
    <!-- Page header -->
    
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table id="dataTableExample" class="table table-vcenter card-table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>invoice id</th>
                                    <th>transaction id</th>
                                    <th>buyer</th>
                                    <th>paid amount</th>
                                    <th>payment method</th>
                                    <th>currency</th>
                                    <th>status</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                     
                
                             @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                     <td>{{ $order->invoice_id }}</td>
                                       <td>{{ $order->transaction_id }}</td>

                                       <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->paid_amount }}</td>
                                         <td>{{ $order->payment_method }}</td>
                                          <td>{{ $order->currency }}</td>
                                      
                                     

                                        <td>
                                              @if ($order->status == 'pending')
                                                    <span class="badge badge-outline text-orange">Pending</span>
                                              @elseif ($order->status == 'approved')
                                                 <span class="badge badge-outline text-green">Approved</span>
                                              @endif



                                   
                                      
                                    
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}" class="btn btn-icon" aria-label="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </a>
                                          
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <div class="empty">
                                                <div class="empty-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                        <path d="M9 10l.01 0"></path>
                                                        <path d="M15 10l.01 0"></path>
                                                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                                                    </svg>
                                                </div>
                                                <p class="empty-title">No instructors found</p>
                                                <p class="empty-subtitle text-secondary">
                                                    Try adjusting your search or filter to find what you're looking for.
                                                </p>
                                           
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                       
                             
                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
@endsection