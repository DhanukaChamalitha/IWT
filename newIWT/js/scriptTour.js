function changeImage(fileName){
    let image = document.querySelectorAll("#select-img-top");
    image.setAttribute("src", fileName);
}

function changeHeader(){
    document.getElementById("tour-header").innerHTML = "amubuluwawa";
}
