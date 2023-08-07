export function fade(element, operation, duration = 250) {
    let e = $(element).addClass("opacity-0");
    setTimeout(function () {
        operation();
        e.removeClass("opacity-0");
    }, duration);
}
export function show(element) {
    fade(element, function () {
        $(element).removeClass("visually-hidden");
    });
}
export function hide(element) {
    fade(element, function () {
        $(element).addClass("visually-hidden");
    });
}
