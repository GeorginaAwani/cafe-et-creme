import { _get } from "./services/ajax.js";
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

interface Category {
  name: string;
  description: string;
  image: string;
}

interface DrinkFilters {
  search?: string;
  category?: string;
  page: number;
}

interface DrinkAddon {
  name: string;
  description: string;
  price: number;
}

/**
 * Get a drink
 * @param id Drink id
 * @returns
 */
export async function getDrink(id: number): Promise<Drink | [boolean, any]> {
  try {
    const res = _get(`drinks/${id}`);

    // @ts-ignore
    const drink: Drink = res.drink;
    return drink;
  } catch (error) {
    return [false, error];
  }
}

/**
 * Get drinks
 * @returns
 */
export async function getDrinks(
  filters: DrinkFilters
): Promise<Drink[] | [boolean, any]> {
  try {
    let url = "drinks";
    let urlFilters: string[] = [];

    for (let filter in filters) {
      let value = filters[filter as keyof DrinkFilters];
      urlFilters.push(`${filter}=${value}`);
    }

    if (urlFilters) {
      url += "?" + urlFilters.join("&");
    }

    const res = _get(url);

    // @ts-ignore
    const drinks: Drink[] = res.drinks;
    return drinks;
  } catch (error) {
    return [false, error];
  }
}

/**
 * Get categories
 * @returns
 */
export async function getCategories(): Promise<Category[] | [boolean, any]> {
  try {
    const res = _get("categories");

    // @ts-ignore
    const categories: Category[] = res.categories;
    return categories;
  } catch (error) {
    return [false, error];
  }
}

/**
 * Get toppings
 */
export async function getToppings(): Promise<DrinkAddon[] | [boolean, any]> {
  try {
    const res = _get("toppings");

    // @ts-ignore
    const toppings: DrinkAddon[] = res.toppings;
    return toppings;
  } catch (error) {
    return [false, error];
  }
}

/**
 * Get containers
 */
export async function getContainers(): Promise<DrinkAddon[] | [boolean, any]> {
  try {
    const res = _get("containers");

    // @ts-ignore
    const containers: DrinkAddon[] = res.containers;
    return containers;
  } catch (error) {
    return [false, error];
  }
}
