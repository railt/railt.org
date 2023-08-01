
import ko from "knockout";

const TITLE = 'Rail';

export default class SplashViewModel {
    firstLayerY: KnockoutObservable<number> = ko.observable(0);

    secondLayerY: KnockoutObservable<number> = ko.observable(0);

    title: KnockoutObservable<string> = ko.observable('&nbsp;');

    ready: KnockoutObservable<boolean> = ko.observable(false);

    constructor() {
        window.addEventListener('scroll', (e) =>
            requestAnimationFrame((): void => this.#onScroll(e))
        );

        setTimeout((): void => this.#titleAnimationTick(TITLE), 300);
    }

    #titleAnimationTick(buffer: string): void {
        if (buffer.length === 0) {
            this.ready(true);
            this.title('Rail<span>t</span>');
            return;
        }

        this.title(this.title() + buffer.substring(0, 1));

        this.#letterAnimationTick(buffer.substring(1));
    }

    #letterAnimationTick(buffer: string): void {
        const title: string = this.title();
        const letter: string = Math.random()
            .toString(36)
            .substring(2, 1);

        this.title(`${title}<span>${letter}</span>`);

        setTimeout((): void => {
            this.title(title);

            if (Math.random() >= 0.2) {
                this.#letterAnimationTick(buffer);
            } else {
                this.#titleAnimationTick(buffer);
            }
        }, 40);
    }

    #onScroll(): void {
        this.firstLayerY(window.scrollY / 1.5);
        this.secondLayerY(window.scrollY / 2);
    }
}
