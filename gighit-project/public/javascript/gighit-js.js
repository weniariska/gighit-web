function tampil(idName) {
    const show = document.getElementById(idName);
    show.classList.remove("hide");
}

function tutup(idName) {
    const hide = document.getElementById(idName);
    hide.classList.add("hide");
}

function tampilMain(idName, j) {
    for (i = 1; i <= j; i++) {
        const hideThis = document.getElementById(i);
        hideThis.classList.add("disNone");
    }
    removeDisNone(idName);
}

function removeDisNone(idName) {
    const show = document.getElementById(idName);
    show.classList.remove("disNone");
}
