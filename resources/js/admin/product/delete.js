const deleteProductModal = document.getElementById('delete-product-modal');
const deleteMediaModal = document.getElementById('delete-media-modal');

document.addEventListener('click', function (e) {
    if (e.target.closest('.delete-product-btn')) {
        deleteProductModal.classList.remove('hidden');
    }

    if (e.target.closest('.close-delete-modal-btn')) {
        deleteProductModal.classList.add('hidden');
    }

    if(e.target.closest('.delete-media-btn')){
        deleteMediaModal.classList.remove('hidden');
    }
    if(e.target.closest('.close-delete-media-modal-btn')){
        deleteMediaModal.classList.add('hidden');
    }
});