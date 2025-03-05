@extends('frontend.layout.app')

@section('extra_css')
<style>
    #first_container {
        overflow-wrap: break-word;
    color: black;
    background: white;

    }
    </style>
@endsection

@section('content')


<div class="container-fluid" style="margin-top:10px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="homepage-sections fr-view">
                <div class=" w3-display-container">
                    <img class="mySlides2" src="{{ asset("assets\img\banner\image\bannerim.jpg") }}"
                    style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">
                

                    {{-- <img class="mySlides2" src="{{ asset('frontend/img/bank_2.jpg') }}"
                    style="width:100%;height:400px;border-radius:0px !important;">
                <img class="mySlides2" src="{{ asset('frontend/img/bank_3.jpg') }}"
                    style="width:100%;height:400px;border-radius:0px !important;">
                <img class="mySlides2" src="{{ asset('frontend/img/bank_4.jpg') }}"
                    style="width:100%;height:400px;border-radius:0px !important;">

                <img class="mySlides2" src="{{ asset('frontend/img/bank_1.jpg') }}"
                    style="width:100%;height:400px;border-radius:0px !important;"> --}}

                    <button class="w3-button w3-black w3-display-left"
                        style="border-radius:0px !important;background:blue !important;"
                        onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-black w3-display-right"
                        style="border-radius:0px !important;background:blue !important;" id="autoSlideAs"
                        onclick="plusDivs(1)">&#10095;</button>
                </div>
            </div>
        </div>
        <!-- Slider -->
    </div>
</div>
<!-- <div id="container" class="content-container fr-view"> -->
    <?php $terms=DB::table('terms')->first(); ?> 
<div class="container-fluid" style="margin-top:30px;">
    <div class="row">
        <div class="col-lg-12">
<div style="
text-align: center;
font-size: 38px;
font-weight: 600;
padding-bottom: 20px;
">{{ $terms->title }}</div>
<div style="background: white !important;color:black;">{!! $terms->discription !!}</div>
        </div>
    </div>
</div>


  <script>
    function clickButton() {
        let button = document.getElementById('autoSlideAs');
        if (button) {
            button.click();
        }
    }
    setInterval(clickButton, 3000);
  </script>
  
  @endsection
  