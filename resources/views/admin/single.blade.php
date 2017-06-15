@extends('admin.core')
@section('title') Atrask VR @endsection
@section('content')
    <div class="container">
        <section class="content">

                <div id="tableForData" class="box">
                    <div class="box-header">
                        <h3 class="box-title">Single record</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    @if($tableName == 'orders')

                                        <th>Experience</th>
                                        <th>Time</th>

                                    @else

                                        <th>Key</th>
                                        <th>Value</th>

                                    @endif


                                </tr>
                            </thead>

                            <tbody>

                            @if($tableName == 'orders')

                                @foreach($record['reservations'] as $reservation)

                                    <tr>

                                        @foreach($experiences as $experience)

                                            @if($experience['id'] == $reservation['page_id'])

                                                @foreach($resources as $resource)

                                                    @if($resource['id'] == $experience['image_id'])

                                                        <td><img id="experienceImg" src="{{asset($resource['path'])}}" alt="">{{$experience['translations']['title']}}</td>

                                                    @endif

                                                @endforeach



                                            @endif

                                        @endforeach





                                        <td>
                                            @foreach($reservation['time'] as $time)
                                                {{$time}}<br>
                                            @endforeach
                                        </td>

                                    </tr>

                                @endforeach


                            @else
                                @foreach($record as $key => $value)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$value}}</td>
                                    </tr>
                                @endforeach
                            @endif




                            </tbody>




                        </table>



                    </div>

                </div>
            <a class="btn btn-primary btn-sm" href="{{route('admin.' .$tableName . '.index')}}">Back to list</a>

        </section>

    </div>

@endsection