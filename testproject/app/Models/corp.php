<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class corp extends Model
{
  use HasFactory;
  protected $table="corp";
  protected $guarded = [];
  public $timestamps = false;
  public function prefecture(){
    return $this->belongsTo("App\Models\prefecture","prefecture_id","id");
  }

}
