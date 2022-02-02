@extends('layouts.admin')
@section('content')
    <a href="{{route('language.create')}}" class="create btn btn-success">Create</a>
    <table class="table input-table">
        <thead class="thead-light">
            <tr>
                <th>Language</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            @if($model)
                <tr>
                    <td>{{$model->name}}</td>
                    <td class="table-center">
                        <ul>
                            <li><a href="{{route('language.edit', $model->id)}}" class="btn btn-info">Update</a></li>
                            <li>
                                <form action="{{route('language.destroy', $model->id)}}" method="POST">
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
