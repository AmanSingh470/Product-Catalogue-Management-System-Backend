<div id="edit-division-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
    <div class="w-180 max-w-5xl overflow-hidden rounded-[10px] bg-white shadow-2xl">

        {{-- HEADER --}}
        <div class="flex items-start justify-between border-b border-gray-200 px-3 py-3 sm:px-3">

            <div class="flex items-start gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50">
                    <x-icons.edit-icon class="size-5 text-red-500" />
                </div>

                <div>
                    <h2 class="text-md font-bold text-[#1E1E1E]">
                        Edit Division
                    </h2>

                    <p class="mt-1 text-xs text-[#7A7A7A]">
                        Update the division details below.
                    </p>
                </div>

            </div>

            <button
                type="button"
                class="cursor-pointer rounded-lg p-2 transition hover:bg-gray-100 close-edit-division-modal-btn"
            >
                <x-icons.cross-icon class="size-9"/>
            </button>

        </div>

        {{-- BODY --}}
        <div class="max-h-[85vh] overflow-y-auto px-4 py-4 sm:px-8">

            <form class="space-y-3" id="edit-division-form">
                @csrf
                <div class="grid grid-cols-1 gap-3 space-y-3 sm:grid-cols-4">

                    {{-- NAME --}}
                    <div class="col-span-1 sm:col-span-2">
                        <label class="mb-2 block text-xs font-semibold text-[#1E1E1E]">
                            Name <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            value="Electrical and Electronics"
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none transition focus:border-red-500"
                            id="edit-division-name"
                            name="name"
                        >
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="col-span-1 sm:col-span-2">
                        <label class="mb-2 block text-xs font-semibold text-[#1E1E1E]">
                            Description <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            value="Electrical and Electronics"
                            class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none transition focus:border-red-500"
                            id="edit-division-description"
                            name="description"
                        >
                    </div>

                    {{-- CREATED AT --}}
                    <div class="col-span-1 sm:col-span-2">
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Created At
                        </label>

                        <div class="flex h-8 items-center gap-3 rounded-[8px] border border-[#E5E7EB] bg-[#F7F8FA] px-2 text-[#6B7280]">

                            <x-icons.calender-icon />

                            <span class="text-xs" id="edit-division-createdAt">

                            </span>

                        </div>
                    </div>

                    {{-- UPDATED AT --}}
                    <div class="col-span-1 sm:col-span-2">
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Updated At
                        </label>

                        <div class="flex h-8 items-center gap-3 rounded-[8px] border border-[#E5E7EB] bg-[#F7F8FA] px-2 text-[#6B7280]">

                            <x-icons.calender-icon />

                            <span class="text-xs" id="edit-division-updatedAt">
                                
                            </span>

                        </div>
                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="flex flex-col-reverse justify-end gap-4 pt-2 sm:flex-row">

                    <button
                        type="button"
                        class="h-10 cursor-pointer rounded-[8px] border border-[#D9DDE3] px-8 text-xs font-medium text-[#1E1E1E] transition hover:bg-gray-100 close-edit-division-modal-btn"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="flex h-10 cursor-pointer items-center justify-center gap-3 rounded-[8px] bg-[#FF0000] px-8 text-xs font-medium text-white transition hover:bg-red-700"
                    >
                        <x-icons.tick-icon />

                        Save Division
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>