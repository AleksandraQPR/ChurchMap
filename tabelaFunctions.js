function removeFromDatabaseTable(id) {
    var xhr = new XMLHttpRequest();
    var wartosci = "id=" + id;
    xhr.open("GET", 'usun.php?'+wartosci, true);
    xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                console.log(xhr.responseText);
            }
        };
    xhr.send();
}

function removeFromDBAndClear(id) {
    removeFromDatabaseTable(id);
    var row = document.getElementById(id)
    row.remove();
}