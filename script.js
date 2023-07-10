function validatePassword() {
    
    var password = document.getElementById("userpassword_field").value;
    
    if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      return false;
    }
}