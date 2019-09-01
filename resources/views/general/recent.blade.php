@extends('layouts.master_layout')

@section('title', 'Campus - Your place to share')

@section('content')
    <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-8">
            <h2 class="title is-3">This weeks posts</h2>
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
                                <strong>{{ $post->Username }}</strong>
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
            <div class="column is-2"></div>
        </div>
    </div>
@endsection

