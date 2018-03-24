<?php
namespace Models;

use Providor\DB;
use Providor\Helper;
use Models\Model;

class Post extends Model
{
    protected $table_name = 'posts';

    private $id;
    private $title;
    private $body;

    public static function create($request)
    {
        //$table_name = lcfirst(get_class($this).'s');
        $sqlBuilder = Helper::insert($request);
    }



}
