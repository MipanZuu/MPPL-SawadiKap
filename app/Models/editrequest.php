<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editrequest extends Model
{
    use HasFactory;
    public $table = "editrequest";
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'post_id',
        'title',
        'description',
        'lang',
        'artikel',
    ];
}
