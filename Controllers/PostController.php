<?php
namespace Controllers;

use Providor\Helper;
use Requests\PostRequest;
use Models\Post;
use Providor\DB;

class PostController
{
    protected $table_name = 'posts';

    private $id;
    private $title;
    private $body;

    public static function create()
    {
        $request = PostRequest::create();
        if($request) {
          PostController::store('posts', $request);
        }

        require 'views/test.php';
    }

    public static function store(Post $post, $table_name, $request)
    {
        $post = Post::create([
          'title' => $request['title'],
          'body' => $request['body']
        ]);

        //Helper::insert($table_name, $request);
    }
}
