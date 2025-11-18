// TERMINAL offline mode + success sound popup

function showSuccess() {
    const box = document.getElementById("successPopup");
    box.style.display = "block";

    const audio = new Audio("../assets/sounds/success.mp3");
    audio.play();

    setTimeout(() => {
        box.style.display = "none";
    }, 1200);
}
