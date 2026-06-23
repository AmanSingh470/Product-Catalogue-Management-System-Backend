<div id="delete-division-modal" class="fixed hidden inset-0 z-50 flex items-center justify-center bg-black/50 p-4">

    <div class="relative w-full max-w-md rounded-[12px] bg-white shadow-2xl">

        {{-- HEADER --}}
        <div class="border-b border-[#E5E7EB] px-6 py-5">

            <div class="flex items-start gap-4">

                {{-- ICON --}}
                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-red-50">
                    <x-icons.delete-icon class="size-9 text-red-500" />
                </div>

                {{-- TEXT --}}
                <div class="relative flex-1">
                    <button
                        type="button"
                        class="absolute right-0 top-0 cursor-pointer rounded-md transition hover:bg-gray- close-delete-modal-btn"
                    >
                        <x-icons.cross-icon class="size-9 text-black" />
                    </button>

                    <h2 class="text-lg font-bold text-[#1E1E1E]">
                        Delete Division
                    </h2>

                    <p class="mt-2 text-sm leading-7 text-[#6B7280]">
                        Are you sure you want to delete this Division?
                        This action cannot be undone.
                    </p>
                </div>

            </div>

        </div>

        {{-- DIVISION INFO --}}
        <div class="px-6 py-5">

            <div class="flex items-center gap-4 rounded-[10px] border border-[#E5E7EB] bg-[#FAFAFA] p-4">

                <h4 class="px-5 py-2 text-xs text-[#111111]" id="delete-division-name">
                    
                </h4>

                <h4 class="px-5 py-2 text-xs text-[#111111]" id="delete-division-description">

                </h4>

                <h4 class="px-5 py-2 text-xs text-[#111111]" id="delete-division-updatedAt">

                </h4>

            </div>

        </div>

        {{-- FOOTER --}}
        <form class="flex flex-col-reverse gap-3 border-t border-[#E5E7EB] px-6 py-5 sm:flex-row sm:justify-end" id="delete-division-form">

            <button
                type="button"
                class="h-[52px] cursor-pointer rounded-[8px] border border-[#D1D5DB] px-6 text-[15px] font-medium text-[#1E1E1E] transition hover:bg-gray-100 close-delete-modal-btn"
            >
                Cancel
            </button>

            <button
                type="submit"
                class="flex h-[52px] cursor-pointer items-center justify-center gap-2 rounded-[8px] bg-[#FF0000] px-6 text-[15px] font-medium text-white transition hover:bg-red-700"
            >
                <x-icons.delete-icon class="size-9 text-white" />

                Delete Division
            </button>

        </form>

    </div>

</div>