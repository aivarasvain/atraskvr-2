@extends('admin.core')
@section('title') Atrask VR @endsection
@section('content')



    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ucfirst($tableName) . ' edit'}}
            </h1>




            @if (count($errors) > 0)
                <div class="box-body">
                    <div class="alert alert-danger">
                        <h4>Something wrong! </h4>
                        @foreach ($errors->all() as $error)
                            <i class="icon fa fa-ban"></i>{{$error}}<br>
                        @endforeach
                    </div>
                </div>
            @endif




        </section>


        <div id="createForm" class="box-body">

            <form action="{{route('admin.' . $tableName . '.update', $record['id'])}}" method="POST" role="form" enctype="multipart/form-data">

                @foreach($fields as $key => $field)

                    @if($field == 'language_id')

                        <div class="form-group">
                            <label>Select {{str_replace('_id', '', $field)}}</label>

                            <select name="{{$field}}" class="form-control">

                                @foreach($languages as $language)

                                    <option value="{{$language['language_code']}}"

                                        @if($record['language_id'] == $language['id'])
                                            {{'selected'}}
                                        @endif

                                    >{{$language['name']}}</option>

                                @endforeach


                            </select>

                        </div>

                    @elseif($field == 'parent_id' || $field == 'category_id')

                        <div class="form-group">
                            <label>Select {{str_replace('_id', '', $field)}}</label>

                            <select name="{{$field}}" class="form-control">

                                @foreach($categories as $category)


                                    <option value="{{$category['id']}}"

                                        @if($tableName == 'pages' && $category['id'] == $record['parentpage']['category_id'])
                                            {{'selected'}}
                                        @endif

                                    >{{$category['id']}}</option>

                                @endforeach


                            </select>

                        </div>

                    @elseif($field == 'description_long')

                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">{{str_replace('_', ' ', $field)}}

                                </h3>

                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="box-body pad">

                                <textarea id="editor1" name="{{$field}}" rows="10" cols="80">
                                                {{$record[$field]}}
                                </textarea>

                            </div>
                        </div>

                    @elseif($field == 'description_short')

                        <div class="form-group">
                            <label>{{str_replace('_', ' ', $field)}}</label>
                            <textarea name="{{$field}}" class="form-control" rows="3">{{$record[$field]}}</textarea>
                        </div>

                    @elseif($field == 'image_id')

                        <div class="form-group">
                        <label for="exampleInputFile">Upload image</label>
                        <input name="image" type="file" id="exampleInputFile" required>

                        <p class="help-block">Upload any image you want</p>
                        </div>

                    @elseif($field == 'slug')
                        {{--Doesnt show slug field--}}

                    @elseif($field == 'google_map' || $field == 'video_url')

                        <div class="form-group">
                            <label>Enter {{str_replace('_', ' ', $field)}}</label>
                            <input value="{{$record['parentpage'][$field]}}" name="{{$field}}" type="text" class="form-control">
                        </div>

                    @else

                        <div class="form-group">
                            <label>Enter {{str_replace('_', ' ', $field)}}</label>
                            <input value="{{$record[$field]}}" name="{{$field}}" type="text" class="form-control">
                        </div>

                    @endif




                @endforeach

                <input class="btn btn-success btn-sm" type="submit">
                <a class="btn btn-sm btn-primary" href="{{route('admin.' . $tableName . '.index')}}">Back to list</a>

                {{csrf_field()}}
            </form>
        </div>


    </div>

@endsection