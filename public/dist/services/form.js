"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
function _form(form) {
    var fd = new FormData(form);
    var data = {};
    for (var _i = 0, _a = fd.entries(); _i < _a.length; _i++) {
        var _b = _a[_i], key = _b[0], value = _b[1];
        data[key] = value !== null ? value : "";
    }
    return data;
}
exports.default = _form;
