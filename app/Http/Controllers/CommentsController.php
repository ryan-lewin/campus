<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('test index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($postID)
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
        $Username = request('Username');
        $CommentContent = request('CommentContent');
        $DatePosted = date('d-m-y');
        $PostID = request('PostID');
        $sql = 'INSERT INTO Comments(Username, CommentContent, DatePosted, PostID) VALUES(?, ?, ?, ?)';
        DB::INSERT($sql, array($Username, $CommentContent, $DatePosted, $PostID));
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
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = 'DELETE FROM Comments WHERE CommentID = ?';
        DB::DELETE($sql, array($id));
        return back();
    }
}
