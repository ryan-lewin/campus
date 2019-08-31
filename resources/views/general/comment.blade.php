@extends('layouts.master_layout')
{{-- {{dd($post)}}; --}}
@section('title', 'Edit your post')

@section('content')
    <div class="container">
        <h2 class="title">Edit Post</h2>
        <div>
            <form method="POST" action="">
                @csrf
                <div class="field">
                    <label for="Username" class="label">Username</label>
                    <input type="text" class="input" name="Username" value="{{ $post[0]->Username }}">
                </div>
                <div class="field">
                    <label for="PostContent" class="label">What would you like to share</label>
                    <textarea name="PostContent" class="textarea">{{ $post[0]->PostContent }}</textarea>
                </div>
                <div class="control">
                    <button class="button is-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection