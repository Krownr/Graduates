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
</div>
@endsection
