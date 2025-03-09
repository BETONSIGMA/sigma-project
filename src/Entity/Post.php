<?php

namespace Bebeton\Backend\Entity;

class Post
{

    private string $title;

    private string $text;

    private $author;

    public function getTitle(): string
    {

        return $this->title;

    }

    public function getText(): string
    {

        return $this->text;

    }

    public function getAuthor(): string
    {

        return $this->author;

    }

    public function setTitle(string $title): void
    {

        $this->title = $title;

    }

    public function setText(string $text): void
    {

        $this->title = $text;

    }

    public function setAuthor(string $author): void
    {

        $this->author = $author;

    }

}