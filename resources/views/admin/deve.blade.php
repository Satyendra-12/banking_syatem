@extends('admin.layout.app')
@section('extra_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <h1 style="
            font-weight: 100;
            color: black;
        "><i class="fa fa-th-large" style="
    color: skyblue !important;
    padding-right: 15px;
" aria-hidden="true"></i>Developer Hub</h1>
            <hr />
            <div class="card" style="border-radius: 2px !important;border: 2px solid lightgray;background:white;">
                
                    <div class="row" style="
                    color:black !important;margin:20px;
                        ">
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="mdi mdi-image-area" style="
                        color: gray !important;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>Image Settings</b></text>
                                <p>Set the maximum dimensions for member image uploads</p>
                            </div></div>
                        </div>
                        </div>
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="mdi mdi-auto-fix" style="
                        color: gray !important;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>Autosuggest Settings</b></text>
                                <p>Create and manage keyword autosuggestion settings</p>
                            </div></div>
                        </div>
                        </div>
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="fa fa-random" style="
                        color: gray !important;padding-top:9px;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>301 Redirects</b></text>
                                <p>Create and manage 301 redirect rules for web pages</p>
                            </div></div>
                        </div>
                        </div>
                    </div>
                    
                    <div class="row" style="
                    color:black !important;margin:20px;
                        ">
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="mdi mdi-console" style="
                        color: gray !important;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>HTACCESS File</b></text>
                                <p>Customize or reset the website's HTACCESS file</p>
                            </div></div>
                        </div>
                        </div>
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="fa fa-compass" style="
                        color: gray !important;
                        font-size: 33px;padding-top:9px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>Robots file</b></text>
                                <p>Customize or reset the website's Robots.txt file</p>
                            </div></div>
                        </div>
                        </div>
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="fa fa-server" style="
                        color: gray !important;padding-top:9px;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>cPanel Dashboard</b></text>
                                <p>Access the website's cPanel dashboard and tools</p>
                            </div></div>
                        </div>
                        </div>
                    </div>
                    

                    <div class="row" style="
                    color:black !important;margin:20px;
                        ">
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 0px 12px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="fa fa-database" style="
                        color: gray !important;
                        font-size: 33px;padding-top:9px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>MySQL Database</b></text>
                                <p>Access and manage the website's MySQL Database</p>
                            </div></div>
                        </div>
                        </div>
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 8px 0px 8px 10px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="fa fa-link" style="
                        color: gray !important;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>Webhooks</b></text>
                                <p>Activate and edit Webhook Links</p>
                            </div></div>
                        </div>
                        </div>
                        <div class="col">
                            <div class="row">
                           <div class="col-2" style="
                           
                           background: #f3f3f3;
                           padding: 0px 0px 8px 8px;
                           border-radius: 4px;
                           margin: 7px;
                       
                       "> <i class="fa fa-code" style="
                        color: gray !important;padding-top:9px;
                        font-size: 33px;
                        "></i></div>
                            <div class="col"><div> <text style="
                                font-size: large;
                                color: deepskyblue;
                            "><b>Generate API Key</b></text>
                                <p>Activate API Credentials</p>
                            </div></div>
                        </div>
                        </div>
                    </div>
                    
                      {{-- <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    
                  {{-- </div> --}}


            

          


        </div>
        </div>
    </div>
@endsection

                          