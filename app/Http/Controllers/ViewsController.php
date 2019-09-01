<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    /**
     * Returns view with posts from last 7 days
     * returns recent view
     */
    public function recent()
    {
        $date = date('d-m-y', strtotime('-7 days'));
        $sql = "SELECT * FROM Posts WHERE DatePosted >= ? ORDER BY DatePosted DESC";
        $posts = DB::SELECT($sql, array($date));
        $sqlComments = 'SELECT * FROM Comments';
        $comments = DB::SELECT($sqlComments);
        return view('general.recent', compact('posts', 'comments'));
    }

    /**
     * Loads users view with all distinct users
     * returns users view
     */
    public function users()
    {
        $sql = 'SELECT DISTINCT Username FROM Posts ORDER BY UPPER(Username) ASC';
        $users = DB::SELECT($sql);
        return view('general.users', compact('users'));
    }

    /**
     * Loads user view with all posts made by that user
     * @param str $username
     * returns user view 
     */
    public function user(string $username)
    {
        $sql = 'SELECT * FROM Posts WHERE Username = ? ORDER BY DatePosted DESC';
        $posts = DB::SELECT($sql, array($username));
        $sqlComments = 'SELECT * FROM Comments';
        $comments = DB::SELECT($sqlComments);
        return view('general.user', compact('posts', 'comments'));
    }
}

