import { _get } from "./services/ajax.js";
$(function () {
    $(`#menuNav .nav-link[href="${location.pathname}"]`)
        .addClass("active")
        .attr("aria-current", "page");
    function addToCart(drink) {
        // add to cart if quantity in cart
    }
    function removeFromCart(drink) { }
    const menuitem = (drink) => {
        let inCart = Object.hasOwn(drink, "quantity_in_cart");
        return `<article class="menuitem bg-body-tertiary h-100 rounded-xl p-5 bg-opacity-25" aria-labelledby="menuItem_${drink.id}_Label">
		<div class="menuitem-header text-center mb-3 pt-5">
			<div class="position-relative pt-5">
				<img src="${drink.image}" alt="" class="bottom-0 mx-auto position-absolute translate-middle-x">
			</div>
			<h1 class="h4 text-white mt-3 font-script" id="menuItem_1_Label">${drink.name}</h1>
		</div>
		<p class="menuitem-body fw-lighter mb-4 lead">${drink.description}</p>
		<div class="menuitem-footer d-flex align-items-center justify-content-between flex-wrap">
			<div class="h2 mb-0">N${drink.price.toLocaleString()}</div>
			<div class="ms-3 div flex-nowrap">
				<div class="nav d-flex nav-justified align-items-center">
					<div class="nav-item"><button class="nav-item btn btn-danger menuitem-btn rounded-circle" data-menu-quantity="subtract" aria-label="Reduce quantity" ${inCart ? "disabled" : ""} onclick=${removeFromCart(drink)}><i class="fa-regular fa-minus"></i></button></div>
					<div class="nav-item">
						<div class="mb-0 h4 fw-lighter px-3">${drink.quantity_in_cart || 0}</div>
					</div>
					<div class="nav-item">
						<button class="btn btn-danger menuitem-btn rounded-circle" ${drink.quantity_in_store === 0 ? "disabled" : ""} onclick=${addToCart(drink)} aria-label="Increase quantity"><i class="fa-regular fa-plus"></i></button>
					</div>
				</div>
			</div>
		</div>
	</article>
	`;
    };
    async function getMenuItems() {
        const menulist = $("#menulist");
        try {
            const res = await _get("menu/drinks");
            // const drinks : Drink[] = res.drinks;
            const drinks = [
                {
                    id: 1,
                    name: "café noir à la crème",
                    description: "Bold black coffee meets creamy indulgence. Elevate your coffee experience.",
                    price: 6000,
                    category: "coffee",
                    is_alcoholic: false,
                    image: "/images/coffee.png",
                    quantity_in_store: 200,
                },
                {
                    id: 2,
                    name: "Mojito Cocktail",
                    description: "Bold black coffee meets creamy indulgence. Elevate your coffee experience.",
                    price: 8000,
                    category: "cocktail",
                    is_alcoholic: true,
                    image: "/images/cocktail.png",
                    quantity_in_store: 200,
                },
                {
                    id: 3,
                    name: "Jus d'orange pressée",
                    description: "Bold black coffee meets creamy indulgence. Elevate your coffee experience.",
                    price: 1500,
                    category: "juice",
                    is_alcoholic: false,
                    image: "/images/orange-juice.png",
                    quantity_in_store: 200,
                },
            ];
            drinks.forEach((drink) => {
                let item = '<div class="col-lg-4 mb-lg-3 mb-5">';
                item += menuitem(drink);
                item += "</div>";
                menulist.append(item);
            });
        }
        catch (error) { }
    }
    getMenuItems();
});
