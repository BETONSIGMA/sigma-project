<?php

namespace Bebeton\Backend\Core;

abstract class AbstractController
{
    private const VIEWS_DIR = __DIR__ . '/../../views/';

    private const BASE_TEMPLATE_EXTENSION = '.bebeton.html';

    private const BASE_TEMPLATE = 'base';

    protected function renderView(string $view, array $params =[]): Response
    {
        $baseTemplate =$this->getTemplate(self::BASE_TEMPLATE);
        $resultTemplate = str_replace('{# content #}', $this->getTemplate($view), $baseTemplate);
        $response = new Response();
        $response->body = $resultTemplate;
        $response->status = 200;
        $response->headers = [
            'Content-Type' => 'text/html',
        ];

        return $response;
    }

    private function getTemplate(string $view): string
    {
        return file_get_contents(self::VIEWS_DIR . $view . self::BASE_TEMPLATE_EXTENSION);
    }
}