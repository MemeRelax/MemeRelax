<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            ['Dogs', '🐶'],
            ['Pandas', '🐼'],
            ['Frogs', '🐸'],
            ['Family', '👨‍👩‍👧‍👦'],
            ['Kids', '👼'],
            ['Clowns', '🤡'],
            ['Robots', '🤖'],
        ];

        foreach ($categories as $details) {
            $category = new Category();
            $category->name = $details[0];
            $category->emoji = $details[1];

            $manager->persist($category);
        }

        $manager->flush();
    }
}
