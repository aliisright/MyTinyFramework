<?php
namespace Requests;

use Providor\Helper;
class PostRequest
{

  function __construct()
  {
    return new PostRequest();
  }

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
}
