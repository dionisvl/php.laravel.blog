<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * Новость опубликована, если дата публикации меньше текущей даты и поле state задано как 1, и связанная новостная категория опубликована.
     *
     * @param $post_id
     * @param $post_slug
     * @return Response
     */
    public function show($topic_slug, $post_id, $post_slug)
    {
        $post = Post::where([
            ['id', '=', $post_id],
            ['slug', '=', $post_slug],
            ['state', '=', 1],
            ['created_at', '<=', date('Y-m-d H:i:s')],//допустим created_at - Это дата публикции
        ])->firstOrFail();

        if ($post->topic->state != 1) {
            dd('PARENT_CATEGORY_NOT_PUBLISHED');
        }
        $top_posts = $this->getTopPostsOnPostPage($post->topic->id, $post->id);
        return view('news.post', [
            'post' => $post,
            'top_posts' => $top_posts
        ]);
    }

    /**
     * подборка трех самых просматриваемых новостей
     * опубликованных не старше, чем 7 дней назад.
     * (!) только для текущей новостной категории
     * (!) подборка не должна содержать текущую новость
     */
    private function getTopPostsOnPostPage($topic_id, $post_id)
    {
        $posts = Post::where([
            ['state', '=', 1],
            //['created_at', '<=', date('Y-m-d H:i:s', strtotime('-7 days'))],//допустим created_at - Это дата публикции
            ['topic_id', '=', $topic_id],
            ['id', '<>', $post_id]
        ])->orderBy('views_count', 'desc')->take(3)->get();
        return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
