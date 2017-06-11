@extends('front-end.core')


@section('content')

<div style="padding-top: 75px;" class="reservation-content">


    <div class="container">
        <nav aria-label="...">
            <ul class="pagination pagination-lg justify-content-center">


                @foreach($days as $day)

                    <li style="height: 50px;" class="page-item
                        @if($day_from_url == $day)
                    {{' active'}}
                    @endif
                            "><a class="page-link" href="{{route('frontend.reservation.create', $day)}}">{{$day}}</a></li>

                @endforeach


            </ul>

        </nav>

        @if(Session::has('success'))
            <div class="box-body">
                <div class="alert alert-success">
                    <i class="icon fa fa-check"></i>{{Session::get('success')}}<a href="#"> View</a> my reservations
                </div>
            </div>

        @endif



    <form method="post" action="{{route('frontend.reservation.store')}}">
        {{csrf_field()}}






        @foreach($days as $day)

            @if($day == $day_from_url)


                <h1 class="display-4">{{$day}}</h1>

                <div class="row">
                    <div id="reservationExperiences"></div>
                    @foreach($experiences as $experience)
                        <div class="reservation-experience col-md-4">
                            
                            
                            @foreach($resources as $resource)
                                
                                @if($resource['id'] == $experience['image_id'])

                                    <img class="reservation-image" src="{{asset($resource['path'])}}" alt="">
                                    
                                @endif
                                
                            @endforeach
                            
                            
                            
                        {{$experience['translations']['title']}}


                            <div class="time-select">

                                <select name="{{$experience['id'] . '[]'}}" class="js-example-basic-multiple reservation-select" multiple="multiple">
                                    @foreach($times as $time)
                                    <option class="select-time" value="{{$day . ' ' . $time}}"

                                    @foreach($reservations as $reservation)

                                        @foreach($reservation['time'] as $reservedTime)

                                            @if($reservation['page_id'] == $experience['id'] && $reservedTime == $day . ' ' . $time)
                                                {{'disabled'}}
                                            @endif

                                        @endforeach

                                    @endforeach


                                    >{{$time}}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>










                    @endforeach
                </div>



            @endif

        @endforeach





            <input id="reservationButton" class="btn btn-lg btn-success" value="Make Reservation" type="submit">


    </form>
</div>

</div>



@endsection

@section('script')
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2({
            placeholder: "Select time"
        });

    </script>
@endsection