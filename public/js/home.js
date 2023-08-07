// import $ from "jquery";
import { _get } from "./services/ajax.js";
import { fade, hide, show } from "./services/display.js";
$(function () {
    const carousel = [
        {
            title: "Taste\nThe Goodness\nOf Our Carefully\nCrafted Drinks",
            subTitle: "Explore our special offers",
            image: "/assets/drinks-background.png",
            button: {
                href: "/menu",
                label: "Our menu",
            },
        },
        {
            title: "Prepare\nYour Own\nDrink With\nOur Ingredients",
            subTitle: "Craft your own drink",
            image: "/assets/kitchen-background.png",
            button: {
                href: "/cart/craft",
                label: "Craft drink",
            },
        },
        {
            title: "Want\nTo Experience\nOur Top Quality\nService?",
            subTitle: "Book A Table Now",
            image: "/assets/cafe-background.png",
            button: {
                href: "/book",
                label: "Book a table",
            },
        },
    ];
    const heroTitle = $("#heroTitle");
    const heroSubTitle = $("#heroSubTitle");
    const cat = $("#heroCATBtn .btn");
    const productName = $("#productName");
    const productPrice = $("#productPrice");
    const imgWrap = $("#productImage");
    async function getHomeProducts() {
        const res = await _get("home");
        hide($("#loader"));
        show($("#product"));
        // @ts-ignore
        const products = res.drinks;
        showProduct(0, products, $("#carouselControls .btn").first());
        $("#carouselControls .btn").on("click", function () {
            const $this = $(this);
            const index = $this.parent().index();
            showProduct(index, products, $this);
        });
    }
    getHomeProducts();
    function showProduct(index, products, btn) {
        const item = carousel[index];
        if (!item)
            return;
        const product = products[index];
        $("#hero").css({ backgroundImage: `url(${item.image})` });
        btn.attr("aria-current", "true").addClass("active");
        btn
            .parent()
            .siblings()
            .children(".btn")
            .attr("aria-current", "false")
            .removeClass("active");
        // change hero
        changeText(heroTitle, item.title);
        changeText(heroSubTitle, item.subTitle);
        cat.attr({ label: item.button.label, href: item.button.href });
        if (product) {
            fade(imgWrap, () => {
                imgWrap.children("img").attr("src", product.image);
            });
            // change products
            changeText(productName, product.name);
            changeText(productPrice, "N" + product.price.toLocaleString());
        }
    }
    function changeText(element, text) {
        fade(element, () => {
            element.text(text);
        });
    }
});
