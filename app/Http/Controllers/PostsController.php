<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Loads the home view with posts and comments
     * @returns home view
     */
    public function index()
    {
        $sql = 'SELECT * FROM Posts ORDER BY PostID DESC';
        $posts = DB::SELECT($sql);
        $sqlComments = 'SELECT * FROM Comments';
        $comments = DB::SELECT($sqlComments);
        return view('general.home', compact('posts', 'comments'));
    }

    /**
     * Stores new posts to the DB
     * @param Request $request
     * returns back
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
     * Loads post view with comments attached to that post
     * @param int $id
     * returns post view
     */
    public function show(int $id)
    {
        $sqlPost = 'SELECT * FROM Posts WHERE PostID = ?';        
        $sqlComments = 'SELECT * FROM Comments WHERE PostID = ? ORDER BY DatePosted DESC';
        $post = DB::SELECT($sqlPost, array($id));
        $comments = DB::SELECT($sqlComments, array($id));        
        return view('general.post', compact('post', 'comments'));
    }

    /**
     * Loads edit view with post selected
     * @param int $id
     * returns edit
     */
    public function edit(int $id)
    {
        $sql = 'SELECT * FROM Posts WHERE PostID = ?';
        $post = DB::SELECT($sql, array($id));
        return view('general.edit', compact('post'));
    }

    /**
     * Updates post in DB with user input
     * @param Request $request
     * @param int $id
     * returns post view via show route
     */
    public function update(Request $request, int $id)
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
     * Deletes selected post from DB
     * @param int $id
     * returns home via index route
     */
    public function destroy(int $id)
    {
        $sqlComments = 'DELETE FROM Comments WHERE PostID = ?';
        $sqlPosts = 'DELETE FROM Posts WHERE PostID = ?';
        DB::DELETE($sqlComments, array($id));
        DB::DELETE($sqlPosts, array($id));
        return redirect()->action('PostsController@index');
    }
}
