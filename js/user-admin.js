

function deleteClick(id_temp) {
    console.log("Delete");
    var cid = id_temp;
    console.log("this : " + id_temp);
    var cfm = confirm("Are you sure you want to delete this user : " + id_temp);
    if(cfm == true) {
        window.location.href = 'delete_user.php' + '?id=' + id_temp ;
    }
}



