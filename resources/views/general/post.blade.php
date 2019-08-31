@extends('layouts.master_layout')

@section('title', 'Leave a comment - Campus - Your place to share')
@section('content')
    <div class="coloumns">
        <div class="column" style="width:50vw; padding:1em;">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <h2 class="title">{{ $post[0]->PostTitle }}</h2>
                        <p>{{ $post[0]->PostContent }}</p>
                        <a href="#">{{ $post[0]->Username }}</a>
                        <time>{{ $post[0]->DatePosted }}</time>
                    </div>
                </div>
                <footer class="card-content">
                    <form method="POST" action="{{ url('Posts') }}" style="width:100%;">
                        @csrf
                        <div class="field">
                            <label for="Username" class="label">Username</label>
                            <input type="text" class="input" name="Username">
                        </div>
                        <div class="field">
                            <label for="PostContent" class="label">What would you like to comment</label>
                            <textarea name="PostContent" class="textarea" value="">Enter your message here...</textarea>
                        </div>
                        <div class="control">
                            <button class="button is-primary">Leave Comment</button>
                        </div>
                    </form>
                </footer>
            </div>
        </div>
        <div class="column" style="width:50vw; padding:1em;">
            <h2 class="title">Comments</h2>
            @foreach ($comments as $comment)
                <div class="card">
                    </header>
                    <div class="card-content">
                    <div class="content">
                        <p>{{ $comment->CommentContent }}</p>
                        <a href="#">{{ $comment->Username }}</a>
                    </div>
                    </div>
                    <footer class="card-footer">
                        <form class="card-footer-item" method='POST' action="">
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
