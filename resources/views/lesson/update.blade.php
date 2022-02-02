@extends('layouts.admin')
@section('content')
    <form class="form-horizontal" action="{{route('lesson.update', $model->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="control-label col-sm-2" for="lesson">Lesson:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lesson" placeholder="Lesson" name="lesson" value="{{$model->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="language">Language:</label>
            <div class="col-sm-10">
                <select class="form-group lesson" name="language" id="language">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}" class="form-control" {{$model->language_id==$language->id?'selected':''}}>{{$language->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection
