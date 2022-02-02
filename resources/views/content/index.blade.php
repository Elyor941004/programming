@extends('layouts.admin')
@section('content')
    <a href="{{route('content.create')}}" class="create btn btn-success">Create</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Explanation</th>
                <th>Example</th>
                <th>Lesson</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
                @if($model)
                <tr>
                    <td>{!!$model->explanation!!}</td>
                    <td>{!!$model->example!!}</td>
                    <td>{{$model->lesson_id}}</td>
                    <td class="table-center">
                        <ul>
                            <li><a href="{{route('content.edit', $model->id)}}" class="btn btn-info">Update</a></li>
                            <li>
                                <form action="{{route('content.destroy', $model->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            <li>
                        </ul>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
