let state = false;
const toggle = () => {
    if(state){
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye").className = "fa-solid fa-eye";
        state = false;
    }
    else{
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye").className = "fa-solid fa-eye-slash";
        state = true;
    }
}

const toggle1 = () => {
    if(state){
        document.getElementById("password1").setAttribute("type", "password");
        document.getElementById("eye1").className = "fa-solid fa-eye";
        state = false;
    }
    else{
        document.getElementById("password1").setAttribute("type", "text");
        document.getElementById("eye1").className = "fa-solid fa-eye-slash";
        state = true;
    }
}

const toggle2= () => {
    if(state){
        document.getElementById("password2").setAttribute("type", "password");
        document.getElementById("eye2").className = "fa-solid fa-eye";
        state = false;
    }
    else{
        document.getElementById("password2").setAttribute("type", "text");
        document.getElementById("eye2").className = "fa-solid fa-eye-slash";
        state = true;
    }
}