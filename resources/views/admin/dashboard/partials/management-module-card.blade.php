@php
    $modeIcons = [

        'Product Management' => [
            'icon' => 'icons.product-icon',
            'route' => 'product'
        ],

        'Category Management' => [
            'icon' => 'icons.category-icon',
            'route' => 'category'
        ],

        'Segment Management' => [
            'icon' => 'icons.segment-icon',
            'route' => 'segment'
        ],

        'Division Management' => [
            'icon' => 'icons.division-icon',
            'route' => 'division'
        ],

        'Company Management' => [
            'icon' => 'icons.company-icon',
            'route' => 'company'
        ],

        'Contact Person Management' => [
            'icon' => 'icons.company-contact-person-icon',
            'route' => 'contact_person'
        ],

    ];

@endphp

<a
    href="{{ url('/admin/' . $modeIcons[$mode]['route']) }}"
    class="flex flex-col w-full h-40 bg-gray-100 p-2 rounded-sm relative border border-transparent hover:border-black cursor-pointer hover:bg-gray-200 text-gray-600 hover:text-black"
>

    <div class="flex justify-center items-center gap-2">

        <div class="flex size-8 bg-black p-1 rounded-md">

            <x-dynamic-component
                :component="$modeIcons[$mode]['icon']"
                class="size-full text-white"
            />

        </div>

        <h3 class="text-sm font-medium text-black">
            {{ $mode }}
        </h3>

    </div>

    <div>

        <ul class="text-xs list-disc pl-5 mt-3 space-y-1">

            <li>Add Product</li>
            <li>Update Product</li>
            <li>Delete Product</li>
            <li>List Product</li>

        </ul>

    </div>

    <div class="absolute bottom-1 right-1 size-6">

        <x-icons.arrow-icon class="size-full text-red-500" />

    </div>

</a>