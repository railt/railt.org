
import "./styles/app.scss";
import Application from "./core/Application";

if (!String.prototype.replaceAt) {
    String.prototype.replaceAt = function (index, replacement) {
        return this.substr(0, index) + replacement + this.substr(index + replacement.length);
    };
}

const app = new Application();
app.boot();
