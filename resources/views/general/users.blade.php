@extends('layouts.master_layout')

@section('title', 'User')
{{-- {{dd($users)}} --}}
@section('content')
    <div class="container users">
        <div class="panel">
            <h1 class="panel-heading has-background-dark has-text-primary">Users</h3>
            @foreach ($users as $user)
            <a href="{{ url('user', $user->Username) }}" class="panel-block">
                    {{ $user->Username }}
                </a>
            @endforeach
        </div>
    </div>
@endsection