function handleMouseMove(e) {
    const body = document.querySelector("body");
    const { offsetX, offsetY } = e;
    const xPos = Math.round((offsetX / window.innerWidth) * 100);
    const yPos = Math.round((offsetY / window.innerHeight) * 100);
    const xOffset = (window.innerWidth / 2 - e.pageX) / 25;
    const yOffset = (window.innerHeight / 2 - e.pageY) / 25;

    body.style.background = `radial-gradient(circle at ${xPos}% ${yPos}%, #ff5252, #b33939)`;
    body.style.backgroundPosition = `${xOffset}px ${yOffset}px`;
    body.style.transition = "background 0.3s ease-out";
}

function handleMouseOut() {
    const body = document.querySelector("body");
    body.style.transition = "background 0.5s ease-in-out";
    body.style.background = "linear-gradient(45deg, #ff5252, #b33939)";
}

document.addEventListener("mousemove", handleMouseMove);
document.addEventListener("mouseout", handleMouseOut);
