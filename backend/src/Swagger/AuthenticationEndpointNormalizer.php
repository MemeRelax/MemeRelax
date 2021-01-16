<?php

declare(strict_types=1);

namespace App\Swagger;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function array_merge_recursive;
use function assert;
use function is_array;

final class AuthenticationEndpointNormalizer implements NormalizerInterface
{
    public function __construct(private NormalizerInterface $normalizer)
    {
    }

    /**
     * @param mixed $data
     */
    public function supportsNormalization($data, ?string $format = null): bool
    {
        return $this->normalizer->supportsNormalization($data, $format);
    }

    /**
     * @param mixed $object
     */
    public function normalize($object, ?string $format = null, array $context = []): array
    {
        $docs = $this->normalizer->normalize($object, $format, $context);
        assert(is_array($docs));

        return array_merge_recursive(
            $docs,
            [
                'components' => [
                    'schemas' => [
                        'Token' => [
                            'type' => 'object',
                            'properties' => [
                                'token' => [
                                    'type' => 'string',
                                    'readOnly' => true,
                                ],
                            ],
                        ],
                        'Credentials' => [
                            'type' => 'object',
                            'properties' => [
                                'username' => [
                                    'type' => 'string',
                                    'example' => 'api',
                                ],
                                'password' => [
                                    'type' => 'string',
                                    'example' => 'api',
                                ],
                            ],
                        ],
                    ],
                ],
                'paths' => [
                    '/api/token' => [
                        'post' => [
                            'tags' => ['Token'],
                            'operationId' => 'postCredentialsItem',
                            'summary' => 'Get JWT token to login.',
                            'requestBody' => [
                                'description' => 'Create new JWT Token',
                                'content' => [
                                    'application/json' => [
                                        'schema' => ['$ref' => '#/components/schemas/Credentials'],
                                    ],
                                ],
                            ],
                            'responses' => [
                                Response::HTTP_OK => [
                                    'description' => 'Get JWT token',
                                    'content' => [
                                        'application/json' => [
                                            'schema' => ['$ref' => '#/components/schemas/Token'],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
    }
}
