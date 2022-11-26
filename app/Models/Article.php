<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "article";
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title',
        'description',
        'language',
        'artikel',
    ];
}


