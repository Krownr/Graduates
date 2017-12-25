@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Specialities
                        <a href="{{ URL::to('admin/specialities/create') }}" class="pull-right">Add a Speciality</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Speciality Name</td>
                                <td>Actions</td>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($specialities as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name_long }} ({{ $value->name_short }})</td>
                                    <td>
                                        <!-- show the subjects (uses the show method found at GET /admin/subjects/{id} -->
                                        {{--<a class="btn btn-small btn-success" href="{{ URL::to('admin/subjects/' . $value->id) }}">Show subject</a>--}}

                                        <!-- edit this subject (uses the edit method found at GET /admin/subjects/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{{ URL::to('admin/specialities/' . $value->id . '/edit') }}">Edit</a>

                                        <form action="{{action('Admin\SpecialitiesController@destroy', $value->id )}}" method="post">
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
            </div>
        </div>
    </div>
@endsection