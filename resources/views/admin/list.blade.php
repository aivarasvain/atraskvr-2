@extends('admin.core')
@section('title') Atrask VR @endsection
@section('content')




        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ucfirst($tableName) . ' list'}}

            </h1>



            @if(Session::has('success'))
                <div class="box-body">
                    <div class="alert alert-success">
                        <i class="icon fa fa-check"></i>{{Session::get('success')}}
                    </div>
                </div>

            @endif

        </section>



    <section class="content">



            <div class="row">

                <div class="col-xs-12">

                    @if($tableName != 'users')
                        <a id="addNewButton" class="btn btn-success btn-sm" href="{{route('admin.' . $tableName . '.create')}}"><i class="fa fa-plus"></i> Add new</a>
                    @endif

                    <div id="tableForData" class="box">

                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">

                                @if($tableName == 'orders')

                                {!! $orders->render() !!}

                                @endif

                                <tr>


                                    @if($tableName == 'orders')

                                        <th>Status</th>
                                        <th>User</th>

                                    @endif


                                    @if(isset($list[0]) && $tableName != 'orders')

                                        @foreach($list[0] as $key => $value)

                                            @if($key == 'description_long' || $key == 'description_short' || $key == 'id' || $key == 'password' || $key == 'remember_token' || $key == 'roles_connections')


                                            @elseif($key == 'parentpage')
                                                <th>Image</th>
                                                <th>Video</th>
                                                <th>Google map</th>

                                            @else
                                                <th>{{ucfirst(str_replace('_', ' ', $key))}}</th>
                                            @endif



                                        @endforeach

                                    @elseif(empty($list[0]))

                                        <div class="box-body">
                                            <div class="callout callout-info">
                                                <h4>There is no records!</h4>
                                                <p>Please add some records first.</p>
                                            </div>
                                        </div>

                                    @endif

                                    @if($tableName != 'users' && $tableName != 'orders')

                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    @elseif($tableName == 'users')
                                        <th>Role</th>

                                    @elseif($tableName == 'orders')
                                        <th>View</th>


                                    @endif
                                </tr>



                                @if($tableName != 'orders')

                                    @foreach($list as $item)
                                    <tr id="{{$item['id']}}">



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

                                            @elseif($key == 'id' || $key == 'password' || $key == 'remember_token')
                                                {{--Dont show fields--}}

                                            @elseif($key == 'roles_connections')

                                                @foreach($record as $role)

                                                    <td>{{$role['role_id']}}</td>

                                                @endforeach

                                            @elseif($key == 'user_id')

                                                @foreach($users as $user)

                                                    @if($user['id'] == $record)

                                                        <td>{{$user['full_name']}}</td>

                                                    @endif

                                                @endforeach





                                                @else

                                                <td>{{$record}}</td>

                                            @endif



                                        @endforeach

                                            @if($tableName != 'users')

                                                <td><a class="btn btn-info btn-sm" href={{route('admin.' . $tableName . '.show', $item['id'])}}><i class="fa fa-eye"></i> View</a></td>
                                                <td><a class="btn bg-purple btn-sm" href="{{route('admin.' . $tableName . '.edit', $item['id'])}}"><i class="fa fa-pencil"></i> Edit</a></td>
                                                <td><a id="del" onclick="deleteItem('{{route('admin.' . $tableName . '.delete', $item['id'])}}')" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> Delete</a></td>



                                            @endif




                                    </tr>



                                    @endforeach


                                @elseif($tableName == 'orders')

                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order['status']}}</td>
                                        @foreach($users as $user)

                                            @if($order['user_id'] == $user['id'])

                                                    <td>{{$user['full_name']}}</td>

                                            @endif

                                        @endforeach




                                            <td><a href="{{route('admin.orders.show', $order['id'])}}">View</a></td>

                                        </tr>

                                    @endforeach


                                @endif




                            </table>



                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>


    </section>



@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem(route) {

            $.ajax({
                url: route,
                type: 'DELETE',
                data: {},
                dataType: 'json',
                success: function (r) {
                    $("#" + r.id).remove();

                },
                error: function () {
                    alert('error');
                }
            });
        }
    </script>
@endsection