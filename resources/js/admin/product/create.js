import notify from "../../notification.js";

const addProductModal = document.getElementById("add-product-modal");

document.addEventListener("click", function (e) {
    if (e.target.closest("#add-product-btn")) {
        addProductModal.classList.remove("hidden");
    }

    if (e.target.closest(".close-add-product-modal-btn")) {
        addProductModal.classList.add("hidden");
    }
});

const addProductForm = document.getElementById("add-product-form");

addProductForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/admin/product/create", {
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
        console.log(data);

        if (response.status === 201) {
            addProductModal.classList.add("hidden");
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

function setupDynamicList(
    inputId,
    buttonId,
    listId,
    hiddenContainerId,
    fieldName,
) {
    const items = [];

    const input = document.getElementById(inputId);
    const button = document.getElementById(buttonId);
    const list = document.getElementById(listId);
    const hiddenContainer = document.getElementById(hiddenContainerId);

    function render() {
        list.innerHTML = "";
        hiddenContainer.innerHTML = "";

        items.forEach((item, index) => {
            const row = document.createElement("div");

            row.className =
                "flex items-center justify-between border border-[#D9DDE3] px-2 py-2 text-xs";

            const text = document.createElement("span");
            text.textContent = item;

            const removeBtn = document.createElement("button");
            removeBtn.type = "button";
            removeBtn.textContent = "Remove";
            removeBtn.className = "cursor-pointer text-red-500 font-semibold";

            removeBtn.addEventListener("click", () => {
                items.splice(index, 1);
                render();
            });

            row.appendChild(text);
            row.appendChild(removeBtn);
            list.appendChild(row);

            const hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = fieldName + "[]";
            hidden.value = item;

            hiddenContainer.appendChild(hidden);
        });
    }

    button.addEventListener("click", () => {
        const value = input.value.trim();

        if (!value) return;

        items.push(value);
        input.value = "";

        render();
    });

    input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            button.click();
        }
    });
}

setupDynamicList(
    "advantageInput",
    "addAdvantageBtn",
    "advantagesList",
    "advantagesHiddenInputs",
    "main_advantages",
);

setupDynamicList(
    "keyFactsInput",
    "addKeyFactBtn",
    "keyFactsList",
    "keyFactsHiddenInputs",
    "key_facts",
);

setupDynamicList(
    "intellectualPropertiesInput",
    "intellectualPropertiesBtn",
    "intellectualPropertiesList",
    "intellectualPropertiesHiddenInputs",
    "intellectual_properties",
);

setupDynamicList(
    "applicationsInput",
    "applicationsBtn",
    "applicationsList",
    "applicationsHiddenInputs",
    "applications",
);
