import notify from "../../notification.js";

const deleteCompanyModal = document.getElementById("delete-company-modal");
const deleteCompanyForm = document.getElementById("delete-company-form");

document.addEventListener("click", async function (e) {
    const deleteBtn = e.target.closest(".delete-company-btn");

    if (deleteBtn) {
        const companyId = deleteBtn.dataset.id;

        deleteCompanyForm.dataset.companyId = companyId;
        console.log("working");
        
        try {
            const response = await fetch(`/admin/company/${companyId}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (response.status === 404) {
                throw new Error("Company not found");
            }

            if (!response.ok) {
                throw new Error(
                    `Request failed with status ${response.status}`,
                );
            }

            const company = await response.json();

            deleteCompanyModal.classList.remove("hidden");

            // Populate modal fields
            const nameInput = document.getElementById("delete-company-name");
            nameInput.innerText = company.name;

            const updatedAtInput = document.getElementById("delete-company-updatedAt");
            updatedAtInput.innerText = company.updated_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest(".close-delete-modal-btn")) {
        deleteCompanyModal.classList.add("hidden");
    }
});

deleteCompanyForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const companyId = this.dataset.companyId;

    try {
        const response = await fetch(`/admin/company/delete/${companyId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                Accept: "application/json",
            },
        });

        const data = await response.json();

        if (response.status === 200) {
            deleteCompanyModal.classList.add("hidden");

            notify({
                type: "success",
                message: data.message,
                timeOut: 4000,
            });
        } else {
            notify({
                type: "error",
                message: data.message || "Some error occurred.",
                timeOut: 4000,
            });
        }
    } catch (error) {
        console.error(error);

        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
