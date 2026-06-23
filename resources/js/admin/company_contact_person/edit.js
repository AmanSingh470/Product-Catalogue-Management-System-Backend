import notify from "../../notification.js";

const editContactPersonModal = document.getElementById('edit-contactPerson-modal');
const editContactPersonBtn = document.getElementsByClassName('edit-contactPerson-btn');
const editContactPersonForm = document.getElementById("edit-contactPerson-form");

document.addEventListener('click', async function (e) {

    const editBtn = e.target.closest('.edit-contactPerson-btn');

    if (editBtn) {
        const contactPersonId = editBtn.dataset.id;

        editContactPersonForm.dataset.contactPersonId = contactPersonId;

        try {

            const response = await fetch(`/admin/contact_person/${contactPersonId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (response.status === 404) {
                throw new Error('Contact Person not found');
            }

            if (!response.ok) {
                throw new Error(`Request failed with status ${response.status}`);
            }

            const contactPerson = await response.json();

            console.log(contactPerson);

            editContactPersonModal.classList.remove('hidden');

            // Populate modal fields
            const nameInput = document.getElementById("edit-contactPerson-name");
            nameInput.value = contactPerson.name;

            const emailInput = document.getElementById("edit-contactPerson-email");
            emailInput.value = contactPerson.email;

            const functionInput = document.getElementById("edit-contactPerson-function");
            functionInput.value = contactPerson.function;

            const companyInput = document.getElementById("edit-contactPerson-company");
            companyInput.value = contactPerson.company.id;

            const updatedAtInput = document.getElementById("edit-contactPerson-updatedAt");
            updatedAtInput.innerText = contactPerson.updated_at;

            const createdAtInput = document.getElementById("edit-contactPerson-createdAt");
            createdAtInput.innerText = contactPerson.created_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest('.close-edit-contactPerson-modal-btn')) {
        editContactPersonModal.classList.add('hidden');
    }
});

editContactPersonForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    const contactPersonId = this.dataset.contactPersonId;

    try {
        const response = await fetch(`/admin/contact_person/update/${contactPersonId}`, {
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
            editContactPersonModal.classList.add("hidden");
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
