<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;
class Thread extends Model
{
    protected $guarded =array("id");
    protected $fillable =["title"];

    public function posts(){
      return $this->hasMany("App\Post", "thread_id");
    }
}
