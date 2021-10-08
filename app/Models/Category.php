<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'thumbnail', 'description', 'parent_id'];

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    //Dùng truyền vào input edit.blade
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
    // Con
    public function children()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    //Chau
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    // List cate in posts
    public function root()
    {
        return $this->parent ? $this->parent->root() : $this;
    }
}
