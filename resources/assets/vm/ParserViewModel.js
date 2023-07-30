
import ko from "knockout";

export default class ParserViewModel {
    expression = ko.observable('(2 + 2) * 2 - 4 - 4')
        .extend({ throttle: 300 })

    output = ko.observable('');

    loading = ko.observable(false);

    constructor() {
        this.expression.subscribe((value) => {
            this.#evaluate(value);
        });

        this.#evaluate(this.expression());
    }

    async #evaluate(expression) {
        this.loading(true);

        try {
            var response = await fetch('/math/parse.json', {
                method: 'POST',
                body: expression
            });
        } finally {
            this.loading(false);
        }

        this.output(await response.text());
    }
}
