document.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementById("search-input");
    const divisionsTable = document.getElementById("division-table");

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

        const response = await fetch(`/admin/search?${params.toString()}&type=division`);

        const html = await response.text();

        divisionsTable.innerHTML = html;
    }

    search.addEventListener("input", applyFilters);
});
