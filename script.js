let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}


function openModal() {
    document.getElementById('loginModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('loginModal').style.display = 'none';
}

// Evento para abrir el modal cuando se hace clic en el botón de inicio de sesión
document.getElementById('login-btn').addEventListener('click', openModal);

// Evento para cerrar el modal cuando se hace clic fuera de él
window.onclick = function (event) {
    if (event.target == document.getElementById('loginModal')) {
        closeModal();
    }
};

function openModal() {
    document.getElementById("loginModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("loginModal").style.display = "none";
}

function login(event) {
    event.preventDefault();
    // Aquí verificarías el usuario y la contraseña, por ejemplo:
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;


    // Verificación simple (cámbialo según tus necesidades)
    if (username === "Emily" && password === "emily123") {
        alert("Inicio de sesión exitoso");
        // Redirige a otro HTML después de iniciar sesión
        window.location.href = "http://127.0.0.1:5500/TodosFor.html";
    } else {
        alert("Nombre de usuario o contraseña incorrectos");
    }

    function showWelcomeArea() {
        document.getElementById("welcomeMessage").style.display = "block";
    }

  
}