@extends('back-end.master')
@section('title')
    Category manage
@endsection

@section('main-content')
    <div class="page-content">
        <div class="container-fluid row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Category Manage</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="table-responsive">
                                        <table
                                            class="table project-list-table table-nowrap table-centered table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 100px">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($categories as $item)
                                                    <tr>
                                                        <td><img src="{{ $item->image }}" alt="" class="avatar-sm">
                                                        </td>

                                                        <td>
                                                            <h5 class="text-truncate font-size-14"><a href="#"
                                                                    class="text-dark">{{   $item->title }}</a></h5>

                                                        </td>
                                                        @if ($item->status == 1)
                                                            <td><span class="badge badge-success">Actived</span></td>
                                                        @else
                                                            <td><span class="badge badge-warning">Deactived</span></td>
                                                        @endif

                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle card-drop"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('category.edit', $item->id) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('category.deleteAlert', ['id' => $item->id]) }}">Delete</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('category.edit', $item->id) }}">Status
                                                                        change</a>
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

                        <h4 class="card-title">Category Add Form:-</h4>

                        {{ Form::open(['route' => 'category.store', 'method' => 'POST', 'class' => 'custom-validation', 'enctype' => 'multipart/form-data']) }}


                        <div class="form-group">
                            <label class="control-label"> Category Image:- </label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile" required
                                    accept="image/*">
                                <label class="custom-file-label" for="customFile">Choose Image (201x204)</label>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label>Title</label>
                            <input type="text" required maxlength="20" name="title" class="form-control"
                                id="thresholdconfig" />
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
