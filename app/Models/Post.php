<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    // public function getSnippetAttribute(){
    //     return explode("\n\n", $this->body)[0];
    // }

    public function snippet(): Attribute {
        return Attribute::get(function() {
            return explode("\n\n", $this->body)[0];
        });
    }


    public function imageFile(): Attribute {
        return Attribute::get(function() {
            if(parse_url($this->original['image'], PHP_URL_SCHEME) !== null){
                return false;
            } else {
                return $this->original['image'];
            }
        });
    }

    public function image(): Attribute {
        return Attribute::get(function() {
            if(parse_url($this->original['image'], PHP_URL_SCHEME) !== null || !$this->original['image']){
                return $this->original['image'];
            } else {
                return Storage::url($this->original['image']);
            }
        });
    }

    protected static function booted(): void {
        static::deleting(function ($post){
            Storage::disk('public')->delete($post->imageFile);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
