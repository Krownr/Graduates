@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Specialities</h3>
        </div>

        <div class="bs-docs-example">
            @if (\Session::has('success'))
                <div class="alert alert-info">{{\Session::get('success') }}</div>
            @endif

            <a class="btn btn-small btn-success" href="{{ URL::to('admin/specialities/create') }}">Add Speciality</a>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Speciality Name</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($specialities as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name_long }} ({{ $value->name_short }})</td>
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('admin/specialities/' . $value->id . '/edit') }}">Edit</a>

                            <form action="{{action('Admin\SpecialitiesController@destroy', $value->id )}}" method="post" class="form-buttons">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection