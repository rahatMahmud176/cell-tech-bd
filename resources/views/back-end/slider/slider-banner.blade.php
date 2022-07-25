@extends('back-end.master')
@section('title')
    Slider Banner
@endsection
@section('main-content')
<div class="page-content">
    <div class="container-fluid row">
    
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
        
                    <h4 class="card-title">Slider Manage</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table project-list-table table-nowrap table-centered table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 100px">#</th>
                                                <th scope="col">Title</th> 
                                                <th scope="col">Status</th>  
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            @foreach ($sliderBanners as $item)
                                                
                                            
                                            <tr>
                                                <td><img src="{{ $item->image }}" alt="" class="avatar-sm"></td>
                                               
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{ $item->title }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $item->product_name }}</p>
                                                </td> 
                                                @if ($item->status==1)
                                                <td><span class="badge badge-success">Actived</span></td>
                                                    
                                                @else
                                                <td><span class="badge badge-warning">Deactived</span></td> 
                                                @endif
                                               
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ route('slider-banner.edit',$item->id) }}">Active</a>
                                                            <a class="dropdown-item" href="{{ route('slider-banner.delete-alert',['id'=>$item->id]) }}">Delete</a> 
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
    
                <h4 class="card-title">Slider Add Form:-</h4>  
    
                {{ Form::open(['route'=>'slider-banner.store','method'=>'POST','class'=>'custom-validation','enctype'=>'multipart/form-data']) }}
     
    
                <div class="form-group">
                    <label class="control-label"> Banner Image:- </label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile" required accept="image/*">
                        <label class="custom-file-label" for="customFile">Choose Image (370x250)</label>
                    </div>
                </div> 
                <label>Product Name:-</label> 
                <input type="text" class="form-control" required maxlength="20" name="product_name" id="defaultconfig" />
                     
                    
                <div class="mt-3">
                    <label>Banner Small Title  </label> 
                    <input type="text" required maxlength="20" name="small_title" class="form-control" id="thresholdconfig" />
                </div>  

                <div class="form-group">
                    <label class="control-label">Price:- </label>
                     <input class="form-control" required max="9999999" type="number" name="price" id="">
                </div> 
                <label>Header:-</label> 
                <input type="text" class="form-control" required maxlength="35" name="header" id="defaultconfig" />
                  

                <div class="mt-3">
                    <label>Small Discription:-</label> 
                    <textarea id="textarea" required name="description" class="form-control" maxlength="125" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                </div>
                
                
                <div class="form-group">
                    <label class="control-label">Button text:- </label>
                     <input class="form-control" required maxlength="10" type="text" name="button_text" id="">
                </div>
                <div class="mt-3">
                    <label>Button Link:-</label> 
                    <textarea id="textarea" required name="button_link" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                </div>
     
                    <div class="form-group mt-1">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
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