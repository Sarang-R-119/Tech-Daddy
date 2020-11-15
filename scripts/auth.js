const loginform = document.querySelector("#login-form");

loginform.addEventListener('submit', (e) => {

    e.preventDefault();

    const email = loginform['login-email'].value;
    const password = loginform['login-password'].value;

    auth.signInWithEmailAndPassword(email, password).then(cred => {
        // console.log(cred.user);

        closeForm();
        loginform.reset();

    })
});

const signupform = document.querySelector("#signup-form");

signupform.addEventListener('submit', (e) => {

    e.preventDefault();

    const email = signupform['signup-email'].value;
    const password = signupform['signup-password'].value;

    // Displaying the details to the console
    // console.log(email, password);
    closeForm_signup();
    signupform.reset();

    // Sign up the user
    auth.createUserWithEmailAndPassword(email, password).then(cred => {

        console.log(cred.user);
    })

});