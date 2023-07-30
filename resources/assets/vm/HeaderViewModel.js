
import ko from "knockout";

const STICKY_TOP = 5;

export default class HeaderViewModel {
    /**
     * @type {KnockoutObservable<boolean>}
     */
    sticky = ko.observable(false);

    constructor() {
        window.addEventListener('scroll', (e) => this.#onScroll(e));
    }

    #onScroll() {
        this.sticky(window.scrollY > STICKY_TOP);
    }
}
