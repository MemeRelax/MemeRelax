<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Meme
{
    private Uuid $id;

    /** @psalm-suppress PropertyNotSetInConstructor */
    public ?Image $image;

    /** @psalm-suppress PropertyNotSetInConstructor */
    public ?string $name;

    /** @var Collection<int, Category> */
    private Collection $categories;

    /** @var Collection<int, Language> */
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

    /** @return Category[] */
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

    /** @return Language[] */
    public function getLanguages(): array
    {
        return $this->languages->getValues();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}
