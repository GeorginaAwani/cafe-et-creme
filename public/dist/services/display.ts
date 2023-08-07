export function fade(
  element: JQuery<HTMLElement> | HTMLElement,
  operation: Function,
  duration: number = 250
) {
  let e = $(element).addClass("opacity-0");
  setTimeout(function () {
    operation();
    e.removeClass("opacity-0");
  }, duration);
}

export function show(element: JQuery<HTMLElement> | HTMLElement) {
  fade(element, function () {
    $(element).removeClass("visually-hidden");
  });
}

export function hide(element: JQuery<HTMLElement> | HTMLElement) {
  fade(element, function () {
    $(element).addClass("visually-hidden");
  });
}
