@extends('admin.layouts.app')

@section('title', 'Divisions')

@section('content')

@include('admin.division.modals.create')
@include('admin.division.modals.delete')
@include('admin.division.modals.edit')

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 mt-5 gap-3">
        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.product-icon />
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

    <div class="w-full lg:w-[40%] bg-white px-5 py-4 mt-5">

        <div class="flex flex-wrap items-end gap-4">

            <div class="min-w-[210px] flex-1">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Search Divisions
                </p>

                @include('admin.division.partials.searchbar')

            </div>

        </div>

    </div>

    <div class="mt-5" id="division-table">
        @include('admin.division.partials.table')
    </div>

    <div class="text-center mt-5 text-xs text-gray-800">
        &copy; 2026 Product Catalogue Management System.
        All rights reserved.
    </div>

@endsection
