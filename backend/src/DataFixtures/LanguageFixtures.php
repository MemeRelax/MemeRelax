<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $languages = [
            ['Polish', '🇵🇱'],
            ['English', '🇬🇧'],
            ['Spanish', '🇪🇸'],
            ['German', '🇩🇪'],
            ['French', '🇫🇷'],
            ['None', '🌍'],
            ['Other', '🏳'],
        ];

        foreach ($languages as $details) {
            $language = new Language();
            $language->name = $details[0];
            $language->emoji = $details[1];

            $manager->persist($language);
        }

        $manager->flush();
    }
}
