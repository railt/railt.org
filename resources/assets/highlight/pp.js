Prism.languages.pp = {
    'comment':   /\/\/.*/,
    'keyword':   /(<|::).*?(::|>)/,
    'variable':  /\w+\(\)\*?/,
    'important': /%token|%skip|#?\w+:/i,
    'attr-name': /#?\w+:|T_.+?\s/,
    'string':    /#\w+/,
};
