// //getUser()
// function get_user(){
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "logic/user.php", true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//     xhr.onload = function(){
//         document.getElementById('users-data').innerHTML = this.responseText;
//     }

//     xhr.send('get_users');

// }

// //get_status()
// function toggle_status(id, val){
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "logic/user.php", true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//     xhr.onload = function(){
//         if(this.responseText==1){
//             alert('success', 'Status toggled!');
//             get_user();
//         }
//         else{
//             alert('success','Server is DOWN!!!');
//         }
//     }

//     xhr.send('toggle_status='+ id+'&value='+val);
// }

// //remove_user()
// function remove_user(user_id){
//     if(confirm("Are you sure you want to remove this user?")){
//         let data = new FormData();
//         data.append('user_id', user_id);
//         data.append('remove_user','');

//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "logic/user.php", true);

//         xhr.onload = function(){
//             if(this.responseText ==1){
//                 alert('success', 'User Removed!');
//                 get_user();
//             }
//             else{
//                 alert('error', 'User removal has Failed!!!')
//             }

//         }
//         xhr.send(data);
//     }
// }

// //search_for_user
// function search_user(username){
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "logic/user.php", true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//     xhr.onload = function(){
//         document.getElementById('users-data').innerHTML = this.responseText;
//     }

//     xhr.send('search_user&name='+username);
// }


// window.onload = function(){
//     get_user();
// }