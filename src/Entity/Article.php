<?php
//1. Déclaration du namespace
namespace App\Entity;

//2. Import de classes
use DateTimeImmutable;
use App\Entity\Category;

class Article
{

    private int $idArticle;
    private string $title;
    private string $content;
    private ?string $image;
    private DateTimeImmutable $createdAt;
    private Category $category;


    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the value of idArticle
     */
    public function setIdArticle(int $idArticle): self
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Set the value of content
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the value of image
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the value of createdAt
     * @TODO Il va falloir modifier cette méthode pour pouvoir
     * lui donner en paramètre une chaîne de caractères ou bien 
     * directement un objet DateTimeImmutable
     */
    public function setCreatedAt(string|DateTimeImmutable $createdAt): self
    {
        if (is_string($createdAt)) {
            $createdAt = new DateTimeImmutable($createdAt);
        }

        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set the value of categoryId
     */
    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of idArticle
     */
    public function getIdArticle(): int
    {
        return $this->idArticle;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the value of content
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Get the value of image
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Get the value of categoryId
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * Retourne le nom de la catégorie associé à l'article
     */
    public function getCategoryName(): string
    {
        return $this->category->getName();
    }

    /**
     * Retourne la date de création de l'article formatté
     */
    public function getFormattedCreatedAt(): string
    {
        return $this->createdAt->format('d/m/Y');
    }
}
