<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class File extends Model
{
    protected $fillable = ['path', 'name', 'size'];

    public function user()
    {
        return $this->belongsTo(User::class);
    
    }
}
