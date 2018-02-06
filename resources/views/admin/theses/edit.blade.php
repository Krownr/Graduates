@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        moment.lang('en', {
            week : {
                dow : 1 // Monday is the first day of the week
            }
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="w3ls-title">
            <h3 class="agileits-title w3title1">Add Thesis Result</h3>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    @include('admin.partials.error')

                    <form method="post" action="{{ action('ThesesController@update', $id) }}">
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="studentId" class="col-sm-2 col-form-label col-form-label-lg">Student</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="studentId" placeholder="thesis topic" name="student" value="{{ $thesis->student->full_name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="topicInput" class="col-sm-2 col-form-label col-form-label-lg">Topic</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="topicInput" placeholder="thesis topic" name="topic" value="{{ $thesis->topic }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="markInput" class="col-sm-2 col-form-label col-form-label-lg">Mark</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="topicInput" placeholder="thesis mark" name="mark" value="{{ $thesis->mark }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="dateInput" class="col-sm-2 col-form-label col-form-label-lg">Presentation Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="dateInput" name="date" value="{{ $thesis->presentation_date }}">
                            </div>

                            <script type="text/javascript">
                                $(function () {
                                    $('#dateInput').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm'
                                    })
                                });
                            </script>
                        </div>

                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="supervisorId" class="col-sm-2 col-form-label col-form-label-lg">Supervisor</label>
                            <div class="col-sm-10">
                                @if (!empty($supervisors))

                                <select name="supervisor" class="form-control">
                                    @foreach($supervisors as $key => $value)
                                    <option value="{{ $key }}" {{ ($key == $thesis->supervisor_id) ? 'selected' : '' }} >{{ $value }}</option>
                                    @endforeach; ?>
                                </select>

                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a class="btn btn-small btn-warning" href="{{ URL::to('theses/') }}">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection