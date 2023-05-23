const signinBtn = document.querySelector('.signinBtn');
const signupBtn = document.querySelector('.signupBtn');
const formBx = document.querySelector('.formBx');
const login = document.querySelector('.Login');

signupBtn.onclick = function(){
    formBx.classList.add('active');
    login.classList.add('active');
}

signinBtn.onclick = function(){
    formBx.classList.remove('active');
    login.classList.remove('active');
}

/* Calculator part */

let input = document.getElementById('calc');
let buttons = document.querySelectorAll('button');

console.log(eval(2**3));

let string = "";
let arr = Array.from(buttons);
arr.forEach(button => {
    button.addEventListener('click', (e) =>{
        if(e.target.innerHTML == '='){
            string = eval(string);
            input.value = string;
        }

        else if(e.target.innerHTML == 'Sign in' || e.target.innerHTML == 'Sign up')
        {
            string="";
        }

        else if(e.target.innerHTML == 'AC'){
            string = "";
            input.value = string;
        }
        else if(e.target.innerHTML == 'DEL'){
            string = string.substring(0, string.length-1);
            input.value = string;
        }
        else{
            string += e.target.innerHTML;
            input.value = string;
        }
        
    })
})