<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function welcome(Request $r)
    {
        $news = News::paginate(10);
        return view('welcome', ['news' => $news]);
    }

    public function veryfication(Request $r)
    {
        return view('veryfication');
    }

    public function profile(Request $r)
    {
        $news = News::where('user_id', Auth::id())->paginate(8);
        return view('profile', ['news' => $news]);
    }

    public function reset_password(Request $r)
    {
        return view('change_password', ['request' => $r]);
    }

    public function addNews_Page(Request $r)
    {

        return view('addNews');
    }

    public function news($id)
    {
        $news = News::where('id', $id)->first();
        $like = Like::where('user_id', Auth::id())->where('news_id', $id)->first();
        $comments = Comment::where('news_id', $id)->join('users', 'comments.user_id', 'users.id')->paginate(8);
        return view('news', ['news' => $news, 'comments' => $comments, 'like' => $like]);
    }

    public function updateNewsPage($id)
    {
        $news = News::where('id', $id)->first();
        return view('updateNews', ['news' => $news]);
    }

    public function feedback(Request $r)
    {
        return view('feedback');
    }

    public function updateImg($id)
    {
        $news = News::where('id', $id)->first();
        return view('updateImg', ['news' => $news]);
    }
}
