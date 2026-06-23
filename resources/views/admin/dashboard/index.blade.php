@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="h-55 rounded-lg p-10 bg-cover bg-center bg-no-repeat relative z-1"
        style="background-image: url('/assets/images/background.png')">
        <div class="absolute inset-0 bg-gradient-to-r from-black/100 via-black/70 to-black/20 rounded-lg"></div>

        <h4 class="text-red-500 text-xs font-medium mb-3 relative uppercase">
            welcome {{ $username }}
        </h4>

        <div class="w-70 relative">

            <h2 class="text-white font-medium text-2xl mb-3">
                Product Catalogue Management System
            </h2>

            <h5 class="text-white text-xs font-light">
                Manage and organize your automotive product catalogue efficiently.
            </h5>

        </div>

    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 mt-5 gap-3">

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.product-icon />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Total Products
                </h6>

                <h6 class="text-xl text-red-500 font-medium">
                    {{ $stats['totalProducts' ] }}
                </h6>

                <p class="text-xs">
                    products
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.category-icon />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Total Categories
                </h6>

                <h6 class="text-xl text-red-500 font-medium">
                    {{ $stats['totalCategories' ] }}
                </h6>

                <p class="text-xs">
                    categories
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.segment-icon />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Total Segments
                </h6>

                <h6 class="text-xl text-red-500 font-medium">
                    {{ $stats['totalSegments'] }}
                </h6>

                <p class="text-xs">
                    segments
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.division-icon />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Total Divisions
                </h6>

                <h6 class="text-xl text-red-500 font-medium">
                    {{ $stats['totalDivisions'] }}
                </h6>

                <p class="text-xs">
                    divisions
                </p>

            </div>

        </div>

    </div>

    <div class="flex mt-5 gap-3 justify-center">

        <div class="bg-white rounded-md p-3 w-full">

            <h3 class="font-medium text-md mb-3">
                Management Modules
            </h3>

            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center gap-3">
                @php
                    $modules = [
                        'Product Management',
                        'Category Management',
                        'Segment Management',
                        'Division Management',
                        'Company Management',
                        'Contact Person Management',
                    ];

                @endphp

                @foreach ($modules as $module)
                    @include('admin.dashboard.partials.management-module-card', [
                        'mode' => $module,
                    ])
                @endforeach
            </div>

        </div>

    </div>

    <div class="mt-5 flex-1 p-3 bg-white rounded-md relative">

        @include('admin.dashboard.partials.recent-modified-products')

        <div class="flex absolute bottom-0 items-center w-37 justify-around">

            <a href="admin/product" class="font-medium text-sm">
                <p class="text-red-500">
                    View All Products
                </p>
            </a>

            <div class="size-6">
                <x-icons.arrow-icon class="text-red-500"/>
            </div>

        </div>

    </div>

    <div class="text-center mt-5 text-xs text-gray-800">
        &copy; 2026 Product Catalogue Management System.
        All rights reserved.
    </div>

@endsection
