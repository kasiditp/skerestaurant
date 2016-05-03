function restockClick(i) {
    var foodleft = "#foodleft-admin"+i;
    
    var restock = prompt("Please enter your stock", "0");
    
    console.log(restock);
    if(restock!=null) {
        console.log("Restocking");
        $(foodleft).text(restock);
        window.location.href = "update_stock.php"
        + "?id=" + (i+1) + "&amount=" + restock;
    }
//    console.log(i+" : "+ $(foodleft).text());
}