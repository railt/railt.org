
import ko from "knockout";

export default class Application {
    boot() {
        let nodes = document.querySelectorAll('[data-vm]');

        for (let node of nodes) {
            let vm = require(`../vm/${node.getAttribute('data-vm')}.js`).default;

            ko.applyBindings(new vm(), node);
        }
    }
}
