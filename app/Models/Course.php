<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    // Relacion con un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
    // Realacion con muchos posts
    public function posts(){
        return $this->hasMany(Post::class);
    }
    // Campo virtual
    public function getExcerptAttribute()
    {
        return substr($this->description,0,80)."...";
    }
    // Metodo personalizado
    public function similar(){
        return $this->where('category_id',$this->category_id)
            ->with('user')
            ->take(2)
            ->get();
    }
}
