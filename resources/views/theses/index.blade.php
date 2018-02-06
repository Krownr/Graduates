@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Theses Results</h3>
        </div>

        <div class="bs-docs-example">
            @if (\Session::has('success'))
                <div class="alert alert-info">{{ \Session::get('success') }}</div>
            @endif

            @auth
                <a class="btn btn-small btn-success" href="{{ URL::to('theses/create') }}">Add a Theses Result</a>
            @endauth

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Student</th>
                    <th>Topic</th>
                    <th>Mark</th>
                    <th>Supervisor</th>
                    @auth
                    <th>Actions</th>
                    @endauth
                </tr>
                </thead>

                <tbody>
                @foreach($theses as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->presentation_date }}</td>
                        <td>{{ $value->student->full_name }}</td>
                        <td>{{ $value->topic }}</td>
                        <td>{{ $value->mark }}</td>
                        <td>{{ $value->supervisor->full_name }}</td>
                        @auth
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('theses/' . $value->id . '/edit') }}">Edit</a>

                            <form action="{{ action('ThesesController@destroy', $value->id) }}" method="post" class="form-buttons">
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

            {{ $theses->links() }}
        </div>
    </div>
@endsection