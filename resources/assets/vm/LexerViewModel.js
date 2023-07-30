
import ko from "knockout";

export default class LexerViewModel {
    #currentToken = 0;

    tokens = [
        ko.observable(false),
        ko.observable(false),
        ko.observable(false),
    ];

    constructor() {
        setInterval(() => this.#next(), 1000);
    }

    #next() {
        for (let token of this.tokens) {
            token(false);
        }

        if (this.#currentToken >= 3) {
            this.#currentToken = 0;
            return;
        }

        this.tokens[this.#currentToken++](true);
    }
}
