<div class="flex relative">

    <input
        id="search-input"
        class="p-3 rounded-xs bg-white text-black placeholder-[var(--grey-500)] w-full text-xs border border-gray-400 hover:border-black h-11 outline-none"
        type="text"
        placeholder="Search Company"
    />

    <div
        class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"
    >
    
        <div id="search-icon">
            <x-icons.search-icon class="size-[1.5em] text-red-500" />
        </div>

        <div
            id="cross-icon"
            class="hidden"
        >
            <x-icons.cross-icon class="size-[2em] text-black" />

        </div>

    </div>

</div>

@push('scripts')
    @vite('resources/js/admin/company/searchbar.js')
@endpush