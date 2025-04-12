let active = false
function myFunction() {
    let sidebar = document.getElementById("dashboard-sidebar");
    let dashboard = document.getElementById("dashboard-content")
    active = !active
    if (active) {
        sidebar.classList.add('sidebar')
        dashboard.classList.add('content-screen')
    } else {
        sidebar.classList.remove('sidebar')
        dashboard.classList.remove('content-screen')
    }
}

// ==============================================================
// Side Bar Dropdown Script 

document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const dropdownArrow = document.getElementById('dropdown-arrow');

    dropdownToggle.addEventListener('click', function () {
        if (dropdownMenu.style.maxHeight === '0px' || dropdownMenu.style.maxHeight === '') {
            const scrollHeight = dropdownMenu.scrollHeight;
            dropdownMenu.style.maxHeight = `${scrollHeight}px`;
            dropdownArrow.classList.add('-rotate-90');
        } else {
            dropdownMenu.style.maxHeight = '0px';
            dropdownArrow.classList.remove('-rotate-90');
        }
    });

    document.addEventListener('click', function (event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.maxHeight = '0px';
            dropdownArrow.classList.remove('-rotate-90');
        }
    });
});

// ============================================================== 