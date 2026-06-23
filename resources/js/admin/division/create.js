import notify from "../../notification.js";

const addDivisionModal = document.getElementById('add-division-modal');

document.addEventListener('click', function (e) {
    if (e.target.closest('#add-division-btn')) {
        addDivisionModal.classList.remove('hidden');
    }
    if (e.target.closest('.close-add-division-modal-btn')) {
        addDivisionModal.classList.add('hidden');
    }
});

const addDivisionForm = document.getElementById("add-division-form");

addDivisionForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/admin/division/create", {
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
            addDivisionModal.classList.add("hidden");
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