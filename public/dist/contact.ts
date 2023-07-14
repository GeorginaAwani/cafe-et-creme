// import $ from "jquery";
import { _post, ModifiedXHRResponse } from "./services/ajax.js";
import {
  FormDataObject,
  _form,
  clearErrors,
  displayError,
} from "./services/form.js";

$(function () {
  $("#contact").on("submit", function (e) {
    const form = this as HTMLFormElement;
    e.preventDefault();
    clearErrors(form);
    handleContactSubmit(form);
  });

  async function handleContactSubmit(form: HTMLFormElement) {
    // const $this = $(form);
    const data: FormDataObject = _form(form);

    try {
      const res: ModifiedXHRResponse = (await _post(
        "contact",
        data
      )) as ModifiedXHRResponse;

      alert(res);
      form.reset();
    } catch (error) {
      let e = error as ModifiedXHRResponse;
      displayError(form, e);
    }
  }
});
