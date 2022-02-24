function validateForm() {
    {
    var x = document.forms["formClass"]["titleId"].value;
    if (x == "") {
      alert("Title is required.");
      return false;
    }}
    {
        var x = document.forms["formClass"]["contactId"].value;
    if (x == "") {
      alert("Email address must be filled out.");
      return false;
    }}
    {
        var x = document.forms["formClass"]["descrId"].value;
    if (x == "") {
      alert("Description is required");
      return false;
    }}  
  }