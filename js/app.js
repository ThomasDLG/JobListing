let tags = document.querySelectorAll(".tags");
let offers = document.querySelectorAll(".jobList .jobItem");
let clear = document.querySelector(".searchZone a");
let searchZone = document.querySelector(".searchZone");
let searchZoneUL = document.querySelector(".searchZone ul");
let tagsOffer = [];

function tagsUpdate() {
  if (tagsOffer.length == 0) {
    searchZone.classList.add("hide");
  } else {
    searchZone.classList.remove("hide");

    let showTags = tagsOffer.map((item) => {
      return (
        '<li><span  class="tags">' +
        item +
        '</span><span data-tags="' +
        item +
        '" class="delete"><i class="fa-solid fa-xmark"></i></span></li>'
      );
    });
    let render = showTags.join("");
    searchZoneUL.innerHTML = render;
    searchingTags = document.querySelectorAll(".searchZone ul li .delete");
    searchingTags.forEach((tag) => {
      console.log(tag);
      tag.addEventListener("click", () => {
        console.log("click");
        let posTag = tagsOffer.indexOf(tag.dataset.tags);
        if (posTag != -1) {
          tagsOffer.splice(posTag, 1);
          tagsUpdate();
        }
      });
    });
  }
  offers.forEach((offer) => {
    let taggedOffer = offer.dataset.tags.split(",");
    offer.classList.remove("hide");
    tagsOffer.forEach((tag) => {
      if (taggedOffer.indexOf(tag) !== -1) {
      } else {
        offer.classList.add("hide");
      }
    });
  });
}

tags.forEach((tag) => {
  tag.addEventListener("click", function () {
    console.log(tagsOffer, tag, tagsOffer.indexOf(tag.dataset.tags));
    if (tagsOffer.indexOf(tag.dataset.tags) === -1) {
      tagsOffer.push(tag.dataset.tags);

      tagsUpdate();
    }
  });
});

clear.addEventListener("click", function () {
  tagsOffer = [];
  tagsUpdate();
});
