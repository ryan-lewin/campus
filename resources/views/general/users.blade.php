@extends('layouts.master_layout')

@section('title', 'User')
{{-- {{dd($users)}} --}}
@section('content')
    <div class="container">
        <h1 class="title">Users</h1>
        <div class="panel">
            <h3 class="panel-heading">Users</h3>
            @foreach ($users as $user)
            <a href="{{ url('user', $user->Username) }}" class="panel-block">
                    {{ $user->Username }}
                </a>
            @endforeach
        </div>
    </div>
@endsection