<div id="add-segment-modal" class="flex fixed inset-0 z-50 items-center justify-center bg-black/40 p-4 hidden">

    <div class="w-full max-w-4xl overflow-hidden rounded-[10px] bg-white shadow-2xl">

        <div class="flex items-start justify-between border-b border-gray-200 px-3 py-3">

            <div class="flex items-start gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50">
                    <x-icons.add-icon class="size-8 text-red-500" />
                </div>

                <div>
                    <h2 class="text-md font-bold text-[#1E1E1E]">
                        Add Segment
                    </h2>

                    <p class="mt-1 text-xs text-[#7A7A7A]">
                        Update the segment details below.
                    </p>
                </div>

            </div>

            <button
                type="button"
                class="close-add-segment-modal-btn rounded-lg p-2 transition hover:bg-gray-100 cursor-pointer"
            >
                <x-icons.cross-icon class="size-9 text-black" />
            </button>

        </div>

        <div class="max-h-[85vh] overflow-y-auto px-4 py-4 sm:px-8">

            <form class="space-y-3" id="add-segment-form">
                @csrf
                <div>
                    <label class="mb-2 block text-xs font-semibold text-[#1E1E1E]">
                        Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="h-8 w-full rounded-[8px] border border-[#D9DDE3] px-2 text-xs outline-none transition focus:border-red-500"
                    >

                </div>

                <div class="flex flex-col-reverse justify-end gap-4 pt-2 sm:flex-row">

                    <button
                        type="button"
                        class="close-add-segment-modal-btn h-10 rounded-[8px] border border-[#D9DDE3] px-8 text-xs font-medium text-[#1E1E1E] transition hover:bg-gray-100 cursor-pointer"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="flex h-10 items-center justify-center gap-3 rounded-[8px] bg-[#FF0000] px-8 text-xs font-medium text-white transition hover:bg-red-700 cursor-pointer"
                    >
                        <x-icons.tick-icon class="size-6 text-white" />

                        Save Segment
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>