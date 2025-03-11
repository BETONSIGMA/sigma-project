<?php

namespace Bebeton\Backend\Controllers;

use Bebeton\Backend\Core\AbstractController;
use Bebeton\Backend\Core\Route;
use Bebeton\Backend\Core\Response;
use Bebeton\Backend\Entity\Post;
use Symfony\Component\Yaml\Yaml;
use Bebeton\Backend\Core\Database\DatabaseFactory;
class HomeController extends AbstractController
{
    private array $posts;

    public function __construct()
    {

        $parser = Yaml::parseFile(__DIR__ . '/../../config/database.yml');
        $databaseFactory = new DatabaseFactory(
            $parser['pdo']['host'],
            $parser['pdo']['port'],
        $parser['pdo']['username'],
        $parser['pdo']['password'],
          $parser['pdo']['db_name']
            );

            $database = $databaseFactory->create();
            $queryResult = $database->query('SELECT * FROM posts')->fetchAll(\PDO::FETCH_ASSOC);

            foreach($queryResult as $rawPost) {
                $post = new Post($rawPost['title'], $rawPost['text'], $rawPost['author']);
                $this->posts[] = $post;
            }

    }

    #[Route("/home")]
    public function getHomePage(): Response
    {
        return $this->renderView('home', $this->posts);
    }
}



