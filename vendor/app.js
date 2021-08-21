createAccountButton = document.getElementById('createAccountButton');

connectButton = document.getElementById('connectButton');

signInContainer = document.querySelector('.sign-in');

signUpContainer = document.querySelector('.sign-up');

createAccountButton.addEventListener('click',()=>{
    signInContainer.style.display = 'none';
    signUpContainer.style.display = 'block';
});


connectButton.addEventListener('click',()=>{
    signUpContainer.style.display = 'none';
    signInContainer.style.display = 'block';
});