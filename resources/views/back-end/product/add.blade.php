@extends('back-end.master')
@section('title')
    Product Add
@endsection
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Add Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Product Information</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            {{ Form::open(['route' => 'product.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="productname">Product Name</label> <small>(maxlength 20
                                            charecter)</small>
                                        <input id="productname" name="title" maxlength="25" type="text"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Category</label>
                                        <select name="category_id" class="form-control select2" id="productCategory">
                                            <option disabled selected value="">Select</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Brand</label>
                                        <select name="brand_id" class="form-control select2" id="productBrand">
                                            <option disabled selected>Select</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Colors</label>

                                        <select name="colors[]" class="select2 form-control select2-multiple"
                                            multiple="multiple">
                                            @foreach ($colors as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label">Sizes/GB/mAh</label>

                                        <select name="sizes[]" class="select2 form-control select2-multiple"
                                            multiple="multiple">
                                            @foreach ($sizes as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="input-group form-group ">
                                        <label for="" class="input-group">Price</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Purchase & Sell Price</span>
                                        </div>
                                        <input type="text" name="price" class="form-control">
                                        <input type="text" name="sell_price" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="productdesc">Short Description</label>
                                        <textarea name="short_description" class="form-control" id="productdesc" rows="5"></textarea>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Features Image:- <small>(337x335)</small></h4>
                                        <p class="card-title-desc">The file input is the most gnarly of the bunch and
                                            requires additional JavaScript if</p>
                                        <div class="custom-file">
                                            <input type="file" name="image" accept="image/*" class="custom-file-input"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div>


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Other Images:- <small>(1000x667 / max:4) </small></h4>
                                        <p class="card-title-desc">The file input is the most gnarly of the bunch and
                                            requires additional JavaScript if</p>
                                        <div class="custom-file">
                                            <input type="file" name="other_image[]" accept="image/*"
                                                class="custom-file-input" multiple id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-->
                        </div>

                    </div>


                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h4 class="card-title">Discription</h4>
                                        <p class="card-title-desc">Your Product Description here:</p>
                                        <textarea name="description" class="summernote" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save
                                Changes</button>
                            <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    <!-- end main content-->
@endsection
