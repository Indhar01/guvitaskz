$( document ).ready(function() {
    
const token = localStorage.getItem('token');

if(token)
{
    console.log('Correct Login');
}
else
{
    location.replace("../Html/403.html");
}
});

 
