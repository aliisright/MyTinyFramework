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

    public static function store($table_name, $request)
    {
        // $post = new Post();
        // $post->title = $request['title'];
        // $post->body = $request['body'];

        // $fields = implode(',', array_keys($request));
        // $values = Helper::getPreparedStatementValues(array_keys($request));
        //
        // $params = [];
        // foreach($request as $key => $value) {
        //   $params[':'.$key] = $value;
        // }

        $sql = "INSERT INTO ".$table_name." (".$fields.") VALUES(".$values.")";

        Helper::sqlBuilder('insert', 'posts', $request);

        DB::insert($sql, $params);
    }
}
