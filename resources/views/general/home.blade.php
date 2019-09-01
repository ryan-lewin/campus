@extends('layouts.master_layout')

@section('title', 'Campus - Your place to share')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="sticky">
                <h2 class="title">Make a Post</h2>
                <form class="post" method="POST" action="{{ url('Posts') }}">
                    @csrf
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
                        <label for="PostTitle" class="label is-medium">Post Title</label>
                        <input type="text" class="input is-medium" name="PostTitle" value="{{ old('PostTitle') }}" required>
                    </div>
                    <div class="field">
                        <label for="Username" class="label is-medium">Username</label>
                        <input type="text" class="input is-medium" name="Username" value="{{ old('Username') }}" required>
                    </div>
                    <div class="field">
                        <label for="PostContent" class="label is-medium">What would you like to share</label>
                        <textarea name="PostContent" class="textarea" rows="8" required>{{ old('PostContent') }}</textarea>
                    </div>
                    <div class="control">
                        <button class="button is-primary is-medium is-hovered">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="column">
            <h2 class="title is-3">Posts</h2>
            @foreach ($posts as $post)
                @php
                    $commentCount = array();
                @endphp
                @foreach ($comments as $comment)
                    @if ($comment->PostID == $post->PostID)
                        @php
                            array_push($commentCount, $post->PostID)
                        @endphp
                    @endif
                @endforeach
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-128x128">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMpHEQNFYECjcFlpy_ME32gVMuGMoLBWJm_BheNLT7Yg2uIYqATw">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong><a href="/Posts/{{$post->PostID}}" class="title is-4">{{ $post->PostTitle }}</a></strong> 
                                <br>
                                {{ $post->PostContent }}
                                <br>
                                <strong><a href="{{ url('user', $post->Username) }}"> {{ $post->Username }}</a></strong>
                                <small><time>{{ $post->DatePosted }}</time></small> 
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="button level-item is-primary" href="/Posts/{{$post->PostID}}/edit">Edit</a>
                                <a class="button level-item is-primary" href="/Posts/{{$post->PostID}}">{{ count($commentCount) }} Comments</a>
                                <form class="level-item" method='POST' action="{{ url('Posts', $post->PostID) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger">Delete</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection

