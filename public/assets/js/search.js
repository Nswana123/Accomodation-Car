
document.addEventListener("DOMContentLoaded", function () {
    let searchInput = document.getElementById("search-focus");
    let table = document.querySelector("#user-list-table");
    
    searchInput.addEventListener("keyup", function () {
        let filter = searchInput.value.trim().toLowerCase();
        let rows = table.getElementsByTagName("tr");
        
        for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header
            let applicationNoCell = rows[i].getElementsByTagName("td")[2]; // 3rd column (Application No#)
            if (applicationNoCell) {
                let applicationNo = applicationNoCell.textContent.trim().toLowerCase();
                if (applicationNo.includes(filter)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    });
});
       
 