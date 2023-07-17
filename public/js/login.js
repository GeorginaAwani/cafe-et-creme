import { _post } from "./services/ajax.js";
import { _form, clearErrors, displayError, } from "./services/form.js";
$(function () {
    $("#login").on("submit", function (e) {
        const form = this;
        e.preventDefault();
        clearErrors(form);
        handleLoginSubmit(form);
    });
    async function handleLoginSubmit(form) {
        const data = _form(form);
        try {
            const res = (await _post("login", data));
            // @ts-ignore
            location.assign(res.redirect);
        }
        catch (error) {
            let e = error;
            displayError(form, e);
        }
    }
});
