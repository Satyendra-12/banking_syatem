@extends('frontend.layout.app')

@section('content')
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset('assets\img\banner\image\bannerim.jpg') }}"
                            style="width:100%;position: relative;height:280px !important;border-radius:0px !important;">
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
    <?php $privacy = DB::table('privacy_policies')->first(); ?>
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-lg-12">
                <div style="
text-align: center;
font-size: 38px;
font-weight: 600;
padding-bottom: 20px;
">
                    {{ $privacy->title }}</div>
                <div>{!! $privacy->discription !!}</div>
            </div>
        </div>
    </div>

    <div class="container clearfix text-center footer-banner-ad">
        {{-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9975807181018080" data-ad-slot="4261699163" --}}
        <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div class="clearfix clearfix-lg"></div>
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
