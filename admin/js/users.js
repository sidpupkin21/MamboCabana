function get_users(){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","logic/users.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('users-data').innerHTML = this.responseText;


    }
    xhr.send('get_users');
}

window.onload = function(){
    get_users();
  }