@extends('layouts.admin')
@section('content')
    <form class="form-horizontal" action="{{route('content.update', $model->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="control-label col-sm-2" for="explanation">Explanation:</label>
            <div class="col-sm-10">
                <textarea id="explanation" name="explanation">{{$model->explanation}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="example">Example:</label>
            <div class="col-sm-10">
                <textarea id="example" name="example">{{$model->example}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lesson">Lesson:</label>
            <div class="col-sm-10">
                <select class="form-group lesson" name="lesson" id="lesson">
                    @foreach($lessons as $lesson)
                        <option value="{{$lesson->id}}" class="form-control">{{$lesson->name}}</option>
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#explanation' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
        ClassicEditor
            .create( document.querySelector( '#example' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>
@endsection
