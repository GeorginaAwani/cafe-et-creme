// import $ from "jquery";

enum Methods {
  POST = "post",
  GET = "get",
  DELETE = "delete",
  PUT = "put",
}

export interface ModifiedXHRResponse extends JQuery.jqXHR<unknown> {
  error?: boolean;
}

export const API: string = "http://localhost:8080/api/";

class Ajax {
  public async call(
    url: string,
    method: Methods,
    data?: {}
  ): Promise<ModifiedXHRResponse> {
    const setup: JQueryAjaxSettings = {
      url: `${API}${url}`,
      type: method,
      dataType: "json",
      data: data,
    };

    const xhr: ModifiedXHRResponse = $.ajax(setup);

    try {
      await xhr;
      return xhr;
    } catch (error) {
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
export async function _post(
  url: string,
  data: {}
): Promise<ModifiedXHRResponse> {
  return new Ajax().call(url, Methods.POST, data);
}

/**
 * Make a HTTP get request
 * @param url
 * @returns
 */
export async function _get(url: string): Promise<ModifiedXHRResponse> {
  return new Ajax().call(url, Methods.GET);
}
/**
 * Make a HTTP put request
 * @param url
 * @param data
 * @returns
 */
export async function _put(
  url: string,
  data: {}
): Promise<ModifiedXHRResponse> {
  return new Ajax().call(url, Methods.PUT, data);
}

/**
 * Make a HTTP delete request
 * @param url
 * @param data
 * @returns
 */
export async function _delete(
  url: string,
  data: {}
): Promise<ModifiedXHRResponse> {
  return new Ajax().call(url, Methods.DELETE, data);
}
