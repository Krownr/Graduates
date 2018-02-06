@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Edit Student</h3>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    @include('admin.partials.error')

                    <form method="post" action="{{ action('Admin\StudentsController@update', $id) }}">
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="facultyNumberInput" class="col-sm-2 col-form-label col-form-label-lg">Faculty Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="facultyNumberInput" name="facultyNumber" value="{{ $student->faculty_number }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="firstNameInput" class="col-sm-2 col-form-label col-form-label-lg">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="firstNameInput" name="firstName" value="{{ $student->first_name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="lastNameInput" class="col-sm-2 col-form-label col-form-label-lg">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lastNameInput" name="lastName" value="{{ $student->last_name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="speciality_id" class="col-sm-2 col-form-label col-form-label-lg">Speciality</label>
                            <div class="col-sm-10">
                                @if (!empty($specialities))

                                <select name="speciality_id" class="form-control">
                                    @foreach($specialities as $key => $value)
                                    <option value="{{ $key }}" {{ ($key == $student->speciality_id) ? 'selected' : '' }} >{{ $value }}</option>
                                    @endforeach
                                </select>

                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a class="btn btn-small btn-warning" href="{{ URL::to('admin/students/') }}">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection