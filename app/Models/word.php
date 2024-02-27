<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Word extends Model
{
    use HasFactory;

    protected $table = 'words';
    protected  $fillable = ['word','definition','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}