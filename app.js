
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function addText(kar) {
  if(kar==1){
    document.getElementById('enter-text').value = "changement ampoule";
  }
  if(kar==2){
    document.getElementById('enter-text').value = "remplacement serrure";
  }
  if(kar==3){
    document.getElementById('enter-text').value = "rituel satanique";
  }
  // kar = this.type;
  // console.log(this.class);
  // console.log(kar);
    // document.getElementById('enter-text').value = kar;
}

// check(){

// }