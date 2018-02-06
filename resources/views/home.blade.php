@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w3ls-title">
        <h3 class="agileits-title w3title1">Welcome</h3>
    </div>

    <div class="grid_3 grid_5 agile">
        <h3>Dashboard</h3>
        <div class="well">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            Here you will be able to check your result from your Thesis!
        </div>
    </div>

    <div class="grid_3 grid_5 agile">
        <h3>Search</h3>
        <div class="well">
            <form action="search" method="post" role="search" class="form-horizontal">
                <br />
                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="student" class="col-md-4 control-label">Student Name:</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="student" name="student" placeholder="Enter a student first and/or last name">
                    </div>
                </div>

                @if (!empty($supervisors))
                <div class="form-group">
                    {{csrf_field()}}
                    <label for="supervisor" class="col-md-4 control-label">Supervisor:</label>

                    <div class="col-md-6">
                        <select name="supervisor" class="form-control" id="supervisorId">
                            @foreach($supervisors as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="topic" class="col-md-4 control-label">Thesis Topic:</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" id="topic" name="topic" placeholder="Enter the exact topic name">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
