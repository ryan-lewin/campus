<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function recent()
    {
        $date = date('d-m-y', strtotime('-7 days'));
        $sql = "SELECT * FROM Posts WHERE DatePosted >= ? ORDER BY DatePosted DESC";
        $posts = DB::SELECT($sql, array($date));
        $sqlComments = 'SELECT * FROM Comments';
        $comments = DB::SELECT($sqlComments);
        return view('general.recent', compact('posts', 'comments'));
    }

    public function users()
    {
        $sql = 'SELECT DISTINCT Username FROM Posts ORDER BY Username ASC';
        $users = DB::SELECT($sql);
        return view('general.users', compact('users'));
    }

    public function user($username)
    {
        $sql = 'SELECT * FROM Posts WHERE Username = ? ORDER BY DatePosted DESC';
        $posts = DB::SELECT($sql, array($username));
        $sqlComments = 'SELECT * FROM Comments';
        $comments = DB::SELECT($sqlComments);
        return view('general.user', compact('posts', 'comments'));
    }
}

