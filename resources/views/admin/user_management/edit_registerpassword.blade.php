@extends('admin.layout.app')
@section('extra_css')

    
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> --}}
<style>
   
     .note-btn-group .note-btn {
        border-color: rgba(0,0,0,.2);
        padding: 0.28rem 0.65rem;
        font-size: 13px;
        background: transparent;
    } 
    .btn {
        color: black !important;
    }
    li {
    list-style: inside !important;
}
 .hidden {
            display: none;
        }

    </style>
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Bank Password</h1>
                    <p class="breadcrumb-item mt-3" style="color:black;"><span><a href="{{ route('admin.dashboard') }}"
                                style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.registeruser') }}"><i class="mdi mdi-chevron-right"
                                    style="color:black;">Update Bank Password

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Edit Bank password
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Bank Password Information
                        </div>

                        <div class="card-body">
                            <form id="update_registerpassword">
                                <div class="row">

                                    {{-- <div class=" col-6 form-group"> --}}
                                    {{-- <label for="orga">Organizations</label> --}}
                                    <input type="hidden" name="id" value="{{ $registeredit->id }}">

                                    {{-- <select id="orga" name="organization" class="form-control" required>
                                          <option value="">Select the Organization Name</option>
                                          
                                          <option {{($registeredit->organization) == "Banking Company" ? 'selected' : '' }} value="Banking Company">Banking Company</option>
                                          <option {{($registeredit->organization) == "Audit Firm" ? 'selected' : ''}} value="Audit Firm">Audit Firm</option>
                                          <option {{($registeredit->organization) == "Insurance Company" ? 'selected' : ''}} value="Insurance Company">Insurance Company</option>
                                          <option {{($registeredit->organization) == "Financial Services" ? 'selected' : ''}} value="Financial Services">Financial Services</option>
                                          <option {{($registeredit->organization) == "Support Services" ? 'selected' : ''}} value="Support Services">Support Services</option>
                                          <option {{($registeredit->organization) == "Other Services" ? 'selected' : ''}} value="Other Services">Other Services</option>
                                        </select>
                                    </div> --}}
                                   
                                    <div class="col-6">
                                        <label for=" Password ">Password</label>
                                        <input type="password" class="form-control" name="password"
                                         placeholder="Enter password">


                                    </div>
<br>

                                    <div>
                                        <button type="submit" class="btn btn-primary" style="color: white !important;margin-top: 10px;">Update</button>
                                        {{-- <a href="{{ route('admin.packagepage') }}" class="btn btn-primary btn-sm">cancel</a> --}}
                                    </div>
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
        $(function() {

            $('#update_registerpassword').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatepasswordregisteruser') }}",
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
            
        });
    </script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       $('.summernote').summernote({
           height: 50
       });
   });
</script> --}}
@endsection
