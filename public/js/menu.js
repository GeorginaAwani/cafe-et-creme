import { _get } from "./services/ajax.js";
$(function () {
    async function getCategories() {
        const categories = await _get("categories");
        console.log(categories);
    }
    getCategories();
});
