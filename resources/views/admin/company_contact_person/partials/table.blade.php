@php
    $currentPage = request()->get('page', 1);
    $itemsPerPage = 10;

    $paginatedCompany_contact_persons = new \Illuminate\Pagination\LengthAwarePaginator(
        $contactPersons->forPage($currentPage, $itemsPerPage),
        $contactPersons->count(),
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
                All Contact Persons
            </h2>

            <div class="h-7 w-13 px-3 rounded-full bg-[#ffe9e9] text-[#ff3b30] text-xs font-[600] flex items-center justify-center">
                {{ number_format($contactPersons->count()) }}
            </div>

            <button
                class="h-8 lg:h-10 px-3 rounded-[8px] border border-[#dddddd] bg-red-500 text-xs font-[500] text-white flex items-center gap-2 cursor-pointer"
                id="add-contactPerson-btn"
            >
                <x-icons.add-icon class="size-6 text-white"/>
                Add Contact Person
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

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Email</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Function</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Company</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Updated At</th>

                    <th class="px-5 py-2 text-left text-[13px] font-[700] text-[#111111]">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($paginatedCompany_contact_persons as $index => $item)

                    <tr class="border-b border-[#ebebeb] hover:bg-[#fafafa]">

                        <td class="px-5 py-2 text-xs text-[#111111]">
                            {{ ($paginatedCompany_contact_persons->currentPage() - 1) * $paginatedCompany_contact_persons->perPage() + $index + 1 }}
                        </td>

                        <td class="px-5 py-2">

                            <div>

                                <p class="text-xs text-[#555555]">
                                    {{ $item['name'] }}
                                </p>

                            </div>

                        </td>

                        <td class="px-5 py-2">

                            <div>

                                <p class="text-xs text-[#555555]">
                                    {{ $item['email'] }}
                                </p>

                            </div>

                        </td>

                        <td class="px-5 py-2">

                            <div>

                                <p class="text-xs text-[#555555]">
                                    {{ $item['function'] }}
                                </p>

                            </div>

                        </td>

                        <td class="px-5 py-2">

                            <div>

                                <p class="text-xs text-[#555555]">
                                    {{ $item['company'] }}
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
                                    class="w-9 h-9 rounded-lg border border-[#e5e5e5] flex items-center justify-center hover:bg-[#f5f5f5] cursor-pointer edit-contactPerson-btn" data-id="{{ $item['id'] }}"
                                >
                                    <x-icons.edit-icon class="size-5 text-red-500"/>
                                </button>
                                
                                <button
                                class="w-9 h-9 rounded-lg border border-[#e5e5e5] text-red-500 flex items-center justify-center hover:bg-[#f5f5f5] cursor-pointer delete-contactPerson-btn" data-id="{{ $item['id'] }}"
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
            {{ $paginatedCompany_contact_persons->firstItem() }}
            to
            {{ $paginatedCompany_contact_persons->lastItem() }}
            of
            {{ $paginatedCompany_contact_persons->total() }}
            entries

        </p>

        <div>
            {{ $paginatedCompany_contact_persons->links() }}
        </div>

    </div>

</div>

@vite(['resources/js/admin/company_contact_person/create.js', 'resources/js/admin/company_contact_person/edit.js', 'resources/js/admin/company_contact_person/delete.js'])
