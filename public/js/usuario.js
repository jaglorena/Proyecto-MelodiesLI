document.addEventListener("DOMContentLoaded", function () {
    const genreButtons = document.querySelectorAll(".genre-button");

    genreButtons.forEach((button) => {
        button.addEventListener("click", function () {
            genreButtons.forEach((btn) => btn.classList.remove("selected"));
            this.classList.add("selected");
        });
    });
});

// Selecciona todos los botones que tienen un atributo data-id
document.querySelectorAll("button[data-id]").forEach((button) => {
    button.addEventListener("click", function () {
        // Obtén el id del elemento
        const id = this.getAttribute("data-id");

        // Datos que quieres enviar
        const data = {
            id: id,
        };

        // Hacer la solicitud POST
        fetch("/cancion/reproducir", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"), // Incluye el token CSRF si estás en Laravel
            },
            body: JSON.stringify(data), // Convertir el objeto a una cadena JSON
        })
            .then((response) => response.json()) // Parsear la respuesta JSON
            .then((data) => {
                console.log("Éxito:", data); // Manejar la respuesta
            })
            .catch((error) => {
                console.error("Error:", error); // Manejar errores
            });
    });
});
