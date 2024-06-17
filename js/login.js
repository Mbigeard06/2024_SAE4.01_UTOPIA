var modal = document.getElementById("myModal");
    var acceptBtn = document.getElementById("acceptBtn");
    var rejectBtn = document.getElementById("rejectBtn");
    var closeBtn = document.querySelector(".close");

    // Fonction pour ouvrir le pop-up
    function openModal() {
        modal.style.display = "block";
    }

    // Lorsque l'utilisateur clique sur un des boutons, fermer le pop-up
    acceptBtn.onclick = function() {
        modal.style.display = "none";
        alert("Vous avez accepté.");
    }

    rejectBtn.onclick = function() {
        modal.style.display = "none";
        alert("Vous avez refusé.");
    }

    // Lorsque l'utilisateur clique sur le bouton de fermeture, fermer le pop-up
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Lorsque l'utilisateur clique en dehors du pop-up, fermer le pop-up
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Ouvrir le pop-up au chargement de la page
    document.addEventListener("DOMContentLoaded", openModal);