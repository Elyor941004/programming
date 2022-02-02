@extends('layouts.main')
@section('content')
    <div class="row row1">
        <div class="col-xl-3 submenu col-md-3 col-sm-12">
            <ul>
                @foreach($lessons as $lesson)
                    <li class="nav-item">
                        <a class="nav-link submenu1" href="{{route('lessons', [$lesson->language_id, $lesson->id])}}">{{$lesson->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-xl-9 basic col-md-3 col-sm-12">
            @foreach($contents as $content)
                @if(isset($content->explanation))
                    <div>
                        {!!$content->explanation!!}
                    </div>
                @endif
                @if(isset($content->example))
                    <div class="card">
                        <div class="card-header"><h4>Misol</h4></div>
                        <div class="card-body">
                            <pre>
                              {!!$content->example!!}
                            </pre>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header"><h4>Natija</h4></div>
                        <div class="card-body black">
                            {!!html_entity_decode($content->example)!!}
                        </div>
                    </div>
                @endif
            @endforeach
            <br>
        </div>
    </div>
@endsection
