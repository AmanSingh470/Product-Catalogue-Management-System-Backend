<div class="flex justify-between items-center mb-4 sticky top-0 h-12 bg-[#f3f3f4] z-9 w-full">

    <div class="flex justify-between items-center w-34">

        <div>

            <button
                class="cursor-pointer sidebar-toggle-btn"
            >
                <x-icons.parallelbar-icon class="size-5" />
            </button>

        </div>

        <h4 class="font-medium text-md">

            Dashboard

        </h4>

    </div>

    <div
        id="profileDropdownWrapper"
        class="relative flex justify-between items-center cursor-pointer"
    >

        <div
            class="mr-1 flex h-8 w-8 items-center justify-center rounded-full bg-black text-[16px] font-[700] text-white shadow-md ring-2 ring-[#f3f3f3]"
        >

            AS

        </div>

        <div
            class="ml-1 flex items-center"
        >

            <div class="font-medium text-md">

                {{-- {{ $username }} --}}

            </div>

            <div class="ml-1">
                <x-icons.dropdown-icon />
            </div>

        </div>

        <div

            class="absolute right-0 top-full mt-2 w-52 bg-black shadow-lg text-white z-50 hidden"
            id="profileDropdown"
        >

            <a
                href="{{ url('/admin/profile') }}"
                class="flex w-full px-4 py-3 text-left text-sm hover:bg-red-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.12)] cursor-pointer"
            >

                Profile

            </a>

            <form
                action="{{ url('/logout') }}"
                method="POST"
            >
                @csrf
                <button
                    type="submit"
                    class="flex w-full px-4 py-3 text-left text-sm hover:bg-red-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.12)] cursor-pointer"
                >

                    Logout

                </button>

            </form>

        </div>

    </div>

</div>

@vite('resources/js/admin/layout/header.js')