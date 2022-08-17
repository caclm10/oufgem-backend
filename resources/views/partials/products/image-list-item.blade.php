<div class="col position-relative h-250px" id="productImage_{{ $productImage->id }}">
    <x-button.delete action="{{ route('products.images.destroy', [$productImage]) }}" message="Delete this product image?"
        multiImage="productImage_{{ $productImage->id }}" formClass="thumbnail-1-delete" :outline="false" circle sm />
    <img src="{{ $productImage->url }}" alt="{{ $productImage->id }} product" class="img-thumbnail thumbnail-1">
</div>
