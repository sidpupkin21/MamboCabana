// let general_data;

//     let site_logo_inp = document.getElementById('site_logo_inp');
//     let site_about_inp = document.getElementById('site_about_inp');
//     let contacts_s_form = document.getElementById('contacts_s_form');

//     function get_general() {
//       let site_logo = document.getElementById('site_logo');
//       let site_about = document.getElementById('site_about');

//       let shutdown_toggler = document.getElementById('shutdown-toggle');


//       let xhr = new XMLHttpRequest();
//       xhr.open("POST", "logic/settings_crud.php", true);
//       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//       xhr.onload = function() {
//         general_data = JSON.parse(this.responseText);
//         console.log(general_data);


//         site_logo.innerText = general_data.site_logo;
//         site_logo_inp.value = general_data.site_logo;

//         site_about.innerText = general_data.site_about;
//         site_about_inp.value = general_data.site_about;

//         if (general_data.shutdown == 0) {
//           shutdown_toggler.checked = false;
//           shutdown_toggler.value = 0;
//         } else {
//           shutdown_toggler.checked = true;
//           shutdown_toggler.value = 1;
//         }


//       }

//       xhr.send('get_general');
//     }

//     general_s_form.addEventListener('submit', function(e) {
//       e.preventDefault();
//       upd_general(site_logo_inp.value, site_about_inp.value);
//     });

//     function upd_general(site_logo_val, site_about_val) {
//       let xhr = new XMLHttpRequest();
//       xhr.open("POST", "logic/settings_crud.php", true);
//       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


//       xhr.onload = function() {
//         // console.log(this.responseText);
//         var mymodal = document.getElementById('general-s');
//         var modal = bootstrap.Modal.getInstance(mymodal);
//         modal.hide();
//         if (this.responseText == 1) {
//           alert('success', 'General Settings have been updated');
//           get_general;

//         } else {
//           alert('error', 'No changes have been made');
//         }

//       }

//       xhr.send('site_logo=' + site_logo_val + "&site_about=" + site_about_val + '&upd_general');
//     }


//     function upd_shutdown(val) {
//       let xhr = new XMLHttpRequest();
//       xhr.open("POST", "logic/settings_crud.php", true);
//       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//       // xhr.onload = function() {
//       //   // console.log(this.responseText);
//       //   if (this.responsetext == 1 && general_data.shutdown == 0) {
//       //     alert('success', 'You have turn on reservation');
//       //   } 
//       //   else if (this.responsetext == 0 && general_data.shutdown == 1) {
//       //     alert('success', 'You have turned off reservations');
//       //   } 
//       //   else {
//       //     alert('error','an error has occured');
//       //   }
//       //   get_general();
//       // }
//       // xhr.send('upd_shutdown=' + val);
//       xhr.onload = function() {
//         //console.log(this.responseText);
//         if (this.responseText == 1 && general_data.shutdown == 0) {
//           alert('success', 'You have turn off reservation');
//         } else {
//           alert('success', 'You have turned on reservations');
//         }
//         get_general();
//       }
//       xhr.send('upd_shutdown=' + val);
//     }

//     function get_contacts() {
//       let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email1', 'email2', 'fb', 'insta', 'tw', 'ws', 'bk'];
//       let iframe = document.getElementById('iframe');
//       let xhr = new XMLHttpRequest();
//       xhr.open("POST", "logic/settings_crud.php", true);
//       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//       // xhr.onload = function() {
//       //   console.log(this.responseText);
//       //   contacts_data = JSON.parse(this.responsetext);
//       //   contacts_data = object.values(contacts_data);

//       //   for (i = 0; i < contacts_p_id.length; i++) {
//       //     document.getelementbyid(contacts_p_id[i]).innertext = contacts_data[i + 1];
//       //   }
//       //   iframe.src = contacts_data[9];
//       //   contacts_inp(contacts_data);
//       // }
//       xhr.onload = function() {
//         contacts_data = JSON.parse(this.responseText);
//         contacts_data = Object.values(contacts_data);

//         for (i = 0; i < contacts_p_id.length; i++) {
//           document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
//         }
//         iframe.src = contacts_data[9];
//         contacts_inp(contacts_data);
//       }

//       xhr.send('get_contacts');
//     }

//     function contacts_inp(data) {
//       let contacts_inp_id = ['address', 'gmap', 'pn1', 'pn2', 'email1', 'email2', 'fb', 'insta', 'tw', 'ws', 'bk'];

//       for (j = 0; j < contacts_inp_id.length; j++) {
//         document.getelementbyid(contacts_inp_id[i]).value = data[j + 1];
//       }
//     }

//     // contact_s_form.addeventlistener('submit', function(e) {
//     //   e.preventdefault();
//     //   upd_contacts();
//     // });

//     function upd_contacts() {
//       let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw', 'ws', 'bk'];
//       let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'ws_inp', 'bk_inp']
//       let data_str = '';

//       for (i = 0; i < index.length; i++) {
//         data_str += index[i] + "=" + document.getelementbyid(contacts_inp_id[i]).value + '&';
//       }
//       data_str += "upd_contacts";

//       let xhr = new XMLHttpRequest();
//       xhr.open("POST", "logic/settings_crud.php", true);
//       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//       xhr.onload = function() {
//         var mymodal = document.getelementbyid('contacts-s');
//         var modal = bootstrap.modal.getinstance(mymodal);
//         modal.hide();
//         if (this.responsetext == 1) {
//           alert('success', 'the following changes have been saved');
//           get_contacts();
//         } else {
//           alert('error', 'no changes have been made to this field');
//         }
//       }
//       xhr.send(data_str);
//     }


//     window.onload = function() {
//       get_general();
//       get_contacts();
//     }