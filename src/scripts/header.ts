
const opneMobileMenu: HTMLButtonElement = document.querySelector(".open-mobile-menu")!;
const closeMobileMenu: HTMLButtonElement = document.querySelector(".close-mobile-menu")!;

const mobileMenu: HTMLDivElement = document.querySelector(".mobile-menu")!;

opneMobileMenu.addEventListener("click", () =>
{
	mobileMenu.style.display = "block";
});

closeMobileMenu.addEventListener("click", () =>
{
	mobileMenu.style.display = "none";
});

