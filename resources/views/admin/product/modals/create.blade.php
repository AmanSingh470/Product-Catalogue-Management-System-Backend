<div id="add-product-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4 hidden">
    <div class="w-[720px] max-w-5xl overflow-hidden rounded-[10px] bg-white shadow-2xl">

        <!-- HEADER -->
        <div class="flex items-start justify-between border-b border-gray-200 px-3 py-3">
            <div class="flex items-start gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50">
                    <x-icons.add-icon class="size-9 text-red-500" />
                </div>

                <div>
                    <h2 class="text-md font-bold text-[#1E1E1E]">
                        Add Product
                    </h2>

                    <p class="mt-1 text-xs text-[#7A7A7A]">
                        Update the product details below.
                    </p>
                </div>
            </div>

            <button class="rounded-lg p-2 transition hover:bg-gray-100 cursor-pointer close-add-product-modal-btn">
                <x-icons.cross-icon class="size-9 text-black" />
            </button>
        </div>

        <!-- BODY -->
        <div class="max-h-[85vh] overflow-y-auto px-4 py-4 sm:px-8">

            <form class="space-y-3" id="add-product-form" enctype="multipart/form-data">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="mb-2 block text-xs font-semibold text-[#1E1E1E]">
                        Title <span class="text-red-500">*</span>
                    </label>

                    <input type="text" placeholder="Enter product title"
                        class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none transition focus:border-red-500"
                        name="title">
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                        Description <span class="text-red-500">*</span>
                    </label>

                    <textarea rows="5" placeholder="Enter product description"
                        class="w-full resize-none  border border-[#D9DDE3] px-2 py-2 text-xs outline-none transition focus:border-red-500"
                        name="description"></textarea>
                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Category <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="category_id">
                            <option value="" hidden selected>Select Category</option>
                            @foreach ($filters['categories'] as $category)
                                <option value={{ $category->id }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Segment <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="segment_id">
                            <option value="" hidden selected>Select Segment</option>
                            @foreach ($filters['segments'] as $segment)
                                <option value={{ $segment->id }}>
                                    {{ $segment->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Division <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="division_id">
                            <option value="" hidden selected>Select Division</option>
                            @foreach ($filters['divisions'] as $divison)
                                <option value={{ $divison->id }}>
                                    {{ $divison->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Company <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="company_id">
                            <option value="" class="hidden">Select Company</option>
                            @foreach ($companies as $company)
                                <option value={{ $company['id'] }}>
                                    {{ $company['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Contact Person <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="contact_person_id">
                            <option value="" hidden selected>Select Contact Person</option>
                            @foreach ($contactPersons as $contactPerson)
                                <option value={{ $contactPerson['id'] }}>
                                    {{ $contactPerson['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                            Status <span class="text-red-500">*</span>
                        </label>

                        <select
                            class="h-8 w-full  border border-[#D9DDE3] px-2 text-xs outline-none focus:border-red-500"
                            name="status">
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

                </div>

                <!-- Main Advantages -->
                <div>
                    <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                        Main Advantages
                    </label>

                    <div class="flex gap-2">
                        <input type="text" id="advantageInput" placeholder="Enter advantage"
                            class="w-full border border-[#D9DDE3] px-2 py-2 text-xs outline-none transition focus:border-red-500">

                        <button type="button" id="addAdvantageBtn"
                            class="cursor-pointer px-4 py-2 text-xs text-white bg-red-500">
                            Add
                        </button>
                    </div>

                    <div id="advantagesList" class="mt-2 space-y-2"></div>
                    <div id="advantagesHiddenInputs"></div>
                </div>

                <!-- Key Facts -->
                <div>
                    <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                        Key Facts
                    </label>

                    <div class="flex gap-2">
                        <input type="text" id="keyFactsInput" placeholder="Enter Key Fact"
                            class="w-full border border-[#D9DDE3] px-2 py-2 text-xs outline-none transition focus:border-red-500">

                        <button type="button" id="addKeyFactBtn"
                            class="cursor-pointer px-4 py-2 text-xs text-white bg-red-500">
                            Add
                        </button>
                    </div>

                    <div id="keyFactsList" class="mt-2 space-y-2"></div>
                    <div id="keyFactsHiddenInputs"></div>
                </div>

                <!-- Intellectual Properties -->
                <div>
                    <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                        Intellectual Properties
                    </label>

                    <div class="flex gap-2">
                        <input type="text" id="intellectualPropertiesInput" placeholder="Enter Intellectual Property"
                            class="w-full border border-[#D9DDE3] px-2 py-2 text-xs outline-none transition focus:border-red-500">

                        <button type="button" id="intellectualPropertiesBtn"
                            class="cursor-pointer px-4 py-2 text-xs text-white bg-red-500">
                            Add
                        </button>
                    </div>

                    <div id="intellectualPropertiesList" class="mt-2 space-y-2"></div>
                    <div id="intellectualPropertiesHiddenInputs"></div>
                </div>

                <!-- Applications -->
                <div>
                    <label class="mb-1 block text-xs font-semibold text-[#1E1E1E]">
                        Applications / Compliance
                    </label>

                    <div class="flex gap-2">
                        <input type="text" id="applicationsInput" placeholder="Enter Application"
                            class="w-full border border-[#D9DDE3] px-2 py-2 text-xs outline-none transition focus:border-red-500">

                        <button type="button" id="applicationsBtn"
                            class="cursor-pointer px-4 py-2 text-xs text-white bg-red-500">
                            Add
                        </button>
                    </div>

                    <div id="applicationsList" class="mt-2 space-y-2"></div>
                    <div id="applicationsHiddenInputs"></div>
                </div>

                <!-- PRODUCT MEDIA -->
                @include('admin.product.partials.media')

                <!-- FOOTER -->
                <div class="flex flex-col-reverse justify-end gap-4 pt-2 sm:flex-row">

                    <button type="button"
                        class="h-10 border border-[#D9DDE3] px-8 text-xs font-medium text-[#1E1E1E] transition hover:bg-gray-100 cursor-pointer close-add-product-modal-btn">
                        Cancel
                    </button>

                    <button type="submit"
                        class="flex h-10 items-center justify-center gap-3  bg-[#FF0000] px-8 text-xs font-medium text-white transition hover:bg-red-700 cursor-pointer">
                        <x-icons.tick-icon class="size-6 text-white" />
                        Save Product
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
