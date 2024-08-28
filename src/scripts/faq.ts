const faqs: NodeListOf<HTMLDivElement> = document.querySelectorAll(".faq .faq-button");

faqs.forEach((faq) =>
{
	faq.addEventListener("click", (e) =>
	{
		const parentElement: HTMLElement = faq.parentElement!.parentElement!;
		parentElement.classList.toggle("faq--active");

		const image: HTMLImageElement = faq.querySelector("img")!;

		if (parentElement.classList.contains("faq--active"))
		{
			image.src = image.src.replace("plus", "minus");
		}
		else
		{
			image.src = image.src.replace("minus", "plus");
		}
	});
});
