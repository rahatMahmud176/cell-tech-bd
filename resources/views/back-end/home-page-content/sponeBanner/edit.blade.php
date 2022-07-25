@extends('back-end.master')
@section('title')
    Special offer One Banner Manage
@endsection

@section('main-content')
<div class="page-content">
    <div class="container-fluid row">
    
        <div class="col-xl-6">
             
        </div> 
        <!-- end col -->
    
    
    
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
    
                <h4 class="card-title">Special Offer Banner Add Form:-</h4>  
    
                {{ Form::open(['route'=>['sponeBanner.update',$banner->id],'method'=>'POST','class'=>'custom-validation','enctype'=>'multipart/form-data']) }}
                @method('PUT')
    
                <div class="form-group">
                    <label class="control-label">Image:- </label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*">
                        <label class="custom-file-label" for="customFile">Choose Image (512x600)</label>
                    </div>
                </div>  
                    
                <div class="mt-3">
                    <label>Banner Header </label> 
                    <input type="text" required maxlength="30" name="title" class="form-control" id="thresholdconfig" value="{{ $banner->title }}" />
                </div>   
                    
                <div class="mt-3">
                    <label>Discription:-</label> 
                    <textarea id="textarea" required name="description" class="form-control" maxlength="100" rows="3"  >{{ $banner->description }}</textarea>
                </div> 
                 
                <div class="form-group">
                    <label class="control-label">Price:- </label>
                     <input class="form-control" required maxlength="10" type="text" name="price" id="" value="{{ $banner->price }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Cut Price:- </label>
                     <input class="form-control" required maxlength="10" type="text" name="cut_price" id="" value="{{ $banner->cut_price }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Discount Percentage:- </label>
                     <input class="form-control" required max="100" type="number" name="discount_percentage" id="" value="{{ $banner->discount_percentage }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Button text:- </label>
                     <input class="form-control" required maxlength="10" type="text" name="button_text" id="" value="{{ $banner->button_text }}">
                </div>
                <div class="mt-3">
                    <label>Button Link:-</label> 
                    <textarea id="textarea" required name="button_link" class="form-control" maxlength="225" rows="3">{{ $banner->button_link }}</textarea>
                </div>
     
                    <div class="form-group mt-1">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Update
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