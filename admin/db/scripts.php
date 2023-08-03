<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script>

function showAlert(type,msg,position='body')
{
  let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
  let element = document.createElement('div');
  element.innerHTML = `
  <div class="alert-container" style="margin-top:20%">
    <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
      <strong class="me-3">${msg}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
  `;

  if(position=='body'){
    document.body.append(element);
    element.classList.add('custom-alert');
  }
  else{
    document.getElementById(position).appendChild(element);
  }
  setTimeout(remAlert, 5000);
}

function remAlert(){
  var alertElement =document.getElementsByClassName('alert')[0];
  if(alertElement){
    alertElement.remove();
  }
  // document.getElementsByClassName('alert')[0].remove();
}

  
function setActive()
{
  let navbar = document.getElementById('dashboard-menu');
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
// setActive();

// function showConfirm(msg, onConfirm, onCancel, position = 'body') {
//   let element = document.createElement('div');
//   element.innerHTML = `
//   <div class="alert-container" style="margin-top:20%">
//     <div class="alert alert-info alert-dismissible fade show" role="alert">
//       <strong class="me-3">${msg}</strong>
//       <button type="button" class="btn btn-success me-1" onclick="confirmAction(true)">Confirm</button>
//       <button type="button" class="btn btn-danger" onclick="confirmAction(false)">Cancel</button>
//       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//     </div>
//   </div>
//   `;

//   function confirmAction(isConfirmed) {
//     if (isConfirmed) {
//       onConfirm();
//     } else {
//       onCancel();
//     }
//     element.remove();
//   }

//   if (position === 'body') {
//     document.body.append(element);
//     element.classList.add('custom-alert');
//   } else {
//     document.getElementById(position).appendChild(element);
//   }
// }
function confirmAction(isConfirmed, onConfirm, onCancel) {
  if (isConfirmed) {
    onConfirm();
  } else {
    onCancel();
  }
  const confirmElement = document.querySelector('.custom-confirm');
  confirmElement.remove();
}

function showConfirm(msg, onConfirm, onCancel, position = 'body') {
  let element = document.createElement('div');
  element.innerHTML = `
  <div class="alert-container" style="margin-top:10%">
    <div class="alert alert-info alert-dismissible fade show custom-confirm" role="alert">
      <strong class="me-3">${msg}</strong>
      <button type="button" class="btn btn-success me-1" id="confirmBtn">Confirm</button>
      <button type="button" class="btn btn-danger" id="cancelBtn">Cancel</button>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  `;

  if (position === 'body') {
    document.body.append(element);
    element.classList.add('custom-alert');
  } else {
    document.getElementById(position).appendChild(element);
  }

  const confirmBtn = element.querySelector('#confirmBtn');
  const cancelBtn = element.querySelector('#cancelBtn');

  confirmBtn.addEventListener('click', () => {
    confirmAction(true, onConfirm, onCancel);
  });

  cancelBtn.addEventListener('click', () => {
    confirmAction(false, onConfirm, onCancel);
  });
}

setActive();

</script>
