
import ko from "knockout";

interface SearchResultItem {
    page: string;
    title: string;
    url: string;
    menu: ?string;
    found: string[];
}

export default class MenuViewModel {
    query: KnockoutObservable<string> = ko.observable('')
        .extend({
            throttle: 300,
        });

    shown: KnockoutObservable<boolean> = ko.observable(false)
        .extend({
            throttle: 300,
        });

    request: KnockoutObservable<boolean> = ko.observable(false);

    results: KnockoutObservableArray<Object> = ko.observableArray();

    #menu: (KnockoutObservable<boolean>)[] = [];

    constructor() {
        this.query.subscribe(async (value: string): Promise<void> => {
            this.request(true);

            if (value.length < 2) {
                this.results([]);

                return;
            }

            try {
                let results: Object[] = await this.#query(value);

                this.results(results);
            } catch (e) {
                this.results([]);

                console.error(e);
            } finally {
                this.request(false);
            }
        });
    }

    async #query(value: string): Promise<Object[]> {
        let form: FormData = new FormData();
        form.append('query', value);

        let response: Response = await fetch('/docs/search.json', {
            method: 'POST',
            body: form,
        });

        let results = await response.json();

        for (let result: SearchResultItem of results) {
            for (let query: string of result.found) {
                result.title = result.title
                    .replace(query, `<span>${query}</span>`)
                ;
            }
        }

        return results;
    }

    focus(): void {
        this.shown(true);
    }

    blur(): void {
        this.shown(false);
    }

    menu(id: number): KnockoutObservable<boolean> {
        if (! this.#menu[id]) {
            let status: ?string = localStorage.getItem(`menu-shown-${id}`);

            this.#menu[id] = ko.observable(status === '1');
        }

        return this.#menu[id];
    }

    toggle(id: number): boolean {
        let status: KnockoutObservable<boolean> = this.menu(id);

        localStorage.setItem(`menu-shown-${id}`, status() ? '0' : '1');

        status(!status());

        return false;
    }
}
