@extends('admin.core')

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
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                            </thead>

                            <tbody>

                            @foreach($record as $key => $value)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$value}}</td>
                                </tr>
                            @endforeach

                            </tbody>




                        </table>



                    </div>

                </div>
            <a class="btn btn-primary btn-sm" href="{{route('admin.' .$tableName . '.index')}}">Back to list</a>

        </section>

    </div>

@endsection