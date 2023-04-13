function toggle() {
    let x = document.getElementById("sales");
    let y = document.getElementById("purchases");
    if (x.style.display === "none" && y.style.display === "flex") {
      x.style.display = "flex";
      y.style.display = 'none'
    } else {
      x.style.display = "none";
      y.style.display = 'flex'
    }
  }