<div class="contents group">

    <div
        class="p-2 border border-transparent border-b-gray-300 group-hover:bg-gray-100 group-hover:border group-hover:border-black group-hover:border-r-transparent cursor-pointer"
    >

        <div class="bg-black w-full h-full rounded-lg relative">

            <img
                src="{{ asset('assets/images/background.png') }}"
                alt="Product Image"
                class="rounded object-cover w-full h-full"
            />

        </div>

    </div>

    <div
        class="p-2 border border-transparent border-b-gray-300 group-hover:bg-gray-100 group-hover:border group-hover:border-black group-hover:border-r-transparent group-hover:border-l-transparent cursor-pointer"
    >

        <h3 class="text-sm font-medium">
            {{ $product->title }}
        </h3>

        <p class="text-xs text-gray-600">
            {{ $product->category->name }}
        </p>

    </div>

    <div
        class="p-2 text-right text-xs text-gray-600 cursor-pointer border border-transparent border-b-gray-300 group-hover:bg-gray-100 group-hover:border-black group-hover:border-l-transparent"
    >

        <p>
            {{ $product->created_at }}
        </p>

    </div>

</div>