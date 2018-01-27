@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Add Supervisor</h3>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    @include('admin.partials.error')

                    <form method="post" action="{{url('supervisors')}}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="firstNameInput" class="col-sm-2 col-form-label col-form-label-lg">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="firstNameInput" placeholder="supervisor first name" name="firstName">
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="lastNameInput" class="col-sm-2 col-form-label col-form-label-lg">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lastNameInput" placeholder="supervisor last name" name="lastName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <input type="submit" class="btn btn-primary" value="Add">
                            <a class="btn btn-small btn-warning" href="{{ URL::to('supervisors/') }}">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection