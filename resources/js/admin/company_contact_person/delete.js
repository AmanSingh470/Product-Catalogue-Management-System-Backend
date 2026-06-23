import notify from "../../notification.js";

const deleteContactPersonModal = document.getElementById("delete-contactPerson-modal");
const deleteContactPersonForm = document.getElementById("delete-contactPerson-form");

document.addEventListener("click", async function (e) {
    const deleteBtn = e.target.closest(".delete-contactPerson-btn");

    if (deleteBtn) {
        const contactPersonId = deleteBtn.dataset.id;

        deleteContactPersonForm.dataset.contactPersonId = contactPersonId;
        console.log("working");
        
        try {
            const response = await fetch(`/admin/contact_person/${contactPersonId}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (response.status === 404) {
                throw new Error("Contact Person not found");
            }

            if (!response.ok) {
                throw new Error(
                    `Request failed with status ${response.status}`,
                );
            }

            const contactPerson = await response.json();

            deleteContactPersonModal.classList.remove("hidden");

            // Populate modal fields
            const nameInput = document.getElementById("delete-contactPerson-name");
            nameInput.innerText = contactPerson.name;

            const emailInput = document.getElementById("delete-contactPerson-email");
            emailInput.innerText = contactPerson.email;

            const functionInput = document.getElementById("delete-contactPerson-function");
            functionInput.innerText = contactPerson.function;

            const companyInput = document.getElementById("delete-contactPerson-company");
            companyInput.innerText = contactPerson.company.name;

            const updatedAtInput = document.getElementById("delete-contactPerson-updatedAt");
            updatedAtInput.innerText = contactPerson.updated_at;

        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest(".close-delete-modal-btn")) {
        deleteContactPersonModal.classList.add("hidden");
    }
});

deleteContactPersonForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const contactPersonId = this.dataset.contactPersonId;

    try {
        const response = await fetch(`/admin/contact_person/delete/${contactPersonId}`, {
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
            deleteContactPersonModal.classList.add("hidden");

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
