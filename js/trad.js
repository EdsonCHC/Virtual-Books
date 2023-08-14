const flagsElements = document.getElementById("flags");
let textsChange = document.querySelectorAll("[data-section]");

flagsElements.addEventListener("click", (e) => {
  changeLanguage(e.target.parentElement.dataset.language);
});

const changeLanguage = async (language) => {
  localStorage.setItem("language", language);
  const loadJson = await fetch(`../language/${language}.json`);

  const texts = await loadJson.json();

  for (const textChange of textsChange) {
    const section = textChange.dataset.section;
    const value = textChange.dataset.value;
    textChange.innerHTML = texts[section][value];
  }
};

if ((language = localStorage.getItem("language"))) {
  changeLanguage(language);
}
