function tab(x) {
    var form = document.getElementsByClassName("login-form");
    var tab  = document.getElementsByClassName("tab");
    
    for(i = 0; i < form.length; i++) {
        form[i].classList.add("disable");
        tab[i].classList.remove("tab-active");
    }
    form[x].classList.remove("disable");
    tab[x].classList.add("tab-active");
}