@extends('admin.core')
@section('title') Atrask VR @endsection
@section('content')



    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
        </section>
    </div>


    <section class="content">

        <div class="container">

            <div class="row">

                <div class="col-xs-12">

                    <a id="addNewButton" class="btn btn-success btn-sm" href="{{route('admin.' . $tableName . '.create')}}"><i class="fa fa-plus"></i> Add new</a>

                    <div id="tableForData" class="box">
                        <div class="box-header">
                            <h3 class="box-title">Responsive Hover Table</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>

                                    @if(isset($list[0]))

                                        @foreach($list[0] as $key => $value)

                                            @if($key == 'description_long' || $key == 'description_short')


                                            @elseif($key == 'parentpage')
                                                <th>Image</th>
                                                <th>Video</th>
                                                <th>Google map</th>

                                            @elseif($key == 'id')
                                                {{--Dont show id--}}

                                            @else
                                                <th>{{ucfirst(str_replace('_', ' ', $key))}}</th>
                                            @endif



                                        @endforeach

                                    @else

                                        <div class="box-body">
                                            <div class="callout callout-info">
                                                <h4>There is no records!</h4>
                                                <p>Please add some records first.</p>
                                            </div>
                                        </div>

                                    @endif

                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                                @foreach($list as $item)
                                <tr>



                                    @foreach($item as $key => $record)



                                        @if($key == 'description_long' || $key == 'description_short')

                                        @elseif($key == 'parentpage')


                                            @foreach($resources as $id => $path)

                                               @if($id == $record['image_id'])

                                                    <td><img id="imgInAdmin" src="{{asset($path)}}" alt=""></td>


                                               @endif


                                            @endforeach


                                            <td>{{$record['video_url']}}</td>
                                            <td>{{$record['google_map']}}</td>

                                        @elseif($key == 'id')
                                            {{--Dont show id data--}}

                                        @else

                                            <td>{{$record}}</td>

                                        @endif



                                    @endforeach
                                        <td><a class="btn btn-info btn-sm" href={{route('admin.' . $tableName . '.show', $item['id'])}}><i class="fa fa-eye"></i> View</a></td>
                                        <td><a class="btn bg-purple btn-sm" href="{{route('admin.' . $tableName . '.edit', $item['id'])}}"><i class="fa fa-pencil"></i> Edit</a></td>
                                        <td><a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash-o"></i> Delete</a></td>
                                </tr>



                                @endforeach




                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

    </section>

@endsection