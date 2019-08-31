@extends('layouts.master_layout')

@section('title', 'Campus - Your place to share')

@section('content')
    <div class="coloumns">
        <div class="column" style="width:50vw; padding:1em;">
            <h2 class="title">Recent Posts</h2>
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
                <div class="card">
                    <header class="card-header">
                        <a href="/Posts/{{$post->PostID}}" class="card-header-title">{{ $post->PostTitle }}</a>
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
                        <a href="/Posts/{{$post->PostID}}" class="card-footer-item">{{count($commentCount)}} Comments</a>
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

