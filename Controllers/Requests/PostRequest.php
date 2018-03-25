<?php
namespace Requests;

use Providor\Helper;
use Requests\Request;

class PostRequest extends Request
{

  public static function create()
  {
      $array = [];
      if(isset($_POST['title'], $_POST['body'])) {
        $title = htmlspecialchars($_POST['title']);
        $body = htmlspecialchars($_POST['body']);

        $array = [
          'title' => $title, 'body' => $body
        ];
      }
      return $array;
  }

  public function post($request)
  {

  }
}
