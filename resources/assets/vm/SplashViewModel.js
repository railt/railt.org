
import ko from "knockout";

const TITLE = 'Railt GraphQL Framework';

export default class SplashViewModel {
    /**
     * @type {KnockoutObservable<number>}
     */
    firstLayerY = ko.observable(0);

    /**
     * @type {KnockoutObservable<number>}
     */
    secondLayerY = ko.observable(0);

    /**
     * @type {KnockoutObservable<string>}
     */
    title = ko.observable('&nbsp;');

    /**
     * @type {KnockoutObservable<boolean>}
     */
    ready = ko.observable(false);

    constructor() {
        window.addEventListener('scroll', (e) =>
            requestAnimationFrame(() => this.#onScroll(e))
        );

        setTimeout(() => this.#titleAnimationTick(TITLE), 300);
    }

    #titleAnimationTick(buffer) {
        if (buffer.length === 0) {
            this.ready(true);
            this.title('Railt GraphQL Framewor<span>k</span>');
            return;
        }

        this.title(this.title() + buffer.substr(0, 1));

        this.#letterAnimationTick(buffer.substr(1));
    }

    #letterAnimationTick(buffer) {
        const title = this.title();
        const letter = Math.random()
            .toString(36)
            .substr(2, 1);

        this.title(`${title}<span>${letter}</span>`);

        setTimeout(() => {
            this.title(title);

            if (Math.random() >= 0.5) {
                this.#letterAnimationTick(buffer);
            } else {
                this.#titleAnimationTick(buffer);
            }
        }, 40);
    }

    #onScroll() {
        this.firstLayerY(window.scrollY / 1.5);
        this.secondLayerY(window.scrollY / 2);
    }
}
