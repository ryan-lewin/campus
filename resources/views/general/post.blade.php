@extends('layouts.master_layout')

@section('title', 'Leave a comment - Campus - Your place to share')
@section('content')
    <div class="columns">
        <div class="column">
            <div class="sticky">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-128x128">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMpHEQNFYECjcFlpy_ME32gVMuGMoLBWJm_BheNLT7Yg2uIYqATw">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong class="title is-4">{{ $post[0]->PostTitle }}</strong> 
                                <br>
                                {{ $post[0]->PostContent }}
                                <br>
                                <strong>{{ $post[0]->Username }}</strong>
                                <small><time>{{ $post[0]->DatePosted }}</time></small> 
                            </p>
                        </div>
                    </div>
                </article>
                <div class="">
                    <hr>
                    <h2 class="title is-3">Comment on Post</h2>
                    <form method="POST" action="{{ url('Comments') }}" style="width:100%;">
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
                        <input type="hidden" name="PostID" value="{{ $post[0]->PostID }}">
                        <div class="field">
                            <label for="Username" class="label is-medium">Username</label>
                            <input type="text" class="input is-medium" name="Username" value="{{ old('Username') }}" required>
                        </div>
                        <div class="field">
                            <label for="CommentContent" class="label is-medium">What would you like to comment</label>
                            <textarea name="CommentContent" class="textarea is-medium" rows="4" required>{{ old('CommentContent') }}</textarea>
                        </div>
                        <div class="control">
                            <button class="button is-primary is-medium">Leave Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="column">
            <h2 class="title is-3">Comments</h2>
            @foreach ($comments as $comment)
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-128x128">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMpHEQNFYECjcFlpy_ME32gVMuGMoLBWJm_BheNLT7Yg2uIYqATw">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{ $comment->Username }}</strong>
                                <br>
                                {{ $comment->CommentContent }}
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <form class="level-item" method='POST' action="{{ url('Comments', $comment->CommentID) }}">
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