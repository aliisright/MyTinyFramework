<?php
namespace Models;

use Providor\DB;
use Providor\Helper;
use Models\Model;

class Post extends Model
{
    //To choose a custom table name, uncomment and change the $table_name property
    //protected $table_name = 'posts';
    protected $id;
    protected $title;
    protected $body;


    function __construct(){
		$this->id = null;
		$this->title = null;
    $this->body = null;
  	}

  	public function setId($id){
  		$this->id = $id;
  	}

  	public function getId(){
  		return $this->id;
  	}

  	public function setTitle($title){
  		$this->title = $title;
  	}

  	public function getTitle(){
  		return $this->title;
  	}

    public function setBody($title){
      $this->body = $body;
    }

    public function getBody(){
      return $this->body;
    }


}
