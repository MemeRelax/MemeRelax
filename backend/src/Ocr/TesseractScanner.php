<?php

declare(strict_types=1);

namespace App\Ocr;

use Symfony\Component\HttpFoundation\File\File;
use thiagoalessio\TesseractOCR\TesseractNotFoundException;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Webmozart\Assert\Assert;

use function range;

final class TesseractScanner implements Scanner
{
    /**
     * @param string[] $languages
     *
     * @psalm-param non-empty-list<string> $languages
     */
    public function __construct(/** @var string[] */ private array $languages)
    {
    }

    public function scan(File $file): ?string
    {
        try {
            $tesseract = new TesseractOCR($file->getPathname());
            $tesseract->lang(...$this->languages);
            /** @psalm-suppress TooManyArguments */
            $tesseract->allowlist(
                range('A', 'Z'),
                range('a', 'z'),
                range('0', '9'),
                ['.', ',', '?', '!', '-', '\'', '"', ' ']
            );

            $result = $tesseract->run();

            Assert::string($result);

            return $result;
        } catch (TesseractNotFoundException) {
            // TODO: Log this somewhere
            return null;
        }
    }
}
