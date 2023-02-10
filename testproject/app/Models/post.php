<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  use HasFactory;
  protected $table = 'post';
  protected $guarded=["id"];
  public $timestamps = True;
  const CREATED_AT = 'post_time';
  const UPDATED_AT = null;
  #name of function and name of column must be different, because laravel can not tell a from b.

  public function prefecture_rel(){
    return $this->belongsTo("App\Models\prefecture","prefecture","id");
  }
  public function corp_rel(){
    return $this->belongsTo("App\Models\corp","corp","id");
  }
  }
