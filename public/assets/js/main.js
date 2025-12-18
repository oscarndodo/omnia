const currentPath = window.location.pathname;

document.querySelectorAll(".sidebar-item").forEach(el => {
    el.classList.remove("active", "bg-red-50", "text-red-700");

    const linkPath = new URL(el.href).pathname;

    if (currentPath.startsWith(linkPath)) {
        el.classList.add("active", "bg-red-50", "text-red-700");
    }
});
