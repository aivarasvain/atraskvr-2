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

            <form action="{{route('admin.' . $tableName . '.store')}}" method="POST" role="form">

                @foreach($fields as $key => $field)

                    @if($field == 'language_id')

                        <div class="form-group">
                            <label>Select {{str_replace('_id', '', $field)}}</label>

                            <select name="{{$field}}" class="form-control">

                                @foreach($languages as $language)

                                    <option value="{{$language['language_code']}}">{{$language['name']}}</option>

                                @endforeach


                            </select>

                        </div>

                    @elseif($field == 'parent_id')

                        <div class="form-group">
                            <label>Select {{str_replace('_id', '', $field)}}</label>

                            <select name="{{$field}}" class="form-control">

                                @foreach($categories as $category)

                                    <option value="{{$category['id']}}">{{$category['id']}}</option>

                                @endforeach


                            </select>

                        </div>


                    @else

                        <div class="form-group">
                            <label>Enter {{str_replace('_', ' ', $field)}}</label>
                            <input name="{{$field}}" type="text" class="form-control">
                        </div>

                    @endif




                @endforeach







                <input class="btn btn-success btn-sm" type="submit">
                {{csrf_field()}}
            </form>
        </div>


    </div>

@endsection