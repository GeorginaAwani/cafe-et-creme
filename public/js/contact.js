// import $ from "jquery";
import { _post } from "./services/ajax.js";
import { _form, clearErrors, displayError, } from "./services/form.js";
$(function () {
    $("#contact").on("submit", function (e) {
        const form = this;
        e.preventDefault();
        clearErrors(form);
        handleContactSubmit(form);
    });
    async function handleContactSubmit(form) {
        // const $this = $(form);
        const data = _form(form);
        try {
            const res = (await _post("contact", data));
            alert(res);
            form.reset();
        }
        catch (error) {
            let e = error;
            displayError(form, e);
        }
    }
});
