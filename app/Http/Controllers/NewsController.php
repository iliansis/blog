<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Like;
use App\Models\News;


class NewsController extends Controller
{
    public function addNews(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required',          
            'short_descr' => 'required|string|max:255',
            'descr' => 'required|string|max:550',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {           
            News::create([
                'name' => $r->name,
                'user_id' => Auth::id(),            
                'description' => $r->descr,
                'short_description' => $r->short_descr,
            ]);
        }
    }

    public function addComment(Request $r)
    {
        $id = $r->news_id;    
        Comment::create([
            'user_id' => Auth::id(),
            'news_id' => $r->news_id,
            'text' => $r->comment
        ]);
        return redirect()->route('news', $id);
    }

    public function updateNews(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nameUpdate' => 'required',
            'short_descrUpdate' => 'required|string|max:255',
            'descrUpdate' => 'required|string|max:550',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            News::where('id', $r->news_id)->update([
                'name' => $r->nameUpdate,
                'description' => $r->descrUpdate,
                'short_description' => $r->short_descrUpdate,
            ]);
        }
    }

    public function changeImg(Request $r)
    {
        $img = Storage::put('public/img', $r->img);
        News::where('id', $r->img_id)->update([
            'img' => Storage::url($img),
        ]);
        return redirect()->route('profile');
    }

    public function deleteNews($id)
    {
        News::where('id', $id)->delete();
        return redirect()->back();
    }

    public function like($id)
    {
        $like = Like::where('user_id', Auth::id())->where('news_id', $id)->first();
        $likes = News::where('id', $id)->value('likes');
        if (is_null($like)) {
            Like::create([
                'user_id' => Auth::id(),
                'news_id' => $id
            ]);
            News::where('id', $id)->update([
                'likes' => $likes + 1
            ]);
        } else {
            Like::where('user_id', Auth::id())->where('news_id', $id)->delete();
            News::where('id', $id)->update([
                'likes' => $likes - 1
            ]);
        }
        return redirect()->back();
    }
}
