import { _get } from "./services/ajax.js";
/**
 * Get a drink
 * @param id Drink id
 * @returns
 */
export async function getDrink(id) {
    try {
        const res = _get(`drinks/${id}`);
        // @ts-ignore
        const drink = res.drink;
        return drink;
    }
    catch (error) {
        return [false, error];
    }
}
/**
 * Get drinks
 * @returns
 */
export async function getDrinks(filters) {
    try {
        let url = "drinks";
        let urlFilters = [];
        for (let filter in filters) {
            let value = filters[filter];
            urlFilters.push(`${filter}=${value}`);
        }
        if (urlFilters) {
            url += "?" + urlFilters.join("&");
        }
        const res = _get(url);
        // @ts-ignore
        const drinks = res.drinks;
        return drinks;
    }
    catch (error) {
        return [false, error];
    }
}
/**
 * Get categories
 * @returns
 */
export async function getCategories() {
    try {
        const res = _get("categories");
        // @ts-ignore
        const categories = res.categories;
        return categories;
    }
    catch (error) {
        return [false, error];
    }
}
/**
 * Get toppings
 */
export async function getToppings() {
    try {
        const res = _get("toppings");
        // @ts-ignore
        const toppings = res.toppings;
        return toppings;
    }
    catch (error) {
        return [false, error];
    }
}
/**
 * Get containers
 */
export async function getContainers() {
    try {
        const res = _get("containers");
        // @ts-ignore
        const containers = res.containers;
        return containers;
    }
    catch (error) {
        return [false, error];
    }
}
