<?php
//Parent Classes
    require 'Models/Model.php';

//Providors
    //Database
    require 'Providor/DB.php';
    //Request
    require 'Controllers/Requests/Request.php';
    require 'Controllers/Requests/Getter.php';
    //Helper functions
    require 'Providor/Helpers/Helper.php';
    require 'Providor/Helpers/HelperFunctions.php';

//Models
    require 'Models/Post.php';

//Controllers
    require 'Controllers/Requests/PostRequest.php';
    require 'Controllers/PostController.php';
