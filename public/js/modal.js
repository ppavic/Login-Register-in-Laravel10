// Get button that opens modal 
const btn = document.getElementById('modalBtn');

// When user clicks button, open modal 
btn.onclick = function() {
  modal.style.display = "block";
  
  // Disable background scroll
  document.body.style.overflow = "hidden"; 
}

// When user clicks x button, close modal
const close = document.getElementsByClassName("close")[0];
close.onclick = function() {
  modal.style.display = "none";
  
  // Enable scroll again
  document.body.style.overflow = "auto";
}