// import $ from "jquery";
var Methods;
(function (Methods) {
    Methods["POST"] = "post";
    Methods["GET"] = "get";
    Methods["DELETE"] = "delete";
    Methods["PUT"] = "put";
})(Methods || (Methods = {}));
class Ajax {
    api = "http://localhost:8080/api/";
    async call(url, method, data) {
        const setup = {
            url: `${this.api}${url}`,
            type: method,
            dataType: "json",
            data: data,
        };
        const xhr = $.ajax(setup);
        try {
            await xhr;
            return xhr;
        }
        catch (error) {
            xhr.error = true;
            return xhr;
        }
    }
}
/**
 * Make a HTTP post request
 * @param url
 * @param data
 * @returns
 */
export async function _post(url, data) {
    return new Ajax().call(url, Methods.POST, data);
}
/**
 * Make a HTTP get request
 * @param url
 * @returns
 */
export async function _get(url) {
    return new Ajax().call(url, Methods.GET);
}
/**
 * Make a HTTP put request
 * @param url
 * @param data
 * @returns
 */
export async function _put(url, data) {
    return new Ajax().call(url, Methods.PUT, data);
}
/**
 * Make a HTTP delete request
 * @param url
 * @param data
 * @returns
 */
export async function _delete(url, data) {
    return new Ajax().call(url, Methods.DELETE, data);
}
