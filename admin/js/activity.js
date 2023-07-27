let activity_s_form = document.getElementById('activity_s_form');

activity_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_activity();
});

function add_activity(){
    let data = new FormData();
    data.append('name',activity_s_form.elements['activity_name'].value);
    data.append('icon',activity_s_form.elements['activity_icon'].value);
    data.append('desc',activity_s_form.elements['activity_desc'].value);
    data.append('add_activity','');

    let xhr= new XMLHttpRequest();
    xhr.open("POST", "logic/activity.php",true);

    xhr.onload = function(){
        var myModal = document.getElementById('activity-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 1){
            // console.log(this.responseText);
            alert('success','New Activity has been added');
            activity_s_form.elements['activity_name'].value ='';
            activity_s_form.elements['activity_icon'].value ='';
            activity_s_form.elements['activity_desc'].value ='';
            get_activity();
        }
    }
    xhr.send(data);
}

function get_activity(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/activity.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        // console.log(this.responseText);
        document.getElementById('activities-data').innerHTML = this.responseText;
    }
    xhr.send('get_activity');
}

function rem_activity(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/activity.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText == 1){
            alert('success','This activity has been removed');
            get_activity();
        }
        else{
            alert('error','no changes have been made');
        }
    }
    xhr.send('rem_activity='+val);
}

window.onload = function(){
    get_activity();
}