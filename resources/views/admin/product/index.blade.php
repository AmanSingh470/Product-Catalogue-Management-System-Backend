@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('admin.product.modals.create')
@include('admin.product.modals.delete')

<div class="grid grid-cols-1 sm:grid-cols-4 mt-5 gap-3">

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.product-icon class="size-full" />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Total Products
                </h6>

                <h6 class="text-xl text-red-500 font-medium">
                    {{ $stats['totalProducts'] }}
                </h6>

                <p class="text-xs">
                    products
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                    <x-icons.active-product-icon class="size-full text-white" />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Idea / Feasibility study
                </h6>

                <h6 class="text-xl text-[#2563EB] font-medium">
                    {{ $stats['ideaCount'] }}
                </h6>

                <p class="text-xs">
                    products
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                    <x-icons.active-product-icon class="size-full text-white" />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Advance development
                </h6>

                <h6 class="text-xl text-[#D97706] font-medium">
                    {{ $stats['advanceCount'] }}
                </h6>

                <p class="text-xs">
                    products
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                    <x-icons.active-product-icon class="size-full text-white" />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    Serial development
                </h6>

                <h6 class="text-xl text-[#7C3AED] font-medium">
                    {{ $stats['serialCount'] }}
                </h6>

                <p class="text-xs">
                    products
                </p>

            </div>

        </div>

        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                    <x-icons.active-product-icon class="size-full text-white" />
            </div>

            <div>

                <h6 class="text-xs font-semibold mb-1">
                    In production
                </h6>

                <h6 class="text-xl text-green-500 font-medium">
                    {{ $stats['productionCount'] }}
                </h6>

                <p class="text-xs">
                    products
                </p>

            </div>

        </div>



    </div>

    <div class="w-full bg-white px-5 py-4 mt-5">

        <div class="flex flex-wrap items-end gap-4">

            <div class="min-w-[210px] flex-1">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Search Product
                </p>

                @include('admin.product.partials.searchbar')

            </div>

            <div class="w-[150px]">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Category
                </p>

                <div class="flex border border-gray-400 hover:border-black px-3 h-11 rounded-xs">

                    <select class="w-full rounded-xs bg-white text-xs text-[#6b7280] outline-none items-center" id="select-category">
                        <option value="">
                            All Categories
                        </option>

                        @foreach ($filters["categories"] as $category)
                            <option value={{ $category->id }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div class="w-[150px]">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Segment
                </p>

                <div class="flex border border-gray-400 hover:border-black px-3 h-11 rounded-xs">

                    <select class="w-full rounded-xs bg-white text-xs text-[#6b7280] outline-none items-center" id="select-segment">
                        <option value="">
                            All Segments
                        </option>

                        @foreach ($filters["segments"] as $segment)
                            <option value={{ $segment->id }}>
                                {{ $segment->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="w-[150px]">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Division
                </p>

                <div class="flex border border-gray-400 hover:border-black px-3 h-11 rounded-xs">

                    <select class="w-full rounded-xs bg-white text-xs text-[#6b7280] outline-none items-center" id="select-division">
                        <option value="">
                            All Divisions
                        </option>

                        @foreach ($filters["divisions"] as $division)
                            <option value={{ $division->id }}>
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="w-[150px]">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Status
                </p>

                <div class="flex border border-gray-400 hover:border-black px-3 h-11 rounded-xs">
                    <select class="w-full rounded-xs bg-white text-xs text-[#6b7280] outline-none items-center" id="select-status">
                        <option value="">
                            All Status
                        </option>
                        <option value="1">
                            Idea / Feasibility study
                        </option>
                        <option value="2">
                            Advance development
                        </option>
                        <option value="3">
                            Serial development
                        </option>
                        <option value="4">
                            In production
                        </option>
                    </select>

                </div>

            </div>

            <button
                class="w-[80px] h-11 border border-gray-400 hover:border-black rounded-xs bg-white text-xs font-medium text-[#6b7280] flex items-center px-3 cursor-pointer" id="reset-filters-btn">

                <x-icons.reset-icon class="size-4 mr-1" />

                Reset

            </button>

        </div>

    </div>

    <div class="mt-5">

    <div id="products-table">
        @include('admin.product.partials.table')
    </div>

    </div>

    <div class="text-center mt-5 text-xs text-gray-800">
        &copy; 2026 Product Catalogue Management System.
        All rights reserved.
    </div>
@endsection
