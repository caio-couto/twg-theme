const readMoreElement: NodeListOf<HTMLDivElement> = document.querySelectorAll(".read-more");

readMoreElement.forEach((element) =>
{
	if (element.parentElement)
	{
		const description: HTMLDivElement | null = element.parentElement.querySelector(".card-description");

		if (!description)
		{
			return;
		}

		element.addEventListener("click", () =>
		{
			if (element.innerText != "Ler menos")
			{
				element.innerText = "Ler menos";
			}
			else
			{
				element.innerText = "Ler mais";
			}

			description.classList.toggle("line-clamp-3");
		});
	}
});