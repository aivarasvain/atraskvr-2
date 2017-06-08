<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                @foreach($categories as $category)

                    @if($category['translations']['category_id'] == 'kambariai' )

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$category['translations']['name']}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <li><a href="#">labas</a></li>

                            </ul>
                        </li>

                    @else

                        <li><a href="#">{{$category['translations']['name']}}</a></li>

                    @endif





                @endforeach










                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('frontend.language')}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/lt">Lt</a></li>
                        <li><a href="/en">En</a></li>
                    </ul>
                </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
