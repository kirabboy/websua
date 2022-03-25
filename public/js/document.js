function TimKiem() {
    var input, filter, boxdoc,docItems, title,i, txtValue;
    input = document.getElementById("search-key");
    filter = input.value.trim().toUpperCase();
    docItems = document.getElementById("document-items");
    boxdoc = docItems.getElementsByClassName("document_box");
    for (i = 0; i < boxdoc.length; i++) {
        title = boxdoc[i].getElementsByTagName("a")[1];
        if (title) {
            txtValue = title.textContent || title.innerText;
            if (txtValue.trim().toUpperCase().indexOf(filter) > -1) {
                boxdoc[i].style.display = "";
            } else {
                boxdoc[i].style.display = "none";
            }
        }
    }
}