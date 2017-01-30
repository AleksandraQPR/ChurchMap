function removeFromDAtabase(id) {
    var xhr = new XMLHttpRequest();
    var wartosci = "id=" + id;
    xhr.open("GET", 'usun.php?'+wartosci, true);
    xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                console.log(xhr.responseText);
                if(xhr.responseText == 'Usunieto') {
                    retrieve();
                }
            }
        };
    xhr.send();
}

function removeFromDBAndClear(id) {
    removeFromDAtabase(id);
    var row = document.getElementById(id)
    row.remove();
}