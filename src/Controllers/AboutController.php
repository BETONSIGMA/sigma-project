<?php

namespace Bebeton\Backend\Controllers;

use Bebeton\Backend\Core\AbstractController;
use Bebeton\Backend\Core\Route;
use Bebeton\Backend\Core\Response;

class AboutController extends AbstractController
{
    #[Route("/about")]
    public function getAboutPage(): Response
    {
        return $this->renderView('about');
    }
}