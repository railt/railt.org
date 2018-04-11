export default class Formatter {

    constructor(ctx, content) {
        this._ctx = ctx;
        this._content = content;
    }

    linkToRoute(link) {
        return this._ctx.$router.resolve({
            name: 'docs',
            params: {path: link.split('/')}
        });
    }

    formatExternalLinks(content) {
        return content.replace(/<a\s+href="\/(.*?)"(.*?)>(.*?)<\/a>/g, (fqn, link, attributes, title) => {
            let uri = this.linkToRoute(link);

            return `<a href="${uri}" ${attributes} data-route="inner">${title}</a>`;
        });
    }

    render() {
        let content = this._content;

        content = this.formatExternalLinks(content);

        return content;
    }
}
