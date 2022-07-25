@extends('back-end.master')
@section('title')
    Product Manage
@endsection
@section('main-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 100px">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Colors</th>
                                    <th scope="col">Sizes</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($products as $item) 
                                <tr>
                                    <td><img src="{{ asset($item->image) }}" alt="" class="avatar-sm"></td>
                                    <td>
                                        <h5 class="text-truncate font-size-14"><span class="text-dark">{{ $item->title }} <span class="badge" style="background: {{ $item->status==1?'#47965f':'#fa320f' }}; color:white;">{{ $item->status==1?'published':'Unpublished' }}</span></span></h5>
                                        <p class="text-muted mb-0">{{ $item->short_description }}</p>
                                    </td>
                                    <td>{{ $item->sell_price }}</td>
                                    <td>
                                        @foreach ($item->productColors as $productcolor)
                                            <span class="badge" style="background: {{ $productcolor->colors->code }}; color:white;">{{ $productcolor->colors->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($item->productSizes as $productSize)
                                            <span>({{ $productSize->sizes->title }})</span>
                                         @endforeach
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"> 
                                                <a class="dropdown-item" href="{{ route('status-change',['id'=>$item->id]) }}">@if ($item->status==1)
                                                    Pused
                                                @else
                                                    Unpused
                                                @endif</a>
                                                <a class="dropdown-item" href="{{ route('product.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('product.deleteAlert',['id'=>$item->id]) }}">Delete</a>
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
        <!-- end row -->
    </div>
</div>
@endsection