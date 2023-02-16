<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorpApply extends Model
{
    use HasFactory;
    
    protected $table = 'corp_applys';
    protected $guarded = [];
    public function corp_rel(){
        return $this->belongsTo("App\Models\Corp","corp_id","id");
    }
    
    public function user_rel(){
        return $this->belongsTo("App\Models\User","user_id","id");
    } 
}
?>