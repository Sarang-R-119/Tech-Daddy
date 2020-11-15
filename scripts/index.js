function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

// function openForm_signup()
// {
//     document.getElementById("form-signup").style.display = "block";
// }

// function closeForm_signup() {
//     document.getElementById("form-signup").style.display = "none";
// }

var el = document.getElementById("menu-button");
        var currState = false;
        el.addEventListener("click", function(){
            currState = !currState;
            var popup = document.getElementById("myForm");
            popupStyle = window.getComputedStyle(popup),
            displayS = popupStyle.display;
            if (displayS == 'block') {document.getElementById("myForm").style.display = "none";}
            el.style.backgroundImage=(currState ? "url(./assets/images/back.png)":"url(./assets/images/menu.png)");
            document.getElementById("menu1").style.display=(currState ? "block":"none");
            document.getElementById("content1").style.display=(currState ? "none":"block");
            document.getElementById("content2").style.display=(currState ? "none":"block");
            }
        );