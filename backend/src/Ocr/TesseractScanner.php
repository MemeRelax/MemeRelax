<?php

declare(strict_types=1);

namespace App\Ocr;

use Symfony\Component\HttpFoundation\File\File;
use thiagoalessio\TesseractOCR\TesseractOCR;

use function assert;
use function is_string;
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

    public function scan(File $file): string
    {
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
        assert(is_string($result));

        return $result;
    }
}
