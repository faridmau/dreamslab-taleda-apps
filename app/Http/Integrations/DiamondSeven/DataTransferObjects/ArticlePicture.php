<?php

namespace App\Http\Integrations\DiamondSeven\DataTransferObjects;

class ArticlePicture
{
    public function __construct(
        public readonly int $articleId,
        public readonly string $pictureUrl,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            articleId: $data['ArticleId'],
            pictureUrl: $data['PictureUrl'],
        );
    }
}
