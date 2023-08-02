let general_data;
let contacts_data;
let general_s_form = document.getElementById('general_s_form');
let site_logo_inp = document.getElementById('site_logo_inp');
let site_about_inp = document.getElementById('site_about_inp');
let contacts_s_form = document.getElementById('contacts_s_form');

function get_general(){
  let site_logo = document.getElementById('site_logo');
  let site_about = document.getElementById('site_about');
  let shutdown_toggler = document.getElementById('shutdown-toggle');

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/settings_crud.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    general_data = JSON.parse(this.responseText);

    site_logo.innerText = general_data.site_logo;
    site_logo_inp.value = general_data.site_logo;

    site_about.innerText = general_data.site_about;
    site_about_inp.value = general_data.site_about;

    if(general_data.shutdown ==0){
      shutdown_toggler.checked = false;
      shutdown_toggler.value = 0;
    }
    else{
      shutdown_toggler.checked = true;
      shutdown_toggler.value = 1;
    }
  }
  xhr.send('get_general');
}
general_s_form.addEventListener('submit', function(e) {
  e.preventDefault();
  upd_general(site_logo_inp.value, site_about_inp.value);
});

function upd_general(site_logo_val, site_about_val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/settings_crud.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


  xhr.onload = function() {
    var mymodal = document.getElementById('general-s');
    var modal = bootstrap.Modal.getInstance(mymodal);
    modal.hide();
    if (this.responseText == 1) {
      showAlert('success', 'General Settings have been updated');
      get_general();

    } else {
      showAlert('error', 'No changes have been made');
    }
  }

  xhr.send('site_logo=' + site_logo_val + "&site_about=" + site_about_val + '&upd_general');
}

function upd_shutdown(val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/settings_crud.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    if (this.responseText == 1 && general_data.shutdown == 0) {
      showAlert('success', 'You have turn off reservation');
      
    } else {
      showAlert('success', 'You have turned on reservations');
    }
    get_general();
  }
  xhr.send('upd_shutdown=' + val);
}

function get_contacts(){
  let contacts_p_id = [
  'address', 
  'gmap', 
  'pn1', 
  'pn2', 
  'email1', 
  'email2',
  'fb',
  'insta',
  'tw',
  'ws',
  'bk'];

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "logic/settings_crud.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function(){
    contacts_data = JSON.parse(this.responseText);
    contacts_data = Object.values(contacts_data);

    for(i=0;i<contacts_p_id.length;i++){
      document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
    }
    contacts_inp(contacts_data);
  }
  xhr.send('get_contacts');
}

function contacts_inp(data){
  let contacts_inp_id =  ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email1_inp','email2_inp' ,'fb_inp', 'insta_inp', 'tw_inp','ws_inp','bk_inp'];

  for(i=0; i<contacts_inp_id.length;i++){
      document.getElementById(contacts_inp_id[i]).value = data[i+1];
  }
}

contacts_s_form.addEventListener('submit',function(e){
  e.preventDefault();
  upd_contacts();
});

function upd_contacts(){
let index = ['address', 'gmap', 'pn1', 'pn2', 'email1','email2' ,'fb', 'insta', 'tw','ws','bk'];
let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email1_inp','email2_inp' ,'fb_inp', 'insta_inp', 'tw_inp','ws_inp','bk_inp'];

let data_str="";

for(i=0;i<index.length;i++){
  data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
}
data_str += "upd_contacts";

let xhr = new XMLHttpRequest();
xhr.open("POST","logic/settings_crud.php",true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onload = function(){
  var myModal = document.getElementById('contacts-s');
  var modal = bootstrap.Modal.getInstance(myModal);
  modal.hide();
  if(this.responseText == 1)
  {
    showAlert('success','Contact settings have been updated');
    get_contacts();
  }
  else
  {
    showAlert('error','No changes have been made');
  }
}

xhr.send(data_str);

}

window.onload = function(){
  get_general();
  get_contacts();
}