@extends('admin.layout.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Manage News Letter
                    </h2>
                </div>
                    <div class="col-auto">
                    <a href="#" class="btn btn-primary">
                        Do Something
                    </a>
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
                                    <th>Email Address</th>
                                    <th>Created At</th>

                               
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                     
                             @forelse ($subs as $sub)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sub->email }}</td>
                                        <td>{{ date('d M Y', strtotime($sub->created_at)) }}</td>



                                 
                                      
                                    
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                          
                                                <a href="{{ route('admin.news-letter.destroy', $sub->id) }}" class="delete-item btn btn-icon" aria-label="Delete" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
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
                                                <p class="empty-title">No data found</p>
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