document.addEventListener('DOMContentLoaded', () => {

    const fileInput = document.getElementById('product-media-input');
    const browseBtn = document.getElementById('browse-media-btn');
    const dropZone = document.getElementById('product-media-dropzone');
    const fileList = document.getElementById('selected-media-list');

    browseBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();

        fileInput.click();
    });

    fileInput.addEventListener('change', () => {

        if (fileInput.files.length > 10) {
            alert('Maximum 10 files allowed.');
            fileInput.value = '';
            return;
        }

        renderFiles();
    });

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();

        dropZone.classList.add(
            'border-red-500',
            'bg-red-50'
        );
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove(
            'border-red-500',
            'bg-red-50'
        );
    });

    dropZone.addEventListener('drop', (e) => {

        e.preventDefault();

        dropZone.classList.remove(
            'border-red-500',
            'bg-red-50'
        );

        const files = e.dataTransfer.files;

        if (files.length > 10) {
            alert('Maximum 10 files allowed.');
            return;
        }

        fileInput.files = files;

        renderFiles();
    });

    function renderFiles()
    {
        fileList.innerHTML = '';

        Array.from(fileInput.files).forEach((file) => {

            fileList.insertAdjacentHTML(
                'beforeend',
                `
                <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-3 py-2">
                    <span class="truncate text-xs font-medium">
                        ${file.name}
                    </span>

                    <span class="text-[11px] text-gray-500">
                        ${(file.size / 1024 / 1024).toFixed(2)} MB
                    </span>
                </div>
                `
            );
        });
    }
});