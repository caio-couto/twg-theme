const shareAchors: NodeListOf<HTMLAnchorElement> = document.querySelectorAll(".share-anchor");

const postSlug: string = window.location.pathname;

shareAchors.forEach((anchor) =>
{
	const currentPath: string = anchor.href;
	anchor.href = currentPath + postSlug;
});