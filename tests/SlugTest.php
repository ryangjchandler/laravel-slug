<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use RyanChandler\Slug\Attributes\Slug;
use RyanChandler\Slug\Concerns\HasSlug;

class Post extends Model
{
    use HasSlug;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        Schema::create('posts', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();
        });
    }
}

#[Slug(source: 'name')]
class CustomSource extends Post
{
    protected $table = 'posts';
}

#[Slug(column: 'path')]
class CustomColumn extends Post
{
    protected $table = 'posts';
}

test('it can generate a slug', function () {
    $post = Post::create([
        'title' => 'Hello, world!',
    ]);

    expect($post)
        ->slug->toBe('hello-world');
});

it('can generate a slug with a custom source column', function () {
    $post = CustomSource::create([
        'name' => 'Ryan Chandler',
    ]);

    expect($post)
        ->slug->toBe('ryan-chandler');
});

it('can generate a slug and store in custom column', function () {
    $post = CustomColumn::create([
        'title' => 'Ryan Chandler',
    ]);

    expect($post)
        ->path->toBe('ryan-chandler')
        ->slug->toBeNull();
});
