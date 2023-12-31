<?php

namespace App\Models\User;

use App\Models\User;
use App\Models\Admin\Newspost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function news() {
        return $this->belongsTo(Newspost::class, 'news_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
