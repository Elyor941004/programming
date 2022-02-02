@extends('layouts.admin')
@section('content')
    <form class="form-horizontal" action="{{route('language.update', $model->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="control-label col-sm-2" for="language">Language:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="language" placeholder="Language" name="language" value="{{$model->name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection
