import { API, _get, _post } from "./services/ajax.js";

$(function () {
  const loadMore = $("#loadMore");
  const loader = $("#loader");
  const loadMoreBtn = $("#loadMore>.btn");
  $(`#menuNav .nav-link[href="${location.pathname}"]`)
    .addClass("active")
    .attr("aria-current", "page");

  interface Drink {
    id: number;
    name: string;
    description: string;
    price: number;
    category: string;
    is_alcoholic: boolean;
    image: string;
    quantity_in_store: number;
    quantity_in_cart?: number;
  }

  const menuitem = (drink: Drink): string => {
    let inCart = Object.hasOwn(drink, "quantity_in_cart");

    return `<article class="menuitem bg-body-tertiary h-100 rounded-xl p-5 bg-opacity-25 d-flex flex-column justify-content-between" aria-labelledby="menuItem_${
      drink.id
    }_Label">
		<div>
      <div class="menuitem-header text-center mb-3 pt-5">
      <div class="position-relative pt-5">
        <img src="${
          drink.image
        }" alt="" class="bottom-0 mx-auto position-absolute translate-middle-x">
      </div>
      <h1 class="h4 text-white mt-3 font-script" id="menuItem_1_Label">${
        drink.name
      }</h1>
    </div>
    <p class="menuitem-body fw-lighter mb-4 lead">${drink.description}</p>
    </div>
		<div class="menuitem-footer d-flex align-items-center justify-content-between flex-wrap">
			<div class="h2 mb-0">N${drink.price.toLocaleString()}</div>
			<div class="ms-3 div flex-nowrap">
				<div class="nav d-flex nav-justified align-items-center">
					<div class="nav-item"><button class="nav-item btn btn-danger menuitem-btn rounded-circle" data-menu-quantity="subtract" aria-label="Reduce quantity" ${
            inCart ? "disabled" : ""
          }><i class="fa-regular fa-minus"></i></button></div>
					<div class="nav-item">
						<div class="mb-0 h4 fw-lighter px-3">${drink.quantity_in_cart || 0}</div>
					</div>
					<div class="nav-item">
						<button class="btn btn-danger menuitem-btn rounded-circle" ${
              drink.quantity_in_store === 0 ? "disabled" : ""
            } aria-label="Increase quantity"><i class="fa-regular fa-plus"></i></button>
					</div>
				</div>
			</div>
		</div>
	</article>
	`;
  };

  function hide(e: JQuery<HTMLElement>) {
    e.fadeOut(50);
  }

  function show(e: JQuery<HTMLElement>) {
    e.fadeIn(50);
  }

  /**
   * Get menu items
   */
  async function getMenuItems() {
    const menulist = $("#menulist");
    hide(loadMore);
    show(loader);

    try {
      const res = await _get("menu");
      // @ts-ignore
      const drinks: Drink[] = res.drinks;

      drinks.forEach((drink) => {
        let item = '<div class="col-lg-4 mb-5">';
        item += menuitem(drink);
        item += "</div>";

        menulist.append(item);
      });

      // @ts-ignore
      loadMoreBtn.attr("href", `${API}menu?page=${res.nextPage}`);
      show(loadMore);
    } catch (error) {
      console.error(error);
    } finally {
      hide(loader);
    }
  }

  getMenuItems();
});
