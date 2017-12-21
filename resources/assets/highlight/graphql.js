Prism.languages.graphql = {
    comment:     {
        pattern: /(^|[^\\])#.*/,
        lookbehind: !0
    },
    docblock:     {
        pattern: /"""(?:\\"""|(?!""").|\s)+"""/g,
        alias: "comment"
    },
    string:      /"(?!:)(?:\\.|[^\\"])*"(?!:)/g,
    whitespace:  /·/,
    number:      /(?:\B-|\b)\d+(?:\.\d+)?(?:[eE][+-]?\d+)?\b/,
    variable:    /:\s*(?:[\w\d]+)\b/i,
    directive:   {
        pattern: /@[a-z_]\w*/i,
        alias:   "function"
    },
    keyword:     /\b(directive|enum|extend|extends|implements|input|interface|mutation|on|query|scalar|schema|fragment|subscription|type|union)\b/,
    "attr-name": /[a-z_]\w*/i,
    operator:    /[=!\[\]\.:\(\)]/,
    "boolean":   /\b(true|false)\b/gi,
    "null":      /\bnull\b/gi
};

Prism.languages.graphqls = Prism.languages.graphql;
Prism.languages.gql      = Prism.languages.graphql;
