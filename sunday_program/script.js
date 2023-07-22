document.getElementById("toggleFormButton").addEventListener("click", function() {
    var form = document.getElementById("choreForm");
    form.style.display = form.style.display === "none" ? "block" : "none";
});

// Set the form to be hidden initially
document.getElementById("choreForm").style.display = "none";

document.getElementById("generateButton").addEventListener("click", function() {
    generateProgram();
});

function generateProgram() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var choreList = document.getElementById("programList");
            choreList.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "generate.php", true);
    xhttp.send();
}

