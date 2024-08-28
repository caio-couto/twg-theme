// type HedaerState =
// {
// 	totalMenuItemsSize: number;
// 	removedItemsCount: number;
// };

// type RemovedItem =
// {
// 	width: number;
// 	item: HTMLLIElement;
// }

// class HiddenHeaderItems
// {
// 	private menu: HTMLUListElement;
// 	private menuIitems: HTMLLIElement[];
// 	private menuItemRemoved: RemovedItem[];
// 	private state: HedaerState;

// 	constructor(menu: HTMLUListElement)
// 	{
// 		this.menu = menu;
// 		this.menuIitems = Array.from(menu.querySelectorAll<HTMLLIElement>(".menu > .menu-item"));
// 		this.menuItemRemoved = [];
// 		this.state =
// 		{
// 			totalMenuItemsSize: this.resetTotalSize(this.menuIitems),
// 			removedItemsCount: 0
// 		}
// 	}

// 	public init(): void
// 	{
// 		const paragraphElement: HTMLAnchorElement = document.createElement("a");
// 		paragraphElement.innerText = "Mais";
// 		const subMenuElement: HTMLUListElement = document.createElement("ul");
// 		subMenuElement.classList.add("sub-menu");
// 		const moreListElement: HTMLLIElement = document.createElement("li");
// 		moreListElement.appendChild(paragraphElement);
// 		moreListElement.appendChild(subMenuElement);
// 		moreListElement.classList.add("menu-item");
// 		moreListElement.classList.add("menu-item--more");
// 		moreListElement.classList.add("menu-item-has-children");
// 		moreListElement.classList.add("menu-item--disabled");

// 		this.menu.appendChild(moreListElement);

// 		const moreList: HTMLLIElement = this.menu.querySelector(".menu-item--more")!;

// 		const headerObserver = new ResizeObserver((entries) =>
// 		{
// 			let menuSize: number = 0;
// 			for (let entry of entries)
// 			{
// 				this.state.totalMenuItemsSize = this.resetTotalSize(this.menuIitems);
// 				menuSize = entry.contentBoxSize[0].inlineSize;

// 				if (this.menuItemRemoved.length != 0)
// 				{
// 					moreList.classList.remove("menu-item--disabled");
// 				}

// 				if (this.state.totalMenuItemsSize + moreList.clientWidth >= menuSize)
// 				{
// 					const w: number = 0 + this.menuIitems[this.menuIitems.length - 1].clientWidth;
// 					this.menu.removeChild(this.menuIitems[this.menuIitems.length - 1]);
// 					moreList.querySelector(".sub-menu")!.appendChild(this.menuIitems[this.menuIitems.length - 1]);
// 					if (this.menuIitems.length > 0)
// 					{
// 						this.menuItemRemoved.push({width: w, item: this.menuIitems.pop()!});
// 					}
// 					this.state.totalMenuItemsSize = this.resetTotalSize(this.menuIitems);
// 				}
// 				else
// 				{
// 					if (this.menuItemRemoved.length > 0 && this.state.totalMenuItemsSize + this.menuItemRemoved[this.menuItemRemoved.length - 1].width + moreList.clientWidth < menuSize)
// 					{
// 						this.menu.insertBefore(this.menuItemRemoved[this.menuItemRemoved.length - 1].item, moreList);

// 						if (this.menuItemRemoved.length > 0)
// 						{
// 							this.menuIitems.push(this.menuItemRemoved.pop()!.item);
// 						}

// 						this.state.totalMenuItemsSize = this.resetTotalSize(this.menuIitems);

// 						if (this.menuItemRemoved.length == 0)
// 						{
// 							moreList.classList.add("menu-item--disabled");
// 						}
// 					}
// 				}
// 			}
// 		});

// 		headerObserver.observe(this.menu);
// 	}

// 	private resetTotalSize(arr: HTMLLIElement[]): number
// 	{
// 		return arr.reduce((acc, item) => acc += item.clientWidth, 0);
// 	}
// }

// const hiddenHeaderItems: HiddenHeaderItems = new HiddenHeaderItems(document.querySelector(".menu")!);
// hiddenHeaderItems.init();

// const searchButton: HTMLButtonElement = document.querySelector(".header-right-content form button")!;
// const searchInput: HTMLInputElement = document.querySelector(".header-right-content form input")!;

// searchButton.addEventListener("click", (e) =>
// {
// 	e.preventDefault();
// 	searchInput.classList.toggle("open");
// });