"use strict";
$(function () {
    $(".password-switch").on("click", function () {
        const btn = this;
        const $btn = $(btn);
        const input = $btn.siblings(".form-control");
        $btn.toggleClass("active");
        input.attr("type", $btn.hasClass("active") ? "text" : "password");
    });
    $(`#navbarNav .nav-link[href="${location.pathname}"]`)
        .addClass("active")
        .attr("aria-current", "page");
});
