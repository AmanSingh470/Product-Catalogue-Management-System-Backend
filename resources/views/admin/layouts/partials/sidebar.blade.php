@php

$menus = [

    [
        'title' => 'Dashboard',
        'route' => '/admin',
        'icon' => 'icons.dashboard-icon'
    ],

    [
        'title' => 'Product Management',
        'route' => '/admin/product',
        'icon' => 'icons.product-icon'
    ],

    [
        'title' => 'Category Management',
        'route' => '/admin/category',
        'icon' => 'icons.category-icon'
    ],

    [
        'title' => 'Segment Management',
        'route' => '/admin/segment',
        'icon' => 'icons.segment-icon'
    ],

    [
        'title' => 'Division Management',
        'route' => '/admin/division',
        'icon' => 'icons.division-icon'
    ],

    [
        'title' => 'Contact Person Management',
        'route' => '/admin/contact_person',
        'icon' => 'icons.company-contact-person-icon'
    ],

    [
        'title' => 'Company Management',
        'route' => '/admin/company',
        'icon' => 'icons.company-icon'
    ]

];

@endphp


<div
    id="sidebar"
    class="w-60 bg-black/80 lg:bg-black h-full lg:h-screen fixed lg:sticky top-0 z-10"
>

    <div class="p-3 flex mb-3">

        <div class="mr-2 text-red-500">
            <x-icons.brand-logo class="size-5 2xl:size-8 fill-current" />
        </div>

        <div>

            <h1
                id="main-heading"
                class="text-sm sm:text-xl md:text-xl lg:text-xl font-bold text-red-500"
            >
                Product Catalogue
            </h1>

            <h2 class="text-sm font-light text-white">
                Management System
            </h2>

        </div>

        <div class="lg:hidden">

            <button
                class="cursor-pointer sidebar-toggle-btn"
            >
                <x-icons.cross-icon class="size-[2em]" color="#ffffff"/>

            </button>

        </div>

    </div>

    <div
        class="grid grid-cols-1 text-white grid-rows-[repeat(7,1fr)] h-110 text-sm"
    >

        @foreach ($menus as $menu)

            <a
                href="{{ url($menu['route']) }}"
                class="flex items-center px-3 cursor-pointer transition-all

                {{ request()->is(trim($menu['route'], '/'))
                    ? 'bg-red-500'
                    : 'hover:bg-red-400'
                }}"
            >

                <x-dynamic-component :component="$menu['icon']" class="size-5"/>
                <h4 class="ml-2 text-xs">
                    {{ $menu['title'] }}
                </h4>

            </a>

        @endforeach

    </div>

</div>

@vite('resources/js/admin/layout/sidebar.js')