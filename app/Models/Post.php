<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Http;

class Post extends Model
{
    public $timestamps = true;

    protected $fillable = [
        "title",
        "body",
        "userId",
        "created_at",
        "updated_at",
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function createPost()
    {
        $posts = Http::get("https://jsonplaceholder.typicode.com/posts")->json();

        Post::truncate();
        foreach ($posts as $post) {
            $article = new Post();
            $article->title = $post["title"];
            $article->body = $post["body"];
            $article->userId = User::all()->random()->id;
            $article->save();
        }
    }
}
