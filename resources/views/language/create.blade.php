@extends('layouts.admin')
@section('content')
    <form class="form-horizontal" action="{{route('language.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label class="control-label col-sm-2" for="language">Language:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="language" placeholder="Language" name="language">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection
