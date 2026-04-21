@php
    $product = $getRecord();
    $attributeOptions = $product->attributes()
        ->with('options')
        ->get()
        ->map(function($attribute) {
            $pivotOptionId = $attribute->pivot->key_opz;
            $option = $attribute->options->firstWhere('key_opz', $pivotOptionId);

            return [
                'attribute' => $attribute->campo,
                'attribute_it' => $attribute->campoIt,
                'option' => $option ? $option->opzioneIt : '—',
            ];
        });
@endphp

<div class="space-y-4">
    @if($attributeOptions->isEmpty())
        <p class="text-gray-500 text-sm">No attributes assigned to this product.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($attributeOptions as $item)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="font-medium text-gray-700">{{ $item['attribute_it'] }}</div>
                    <div class="text-gray-900 font-semibold">{{ $item['option'] }}</div>
                </div>
            @endforeach
        </div>
    @endif
</div>
