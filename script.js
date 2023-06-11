/* Login effects */

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

let string = "";
let arr = Array.from(buttons);
arr.forEach(button => {
    button.addEventListener('click', (e) =>{
        if(e.target.innerHTML == '='){
            string = eval(string);
            input.value = string;
        }
        else if(e.target.innerHTML == 'Sign in' || e.target.innerHTML == 'Sign up' || e.target.innerHTML == 'Calculate')
        {
            string="";
        }

        else if(e.target.innerHTML == '√'){
            string += "Math.sqrt(";
            input.value += "√(";
        }

        else if(e.target.innerHTML == 'π')
        {
            string += "Math.PI";
            input.value += "π";
        }

        else if(e.target.innerHTML == 'ln')
        {
            string += "Math.log(";
            input.value += "ln(";
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
            input.value += e.target.innerHTML;
        }
        
    })
})

/* API part */

document.getElementById('calculateBtn').addEventListener('click', function() {
    var expression = document.getElementById('exp').value;
    console.log(expression);

    // Make API call to Math.js
    fetch('https://api.mathjs.org/v4/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            expr: expression
        })
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        document.getElementById('result').textContent = 'Result: ' + data.result;
    })
    .catch(function(error) {
        console.log('Error:', error);
    });
});