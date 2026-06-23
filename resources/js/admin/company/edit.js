import notify from "../../notification.js";

const editCompanyModal = document.getElementById('edit-company-modal');
const editCompanyBtn = document.getElementsByClassName('edit-company-btn');
const editCompanyForm = document.getElementById("edit-company-form");

document.addEventListener('click', async function (e) {

    const editBtn = e.target.closest('.edit-company-btn');

    if (editBtn) {
        const companyId = editBtn.dataset.id;

        editCompanyForm.dataset.companyId = companyId;

        try {

            const response = await fetch(`/admin/company/${companyId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (response.status === 404) {
                throw new Error('Company not found');
            }

            if (!response.ok) {
                throw new Error(`Request failed with status ${response.status}`);
            }

            const company = await response.json();

            console.log(company);

            editCompanyModal.classList.remove('hidden');

            // Populate modal fields
            const nameInput = document.getElementById("edit-company-name");
            nameInput.value = company.name;

            const updatedAtInput = document.getElementById("edit-company-updatedAt");
            updatedAtInput.innerText = company.updated_at;

            const createdAtInput = document.getElementById("edit-company-createdAt");
            createdAtInput.innerText = company.created_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest('.close-edit-company-modal-btn')) {
        editCompanyModal.classList.add('hidden');
    }
});

editCompanyForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    const companyId = this.dataset.companyId;

    try {
        const response = await fetch(`/admin/company/update/${companyId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                Accept: "application/json",
            },
            body: formData,
        });

        const data = await response.json();

        if (response.status === 201) {
            editCompanyModal.classList.add("hidden");
            notify({
                type: "success",
                message: data.message,
                timeOut: 4000,
            });
        } else if (response.status === 422) {
            notify({
                type: "warning",
                message: data.message,
                timeOut: 4000,
            });

        } 
        else {
            notify({
                type: "error",
                message: data.message || "Some error occurred.",
                timeOut: 4000,
            });
        }
    } catch (error) {
        console.log(error);
        
        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
