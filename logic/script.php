<!-- // // Create a new link element
// var cssLink = document.createElement("link");

// // Set the rel attribute to "stylesheet"
// cssLink.rel = "stylesheet";

// // Set the href attribute to the CSS file URL
// cssLink.href = "https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css";

// // Append the link element to the document's head section
// document.head.appendChild(cssLink);

// //Initialize Swiper
//   var swiper = new Swiper(".mySwiper", {
//     spaceBetween: 30,
//     centeredSlides: true,
//     effect: "fade",
//     loop: true,
//     autoplay: {
//       delay: 1500,
//       disableOnInteraction: false,
//     },
//   });

// var swiper = new Swiper(".swiper-container", {
//   spaceBetween: 30,
//   effect: "fade",
//   loop: true,
//   autoplay: {
//     delay: 3500,
//     disableOnInteraction: false,
//   }
// });

// var swiper = new Swiper(".swiper-testimonials", {
//   effect: "coverflow",
//   grabCursor: true,
//   centeredSlides: true,
//   slidesPerView: "auto",
//   slidesPerView: "3",
//   loop: true,
//   coverflowEffect: {
//     rotate: 50,
//     stretch: 0,
//     depth: 100,
//     modifier: 1,
//     slideShadows: false,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//   },
//   breakpoints: {
//     320: {
//       slidesPerView: 1,
//     },
//     640: {
//       slidesPerView: 1,
//     },
//     768: {
//       slidesPerView: 2,
//     },
//     1024: {
//       slidesPerView: 3,
//     },
//   }
// });


<script>
function alert(type,msg,position='body')
{
  let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
  let element = document.createElement('div');
  element.innerHTML = `
    <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
      <strong class="me-3">${msg}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  `;

  if(position=='body'){
    document.body.append(element);
    element.classList.add('custom-alert');
  }
  else{
    document.getElementById(position).appendChild(element);
  }
  setTimeout(remAlert, 3000);
}

function remAlert(){
  document.getElementsByClassName('alert')[0].remove();
}

function setActive()
{
  let navbar = document.getElementById('nav-bar');
  let a_tags = navbar.getElementsByTagName('a');

  for(i=0; i<a_tags.length; i++)
  {
    let file = a_tags[i].href.split('/').pop();
    let file_name = file.split('.')[0];

    if(document.location.href.indexOf(file_name) >= 0){
      a_tags[i].classList.add('active');
    }

  }
}

let register_form = document.getElementById('register-form');

register_form.addEventListener('submit', (e)=>{
  e.preventDefault();

  let data = new FormData();

  data.append('name',register_form.elements['name'].value);
  data.append('email',register_form.elements['email'].value);
  data.append('username',register_form.elements['username'].value);
  data.append('phone',register_form.elements['phone'].value);
  data.append('dob',register_form.elements['dob'].value);
  data.append('password',register_form.elements['password'].value);
  data.append('cpassword',register_form.elements['cpassword'].value);
  data.append('register','');

  var myModal = document.getElementById('signupModal');
  var modal = bootstrap.Modal.getInstance(myModal);
  modal.hide();

  let xhr = new XMLHttpRequest();
  xhr.open("POST","logic/login_register.php",true);

  xhr.onload = function(){
    if(this.responseText == 'pass_mismatch'){
      alert('error',"Password Mismatch!");
    }
    else if(this.responseText == 'email_already'){
      alert('error',"Email is already registered!");
    }
    else if(this.responseText == 'username_already'){
      alert('error',"Username is already registered!");
    }
    else{
      alert('success',"Registration successful!");
      register_form.reset();
    }
  }

  xhr.send(data);
});

setActive();


</script> -->
