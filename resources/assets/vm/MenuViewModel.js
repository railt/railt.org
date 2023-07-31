
import ko from "knockout";

export default class MenuViewModel {
    /**
     * @type {KnockoutObservable<string>}
     */
    query = ko.observable('')
        .extend({ throttle: 300 });

    /**
     * @type {KnockoutObservable<boolean>}
     */
    shown = ko.observable(false)
        .extend({ throttle: 300 });

    /**
     * @type {KnockoutObservableArray<Object>}
     */
    results = ko.observableArray();

    /**
     * @type {[KnockoutObservable<boolean>]}
     */
    #menu = [];

    constructor() {
        this.query.subscribe(async value => {
            if (value.length < 2) {
                this.results([]);

                return;
            }

            let form = new FormData();
            form.append('query', value);

            try {
                let response = await fetch('/docs/search.json', {
                    method: 'POST',
                    body: form
                });

                let results = await response.json();

                for (let result of results) {
                    for (let query of result.found) {
                        result.title = result.title
                            .replace(query, `<span>${query}</span>`)
                        ;
                    }
                }

                this.results(results);
            } catch (e) {
                this.results([]);
                console.error(e);
            }
        });
    }

    focus() {
        this.shown(true);
    }

    blur() {
        this.shown(false);
    }

    /**
     * @param {number} id
     * @returns {KnockoutObservable<boolean>}
     */
    menu(id) {
        if (! this.#menu[id]) {
            let status = localStorage.getItem(`menu-shown-${id}`);

            this.#menu[id] = ko.observable(status === '1');
        }

        return this.#menu[id];
    }

    /**
     * @param {number} id
     * @returns {boolean}
     */
    toggle(id) {
        let status = this.menu(id);

        localStorage.setItem(`menu-shown-${id}`, status() ? '0' : '1');

        status(! status());

        return false;
    }
}
