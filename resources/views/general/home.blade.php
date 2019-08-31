{{-- {{dd($posts)}} --}}
@extends('layouts.master_layout')

@section('title', 'Campus - Your place to share')

@section('content')
    <div class="coloumns">
        <div class="column">
            <h2 class="title">Form</h2>
            <div>
                <form method="POST" action="{{ url('Posts') }}" style="width:30vw;">
                    @csrf
                    <div class="field">
                        <label for="PostTitle" class="label">Title</label>
                        <input type="text" class="input" name="PostTitle">
                    </div>
                    <div class="field">
                        <label for="Username" class="label">Username</label>
                        <input type="text" class="input" name="Username">
                    </div>
                    <div class="field">
                        <label for="PostContent" class="label">What would you like to share</label>
                        <textarea name="PostContent" class="textarea">Enter your message here...</textarea>
                    </div>
                    <div class="control">
                        <button class="button is-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="column" style="width:50vw; padding:1em;">
            <h2 class="title">Posts</h2>
            @foreach ($posts as $post)
                <div class="card">
                    <header class="card-header">
                        <a href="/Posts/{{$post->PostID}}" class="card-header-title">{{ $post->PostTitle }}</a>
                        {{-- <p class="card-header-title">{{ $post->PostTitle }}</p> --}}
                    </header>
                    <div class="card-content">
                    <div class="content">
                        <p>{{ $post->PostContent }}</p>
                        <a href="#">{{ $post->Username }}</a>
                        <time>{{ $post->DatePosted }}</time>
                    </div>
                    </div>
                    <footer class="card-footer">
                        <a href="/Posts/{{$post->PostID}}/edit" class="card-footer-item">Edit</a>
                        <a href="/Posts/{{$post->PostID}}" class="card-footer-item">Comment</a>
                        <form class="card-footer-item" method='POST' action="{{ url('Posts', $post->PostID) }}">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </footer>
                </div>
            @endforeach
        </div>
    </div>
@endsection

