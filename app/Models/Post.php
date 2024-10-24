<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
