@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('content')

@include('admin.product.modals.deleteMedia')
@include('admin.product.modals.edit')

    @php
        $statuses = [
            1 => 'Idea / Feasibility Study',
            2 => 'Advance Development',
            3 => 'Serial Development',
            4 => 'In Production',
        ];

        $statusColors = [
            1 => 'bg-blue-500',
            2 => 'bg-yellow-500',
            3 => 'bg-purple-500',
            4 => 'bg-green-500',
        ];
    @endphp

    <div class="mb-5">
        <div class="flex justify-between items-center">

            <div>
                <h2 class="text-xl font-bold text-black">
                    Product Details
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Complete information about this product
                </p>
            </div>

            <a href="/admin/product" class="px-4 py-2 text-xs hover:bg-gray-200">
                Back
            </a>

        </div>
    </div>

    {{-- Product Overview --}}
    <div class="bg-white shadow-md p-6 mb-5">

        <div class="flex flex-col md:flex-row justify-between gap-4">

            <div>
                <h1 class="text-2xl font-bold text-black">
                    {{ $product->title }}
                </h1>

                <p class="text-sm text-gray-600 mt-3">
                    {{ $product->description }}
                </p>
            </div>

            <div class="flex">
                <button class="edit-product-btn mx-1 px-4 py-2 text-xs font-semibold rounded h-fit bg-red-500 text-white cursor-pointer">Edit Product</button>

                <div
                    class="mx-1 px-4 py-2 text-xs font-semibold text-white rounded h-fit
            {{ $statusColors[$product->status] ?? 'bg-gray-500' }}">
                    {{ $statuses[$product->status] ?? 'Unknown' }}
                </div>

            </div>

        </div>
    </div>

    {{-- Product Information --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

        <div class="bg-white shadow-md p-5">

            <h3 class="font-semibold text-sm mb-4 border-b pb-2">
                Product Information
            </h3>

            <div class="space-y-3 text-sm">

                <div class="flex justify-between">
                    <span class="font-medium">Category</span>
                    <span>{{ $product->category?->name ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Segment</span>
                    <span>{{ $product->segment?->name ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Division</span>
                    <span>{{ $product->division?->name ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Company</span>
                    <span>{{ $product->company?->name ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Contact Person</span>
                    <span>{{ $product->companyContactPerson?->name ?? '-' }}</span>
                </div>

            </div>

        </div>

        <div class="bg-white shadow-md p-5">

            <h3 class="font-semibold text-sm mb-4 border-b pb-2">
                Timeline
            </h3>

            <div class="space-y-3 text-sm">

                <div class="flex justify-between">
                    <span class="font-medium">Created At</span>
                    <span>
                        {{ $product->created_at?->format('d M Y h:i A') }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Updated At</span>
                    <span>
                        {{ $product->updated_at?->format('d M Y h:i A') }}
                    </span>
                </div>

            </div>

        </div>

    </div>

    {{-- Main Advantages --}}
    <div class="bg-white shadow-md p-5 mb-5">

        <h3 class="font-semibold text-sm mb-4 border-b pb-2">
            Main Advantages
        </h3>

        <ul class="list-disc ml-5 space-y-2 text-sm">

            @forelse($product->mainAdvantage as $advantage)
                <li>{{ $advantage->description }}</li>
            @empty
                <li>No advantages added.</li>
            @endforelse

        </ul>

    </div>

    {{-- Key Facts --}}
    <div class="bg-white shadow-md p-5 mb-5">

        <h3 class="font-semibold text-sm mb-4 border-b pb-2">
            Key Facts
        </h3>

        <ul class="list-disc ml-5 space-y-2 text-sm">

            @forelse($product->keyFact as $fact)
                <li>{{ $fact->description }}</li>
            @empty
                <li>No key facts added.</li>
            @endforelse

        </ul>

    </div>

    {{-- Intellectual Properties --}}
    <div class="bg-white shadow-md p-5 mb-5">

        <h3 class="font-semibold text-sm mb-4 border-b pb-2">
            Intellectual Properties
        </h3>

        <ul class="list-disc ml-5 space-y-2 text-sm">

            @forelse($product->intellectualProperty as $property)
                <li>{{ $property->description }}</li>
            @empty
                <li>No intellectual properties added.</li>
            @endforelse

        </ul>

    </div>

    {{-- Applications --}}
    <div class="bg-white shadow-md p-5 mb-5">

        <h3 class="font-semibold text-sm mb-4 border-b pb-2">
            Applications / Compliance
        </h3>

        <ul class="list-disc ml-5 space-y-2 text-sm">

            @forelse($product->application as $application)
                <li>{{ $application->description }}</li>
            @empty
                <li>No applications added.</li>
            @endforelse

        </ul>

    </div>

    {{-- Product Media --}}
    <div class="bg-white shadow-md p-5">

        <h3 class="font-semibold text-sm mb-4 border-b pb-2">
            Product Media
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            @forelse($product->productMedia as $media)
                @if ($media->media_type === 'image')
                    <img src="{{ asset('storage/' . $media->media_url) }}" alt="{{ $product->title }}"
                        class="w-full h-48 object-cover rounded border">
                @elseif($media->media_type === 'video')
                    <video controls class="w-full h-48 rounded border">
                        <source src="{{ asset('storage/' . $media->media_url) }}">
                    </video>
                @elseif(in_array($media->media_type, ['file', 'pdf']))
                    <a href="{{ asset('storage/' . $media->media_url) }}" target="_blank"
                        class="h-48 border rounded flex items-center justify-center bg-gray-100 hover:bg-gray-200">
                        View File
                    </a>
                @endif

            @empty

                <div class="text-sm text-gray-500">
                    No media uploaded.
                </div>
            @endforelse

        </div>

    </div>
    
    @vite(['resources/js/admin/product/edit.js', 'resources/js/admin/product/delete.js'])
@endsection
