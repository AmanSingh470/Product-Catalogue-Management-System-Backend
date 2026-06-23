import notify from "../../notification.js";

const editSegmentModal = document.getElementById('edit-segment-modal');
const editSegmentBtn = document.getElementsByClassName('edit-segment-btn');
const editSegmentForm = document.getElementById("edit-segment-form");

document.addEventListener('click', async function (e) {

    const editBtn = e.target.closest('.edit-segment-btn');

    if (editBtn) {
        const segmentId = editBtn.dataset.id;

        editSegmentForm.dataset.segmentId = segmentId;

        try {
            const response = await fetch(`/admin/segment/${segmentId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (response.status === 404) {
                throw new Error('Segment not found');
            }

            if (!response.ok) {
                throw new Error(`Request failed with status ${response.status}`);
            }

            const segment = await response.json();

            console.log(segment);

            editSegmentModal.classList.remove('hidden');

            // Populate modal fields
            const nameInput = document.getElementById("edit-segment-name");
            nameInput.value = segment.name;

            const updatedAtInput = document.getElementById("edit-segment-updatedAt");
            updatedAtInput.innerText = segment.updated_at;

            const createdAtInput = document.getElementById("edit-segment-createdAt");
            createdAtInput.innerText = segment.created_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest('.close-edit-segment-modal-btn')) {
        editSegmentModal.classList.add('hidden');
    }
});

editSegmentForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    const segmentId = this.dataset.segmentId;

        const response = await fetch(`/admin/segment/update/${segmentId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                Accept: "application/json",
            },
            body: formData,
        });
    
        console.log(response);
    try {
        const response = await fetch(`/admin/segment/update/${segmentId}`, {
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
            editSegmentModal.classList.add("hidden");
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
