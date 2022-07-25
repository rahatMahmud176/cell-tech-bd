@extends('back-end.master')
@section('title')
    Edit Brand
@endsection
@section('main-content')
<div class="page-content">
    <div class="container-fluid row">
    
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body"> 
                     
        
                </div>
            </div>
        </div> <!-- end col -->
    
    
    
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
    
                <h4 class="card-title">Brand Add Form:-</h4>  
    
                {{ Form::open(['route'=>['brand.update',$brand->id],'method'=>'POST','class'=>'custom-validation','enctype'=>'multipart/form-data']) }}
                    @method('PUT')
                <div class="mt-3">
                    <label>Title</label> 
                    <input type="text" required maxlength="20" name="title" class="form-control" id="thresholdconfig" value="{{ $brand->title }}" />
                </div>   

                <div class="form-group">
                    <label class="control-label"> Brand Image:- </label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*">
                        <label class="custom-file-label" for="customFile">Choose Image (201x204)</label>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="control-label">Category Select</label>
                    <select name="category_id" class="form-control select2">
                        @foreach ($categories as $item)
                            <option {{ $item->id == $brand->category_id?'selected':'' }} value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach 
                    </select> 
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