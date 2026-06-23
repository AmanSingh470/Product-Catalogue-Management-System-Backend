const sidebarBtn = document.getElementsByClassName('sidebar-toggle-btn');
const sidebar = document.getElementById('sidebar');

for (let i = 0; i < sidebarBtn.length; i++) {
    sidebarBtn[i].addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
    });
}

const profileDropdown = document.getElementById('profileDropdown');
const profileDropdownToggle = document.getElementById('profileDropdownWrapper');
profileDropdownToggle.addEventListener('click', () => {
    profileDropdown.classList.toggle('hidden');
});

document.addEventListener("click", (e) => {
    if (!profileDropdownToggle.contains(e.target)) {
        profileDropdown.classList.add("hidden");
    }
});