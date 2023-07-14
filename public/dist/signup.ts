import { ModifiedXHRResponse, _post } from "./services/ajax.js";
import {
  _form,
  clearErrors,
  FormDataObject,
  displayError,
} from "./services/form.js";

$(function () {
  $("#signup").on("submit", function (e) {
    const form = this as HTMLFormElement;
    e.preventDefault();
    clearErrors(form);
    handleLoginSubmit(form);
  });

  async function handleLoginSubmit(form: HTMLFormElement) {
    const data: FormDataObject = _form(form);

    try {
      const res: ModifiedXHRResponse = (await _post(
        "signup",
        data
      )) as ModifiedXHRResponse;

      // show success message
      location.assign(res.redirect);
    } catch (error) {
      let e = error as ModifiedXHRResponse;
      displayError(form, e);
    }
  }
});

// new QUAD([[2,3], [4,4], [3,1]])
