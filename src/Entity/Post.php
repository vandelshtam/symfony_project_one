<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $preveiw;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $article;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $comment_foto_preview;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $comment_foto;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $comment_foto_article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPreveiw(): ?string
    {
        return $this->preveiw;
    }

    public function setPreveiw(?string $preveiw): self
    {
        $this->preveiw = $preveiw;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(?string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCommentFotoPreview(): ?string
    {
        return $this->comment_foto_preview;
    }

    public function setCommentFotoPreview(?string $comment_foto_preview): self
    {
        $this->comment_foto_preview = $comment_foto_preview;

        return $this;
    }

    public function getCommentFoto(): ?string
    {
        return $this->comment_foto;
    }

    public function setCommentFoto(?string $comment_foto): self
    {
        $this->comment_foto = $comment_foto;

        return $this;
    }

    public function getCommentFotoArticle(): ?string
    {
        return $this->comment_foto_article;
    }

    public function setCommentFotoArticle(?string $comment_foto_article): self
    {
        $this->comment_foto_article = $comment_foto_article;

        return $this;
    }
}
