@extends('front-end.core')


@section('content')

<div style="padding-top: 75px;" class="reservation-content">


    <form method="post" action="{{route('frontend.reservation.store')}}">
        {{csrf_field()}}


        @foreach($days as $day)

            <a href="{{route('frontend.reservation.create', $day)}}">{{$day}}</a><br>

        @endforeach



        @foreach($days as $day)

            @if($day == $day_from_url)


                {{$day}}


                @foreach($experiences as $experience)
                    {{$experience['translations']['title']}}
                    @foreach($times as $time)

                        <input value="{{$day . ' ' . $time}}" name="{{$experience['id'] . '[]'}}" type="checkbox">{{$time}}

                    @endforeach
                    <br><br>

                @endforeach



            @endif

        @endforeach





            <input type="submit">


    </form>

</div>

@endsection