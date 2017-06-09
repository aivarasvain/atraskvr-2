@extends('front-end.core')

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

                                    <img src="{{asset($path)}}" alt="">

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



        <div class="white-shape-vieta"></div>

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


    <div id="bilietai">

        <h1><a href="{{route('frontend.reservation.create', app()->getLocale())}}">PIRKTI</a></h1>

    </div>


@endsection







<script>
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
