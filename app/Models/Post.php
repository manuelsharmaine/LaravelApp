<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'tbl_post'; 
    // protected $primaryKey = 'post_id';column_name_primary_key
    protected $fillable = ['title','description'];
    protected $guarded = ['photo'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
