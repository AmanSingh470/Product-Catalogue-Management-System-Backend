import notify from "../../notification.js";

const addCompanyModal = document.getElementById("add-company-modal");

document.addEventListener("click", function (e) {
    if (e.target.closest("#add-company-btn")) {
        addCompanyModal.classList.remove("hidden");
    }
    if (e.target.closest(".close-add-company-modal-btn")) {
        addCompanyModal.classList.add("hidden");
    }
});

const addCompanyForm = document.getElementById("add-company-form");

addCompanyForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/admin/company/create", {
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
            addCompanyModal.classList.add("hidden");
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

        } else {
            notify({
                type: "error",
                message: data.message || "Some error occurred.",
                timeOut: 4000,
            });
        }
    } catch (error) {
        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
