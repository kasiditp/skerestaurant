function waitingClick(status) {
  var cfm = confirm("Are you sure you want to accept this order : " + status);
  if(cfm == true) {
      window.location.href = 'change_status-admin.php' + '?id=' + status ;
  }

}
