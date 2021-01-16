<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class LanguageFixtures extends Fixture
{
    public function __construct(private UserPasswordEncoderInterface $encoder)
    {

    }

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
