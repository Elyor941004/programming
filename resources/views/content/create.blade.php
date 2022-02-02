@extends('layouts.admin')
@section('content')
    <form class="form-horizontal" action="{{route('content.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label class="control-label col-sm-2" for="explanation">Explanation:</label>
            <div class="col-sm-10">
                <textarea id="explanation" name="explanation"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="example">Example:</label>
            <div class="col-sm-10">
                <textarea id="example" name="example"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="language">Language:</label>
            <div class="col-sm-10">
                <select class="form-group lesson" name="language" id="languageId">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}" class="form-control">{{$language->name}}</option>
                    @endforeach
                </select>
            </div>
            <label class="control-label col-sm-2" for="lesson">Lesson:</label>
            <div class="col-sm-10">
                <select class="form-group lesson" name="lesson" id="lessonId">

                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>

    <script src="{{asset('js/ajax.js')}}"></script>
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
    <script type=text/javascript>
        $(function() {
            let languageId = $('#languageId')
            const AdsFn = {
                getCategoryByCountry: (id) => {
                    let lessonId = $('#lessonId')
                    lessonId.html('')
                    AjaxRequest.get(`/api/lessons/{id}`).then(res => {
                        if (res && res.length > 0) {
                            for (var i = 0; i < res.length; i++) {
                                lessonId.append($('<option>', {
                                    value: res[i].id,
                                    text : res[i].name
                                }));
                            }
                            lessonId.niceSelect()
                            lessonId.niceSelect('destroy')
                        }
                    })
                }
            }
            AdsFn.getCategoryByCountry(languageId.val())
            languageId.change(function() {
                AdsFn.getCategoryByCountry($(this).val())
            })
        })
    </script>
@endsection
