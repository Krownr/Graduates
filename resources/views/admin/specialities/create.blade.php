@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Add Speciality</h3>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    @include('admin.partials.error')

                    <form method="post" action="{{ url('admin/specialities') }}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="shortNameInput" class="col-sm-2 col-form-label col-form-label-lg">Short Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="shortNameInput" placeholder="abbreviation for the speciality" name="specialityShortName">
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="longNameInput" class="col-sm-2 col-form-label col-form-label-lg">Long Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="longNameInput" placeholder="long speciality name" name="specialityLongName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <input type="submit" class="btn btn-primary" value="Add">
                            <a class="btn btn-small btn-warning" href="{{ URL::to('admin/specialities/') }}">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection