document.addEventListener("DOMContentLoaded", () => {
  const habitatCards = document.querySelectorAll(".habitat-card");

  habitatCards.forEach((card) => {
    card.addEventListener("click", () => {
      const habitatId = card.getAttribute("data-habitat-id");
      window.location.href = `pageDetailHabitats.php?id=${habitatId}`;
    });
  });
});
