@extends('front-end.core')


@section('content')



    <div id="singleRecord" class="container experiences-container">

        <div class="row">


                <div class="col-md-6  singleExperience experience">
                    <div class="experience-image">

                        @foreach($resources as $id => $path)

                            @if($id == $record['image_id'])

                                <img src="{{asset($path)}}" alt="">

                            @endif

                        @endforeach



                    </div>
                    <div class="experience-text">
                        <h4>{{$record['translations']['title']}}</h4>
                        <p>
                            {{$record['translations']['description_short']}}
                        </p>
                    </div>

                </div>






        </div>

    </div>

@endsection