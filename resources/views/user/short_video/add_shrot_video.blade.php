@extends('user.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Short</h1>
                    <p class="breadcrumb-item mt-3">
                        <span><a href="{{ route('user.dashbord') }}">{{ __('lang.dashboard') }}</a></span>
                        <span><a href="{{ route('user.shortVideo') }}"><i class="mdi mdi-chevron-right">
                                    {{ __('lang.short') }}</i></a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>{{ __('lang.add_short') }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            {{ __('lang.short_informations') }}
                        </div>

                        <div class="card-body">
                            <form id="addshort" enctype="multipart/form-data">
                                <div class="row">

                                    <div class=" col-6 form-group">
                                        <label for=" Titel">{{ __('lang.title') }}</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="{{ __('lang.enter_title_name') }}">
                                    </div>

                                    <div class=" col-6 form-group">
                                        <label for=" Video">{{ __('lang.video') }}</label>
                                        <input type="file" class="form-control" name="video">
                                    </div>
                                </div>
                                <div class="row">


                                    {{-- <div class="col-6">
                                    <div id="subcategory">
                                        <label for="Subcategory Name">Subcategory Name</span></label>

                                        <select name="subcategor_id" class="form-control" id="subcategor_id">
                                            <option value="">Select Subcategories</option>

                                        </select>
                                    </div>

                                </div> --}}

                                    {{-- <div class=" col-6 form-group">
                                    <label for=" Location Name">Banner</label>
                                    <input type="file" class="form-control" name="banner"
                                        accept="image/png,image/jpg,image/jpeg">
                                </div> --}}


                                </div>
                                {{-- <div class="row">
                                <div class="col-12 form-group">

                                    <label for="tags">Tags <span>Use Comman Separate Key</span></label>
                                <input type="text" class="form-control" name="tags" placeholder="Enter Tags or keywords">

                                </div>
                            </div> --}}

                                {{-- <div class="row">

                                <div class="col-12 form-group">
                                    <label for=" Location Name">Description</label>
                                    <textarea name="description" id="summernote" cols="30" rows="3" class="form-control"></textarea>
                                </div>

                            </div> --}}

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">{{ __('lang.create') }}</button>
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
    <script>
        $('#addshort').on('submit', function(e) {
            e.preventDefault()
            let fd = new FormData(this)
            fd.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('user.storeshortvideo') }}",
                type: "POST",
                data: fd,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#login-button').prop('disabled', true);
                    $('.loader').show();
                },
                success: function(result) {
                    if (result.status) {
                        iziToast.success({
                            title: '',
                            message: result.msg,
                            position: 'topRight'
                        });

                        setTimeout(function() {
                            window.location.href = result.location;
                        }, 500);
                    } else {
                        iziToast.error({
                            title: '',
                            message: result.msg,
                            position: 'topRight'
                        });
                    }
                },
                complete: function() {
                    $('.loader').hide();
                },
                error: function(jqXHR, exception) {
                    $('.loader').hide();
                    console.log(jqXHR.responseText);
                }
            });
        })
    </script>
@endsection
