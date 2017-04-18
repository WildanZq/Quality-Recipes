var imgP = document.getElementsByClassName('img-parent');
var img = document.getElementsByClassName('img');

for(i = 0; i < imgP.length; i++) {
    var widthP = imgP[i].clientWidth;
    var heightP = imgP[i].clientHeight;
    var width = img[i].clientWidth;
    var height = img[i].clientHeight;
    var rasioP;
    var rasio;
    
    if(heightP > widthP) {
        rasioP = heightP / widthP;
        if(height > width) {
            rasio = height / width;
            if(rasioP > rasio) {
                img[i].style.height = "100%";
            } else {
                img[i].style.width = "100%";
            }
        } else {
            img[i].style.height = "100%";
        }
    } else if(heightP < widthP) {
        rasioP = widthP / heightP;
        if(height < width) {
            rasio = width / height;
            if(rasioP > rasio) {
                img[i].style.width = "100%";
            } else {
                img[i].style.height = "100%";
            }
        } else {
            img[i].style.width = "100%";
        }
    } else {
        if(height > width) {
            img[i].style.width = "100%";
        } else {
            img[i].style.height = "100%";
        }
    }
}