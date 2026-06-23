<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4 hidden" id="edit-product-modal">
    <div class="w-250 overflow-hidden rounded-[10px] bg-white shadow-2xl">

        {{-- HEADER --}}
        <div class="flex items-start justify-between border-b border-gray-200 px-3 py-3 sm:px-3">
            <div class="flex items-start gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50">
                    <x-icons.edit-icon class="size-5" />
                </div>

                <div>
                    <h2 class="text-md font-bold text-[#1E1E1E]">
                        Edit Product
                    </h2>

                    <p class="mt-1 text-xs text-[#7A7A7A]">
                        Update the product details below.
                    </p>
                </div>

            </div>

            <button class="cursor-pointer rounded-lg p-2 transition hover:bg-gray-100 close-edit-product-modal-btn">
                <x-icons.cross-icon class="size-9 close-edit-modal-btn" />
            </button>
        </div>

        {{-- BODY --}}
        <div class="max-h-[85vh] overflow-y-auto px-4 py-4 sm:px-8">

            <form class="space-y-3">
                @csrf
                {{-- TITLE --}}
                <div>
                    <label class="mb-2 block text-xs font-semibold text-[#1E1E1E]">
                        Product Title <span class="text-red-500">*</span>
                    </label>

                    <input type="text" value="Car Dashboard Panel"
                        class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none transition focus:border-red-500"
                        id="edit-product-title">
                </div>

                {{-- DESCRIPTION --}}
                <div>
                    <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                        Description <span class="text-red-500">*</span>
                    </label>

                    <textarea rows="5"
                        class="w-full resize-none rounded-[8px] border border-[#D9DDE3] px-2 py-2 text-xs outline-none transition focus:border-red-500"
                        id="edit-product-description">
                    Premium dashboard panel with high durability and sleek finish.
                    </textarea>
                </div>

                {{-- GRID --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- CATEGORY --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Category <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            id="edit-product-category">
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- SEGMENT --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Segment <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            id="edit-product-segment">
                            @foreach ($segments as $segment)
                                <option value="{{ $segment['id'] }}">
                                    {{ $segment['name'] }}
                                </option>
                            @endforeach
                            <option>Interior & Exterior Systems</option>
                        </select>
                    </div>

                    {{-- DIVISION --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Division <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            id="edit-product-division">
                            @foreach ($divisions as $division)
                                <option value="{{ $division['id'] }}">
                                    {{ $division['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- COMPANY --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Company <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            id="edit-product-company">
                            @foreach ($companies as $company)
                                <option value="{{ $company['id'] }}">
                                    {{ $company['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- CONTACT PERSON --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Company Contact Person <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500">
                            @foreach ($contactPersons as $contactPerson)
                                <option value="{{ $contactPerson['id'] }}">
                                    {{ $contactPerson['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- STATUS --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="status" id="edit-product-status">
                            <option value="" hidden selected>
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

                    {{-- CREATED --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Created At
                        </label>

                        <div
                            class="flex h-8 items-center gap-3 rounded-[8px] border border-[#E5E7EB] bg-[#F7F8FA] px-2 text-[#6B7280]">

                            <x-icons.calender-icon />

                            <span class="text-xs" id="edit-product-createdAt">
                                06 May 2026 02:30 PM
                            </span>
                        </div>
                    </div>

                    {{-- UPDATED --}}
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Updated At
                        </label>

                        <div
                            class="flex h-8 items-center gap-3 rounded-[8px] border border-[#E5E7EB] bg-[#F7F8FA] px-2 text-[#6B7280]">

                            <x-icons.calender-icon />

                            <span class="text-xs" id="edit-product-updatedAt">
                                10 May 2026 01:32 PM
                            </span>
                        </div>
                    </div>

                </div>

                {{-- PRODUCT MEDIA --}}
                @include('admin.product.partials.media')

                <div class="relative mt-4">

                    <div class="mb-3 flex items-center justify-between">

                        <label class="block text-xs font-semibold text-[#1E1E1E]">
                            Existing Media
                        </label>

                        <button type="button" id="delete-media-btn"
                            class="rounded-md bg-red-500 px-3 py-1.5 text-xs font-medium text-white hover:bg-red-600 cursor-pointer">
                            Delete Selected
                        </button>

                    </div>

                    <button type="button" id="embla-prev"
                        class="absolute left-0 top-1/2 z-20 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-white shadow-sm cursor-pointer">
                        ←
                    </button>

                    <button type="button" id="embla-next"
                        class="absolute right-0 top-1/2 z-20 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-white shadow-sm cursor-pointer">
                        →
                    </button>

                    <div class="embla overflow-hidden px-10">

                        <div class="embla__container flex gap-3">

                            @forelse($productMedia as $media)
                                @if ($media->media_type === 'image')
                                    <div class="embla__slide min-w-[130px] sm:min-w-[150px]">

                                        <div class="relative">

                                            <img src="{{ asset('storage/' . $media->media_url) }}" alt="product"
                                                class="h-[150px] w-full rounded-lg object-cover">

                                            <label
                                                class="absolute top-2 right-2 flex h-6 w-6 cursor-pointer items-center justify-center rounded bg-white shadow-md">
                                                <input type="checkbox" name="delete_media[]"
                                                    value="{{ $media->id }}"
                                                    class="media-checkbox h-4 w-4 accent-red-500">
                                            </label>

                                        </div>

                                    </div>
                                @endif

                            @empty

                                <div
                                    class="flex h-[150px] items-center justify-center rounded-lg border border-dashed border-gray-300 text-xs text-gray-500">
                                    No media available
                                </div>
                            @endforelse

                        </div>

                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="flex flex-col-reverse justify-end gap-4 pt-2 sm:flex-row">

                    <button type="button"
                        class="cursor-pointer h-10 rounded-[8px] border border-[#D9DDE3] px-8 text-xs font-medium text-[#1E1E1E] transition hover:bg-gray-100 close-edit-product-modal-btn">
                        Cancel
                    </button>

                    <button type="submit"
                        class="cursor-pointer flex h-10 items-center justify-center gap-3 rounded-[8px] bg-[#FF0000] px-8 text-xs font-medium text-white transition hover:bg-red-700">
                        <x-icons.tick-icon />

                        Save Product
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

@vite('resources/js/admin/layout/embla.js')
