function get_users() {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/users.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function () {
    document.getElementById('users-data').innerHTML = this.responseText;
  }
  xhr.send('get_users');
}
function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/users.php", true);

  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function () {
    console.log(this.responseText);
    if (this.responseText == 1) {
      showAlert('success', 'Status is active');
      get_users();
    } else {
      showAlert('success', 'Status is inactive');
    }
  }
  xhr.send('toggle_status=' + id + '&value=' + val);
}

function remove_user(id) {
  showConfirm("Are you sure you want to delete this room?",
    () => {

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "logic/users.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function () {
        //console.log(this.responseText);
        if (this.responseText == 1) {
          //console.log(this.responseText);
          showAlert('success', 'User removal is successful');
          get_users();
        }
        else {
          console.log(this.responseText);
          showAlert('error', 'User removal has failed');
        }

      };

      xhr.send('remove_user=' + id);
    },
    () => {
      // Do nothing when canceled
    }
  );
}

function search_user(username){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/users.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    document.getElementById('users-data').innerHTML = this.responseText;
  }

  xhr.send('search_user&name='+username);
}


window.onload = function () {
  get_users();
}