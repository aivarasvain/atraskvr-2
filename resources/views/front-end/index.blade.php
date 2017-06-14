@extends('front-end.core')


@section('scriptInHead')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 1200, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>

@endsection

@section('content')






    <div id="part-1">

        <div id="elektroMarkt">

            <h4 class="logo-title">{{trans('frontend.inspired_by')}} </h4>
            <div id="elektroMarktLogo"></div>

        </div>

        <div id="mainTitle">

            {{trans('frontend.main_title')}}

        </div>

        <div id="mainTitleDescription">{{trans('frontend.header_description')}}</div>

        <div class="white-shape">



        </div>


    </div>

    <div class="section" id="apie">

        @foreach($aboutPage as $about)
            <h1 class="section-title">{{$about['translations']['title']}}</h1>
            <div id="video">

                <video width="794px" height="451px" controls>
                    <source src="{{asset($about['video_url'])}}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>

            </div>

            {!! $about['translations']['description_long'] !!}

        @endforeach



    </div>

    <div id="kambariai">
        <div class="white-shape-about"></div>

        @foreach($categories as $category)

            @if($category['id'] == 'kambariai')

                <h1 class="section-title">{{$category['translations']['name']}}</h1>

            @endif

        @endforeach




        <div class="container experiences-container">

            <div class="row">


                @foreach($experiences as $experience)

                    <div class="col-md-6 experience">
                        <div class="experience-image">

                            @foreach($resources as $id => $path)

                                @if($id == $experience['image_id'])

                                    <a href="{{route('frontend.show', [app()->getLocale(), $experience['id']])}}"><img src="{{asset($path)}}" alt=""></a>

                                @endif
                            @endforeach




                        </div>
                        <div class="experience-text">
                            <h4>{{$experience['translations']['title']}}</h4>
                            <p>
                                {{$experience['translations']['description_short']}}
                            </p>
                        </div>

                    </div>

                @endforeach




            </div>

        </div>



        <div class="white-shape-kambariai"></div>

    </div>




    <div id="vieta">

        <div id="vietaText">


            @foreach($vietaPage as $vieta)

                <h1 class="section-title">{{$vieta['translations']['title']}}</h1>
                <p>
                    {{$vieta['translations']['description_short']}}
                </p>


            @endforeach



        </div>


        <div id="map"></div>



    </div>
    <div class="white-shape-tickets"></div>
    <div id="bilietai">

        <div id="ticketsContent">

        </div>

        <div id="ticketsText">

            @foreach($bilietaiCategory as $tickets)

                <h1 class="section-title">{{$tickets['translations']['name']}}</h1>

            @endforeach


            <div id="ticketsSquare">

                <h5>{{trans('frontend.price_title')}}</h5>
                <p>6&euro;</p>

            </div>
        </div>

        <a href="{{route('frontend.reservation.create')}}"><div id="ticketsButton">
            <h3>{{trans('frontend.buy_button')}}</h3>
        </div></a>

        <div class="white-shape-sponsors"></div>
    </div>


    <div id="remejai">

        @foreach($remejaiCategory as $sponsors)

            <h1 class="section-title">{{$sponsors['translations']['name']}}</h1>

        @endforeach

        <div id="sponsorsContent">
            <h5>{{trans('frontend.inspired_by')}}</h5>
            <a target="_blank" href="https://www.elektromarkt.lt/"><div id="elektroMarktSponsors"></div></a>
            <h5>{{trans('frontend.inform')}}</h5>
            <a target="_blank" href="http://www.delfi.lt/"><div id="delfi"></div></a>
            <h5>{{trans('frontend.organize')}}</h5>
            <a target="_blank" href="http://akropolis.lt/"><div id="akropolis"></div></a><a target="_blank" href="http://litexpo.lt/"><div id="litexpo"></div></a><a target="_blank" href="https://www.telesoftas.com/"><div id="telesoftas"></div></a>
            <h5>{{trans('frontend.inovations')}}</h5>
            <a target="_blank" href="https://www.inida.lt/"><div id="inida"></div></a>

        </div>

    </div>

    <div id="footer">

        <div class="white-shape-footer"></div>
        <div id="footerText">

            <h4>{{trans('frontend.more_information')}}</h4>
            <p>paroda@atraskvr.lt</p>

        </div>



    </div>

@endsection




@section('script')


<script>

    {{--Google map--}}
    function initMap() {
        var uluru = {lat: 54.7101080, lng: 25.2619620};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn7pkMEHBUPL1uGRmn6IzlFyLO7CbatnY&callback=initMap">
</script>
@endsection