<?php
namespace Controllers;

use Providor\Helper;
use Requests\Request;
use Models\Post;
use Providor\DB;

class PostController
{
    protected $table_name = 'posts';

    private $id;
    private $title;
    private $body;

    public static function index()
    {
        return render('views/test.php');
    }

    public static function create()
    {
        if(Helper::postRequestCatcher()) {PostController::store(Helper::postRequestCatcher());}
        return render('views.test');
    }

    public static function store(Request $request)
    {
        $post = Post::save([
          'title' => $request->input('title'),
          'body' => $request->input('body')
        ]);
    }
}
