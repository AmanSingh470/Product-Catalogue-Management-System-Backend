import notify from "../../notification.js";

const addsegmentModal = document.getElementById("add-segment-modal");

document.addEventListener("click", function (e) {
    if (e.target.closest("#add-segment-btn")) {
        addsegmentModal.classList.remove("hidden");
    }

    if (e.target.closest(".close-add-segment-modal-btn")) {
        addsegmentModal.classList.add("hidden");
    }
});

const addsegmentForm = document.getElementById("add-segment-form");

addsegmentForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/admin/segment/create", {
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
            addsegmentModal.classList.add("hidden");
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
