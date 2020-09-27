<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\Post;
class Post extends Model
{
    protected $guarded =array("id");
    protected $fillable =["title", "body", "thread_id"];

    public function thread(){
      return $this->belongsTo("App\Thread");
    }
}
