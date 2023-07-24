<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newspost extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['category_id','subcategory_id', 'user_id', 'news_title', 'image','news_details', 'tags', 'breaking_news', 'top_slider', 'first_section_three', 'first_section_eight', 'post_date', 'post_month', 'status', 'view_count'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
