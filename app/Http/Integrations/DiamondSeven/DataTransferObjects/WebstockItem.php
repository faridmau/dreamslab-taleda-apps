<?php

namespace App\Http\Integrations\DiamondSeven\DataTransferObjects;

class WebstockItem
{
    /**
     * @param  Branch[]  $branches
     * @param  ArticlePicture[]  $articlePictures
     * @param  array<mixed>  $attributes
     */
    public function __construct(
        public readonly int $articleId,
        public readonly ?string $barcode,
        public readonly ?string $reference,
        public readonly int $qty,
        public readonly int $categoryId,
        public readonly int $productGroupId,
        public readonly int $brandId,
        public readonly int $productLineId,
        public readonly string $category,
        public readonly string $productGroup,
        public readonly string $brand,
        public readonly string $productLine,
        public readonly string $shortDescription,
        public readonly string $description,
        public readonly ?string $webTxtDe,
        public readonly ?string $webTxtFr,
        public readonly ?string $webTxtIt,
        public readonly ?string $webTxtEn,
        public readonly ?string $webTxtLongDe,
        public readonly ?string $webTxtLongFr,
        public readonly ?string $webTxtLongIt,
        public readonly ?string $webTxtLongEn,
        public readonly ?int $warrantyInMonths,
        public readonly int $taxCodeId,
        public readonly float $taxRate,
        public readonly TaxCode $taxCode,
        public readonly float $cost,
        public readonly float $retail,
        public readonly float $list,
        public readonly ?float $wholesale,
        public readonly array $branches,
        public readonly array $articlePictures,
        public readonly array $attributes,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            articleId: $data['ArticleId'],
            barcode: $data['Barcode'],
            reference: $data['Reference'],
            qty: $data['Qty'],
            categoryId: $data['CategoryId'],
            productGroupId: $data['ProductGroupId'],
            brandId: $data['BrandId'],
            productLineId: $data['ProductLineId'],
            category: $data['Category'],
            productGroup: $data['ProductGroup'],
            brand: $data['Brand'],
            productLine: $data['ProductLine'],
            shortDescription: $data['ShortDescription'],
            description: $data['Description'],
            webTxtDe: $data['WebTxtDe'],
            webTxtFr: $data['WebTxtFr'],
            webTxtIt: $data['WebTxtIt'],
            webTxtEn: $data['WebTxtEn'],
            webTxtLongDe: $data['WebTxtLongDe'],
            webTxtLongFr: $data['WebTxtLongFr'],
            webTxtLongIt: $data['WebTxtLongIt'],
            webTxtLongEn: $data['WebTxtLongEn'],
            warrantyInMonths: $data['WarrantyInMonths'],
            taxCodeId: $data['TaxCodeId'],
            taxRate: $data['TaxRate'],
            taxCode: TaxCode::fromArray($data['TaxCode']),
            cost: $data['Cost'],
            retail: $data['Retail'],
            list: $data['List'],
            wholesale: $data['Wholesale'],
            branches: array_map(fn (array $branch) => Branch::fromArray($branch), $data['Branch']),
            articlePictures: array_map(fn (array $picture) => ArticlePicture::fromArray($picture), $data['ArticlePictures']),
            attributes: $data['Attributes'],
        );
    }

    public function isInStock(): bool
    {
        return $this->qty > 0;
    }

    public function primaryPictureUrl(): ?string
    {
        return $this->articlePictures[0]?->pictureUrl ?? null;
    }
}
