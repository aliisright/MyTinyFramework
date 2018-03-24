<?php
namespace Models;

use Providor\DB;

class Post
{
    protected $table_name = 'posts';

    private $id;
    private $title;
    private $body;

    public static function create($props = [])
    {
        $post = new Post();
        $post->title = $props['title'];
        $post->body = $props['body'];

        return $post;
    }

    public function id()
    {
        return $this->id;
    }

    public function field($fieldName)
    {
        return $this->$fieldName;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function setBody($value)
    {
        $this->body = $value;
    }

}
