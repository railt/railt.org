import ko from 'knockout';

export default class Application {
    static boot(): void {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', (): void => this.#init());
        } else {
            this.#init();
        }
    }

    static #init(): void {
        window.ko || (window.ko = Application.#bootKnockout());
    }

    static #bootKnockout(): KnockoutStatic {
        const nodes: NodeListOf<Element> = document.querySelectorAll('[data-vm]');

        for (let node: Element of nodes) {
            let vm = require(`../vm/${node.getAttribute('data-vm')}.js`).default;

            ko.applyBindings(new vm(node), node);
        }

        return ko;
    }
}
