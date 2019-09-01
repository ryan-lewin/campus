<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Inserts comment data into DB
     * @param Request $request 
     * @returns back
     */
    public function store(Request $request)
    {
        request()->validate([
            'Username' => 'required',
            'CommentContent' => 'required'
        ]);
        $Username = request('Username');
        $CommentContent = request('CommentContent');
        $DatePosted = date('d-m-y');
        $PostID = request('PostID');
        $sql = 'INSERT INTO Comments(Username, CommentContent, DatePosted, PostID) VALUES(?, ?, ?, ?)';
        DB::INSERT($sql, array($Username, $CommentContent, $DatePosted, $PostID));
        return back();
    }

    /**
     * Deletes comment from DB
     * @param Int $id
     * @returns back
     */
    public function destroy(int $id)
    {
        $sql = 'DELETE FROM Comments WHERE CommentID = ?';
        DB::DELETE($sql, array($id));
        return back();
    }
}
