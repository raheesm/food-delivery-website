// const buttons = document.querySelectorAll('.filter-btn');
// const items = document.querySelectorAll('.item');

// for (const button of buttons) {
//   button.addEventListener('click', () => {
//     const filter = button.dataset.filter;

//     for (const item of items) {
//       if (filter === 'all' || item.classList.contains(filter)) {
//         item.classList.remove('hide');
//         setTimeout(() => {
//           item.style.opacity = '1';
//         }, 100);
//       } else {
//         item.style.opacity = '0';
//         setTimeout(() => {
//           item.classList.add('hide');
//         }, 500);
//       }
//         // Set opacity to 1 for items with class 'non-veg'
//         if (filter === 'non-veg' && item.classList.contains('non-veg')) {
//           item.style.opacity = '1';
//         }
//     }
//   });
// }

// filter
const filterIcon = document.querySelector(".filter-icon");
const filterPopup = document.querySelector(".filter-popup");
const filterClose = document.querySelector("#close");
const clearButton = document.getElementById("clear");
const resultBtn = document.getElementById("result");
const checkbx = document.querySelectorAll('input[type="checkbox"]');

clearButton.addEventListener("click", function () {
  checkbx.forEach((checkbox) =>{
    checkbox.checked = false;
  });
});
filterIcon.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  filterPopup.style.display = "block";
});
filterClose.addEventListener("click", () => {
  filterPopup.style.display = "none";
});
resultBtn.addEventListener("click", () => {
  filterPopup.style.display = "none";
  window.scrollTo({
    top: 200,
    behavior: "smooth",
  });
});

const checkboxes = document.querySelectorAll("input[name='category']");
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", updateFilters);
});

function updateFilters() {
  const filters = {};
  let allUnchecked = true;
  checkboxes.forEach((checkbox) => {
    filters[checkbox.value] = checkbox.checked;
    if (checkbox.checked) {
      allUnchecked = false;
    }
  });

  const elements = document.querySelectorAll(".item");
  elements.forEach((element) => {
    const category = element.dataset.category;

    if (filters[category] || (allUnchecked && category === "non-veg")) {
      element.style.display = "flex";
    } else {
      element.style.display = "none";
    }
  });
}

// product modal

const proModal = document.querySelector(".pro-modal");
const addToCart = document.querySelector("#addtocart");
const cancelCart = document.querySelector("#cancel");
const cartBtn = document.querySelectorAll(".cart-btn");

cartBtn.forEach((item) => {
  item.addEventListener("click", () => {
    document.body.style.height = "100vh";
    document.body.style.overflow = "hidden";
    proModal.style.display = "flex";
    // window.scrollTo({
    //   top: 500,
    //   behavior: "smooth",
    // });
  });
});
cancelCart.addEventListener("click", () => {
  document.body.style.height = "auto";
  document.body.style.overflow = "visible";
  proModal.style.display = "none";
  window.scrollTo({
    top: 500,
    behavior: "smooth",
  });
});
addToCart.addEventListener("click", () => {
  document.body.style.height = "auto";
  document.body.style.overflow = "visible";
  proModal.style.display = "none";
  window.scrollTo({
    top:500,
    behavior: 'smooth'
  });
});
