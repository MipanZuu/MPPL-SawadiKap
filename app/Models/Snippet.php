<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory;
    public $table = "snippet";
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'lang',
        'body',
        'body_eng',
    ];
}
