<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Список всех статей блога
    public function blogIndex()
    {
        $posts = Post::where('type', 'blog')
            ->where('is_published', true)
            ->latest()
            ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    // Список всех новостей
    public function newsIndex()
    {
        $news = Post::where('type', 'news')
            ->where('is_published', true)
            ->latest()
            ->paginate(15);

        return view('news.index', compact('news'));
    }

    // Просмотр конкретной статьи или новости
    public function show(Post $post)
    {
        // Проверяем, опубликован ли пост
        if (!$post->is_published) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }
}
