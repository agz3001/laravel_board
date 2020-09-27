<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
class PostController extends Controller
{
    public function store(Request $request){
      $this->validate($request, [
        "thread_id"=>"required",
        "body"=>"required"]);
      $thread =Thread::findOrFail($request->thread_id);
      $form =$request->all();
      if (empty($form["title"])){
        $form["title"] ="名無しさん";
      }
      unset($form["_token"]);
      $thread->posts()->create($form);
      return view("post", ["thread"=>$thread]);

    }
}
