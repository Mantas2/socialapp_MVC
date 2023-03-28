<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Exceptions\RouteNotFoundException;
use App\Models\RegisterLikes;
use App\Models\RegisterPosts;
use App\Validator;
use App\View;

class HomeController
{
    private RegisterPosts $registerPosts;
    private RegisterLikes $registerLikes;
    public $getLikes;

    public function __construct()
    {
        $this->registerPosts = new RegisterPosts();
        $this->registerLikes = new RegisterLikes();
    }
    public function index()
    {
        $userposts = $this->registerPosts->getQueryResults("
        SELECT posts.content, users.username, users.id, posts.id AS post_id, COUNT(likes.id) AS likes 
        FROM posts 
        INNER JOIN users ON posts.user_id = users.id
        LEFT JOIN likes ON posts.id = likes.post_id
        GROUP BY posts.id
        ORDER BY posts.created_at DESC
        ");
        return (new View('home/index', ['userposts' => $userposts]))->make();
    }

    public function posts()
    {
        $user_id = $_SESSION['user_id'];
        $content = $_POST['content'];

        $this->registerPosts->putQueryResults("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)", $user_id, $content);

        header('Location: /');
        exit();
    }

    public function likes()
    {
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];

        $this->registerLikes->putQueryResults("INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id)", $user_id, intval($post_id));

        header('Location: /');
        exit();
    }

}