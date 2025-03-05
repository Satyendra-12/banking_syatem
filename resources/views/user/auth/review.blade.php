@extends('user.layout.app')
@section('extra_css')
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>All Reviews</h1>
                    <p class="breadcrumbs">


                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            All Rating out of 5
                            <div class="table-responsive" style="
                            overflow-x: scroll !important;
                        ">
                                <table id="rtabel" class="table brand_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Overall Rating</th>
                                            <th>EXPERTISE</th>
                                            <th>COMMUNICATION</th>
                                            <th>SERVICE</th>
                                            <th>RESULTS</th>
                                            <th>RESPONSIVENESS</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($review as $key => $reviewdata)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $reviewdata->rating }}</td>
                                            <td>{{ $reviewdata->rating2 }}</td>
                                            <td>{{ $reviewdata->rating3 }}</td>
                                            <td>{{ $reviewdata->rating4 }}</td>
                                            <td>{{ $reviewdata->rating5 }}</td>
                                            <td>{{ $reviewdata->rating6 }}</td>
                                            <td>{{ $reviewdata->name }}</td>
                                            <td>{{ $reviewdata->email }}</td>
                                            <td>{{ $reviewdata->phone_number }}</td>
                                            <td>{{ $reviewdata->reviews }}</td>
                                       
                                        </tr>@endforeach

                                    </tbody> 

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    {{-- <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script> --}}
    <script>
        // $(function() {
        $('#rtabel').dataTable({
            "processing": true,
            pageLength: 10,
            "serverSide": true,
            "bDestroy": true,
            'checkboxes': {
                'selectRow': true
            },

            "ajax": {
                url: "{{ route('user.reviewajaxlist') }}",
                "type": "POST",
                "data": function(d) {
                    d._token = "{{ csrf_token() }}";
                },
                dataFilter: function(data) {
                    var json = jQuery.parseJSON(data);
                    json.recordsTotal = json.recordsTotal;
                    json.recordsFiltered = json.recordsFiltered;
                    json.data = json.data;
                    return JSON.stringify(json); // return JSON string
                }

            },
            "order": [
                [0, 'desc']
            ],
            "columns": [{
                    "targets": 0,
                    "name": "id",
                    'searchable': true,
                    'orderable': true,
                },
                {
                    "targets": 1,
                    "name": "rating",
                    'searchable': true,
                    'orderable': false
                },

                {
                    "targets": 2,
                    "name": "rating1",
                    'searchable': false,
                    'orderable': false,
                },

                {
                    "targets": 3,
                    "name": "rating2",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 4,
                    "name": "rating3",
                    'searchable': false,
                    'orderable': false
                },
                {
                    "targets": 5,
                    "name": "rating4",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 6,
                    "name": "rating5",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 7,
                    "name": "rating6",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 8,
                    "name": "name",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 9,
                    "name": "email",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 10,
                    "name": "phone",
                    'searchable': false,
                    'orderable': false,
                },
                {
                    "targets": 11,
                    "name": "reviews",
                    'searchable': false,
                    'orderable': false,
                },
                //
                //  {
                //     "targets": 5,
                //     "name": "action",
                //     'searchable': false,
                //     'orderable': false
                // },





            ]
        });
        // });

        //delete sweet alert
    </script>
@endsection
