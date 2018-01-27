@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">All Students</h3>
        </div>

        <div class="bs-docs-example">
            @if (\Session::has('success'))
                <div class="alert alert-info">{{\Session::get('success') }}</div>
            @endif

            <a class="btn btn-small btn-success" href="{{ URL::to('admin/students/create') }}">Add a Student</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Faculty Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($students as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->first_name }}</td>
                        <td>{{ $value->last_name }}</td>
                        <td>{{ $value->faculty_number }}</td>
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('admin/students/' . $value->id . '/edit') }}">Edit</a>

                            <form action="{{action('Admin\StudentsController@destroy', $value->id )}}" method="post" class="form-buttons">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $students->links() }}
        </div>
    </div>
@endsection