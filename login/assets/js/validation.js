document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".login__form").addEventListener("submit", function (e) {
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();

        if (email === "" || password === "") {
            alert("Tous les champs sont requis.");
            e.preventDefault();
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            alert("Veuillez entrer un email valide.");
            e.preventDefault();
        } else if (password.length < 6) {
            alert("Le mot de passe doit contenir au moins 6 caractères.");
            e.preventDefault();
        }
    });

    document.querySelector(".register__form").addEventListener("submit", function (e) {
        let name = document.getElementById("names").value.trim();
        let surname = document.getElementById("surnames").value.trim();
        let email = document.getElementById("emailCreate").value.trim();
        let password = document.getElementById("passwordCreate").value.trim();

        if (name === "" || surname === "" || email === "" || password === "") {
            alert("Tous les champs sont requis.");
            e.preventDefault();
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            alert("Veuillez entrer un email valide.");
            e.preventDefault();
        } else if (password.length < 6) {
            alert("Le mot de passe doit contenir au moins 6 caractères.");
            e.preventDefault();
        }
    });
});
