<!-- PRODUCT MEDIA -->
<div class="w-full">

    <input type="file" id="product-media-input" name="media[]" multiple accept=".png,.jpg,.jpeg,.webp,.mp4,.pdf" class="hidden">

    <div class="mb-3 flex items-start justify-between gap-3">
        <div>
            <h2 class="text-xs font-semibold text-black">
                Product Media
            </h2>

            <p class="mt-1 text-[12px] text-[#6b7280]">
                Upload product images, videos, and documents
            </p>
        </div>

        <div
            class="whitespace-nowrap rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-[11px] font-medium text-red-500">
            Max 10 Files
        </div>
    </div>

    <div id="product-media-dropzone"
        class="cursor-pointer rounded-[18px] border border-dashed border-[#d1d5db] p-4 text-center transition-all duration-300 hover:border-red-400 hover:bg-red-50/20 min-h-[220px] flex flex-col items-center justify-center">

        <div class="flex h-9 w-9 items-center justify-center">
            <x-icons.upload-icon class="size-10" />
        </div>

        <h3 class="mt-4 text-sm font-semibold text-black">
            Drag & Drop Files Here
        </h3>

        <p class="mt-2 max-w-[360px] text-[12px] leading-3 text-[#6b7280]">
            Upload thumbnails, gallery images,
            videos or PDF documents.
        </p>

        <button type="button" id="browse-media-btn"
            class="mt-3 h-8 rounded-xl bg-black px-3 text-[13px] font-medium text-white transition-all duration-300 hover:bg-red-500 cursor-pointer">
            Browse Files
        </button>

        <div class="mt-3 flex flex-wrap items-center justify-center gap-2">
            @foreach (['PNG', 'JPG', 'WEBP', 'MP4', 'PDF'] as $item)
                <div
                    class="flex h-8 items-center justify-center rounded-lg border border-[#e5e5e5] bg-white px-4 text-[11px] font-medium text-[#6b7280]">
                    {{ $item }}
                </div>
            @endforeach
        </div>
    </div>

    <div id="selected-media-list" class="mt-4 space-y-2"></div>

</div>

@vite(['resources/js/admin/product/media.js'])

