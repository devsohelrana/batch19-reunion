
// Toast message show && hide

var toast = document.getElementById("toast");

window.addEventListener("load", () => {
    toast.classList.add("show");
    setTimeout(() => {
        toast.classList.remove("show");
    }, 5000);
});
