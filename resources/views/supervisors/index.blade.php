@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Available Supervisors</h3>
        </div>

        <div class="bs-docs-example">
            @if (\Session::has('success'))
                <div class="alert alert-info">{{ \Session::get('success') }}</div>
            @endif

            @auth
                <a class="btn btn-small btn-success" href="{{ URL::to('supervisors/create') }}">Add a Supervisor</a>
            @endauth

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    @auth
                    <th>Actions</th>
                    @endauth
                </tr>
                </thead>

                <tbody>
                @foreach($supervisors as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->first_name }}</td>
                        <td>{{ $value->last_name }}</td>
                        @auth
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('supervisors/' . $value->id . '/edit') }}">Edit</a>

                            <form action="{{ action('SupervisorsController@destroy', $value->id ) }}" method="post" class="form-buttons">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        @endauth
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $supervisors->links() }}
        </div>
    </div>
@endsection