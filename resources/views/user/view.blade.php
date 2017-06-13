@extends('admin.core')

@section('content')

    <div class="container">

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Experience</th>
                        <th>Time</th>
                    </tr>

                </thead>

                <tbody>
                    @foreach($record['reservations'] as $reservation)
                        <tr>

                            @foreach($pages as $page)

                                @if($page['id'] == $reservation['page_id'])

                                    <td>
                                        
                                        @foreach($resources as $resource)
                                            
                                            @if($page['image_id'] == $resource['id'])

                                                <img id="experienceImg" src="{{asset($resource['path'])}}" alt="">
                                                
                                            @endif
                                            
                                        @endforeach
                                        
                                        
                                        
                                        
                                        {{$page['translations']['title']}}
                                    </td>

                                @endif

                            @endforeach

                            <td>
                                @foreach($reservation['time'] as $time)
                                    {{$time}}<br>
                                @endforeach
                            </td>
                        </tr>

                    @endforeach
                </tbody>


            </table>

            <a style="margin-top: 20px;" class="btn btn-primary btn-sm" href="{{route('user.orders.index')}}">Back to list</a>
            
        </div>

    </div>


@endsection