@extends('back-end.master')
@section('title')
    Edit Slider
@endsection
@section('main-content')
<div class="page-content">
    <div class="container-fluid row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
        
                    <h4 class="card-title">Slider Add Form:-</h4>  
        
                    {{ Form::open(['route'=>['slider.update',$slider->id],'method'=>'POST','class'=>'custom-validation','enctype'=>'multipart/form-data']) }}
                        @method('PUT')
        
                    <div class="form-group">
                        <label class="control-label"> Slider Image:- </label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*" value="{{ $slider->image }}">
                            <label class="custom-file-label" for="customFile">Choose Image (800x500)</label>
                        </div>
                    </div> 
                    <label>Slider small title:-</label> 
                    <input type="text" class="form-control" required maxlength="35" name="small_title" id="defaultconfig" value="{{ $slider->small_title }}" />
                         
                        
                    <div class="mt-3">
                        <label>Slider title </label> 
                        <input type="text" required maxlength="35" name="title" class="form-control" id="thresholdconfig" value="{{ $slider->title }}" />
                    </div>   
                        
                    <div class="mt-3">
                        <label>Discription:-</label> 
                        <textarea id="textarea" required name="description" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars.">{{ $slider->description }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Price:- </label>
                         <input class="form-control" required max="9999999" type="number" name="price" id="" value="{{ $slider->price }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Button text:- </label>
                         <input class="form-control" required maxlength="10" type="text" name="button_text" id="" value="{{ $slider->button_text }}">
                    </div>
                    <div class="mt-3">
                        <label>Button Link:-</label> 
                        <textarea id="textarea" required name="button_link" class="form-control" maxlength="225" rows="3">{{ $slider->button_link }}</textarea>
                    </div>
         
                        <div class="form-group mt-1">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Update
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

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        
                        <img src="{{ asset('/') }}cell-tech-logo-removebg-preview.png" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

    </div>

   
</div>
@endsection