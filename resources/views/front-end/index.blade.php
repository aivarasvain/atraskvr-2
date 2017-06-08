@extends('front-end.core')

@section('content')



    <div id="part-1">

        <div id="elektroMarkt">

            <h4 class="logo-title">{{trans('frontend.inspired_by')}} </h4>
            <div id="elektroMarktLogo"></div>

        </div>

        <div id="mainTitle">

            {{trans('frontend.main_title')}}

        </div>

        <div id="mainTitleDescription">{{trans('frontend.header_description')}}</div>


    </div>


@endsection
