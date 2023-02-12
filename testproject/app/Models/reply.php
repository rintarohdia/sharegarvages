<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
  protected $table = 'reply';
  use HasFactory;
  protected $guarded=["id"];
  public $timestamps = True;
  const CREATED_AT = 'post_time';
  const UPDATED_AT = null;
  public function corp_rel(){
    return $this->belongsTo("App\Models\corp","corp","id");
  }
  public function post_rel(){
    return $this->belongsTo("App\Models\post","post","id");
  }
}
