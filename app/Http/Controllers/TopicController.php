<?php

namespace App\Http\Controllers;

use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $topics = Topic::where([
            ['state', '=', 1]
        ])->get();

        $top_posts = $this->getTopPostsOnMainPage();

        return view('news.index', ['top_posts' => $top_posts, 'topics' => $topics]);
    }

    /**
     * подборка 3-x самых просматриваемых новостей
     * опубликованных не старше, чем 7 дней назад.
     */
    private function getTopPostsOnMainPage()
    {
        return Post::where([
            ['state', '=', 1],
            //['created_at', '<=', date('Y-m-d H:i:s', strtotime('-7 days'))],//допустим created_at - Это дата публикции
        ])->orderBy('views_count', 'desc')->take(3)->get();
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
     * @param $topic_slug
     * @return Response
     */
    public function show($topic_slug)
    {
        $topic = Topic::where([
            ['slug', '=', $topic_slug],
            ['state', '=', 1]
        ])->firstOrFail();
        $top_posts = $this->getTopPostsOnTopicPage($topic->id);
        $posts = $topic->posts()->orderBy('created_at', 'desc')->paginate(10);
        return view('news.topic', [
            'topic' => $topic,
            'posts' => $posts,
            'top_posts' => $top_posts
        ]);
    }

    /**
     * подборка 3-x самых просматриваемых новостей
     * опубликованных не старше, чем 7 дней назад.
     * (!) только для текущей новостной категории
     */
    private function getTopPostsOnTopicPage($topic_id)
    {
        $posts = Post::where([
            ['state', '=', 1],
            ['created_at', '<=', date('Y-m-d H:i:s', strtotime('-7 days'))],//допустим created_at - Это дата публикции
            ['topic_id', '=', $topic_id]
        ])->orderBy('views_count', 'desc')->take(3)->get();
        return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Topic $topic
     * @return Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Topic $topic
     * @return Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Topic $topic
     * @return Response
     */
    public function destroy(Topic $topic)
    {
        //
    }

    public function getPostsEnabledCount()
    {
        return Topic::posts()->count();
    }
}
