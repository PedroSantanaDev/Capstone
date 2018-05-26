@extends('layouts.app')
@section('content')
    <div class="center-welcome">
        <h1 class="project">Capstone Project</h1>
        <h2 class="project-name">Employee Management System</h2>

        <h3>Pedro Santana Minalla</h3>
        <a href="{{url('/login')}}">
        <button type="button" class="btn btn-primary btn-lg">Log in</button>
        </a>
    </div>
                
@endsection
