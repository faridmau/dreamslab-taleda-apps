# Product-Attribute-Option Relationships

## Overview

This document explains the many-to-many relationship between Products, Attributes, and Options in the SMAC database.

## Database Structure

- **smac_prodotti** (Products) - Primary key: `key_pro`
- **smac_campi** (Attributes) - Primary key: `key_cam`
- **smac_opzioni** (Options) - Primary key: `key_opz`, Foreign key: `key_cam`
- **smac_campi_opzioni_prodotti** (Pivot) - Contains: `key_cam`, `key_opz`, `key_pro`

## Models Created

### 1. SmacModel (Base Model)
Located at: `app/Models/SmacModel.php`

This base model handles the database connection for SMAC tables, which don't use the 'lv_' prefix.

```php
abstract class SmacModel extends BaseModel
{
    protected $connection = 'mysql_no_prefix';
}
```

### 2. Product Model
Located at: `app/Models/Product.php`

**Relationships:**
- `attributes()` - Get all attributes for this product with their selected options
- `options()` - Get all options for this product

### 3. Attribute Model
Located at: `app/Models/Attribute.php`

**Relationships:**
- `options()` - Get all options for this attribute (HasMany)
- `products()` - Get all products that have this attribute

### 4. Option Model
Located at: `app/Models/Option.php`

**Relationships:**
- `attribute()` - Get the attribute this option belongs to (BelongsTo)
- `products()` - Get all products that have this option

## Example Queries

### Basic Query: Get Product with Attributes and Options

```php
use App\Models\Product;

$product = Product::with(['attributes' => function($query) {
    $query->with(['options']);
}])->first();

// Display output
echo 'Product: ' . $product->nome . PHP_EOL;

foreach ($product->attributes as $attribute) {
    echo '  - ' . $attribute->campo . ': ';
    
    // Get the specific option for this product-attribute combination
    $pivotOptionId = $attribute->pivot->key_opz;
    $option = $attribute->options->firstWhere('key_opz', $pivotOptionId);
    
    if ($option) {
        echo $option->opzioneIt . PHP_EOL;
    }
}
```

**Output Example:**
```
Product: NECKLACE CHOCKER WHITE GOLD DIAMONDS 10ct RUBY 
  - Oro: Bianco
  - Pietre preziose: Diamanti / Rubini
  - Peso: 86.7 GR
  - Gioielli di prestigio: Usato
  - Scatola: Si
```

### Get Product by ID with Attributes

```php
$product = Product::with(['attributes.options'])
    ->where('key_pro', 1)
    ->first();
```

### Get All Products with a Specific Attribute

```php
use App\Models\Attribute;

$attribute = Attribute::where('campo', 'Oro')
    ->with(['products'])
    ->first();

foreach ($attribute->products as $product) {
    echo $product->nome . PHP_EOL;
}
```

### Get All Products with a Specific Option

```php
use App\Models\Option;

$option = Option::where('opzioneIt', 'Bianco')
    ->with(['products'])
    ->first();

foreach ($option->products as $product) {
    echo $product->nome . PHP_EOL;
}
```

### Advanced Query: Filter Products by Attribute and Option

```php
$products = Product::whereHas('attributes', function($query) {
    $query->where('smac_campi.campo', 'Oro')
        ->whereHas('options', function($q) {
            $q->where('opzioneIt', 'Bianco');
        });
})->get();
```

### Create Helper Method (Optional)

You can add this to the Product model for easier access:

```php
public function getAttributeOptions()
{
    return $this->attributes()
        ->with('options')
        ->get()
        ->map(function($attribute) {
            $pivotOptionId = $attribute->pivot->key_opz;
            $option = $attribute->options->firstWhere('key_opz', $pivotOptionId);
            
            return [
                'attribute' => $attribute->campo,
                'option' => $option ? $option->opzioneIt : null,
                'attribute_key' => $attribute->key_cam,
                'option_key' => $pivotOptionId,
            ];
        });
}
```

Usage:
```php
$product = Product::find(1);
$attributeOptions = $product->getAttributeOptions();
```

## Important Notes

1. **Database Connection**: All SMAC models use the `mysql_no_prefix` connection defined in `config/database.php`
2. **Primary Keys**: None of these tables use `id` as the primary key
3. **Timestamps**: These tables don't use Laravel's timestamp columns
4. **Pivot Data**: The pivot table includes `key_opz` which links to the specific option selected for each product-attribute combination

## Configuration

A new database connection was added to `config/database.php`:

```php
'mysql_no_prefix' => [
    'driver' => 'mysql',
    // ... same as mysql connection but with:
    'prefix' => '',  // No prefix
],
```

If you add more SMAC tables, extend them from `SmacModel` to automatically use the correct connection.
