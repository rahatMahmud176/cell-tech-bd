@extends('back-end.master')
@section('title')
    Size manage
@endsection

@section('main-content')
<div class="page-content">
    <div class="container-fluid row">
    
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
        
                    <h4 class="card-title">Size Manage</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table project-list-table table-nowrap table-centered table-borderless">
                                        <thead>
                                            <tr> 
                                                <th scope="col">#</th> 
                                                <th scope="col">Title</th> 
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i= 1;
                                            @endphp
                                            @foreach ($sizes as $item)
                                                
                                            
                                            <tr> 
                                               
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{ $i++ }}</a></h5>
                                                 
                                                </td>  
                                                <td> {{ $item->title }}</td> 
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"> 
                                                            <a class="dropdown-item" href="{{ route('size.deleteAlert',['id'=>$item->id]) }}">Delete</a>  
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                             
                                        @endforeach    
    
                                             
                                             
                                             
    
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
                     
        
                </div>
            </div>
        </div> <!-- end col -->
    
    
    
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
    
                <h4 class="card-title">Size Add Form:-</h4>  
    
                {{ Form::open(['route'=>'size.store','method'=>'POST','class'=>'custom-validation','enctype'=>'multipart/form-data']) }}
     
    
                <div class="mt-3">
                    <label>Title</label> 
                    <input type="text" required maxlength="20" name="title" class="form-control" id="thresholdconfig" />
                </div> 
     
                    <div class="form-group mt-1">
                        <div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                Save
                            </button>
                            <button type="reset" class="btn btn-danger waves-effect">
                                Reset
                            </button>
                        </div>
                    </div>
                {{ Form::close() }}
    
            </div>
        </div>
    </div> <!-- end col -->
    
    
    
    </div>
    </div>
@endsection