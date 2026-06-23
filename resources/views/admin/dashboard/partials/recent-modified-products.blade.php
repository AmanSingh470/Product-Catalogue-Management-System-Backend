<div class="h-full">

    <h3 class="font-medium mb-3">
        Recent Modified Products
    </h3>
    
    <div class="grid grid-cols-[120px_1fr_95px] grid-rows-[1fr_1fr_1fr_1fr] h-full border-t border-gray-300 mb-4">
        @foreach ($recentProducts as $product)
            @include(
                'admin.dashboard.partials.recent-product-card',
                ['product' => $product]
            )
        @endforeach
    </div>

</div>
