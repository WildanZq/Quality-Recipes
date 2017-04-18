//Textarea height
function textarea(o) {
    o.style.height = "1px";
    o.style.height = (8+o.scrollHeight)+"px";
}
//Search button
function search() {
    document.getElementById("search").style.display = "block";
    document.getElementById("nav").style.display = "none";
    document.getElementById("search-bar").focus();
}
//Close search button
function closenav() {
    document.getElementById("search").style.display = "none";
    document.getElementById("nav").style.display = "block";
}
//jQuary start
$(document).ready(function(){
    //Dropdown menu effect
    $("#nav-recipes").click(function() {
        $("#dropdown-resep").slideDown();
        $("#dropdown-resep div").animate({width: "100%"});
    })
    $("#nav-recipes").mouseleave(function() {
        $("#dropdown-resep").slideUp();
        $("#dropdown-resep div").animate({width: "0"});
    })
    
    $("#nav-login").click(function() {
        $("#dropdown-akun").slideDown();
        $("#dropdown-akun div").animate({width: "2px"});
        $("#dropdown-akun div").animate({height: "72px"});
    })
    $("#nav-login").mouseleave(function() {
        $("#dropdown-akun").slideUp();
        $("#dropdown-akun div").animate({width: "2px"});
        $("#dropdown-akun div").animate({height: "0"});
    })
    //Slide scroll effect
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 75
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });
    //Header scroll
    var desc = $("#desc").offset().top - 76;
    
    $(window).scroll(function() {
        if($(document).scrollTop() <= desc) {
            $('.header').css({"box-shadow": "none", "background": "none"});
            $('.logo').css({"height": "100px"});
            $('.logo-title').css({"color": "rgba(0, 0, 0, 0)", "font-size": "0"});
        } else {
            $('.header').css({"box-shadow": "0 2px 5px rgba(0, 0, 0, .2)", "background": "rgba(255, 255, 255, .95)"});
            $('.logo').css({"height": "50px"});
            $('.logo-title').css({"color": "black", "font-size": "2em"});
        }
    });
    //Navigation scroll
    var recipes = $("#recipes").offset().top - 76;
    var article = $("#article").offset().top -76;
    
    $(window).scroll(function() {
        if($(document).scrollTop() >= article && $(document).scrollTop() <= recipes) {
            $('#nav-article').addClass('nav-focus');
            $('#nav-recipes, #nav-forum').removeClass('nav-focus');
        } else if($(document).scrollTop() >= recipes) {
            $('#nav-recipes').addClass('nav-focus');
            $('#nav-article, #nav-forum').removeClass('nav-focus');
        } else {
            $('#nav-recipes, #nav-article, #nav-forum').removeClass('nav-focus');
        }
    });
});