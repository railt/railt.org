export default function Enum(values, _default) {
    let result = {
        type: String,
        validator: type => values.indexOf(type) >= 0
    };

    if (typeof _default !== 'undefined') {
        result['default'] = _default;
    }

    return result;
}
