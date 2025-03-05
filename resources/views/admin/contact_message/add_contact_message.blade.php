@extends('admin.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1 class="mt-2">Contact Message</h1>
                    <p class="breadcrumb-item mt-3">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><a href="{{ route('admin.blogpage') }}"><i class="mdi mdi-chevron-right">Contact Message</i></a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Add Message
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Contact Message Informations
                        </div>

                        <div class="card-body">
                            <form id="addblog">
                                <div class="row">

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name"> Name </label>
                                        <input type="text" class="form-control" name="blog"
                                            placeholder="Enter User Name">
                                    </div>

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Message </label>
                                        <select name="category_id" id="" class="form-control">
                                            {{-- <option value="">-Select-</option>
                                        @foreach ($category as $categories)
                                          <option value="{{$categories->id}}">{{$categories->category_name}}</option> --}}
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Reply</label>
                                        <input type="file" class="form-control" name="banner"
                                            accept="image/png,image/jpg,image/jpeg">
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for=" Location Name">Description</label>
                                        <textarea name="description" id="summernote" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                                    {{-- <a href="{{ route('admin.categoriesPage') }}" class="btn btn-primary btn-sm">cancel</a> --}}
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
@endsection
