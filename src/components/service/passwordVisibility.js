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

const toggle3= () => {
    if(state){
        document.getElementById("password3").setAttribute("type", "password");
        document.getElementById("eye3").className = "fa-solid fa-eye";
        state = false;
    }
    else{
        document.getElementById("password3").setAttribute("type", "text");
        document.getElementById("eye3").className = "fa-solid fa-eye-slash";
        state = true;
    }
}

const toggle4= () => {
    if(state){
        document.getElementById("password4").setAttribute("type", "password");
        document.getElementById("eye4").className = "fa-solid fa-eye";
        state = false;
    }
    else{
        document.getElementById("password4").setAttribute("type", "text");
        document.getElementById("eye4").className = "fa-solid fa-eye-slash";
        state = true;
    }
}

const toggle5= () => {
    if(state){
        document.getElementById("password5").setAttribute("type", "password");
        document.getElementById("eye5").className = "fa-solid fa-eye";
        state = false;
    }
    else{
        document.getElementById("password5").setAttribute("type", "text");
        document.getElementById("eye5").className = "fa-solid fa-eye-slash";
        state = true;
    }
}