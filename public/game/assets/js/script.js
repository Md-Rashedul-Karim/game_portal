/*Loard more game*/
const loadMoreBtn = document.getElementById("loadMoreBtn");
const gameItems = document.querySelectorAll(".game-card-item.d-none");

let visible = 0;
const step = 3; // প্রতি ক্লিকে কতগুলো শো হবে

if (gameItems.length > 0) {
  loadMoreBtn.addEventListener("click", () => {
    for (let i = visible; i < visible + step; i++) {
      if (gameItems[i]) {
        gameItems[i].classList.remove("d-none");
      }
    }
    visible += step;
    if (visible >= gameItems.length) {
      loadMoreBtn.style.display = "none"; // সব দেখানোর পর বাটন লুকিয়ে যাবে
    }
  });
} else {
  document.querySelectorAll(".loadMoreBtn").forEach((button) => {
    const target = button.getAttribute("data-target");
    const items = document.querySelectorAll(`.game-card-item-${target}.d-none`);

    button.addEventListener("click", () => {
      for (let i = visible; i < visible + step; i++) {
        if (items[i]) {
          items[i].classList.remove("d-none");
        }
      }
      visible += step;

      if (visible >= items.length) {
        button.style.display = "none";
      }
    });
  });
}
/*theme Light/Dark Mode */
const toggleBtn = document.getElementById("modeToggle");
const body = document.body;

// Check saved theme from localStorage
if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark-mode");
  toggleBtn.textContent = "☀️ ";
  toggleBtn.classList.remove("btn-outline-light");
  toggleBtn.classList.add("btn-outline-warning");
}

toggleBtn.addEventListener("click", () => {
  body.classList.toggle("dark-mode");

  if (body.classList.contains("dark-mode")) {
    toggleBtn.textContent = "☀️ ";
    toggleBtn.classList.remove("btn-outline-light");
    toggleBtn.classList.add("btn-outline-warning");
    localStorage.setItem("theme", "dark");
  } else {
    toggleBtn.textContent = "🌙 ";
    toggleBtn.classList.remove("btn-outline-warning");
    toggleBtn.classList.add("btn-outline-light");
    localStorage.setItem("theme", "light");
  }
});
