document.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementById("search-input");
    const category = document.getElementById("select-category");
    const segment = document.getElementById("select-segment");
    const division = document.getElementById("select-division");
    const status = document.getElementById("select-status");
    const productsTable = document.getElementById("products-table");

    search.addEventListener("input", handleSearchIcon);
    const searchIcon = document.getElementById("search-icon"); 
    const crossIcon = document.getElementById("cross-icon"); 

    function handleSearchIcon(){
        if(search?.value?.length>0){
            searchIcon.classList.add("hidden");
            crossIcon.classList.remove("hidden");
        }
        else{
            crossIcon.classList.add("hidden");
            searchIcon.classList.remove("hidden");
        }
    }

    async function handleCrossBtn() {
        search.value = "";
        handleSearchIcon();
        await applyFilters();
    }

    crossIcon.addEventListener("click", handleCrossBtn);

    async function applyFilters() {
        const params = new URLSearchParams();

        if (search.value) {
            params.append("search", search.value);
        }

        if (category.value) {
            params.append("category", category.value);
        }

        if (segment.value) {
            params.append("segment", segment.value);
        }

        if (division.value) {
            params.append("division", division.value);
        }

        if (status.value) {
            params.append("status", status.value);
        }

        const response = await fetch(`/admin/search?${params.toString()}&type=product`);

        const html = await response.text();

        productsTable.innerHTML = html;
    }
    category.addEventListener("change", applyFilters);
    segment.addEventListener("change", applyFilters);
    division.addEventListener("change", applyFilters);
    status.addEventListener("change", applyFilters);
    search.addEventListener("input", applyFilters);

    const resetBtn = document.getElementById("reset-filters-btn");

    resetBtn.addEventListener("click", async () => {
        search.value = "";
        category.value = "";
        segment.value = "";
        division.value = "";
        status.value = "";
        handleSearchIcon();
        await applyFilters();
    });
});
