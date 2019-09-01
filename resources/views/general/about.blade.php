@extends('layouts.master_layout')

@section('title', 'About this project')

@section('content')
    <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-8">
            <h1 class="title">About this project</h1>
            <hr>
            <h2 class="title is-5">Entity Relationship Diagram</h2>
            <img class="image" src="{{ asset('images/erd.jpg') }}" alt="">
            <p>Created a database containing two tables, Posts and Comments. There is a one to many relationship between
                Post and Comment, with comments being optional. The reasoning behind this was that a post must exist for a comment 
                to exist, but a post can exist without comments.
            </p>
            <hr>
            <h2 class="title is-5">Code Structure</h2>
            I chose to use a controller for posts, comments and views. This allowed me to keep my web.php file clean and easy to work with.
            The smaller controllers were more easily managed and made debugging a simpler process. All views were loaded with the use of controllers.
            <hr>
            <h2 class="title is-5">Form Validation and SQL Sanitisation</h2>
            <p>I used standard SQL sanitisation practices to ensure safe input before loading new data into the database. This included 
                use of the ? wildcard. Form validation was handled both client and server side. Client side form validation is not reliable as 
                the source code can be altered through the web developer tools. Using the required class I was able to handle this issue.
            </p>
            <hr>
        </div>
        <div class="column is-2"></div>
    </div>
@endsection