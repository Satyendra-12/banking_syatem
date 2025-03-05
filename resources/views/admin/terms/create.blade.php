@extends('admin.layout.app')
@section('extra_css')
<style>
.note-btn-group .note-btn {
    border-color: rgba(0,0,0,.2);
    padding: 0.28rem 0.65rem;
    font-size: 13px;
    background: transparent;
}
</style>
@endsection

@section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Terms of Use</h1>
                <p class="breadcrumb-item mt-3" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span>
                    {{-- <span><a href="{{ route('admin.terms') }}"><i class="mdi mdi-chevron-right" style="color:black;">Terms of Use</i></a></span> --}}
                    <span><i class="mdi mdi-chevron-right">Add Terms of Use</i></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-vendor-list card card-default">
                    <div class="card-header">
                        Add Terms of Use
                    </div>
                    <div class="card-body">
                        <form action="{{ route('terms.save.update') }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for=" Location Name">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $getdata->title }}">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for=" Location Name">Description</label>
                                    <textarea type="text" class="form-control summernote" name="description">{{ $getdata->discription }}</textarea>
                                </div>
                                
                            </div>
                           
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote({
            height: 400
          });
        });
    </script>
@endsection

