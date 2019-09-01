<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = 'SELECT * FROM Posts ORDER BY DatePosted DESC';
        $posts = DB::SELECT($sql);
        $sqlComments = 'SELECT * FROM Comments';
        $comments = DB::SELECT($sqlComments);
        return view('general.home', compact('posts', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('test create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'PostTitle' => 'required',
            'Username' => 'required',
            'PostContent' => 'required'
        ]);
        $postTitle = request('PostTitle');
        $username = request('Username');
        $postContent = request('PostContent');
        $date = date('d/m/y');
        $sql = 'INSERT INTO Posts(PostTitle, Username, Postcontent, DatePosted) values(?, ?, ?, ?)';
        DB::INSERT($sql, array($postTitle, $username, $postContent, $date));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sqlPost = 'SELECT * FROM Posts WHERE PostID = ?';        
        $sqlComments = 'SELECT * FROM Comments WHERE PostID = ? ORDER BY DatePosted DESC';
        $post = DB::SELECT($sqlPost, array($id));
        $comments = DB::SELECT($sqlComments, array($id));        
        return view('general.post', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sql = 'SELECT * FROM Posts WHERE PostID = ?';
        $post = DB::SELECT($sql, array($id));
        return view('general.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'PostTitle' => 'required',
            'Username' => 'required',
            'PostContent' => 'required'
        ]);
        $PostID = $id;
        $PostTitle = request('PostTitle');
        $PostContent = request('PostContent');
        $sql = 'UPDATE Posts SET PostTitle = ?, PostContent = ? WHERE PostID = ?';
        DB::UPDATE($sql, array($PostTitle, $PostContent, $id));
        return redirect()->action('PostsController@show', compact('PostID'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sqlComments = 'DELETE FROM Comments WHERE PostID = ?';
        $sqlPosts = 'DELETE FROM Posts WHERE PostID = ?';
        DB::DELETE($sqlComments, array($id));
        DB::DELETE($sqlPosts, array($id));
        return redirect()->action('PostsController@index');
    }
}
