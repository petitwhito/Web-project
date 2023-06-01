
/* Calculator part */

let input = document.getElementById('calc');
let buttons = document.querySelectorAll('button');


let string = "";
let keep = "";
let arr = Array.from(buttons);
arr.forEach(button => {
    button.addEventListener('click', (e) =>{
        if(e.target.innerHTML == '=')
        {
          keep = input.value;
          string = eval(string);
          input.value = string;

          var data = new FormData();
          data.append('operation', keep);
          data.append('result', parseInt(string));
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'welcome.php', true);
          xhr.onreadystatechange = function() 
          {
            if (xhr.readyState === 4 && xhr.status === 200) 
            {
              console.log(xhr.responseText);
            }
          };
          xhr.send(data);
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