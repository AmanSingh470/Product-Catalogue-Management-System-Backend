import notify from "../../notification.js";

const addContactPersonModal = document.getElementById("add-contactPerson-modal");

document.addEventListener("click", function (e) {
    if (e.target.closest("#add-contactPerson-btn")) {
        addContactPersonModal.classList.remove("hidden");
    }
    if (e.target.closest(".close-add-contactPerson-modal-btn")) {
        addContactPersonModal.classList.add("hidden");
    }
});

const addContactPersonForm = document.getElementById("add-contactPerson-form");

addContactPersonForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/admin/contact_person/create", {
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
            addContactPersonModal.classList.add("hidden");
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
        console.log(error);
        
        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
