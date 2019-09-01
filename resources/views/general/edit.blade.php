@extends('layouts.master_layout')
{{-- {{dd($post)}}; --}}
@section('title', 'Edit your post')

@section('content')
    <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-8">
            <h2 class="title">Edit Post</h2>
            <div>
                <form method="POST" action="{{ url('Posts', $post[0]->PostID) }}">
                    @csrf
                    @method('PATCH')
                    @if ($errors->any())                        
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="field">
                        <label for="PostTitle" class="label is-medium">Title</label>
                        <input type="text" class="input is-medium" name="PostTitle" value="{{ $post[0]->PostTitle }}" required>
                    </div>
                    <div class="field">
                        <label for="Username" class="label is-medium">Username</label>
                        <input type="text" class="input is-medium" name="Username" value="{{ $post[0]->Username }}" required>
                    </div>
                    <div class="field">
                        <label for="PostContent" class="label is-medium">What would you like to share</label>
                        <textarea name="PostContent" class="textarea is-medium" rows="7" required>{{ $post[0]->PostContent }}</textarea>
                    </div>
                    <div class="control">
                        <button class="button is-primary is-medium">Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="column is-2"></div>
    </div>
@endsection