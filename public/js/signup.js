import { _post } from "./services/ajax.js";
import { _form, clearErrors, displayError, } from "./services/form.js";
$(function () {
    $("#signup").on("submit", function (e) {
        const form = this;
        e.preventDefault();
        clearErrors(form);
        handleLoginSubmit(form);
    });
    async function handleLoginSubmit(form) {
        const data = _form(form);
        try {
            const res = (await _post("signup", data));
            // show success message
            // @ts-ignore
            location.assign(res.redirect);
        }
        catch (error) {
            let e = error;
            displayError(form, e);
        }
    }
});
// new QUAD([[2,3], [4,4], [3,1]])
