<div
    id="delete-product-modal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 hidden"
>
    <div class="relative w-full max-w-md rounded-[12px] bg-white shadow-2xl">

        {{-- HEADER --}}
        <div class="border-b border-[#E5E7EB] px-6 py-5">
            <div class="flex items-start gap-4">

                {{-- ICON --}}
                <div class="flex size-14 items-center justify-center rounded-full bg-red-50">
                    <x-icons.delete-icon class="size-9 text-red-500" />
                </div>

                {{-- TEXT --}}
                <div class="relative flex-1">
                    <button
                        type="button"
                        class="absolute right-0 top-0 cursor-pointer rounded-md transition hover:bg-gray-100 close-delete-modal-btn"
                    >
                        <x-icons.cross-icon class="size-9" />
                    </button>

                    <h2 class="text-lg font-bold text-[#1E1E1E]">
                        Delete Product
                    </h2>

                    <p class="mt-2 text-sm leading-7 text-[#6B7280]">
                        Are you sure you want to delete this product?
                        This action cannot be undone.
                    </p>
                </div>

            </div>
        </div>

        {{-- PRODUCT INFO --}}
        <div class="px-6 py-5">
            <div class="flex items-center gap-4 rounded-[10px] border border-[#E5E7EB] bg-[#FAFAFA] p-4">

                <h4 class="px-5 py-2 text-xs text-[#111111]">
                    #1
                </h4>

                <div class="h-10 w-40 overflow-hidden rounded-[8px] border border-gray-200">
                    <img
                        src="{{ asset('assets/images/background.png') }}"
                        alt="product"
                        class="h-full w-full object-cover"
                    >
                </div>

                <h4 class="px-5 py-2 text-xs text-[#111111]">
                    Car dashboard Panel
                </h4>

                <h4 class="px-5 py-2 text-xs text-[#111111]">
                    This is some description
                </h4>

            </div>
        </div>

        {{-- FOOTER --}}
        <div class="flex flex-col-reverse gap-3 border-t border-[#E5E7EB] px-6 py-5 sm:flex-row sm:justify-end">

            <button
                type="button"
                class="h-[52px] cursor-pointer rounded-[8px] border border-[#D1D5DB] px-6 text-[15px] font-medium text-[#1E1E1E] transition hover:bg-gray-100 close-delete-modal-btn"
            >
                Cancel
            </button>

            <button
                type="button"
                class="flex h-[52px] cursor-pointer items-center justify-center gap-2 rounded-[8px] bg-[#FF0000] px-6 text-[15px] font-medium text-white transition hover:bg-red-700"
            >
                <x-icons.delete-icon class="size-9 text-white" />
                Delete Product
            </button>

        </div>

    </div>
</div>