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
            document.getElementById("body").style.backgroundColor=(currState ? "#ed6d1e":"white");
            var temp1 = document.getElementsByClassName("content1");
            for ( i = 0; i < temp1.length; i++ ) {
                temp1[i].style.display=(currState ? "none":"block");
            }
            document.getElementById("menu1").style.display=(currState ? "block":"none");
            document.getElementById("content2").style.display=(currState ? "none":"block");
            }
        );

var currStateChangeColor = false;
function changeColor(value) {
    var tempEl2 = document.getElementsByClassName("w-100 answer");
    console.log(tempEl2.length+"\n");
    for ( i = 0; i < tempEl2.length; i++ ) {
        tempEl2[i].style.backgroundColor = "white";
        console.log(tempEl2[i].style.backgroundColor + "\n");
    }
    value.style.backgroundColor="#ed6d1e";
}

//var currStateOnlyOne = false;
// var el2 = document.getElementById("survey");
// el2.addEventListener("click", function changeColor(value) {
//     //currStateOnlyOne = !currStateOnlyOne;
//     var tempEl2 = el2.getElementsByClassName("answer");
//     for ( i = 0; i < tempEl2.length; i++ ) {
//         if ( tempEl2[i].style.backgroundColor == "#ed6d1e" ) {
//             tempEl2[i].style.backgroundColor = "white";
//             console.log("Hello\n");
//         }
//     }
//     value.style.backgroundColor="#ed6d1e";
// });