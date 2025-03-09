<?php

namespace Bebeton\Backend\Controllers;

use Bebeton\Backend\Core\AbstractController;
use Bebeton\Backend\Core\Route;
use Bebeton\Backend\Core\Response;

class AdminController extends AbstractController
{
    #[Route("/admin")]
    public function getAdminPage(): Response
    {
        return $this->renderView('admin');
    }
}