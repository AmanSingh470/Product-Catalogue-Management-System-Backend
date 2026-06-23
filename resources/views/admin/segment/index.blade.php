@extends('admin.layouts.app')

@section('title', 'Segments')

@section('content')

@include('admin.segment.modals.create')
@include('admin.segment.modals.delete')
@include('admin.segment.modals.edit')

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 mt-5 gap-3">
        <div class="flex w-full h-25 text-center bg-white rounded-sm shadow-md justify-evenly items-center">

            <div class="w-10 bg-black rounded-lg p-2">
                <x-icons.product-icon />
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
    </div>

    <div class="w-full lg:w-[40%] bg-white px-5 py-4 mt-5">

        <div class="flex flex-wrap items-end gap-4">

            <div class="min-w-[210px] flex-1">

                <p class="text-[12px] font-[600] text-[#111111] mb-[8px]">
                    Search Segments
                </p>

                @include('admin.segment.partials.searchbar')

            </div>

        </div>

    </div>

    <div class="mt-5" id="segment-table">
        @include('admin.segment.partials.table')
    </div>

    <div class="text-center mt-5 text-xs text-gray-800">
        &copy; 2026 Product Catalogue Management System.
        All rights reserved.
    </div>

@endsection

