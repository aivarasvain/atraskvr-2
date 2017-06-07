@extends('admin.core')

@section('content')



    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
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


                                    <option value="{{$category['id']}}">{{$category['id']}}</option>

                                @endforeach


                            </select>

                        </div>

                    @elseif($field == 'description_short' || $field == 'description_long')

                        <div class="form-group">
                            <label>{{str_replace('_id', '', $field)}}</label>
                            <textarea name="{{$field}}" class="form-control" rows="3"></textarea>
                        </div>

                    @elseif($field == 'image_id')

                        <div class="form-group">
                        <label for="exampleInputFile">Upload image</label>
                        <input name="image" type="file" id="exampleInputFile">

                        <p class="help-block">Upload any image you want</p>
                        </div>


                    @else

                        <div class="form-group">
                            <label>Enter {{str_replace('_', ' ', $field)}}</label>
                            <input value="{{$record[$field]}}" name="{{$field}}" type="text" class="form-control">
                        </div>

                    @endif




                @endforeach







                <input class="btn btn-success btn-sm" type="submit">
                {{csrf_field()}}
            </form>
        </div>


    </div>

@endsection