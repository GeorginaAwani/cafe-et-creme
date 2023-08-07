import { _get } from "./services/ajax.js";
$(function () {
    async function getCategories() {
        try {
            const res = await _get("categories");
            // @ts-ignore
            const categories = res.categories;
            const categoryList = $("#categories");
            categories.forEach((category) => {
                categoryList.append(`<li class="nav-item">
      <a class="nav-link" href="#">
        <div class="d-flex align-items-center">
          <div class="me-2">${category.name}</div>
          <img src="${category.image}"/>
        </div>
      </a>
      </li>`);
            });
        }
        catch (error) {
            console.error(error);
        }
    }
    getCategories();
});
