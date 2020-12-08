/*Account page*/
function register(){
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("indicator");
    RegForm.style.transform = "translatex(0px)";
    LoginForm.style.transform = "translatex(0px)";
    indicator.style.transform = "translatex(100px)";
}
function login(){
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("indicator");
    RegForm.style.transform = "translatex(300px)";
    LoginForm.style.transform = "translatex(300px)";
    indicator.style.transform = "translatex(0px)";
}
/*Acount register*/
function checkPasswords()
{
	if(document.getElementById("pwd").value != document.getElementById("rpwd").value){
		alert("Passwords are not matching!");
		return false;
	}
	else
	{
		alert("Passwords are matching");
		return true;
	}
}

/*Admin login password*/
function AdmincheckPasswords()
{
	if(document.getElementById("pwd").value != '123@'){
		alert("Password is not matching!");
		return false;
	}
	else
	{
    alert("Password is matching");
		return true;
	}
}


/*jobs sorting*/
function sortTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[0];
        y = rows[i + 1].getElementsByTagName("TD")[0];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }