
import ko from "knockout";

const STICKY_TOP = 1;

export default class HeaderViewModel {
    sticky: KnockoutObservable<boolean> = ko.observable(false);

    constructor() {
        window.addEventListener('scroll', (e: Event): void => this.#onScroll(e));
    }

    #onScroll(): void {
        this.sticky(window.scrollY > STICKY_TOP);
    }
}
