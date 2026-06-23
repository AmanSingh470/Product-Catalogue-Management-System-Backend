import notify from "../../notification.js";

const deleteSegmentModal = document.getElementById("delete-segment-modal");
const deleteSegmentForm = document.getElementById("delete-segment-form");

document.addEventListener("click", async function (e) {
    const deleteBtn = e.target.closest(".delete-segment-btn");

    if (deleteBtn) {
        const categoryId = deleteBtn.dataset.id;

        deleteSegmentForm.dataset.categoryId = categoryId;
        console.log("working");
        
        try {
            const response = await fetch(`/admin/segment/${categoryId}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (response.status === 404) {
                throw new Error("Segment not found");
            }

            if (!response.ok) {
                throw new Error(
                    `Request failed with status ${response.status}`,
                );
            }

            const segment = await response.json();

            deleteSegmentModal.classList.remove("hidden");

            // Populate modal fields
            const nameInput = document.getElementById("delete-segment-name");
            nameInput.innerText = segment.name;

            const updatedAtInput = document.getElementById("delete-segment-updatedAt");
            updatedAtInput.innerText = segment.updated_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest(".close-delete-modal-btn")) {
        deleteSegmentModal.classList.add("hidden");
    }
});

deleteSegmentForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const categoryId = this.dataset.categoryId;

    try {
        const response = await fetch(`/admin/segment/delete/${categoryId}`, {
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
            deleteSegmentModal.classList.add("hidden");

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
