@extends('layouts.admin')
@section('content')
    <a href="{{route('lesson.create')}}" class="create btn btn-success">Create</a>
    <table class="table input-table">
        <thead class="thead-light">
        <tr>
            <th>Lessons</th>
            <th>Language</th>
            <th>Function</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            @if($model)
                <tr>
                    <td>{{$model->name}}</td>
                    <td>{{$model->language_id}}</td>
                    <td class="table-center">
                        <ul>
                            <li><a href="{{route('lesson.edit', $model->id)}}" class="btn btn-info">Update</a></li>
                            <li><form action="{{route('lesson.destroy', $model->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
