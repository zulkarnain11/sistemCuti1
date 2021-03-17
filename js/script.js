function hide(){
    var a = document.getElementById("btn1");
    var x = document.getElementById("addUser");
    if (x.style.display === "block"){
        x.style.display = "none";
    }else{
        x.style.display = "block";
    }
    if (a.style.backgroundColor === "green"){
        a.style.backgroundColor = "rgb(129, 5, 129)";
    }else{
        a.style.backgroundColor = "green";
    }
   
}
function hide1(){
    var a = document.getElementById("btn2");
    var x = document.getElementById("edit");
    var z = document.getElementById("information");
    var s = document.getElementById("form-edit");
    if (x.style.display === "block"){
        x.style.display = "none";
    }else{
        x.style.display = "block";
    }
    if (a.style.backgroundColor === "green"){
        a.style.backgroundColor = "rgb(129, 5, 129)";
    }else{
        a.style.backgroundColor = "green";
    }
    if (z.style.display === "block"){
        z.style.display = "none";
    }else{
        z.style.display = "block";
    }
    if (s.style.display === "block"){
        s.style.display = "none";
    }else{
        s.style.display = "block";
    }


}
function hide2(){
    var a = document.getElementById("btn3");
    var x = document.getElementById("delete");
    if (x.style.display === "block"){
        x.style.display = "none";
    }else{
        x.style.display = "block";
    }
    if (a.style.backgroundColor === "green"){
        a.style.backgroundColor = "rgb(129, 5, 129)";
    }else{
        a.style.backgroundColor = "green";
    }
}
function hide3(){
    var x = document.getElementById("information");
    if (x.style.display === "block"){
        x.style.display = "none";
    }else{
        x.style.display = "block";
    }
}