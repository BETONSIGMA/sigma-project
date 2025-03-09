<?php

namespace Bebeton\Backend\Controllers;

use Bebeton\Backend\Core\AbstractController;
use Bebeton\Backend\Core\Route;
use Bebeton\Backend\Core\Response;
use Bebeton\Backend\Entity\Post;

class HomeController extends AbstractController
{
    private array $posts;

    public function __construct()
    {
        $post1 = new Post();
        $post1->setTitle('1');
        $post1->setText('2');
        $post1->setAuthor('3');
        
        $post2 = new Post();
        $post2->setTitle('4');
        $post2->setText('5');
        $post2->setAuthor('6');

        $post3 = new Post();
        $post3->setTitle('7');
        $post3->setText('8');
        $post3->setAuthor('9');

        $this->posts = [
            $post1,
            $post2,
            $post3
        ];

    }

    #[Route("/home")]
    public function getHomePage(): Response
    {
        return $this->renderView('home', $this->posts);
    }
}



