export function _form(form) {
    const fd = new FormData(form);
    const data = {};
    for (const [key, value] of fd.entries()) {
        data[key] = value !== null ? value : "";
    }
    return data;
}
export function displayError(form, xhr) {
    let _error;
    try {
        const $form = $(form);
        const error = xhr.responseJSON?.error ?? xhr.responseText;
        _error = error;
        // name : value
        if (_error.indexOf(":") !== -1) {
            let errorArray = _error.split(":");
            let [name, value] = errorArray;
            _error = value.trim();
            const field = $form
                .find(`[name="${name.trim()}"]`)
                .addClass("is-invalid");
            const errField = field.siblings(".invalid-feedback");
            if (errField.length) {
                errField.text(_error);
                return;
            }
        }
        $form.find(".form-error").text(_error ?? "Something went wrong");
    }
    catch (e) {
        console.error(e);
        console.log(_error);
    }
}
export function clearErrors(form) {
    $(form).find(".is-invalid").removeClass("is-invalid");
    $(form).find(".invalid-feedback, .form-error").empty();
}
