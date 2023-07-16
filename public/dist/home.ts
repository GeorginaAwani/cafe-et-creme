// import $ from "jquery";

$(function () {
  interface CarouselItem {
    title: string;
    subTitle: string;
    image: string;
    button: {
      href: string;
      label: string;
    };
  }

  interface Product {
    image: string;
    name: string;
    price: number;
  }

  const carousel: CarouselItem[] = [
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

  const products: Product[] = [
    {
      image: "/images/coffee.png",
      name: "Cappuccino",
      price: 6000,
    },
    {
      image: "/images/orange-juice.png",
      name: "Fresh orange juice",
      price: 3500,
    },
    {
      image: "/images/cocktail.png",
      name: "Mojito Cocktail",
      price: 4500,
    },
  ];

  const heroTitle = $("#heroTitle");
  const heroSubTitle = $("#heroSubTitle");
  const cat = $("#heroCATBtn .btn");
  const productName = $("#productName");
  const productPrice = $("#productPrice");

  const imgWrap = $("#productImage");

  $("#carouselControls .btn").on("click", function () {
    const $this = $(this);
    const index = $this.parent().index();
    const item = carousel[index];

    if (!item) return;

    const product = products[index];

    $("#hero").css({ backgroundImage: `url(${item.image})` });
    $this.attr("aria-current", "true").addClass("active");
    $this
      .parent()
      .siblings()
      .children(".btn")
      .attr("aria-current", "false")
      .removeClass("active");

    // change hero
    changeText(heroTitle, item.title);
    changeText(heroSubTitle, item.subTitle);
    cat.attr({ label: item.button.label, href: item.button.href });

    let image = imgWrap.addClass("opacity-0");

    if (product) {
      // change image
      setTimeout(function () {
        image.children("img").attr("src", product.image);
        image.removeClass("opacity-0");
      }, 250);

      // change products
      changeText(productName, product.name);
      changeText(productPrice, "N" + product.price.toLocaleString());
    }
  });

  function changeText(element: JQuery, text: string) {
    element.addClass("opacity-0");
    setTimeout(function () {
      element.text(text).removeClass("opacity-0");
    }, 250);
  }
});
