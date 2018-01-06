@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Student
                        <a href="{{ URL::to('admin/students') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @include('admin.partials.error')

                        <form method="post" action="{{url('admin/students')}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="facultyNumberInput" class="col-sm-2 col-form-label col-form-label-lg">Faculty Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="facultyNumberInput" placeholder="student faculty number" name="facultyNumber">
                                </div>
                            </div>

                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="firstNameInput" class="col-sm-2 col-form-label col-form-label-lg">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="firstNameInput" placeholder="student first name" name="firstName">
                                </div>
                            </div>

                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="lastNameInput" class="col-sm-2 col-form-label col-form-label-lg">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lastNameInput" placeholder="student last name" name="lastName">
                                </div>
                            </div>

                            <!-- To add - specialities -->

                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <input type="submit" class="btn btn-primary" value="Submit" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection