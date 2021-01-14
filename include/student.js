const buttonAttendance = document.getElementById('attendancebutton');
const fromData = new FormData();
fromData.append("cle", "secret")

buttonAttendance.addEventListener('click', ()  => {
  attendancebutton.innerHtml = "clock out";
  attendancebutton.style.backgroundColor = "green";
 

/*  fetch('http://localhost/include/studentboard.php',{
      method :'POST',
      body:formData
  })
  .then(response  => response.text())
  .then(text  => {
    document.querySelector('.pointage').textContent = text
  })*/
})

