let general_data, contacts_data;
let general_s_form = document.getElementById('general_s_form');
let site_title_inp = document.getElementById('site_title_inp');
let site_about_inp = document.getElementById('site_about_inp');
let contact_s_form = document.getElementById('contacts_s_form');
/*maybe idk*/
// let team_s_form = document.getElementById('team_s_form');
// let member_name_inp = document.getElementById('member_name_inp');
// let member_picture_inp = document.getElementById('member_picture_inp');

//get General info function
function get_general() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');
    let shutdown_toggle = document.getElementById('shutdown-toggle');
    let xhr = new XMLHttpRequest();
    
    xhr.open("POST","logic/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.onload = function(){
        general_data = JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title;
        site_title_inp.innerText = general_data.site;

        site_about.innerText = general_data.site_about;
        site_about_inp.innerText = general_data.site_about;

        if(general_data.shutdown == 0){
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
        }

        else {
            shutdown_toggle.checked = true;
            shutdown_toggle.value =1;
        }
    }

    xhr.send('get_general');
}


general_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    upd_general(site_title_inp.value,site_about_inp.value);
});

function upd_general(site_title_val, site_about_val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        var myModall = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(myModall);
        modal.hide();

        if(this.responseText == 1){
            alert('success', 'The following changes have been applied');
            get_general();
        }
        else{
            alert('error','No changes have been applied. Please check if server is active');
        }
    }

    xhr.send('site_title='+site_title_val+"&site_about="+site_about_val+'&upd_general');
}

function upd_shutdown(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","logic/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(this.responseText == 1 && general_data.shutdown==0){
            alert('success','Website Booking has been shutdown. New reservations are inactive');
        }
        else{
            alert('success','You have reactived booking!');
        }
        get_general();
    }
    xhr.send('upd_shutdown='+val);
}

//get Contact details from Modal
function get_contacts(){
    let contacts_p_id = ['address','gmap','pn1','pn2','email','fb','insta','tw','ws','bk'];
    let iframe = document.getElementById('iframe');
    let xhr = new XMLHttpRequest();
    xhr.open("POST","logic/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);

        for(i = 0; i<contacts_p_id.length;i++){
            document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
        }
        iframe.src = contacts_data[9];
        contacts_inp(contacts_data);
    }

    xhr.send('get_contacts');
}
//update contact data in modal form and database when submit button clicked
function contacts_inp(data){
    let contacts_inp_id = ['address','gmap','pn1','pn2','email','fb','insta','tw','ws','bk'];

    for(j=0; j<contacts_inp_id.length;j++){
        document.getElementById(contacts_inp_id[i]).value = data[j+1];
    }
}

contact_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    upd_contacts();
});

function upd_contacts(){
    let index = ['address','gmap','pn1','pn2','email','fb','insta','tw','ws','bk'];
    let contacts_inp_id = ['address_inp','gmap_inp','pn1_inp','pn2_inp','email_inp','fb_inp','insta_inp','tw_inp','ws_inp','bk_inp']
    let data_str = '';

    for(i =0;i<index.length; i++){
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
    }
    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST","logic/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        var myModal = document.getElementById('contacts-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(this.responseText == 1){
            alert('success','The following changes have been saved');
            get_contacts();
        }
        else{
            alert('error','No changes have been made to this field');
        }
    }
    xhr.send(data_str);
}

window.onload = function(){
    get_general();
    get_contacts();
}