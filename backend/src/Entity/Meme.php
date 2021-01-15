<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Meme
{
    private Uuid $id;

    public MediaObject $image;

    public string $name;

    /**
     * @var Collection
     * @psalm-var Collection<int, Category>
     */
    private Collection $categories;

    /**
     * @var Collection
     * @psalm-var Collection<int, Language>
     */
    private Collection $languages;

    /**
     * @var string[]
     * @psalm-var list<string>
     */
    public array $tags = [];

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->categories = new ArrayCollection();
        $this->languages = new ArrayCollection();
    }

    public function addCategory(Category $category): void
    {
        $this->categories[] = $category;
    }

    public function removeCategory(Category $category): void
    {
        $this->categories->removeElement($category);
    }

    public function getCategories(): array
    {
        return $this->categories->getValues();
    }

    public function addLanguage(Language $language): void
    {
        $this->languages[] = $language;
    }

    public function removeLanguage(Language $language): void
    {
        $this->languages->removeElement($language);
    }

    public function getLanguages(): array
    {
        return $this->languages->getValues();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}
