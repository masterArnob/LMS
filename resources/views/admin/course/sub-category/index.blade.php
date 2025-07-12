@extends('admin.layout.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Manage Course Sub Categories
                    </h2>
                </div>
                    <div class="col-auto">
                    <a href="{{ route('admin.sub-category.create') }}" class="btn btn-primary">
                        Create New
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
                                 
                           
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                               
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                     
                    
                             @forelse ($subCats as $subCat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                     

                                       <td>{{ $subCat->name }}</td>

                                        <td>{{ $subCat->category->name }}</td>
                                      
                                     

                                  



                                        <td>
                                            @if ($subCat->status == 'active')
                                                <span class="badge badge-outline text-green">Active</span>
                                            @elseif ($subCat->status == 'inactive')
                                              <span class="badge badge-outline text-orange">Inactive</span>
                                         
                                            @endif
                                        </td>
                                      
                                    
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('admin.sub-category.edit', $subCat->id) }}" class="btn btn-icon" aria-label="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.sub-category.destroy', $subCat->id) }}" class="delete-item btn btn-icon" aria-label="Delete" data-bs-toggle="modal" data-bs-target="#modal-danger">
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