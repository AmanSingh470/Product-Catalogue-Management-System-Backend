@php
    $currentPage = request()->get('page', 1);
    $itemsPerPage = 10;

    $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
        $products->forPage($currentPage, $itemsPerPage),
        $products->count(),
        $itemsPerPage,
        $currentPage,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ],
    );
@endphp

<div class="w-full bg-white rounded-xs border border-[#ebebeb]">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 px-5 py-2 border-b border-[#ebebeb]">

        <div class="flex items-center gap-3 flex-wrap">

            <h2 class="text-lg font-[700] text-[#111111]">
                All Products
            </h2>

            <div
                class="h-7 w-13 px-3 rounded-full bg-[#ffe9e9] text-[#ff3b30] text-xs font-[600] flex items-center justify-center">
                {{ number_format($products->count()) }}
            </div>

            <button
                class="h-8 lg:h-10 px-3 rounded-[8px] border border-[#dddddd] bg-red-500 text-xs font-[500] text-white flex items-center gap-2 cursor-pointer" id="add-product-btn">
                <x-icons.add-icon class="size-6 text-white" />
                Add Product
            </button>

        </div>

        <div class="flex items-center gap-3">

            <p class="text-xs text-[#666666]">
                Show
            </p>

            <select class="w-[80px] h-[42px] rounded-lg border border-[#e5e5e5] bg-white px-3 text-xs outline-none">
                <option>10</option>
                <option>20</option>
                <option>50</option>
            </select>

            <p class="text-xs text-[#666666]">
                entries
            </p>

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-[1250px] w-full">

            <thead class="bg-[#fafafa] border-b border-[#ebebeb]">

                <tr>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">#</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Image</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Title</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Company</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Category</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Segment</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Division</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Contact Person</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Status</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Last Modified</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($paginatedProducts as $index => $item)
                    <tr class="border-b border-[#ebebeb] hover:bg-[#fafafa]">

                        <td class="px-5 py-2 text-xs text-[#111111]">
                            {{ ($paginatedProducts->currentPage() - 1) * $paginatedProducts->perPage() + $index + 1 }}
                        </td>

                        <td class="px-5 py-2">
                            <img src="/storage/{{ $item['thumbnail'] }}" alt=""
                                class="w-[72px] h-[42px] rounded-lg border border-[#ebebeb] object-cover">
                        </td>

                        <td class="px-5 py-2">

                            <div>

                                <p class="text-xs font-[700] text-[#111111]">
                                    {{ $item['title'] }}
                                </p>

                                <p class="text-xs text-[#777777] mt-1">
                                    {{ $item['description'] }}
                                </p>

                            </div>

                        </td>

                        <td class="px-5 py-2 text-xs text-[#555555] whitespace-nowrap">
                            {{ $item['company']?->name }}
                        </td>

                        <td class="px-5 py-2 text-xs text-[#555555] whitespace-nowrap">
                            {{ $item['category']?->name }}
                        </td>

                        <td class="px-5 py-2 text-xs text-[#555555]">
                            {{ $item['segment']?->name }}
                        </td>

                        <td class="px-5 py-2 text-xs text-[#555555]">
                            {{ $item['division']?->name }}
                        </td>

                        <td class="px-5 py-2 text-xs text-[#555555]">
                            {{ $item['company_contact_person']?->name }}
                        </td>

                        <td class="px-5 py-2">

                            <div
                                class="inline-flex items-center gap-2 h-full px-3 py-1 rounded-lg text-xs font-semibold
                                {{ match ($item['status']) {
                                    '1' => 'bg-[#EFF6FF] text-[#2563EB]',
                                    '2' => 'bg-[#FFFBEB] text-[#D97706]',
                                    '3' => 'bg-[#F5F3FF] text-[#7C3AED]',
                                    '4' => 'bg-[#ECFDF3] text-[#059669]',
                                    default => 'bg-[#F3F4F6] text-[#6B7280]',
                                } }}">
                                @switch ($item['status'])
                                    @case ('1')
                                    Idea / feasibility study
                                    @break;
                                    
                                    @case ('2')
                                    Advance development
                                    @break;
                                    
                                    @case ('3')
                                    Serial development
                                    @break;
                                    
                                    @case ('3')
                                    In production
                                    @break;

                                    @default
                                    Idea / feasibility study
                                @endswitch
                            </div>
                        </td>

                        <td class="px-5 py-2">

                            <div class="text-xs text-[#555555] whitespace-nowrap">

                                <p>{{ $item['updated_at'] }}</p>

                            </div>

                        </td>

                        <td class="px-5 py-2">

                            <div class="flex items-center gap-2">

                                <a
                                href="/admin/product/detail/{{ $item['id'] }}"
                                class="rounded-lg border border-black flex items-center justify-center bg-red-500 cursor-pointer text-xs p-2">
                                    <p class="text-white font-medium">
                                        Product detail
                                    </p>
                                </a>

                            </div>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-5 py-2">

        <p class="text-xs text-[#666666]">

            Showing
            {{ $paginatedProducts->firstItem() }}
            to
            {{ $paginatedProducts->lastItem() }}
            of
            {{ $paginatedProducts->total() }}
            entries

        </p>

        <div>
            {{ $paginatedProducts->links() }}
        </div>

    </div>

</div>

@vite(['resources/js/admin/product/create.js'])
