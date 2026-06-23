@php
    $currentPage = request()->get('page', 1);
    $itemsPerPage = 10;

    $paginatedCompanies = new \Illuminate\Pagination\LengthAwarePaginator(
        $companies->forPage($currentPage, $itemsPerPage),
        $companies->count(),
        $itemsPerPage,
        $currentPage,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );
@endphp

<div class="w-full bg-white rounded-xs border border-[#ebebeb]">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 px-5 py-2 border-b border-[#ebebeb]">

        <div class="flex items-center gap-3 flex-wrap">

            <h2 class="text-lg font-[700] text-[#111111]">
                All Companies
            </h2>

            <div class="h-7 w-13 px-3 rounded-full bg-[#ffe9e9] text-[#ff3b30] text-xs font-[600] flex items-center justify-center">
                {{ number_format($companies->count()) }}
            </div>

            <button
                id="add-company-btn"
                class="h-8 lg:h-10 px-3 rounded-[8px] border border-[#dddddd] bg-red-500 text-xs font-[500] text-white flex items-center gap-2 cursor-pointer"
            >
                <x-icons.add-icon class="size-6 text-white"/>
                Add Company
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

        <table class="min-w-[1250px] w-full whitespace-nowrap">

            <thead class="bg-[#fafafa] border-b border-[#ebebeb]">

                <tr>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">#</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Name</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Updated At</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($paginatedCompanies as $index => $item)

                    <tr class="border-b border-[#ebebeb] hover:bg-[#fafafa]">

                        <td class="px-5 py-2 text-xs text-[#111111]">
                            {{ ($paginatedCompanies->currentPage() - 1) * $paginatedCompanies->perPage() + $index + 1 }}
                        </td>

                        <td class="px-5 py-2">

                            <div>

                                <p class="text-xs text-[#555555]">
                                    {{ $item['name'] }}
                                </p>

                            </div>

                        </td>

                        <td class="px-5 py-2">

                            <div class="text-xs text-[#555555] whitespace-nowrap">

                                <p>{{ $item['updated_at'] }}</p>

                            </div>

                        </td>

                        <td class="px-5 py-2">

                            <div class="flex items-center gap-2">

                                <button
                                    class="w-9 h-9 rounded-lg border border-[#e5e5e5] flex items-center justify-center hover:bg-[#f5f5f5] cursor-pointer edit-company-btn" data-id="{{ $item['id'] }}"
                                >
                                    <x-icons.edit-icon class="size-5 text-red-500"/>
                                </button>
                                
                                <button
                                class="w-9 h-9 rounded-lg border border-[#e5e5e5] text-red-500 flex items-center justify-center hover:bg-[#f5f5f5] cursor-pointer delete-company-btn" data-id="{{ $item['id'] }}"
                                >
                                    <x-icons.delete-icon class="size-6 text-red-500"/>
                                </button>

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
            {{ $paginatedCompanies->firstItem() }}
            to
            {{ $paginatedCompanies->lastItem() }}
            of
            {{ $paginatedCompanies->total() }}
            entries

        </p>

        <div>
            {{ $paginatedCompanies->links() }}
        </div>

    </div>

</div>

@vite(['resources/js/admin/company/create.js', 'resources/js/admin/company/edit.js', 'resources/js/admin/company/delete.js'])