<script>
    export default {
        props: {
            tag: {
                type: String,
                required: true
            },
            initialValue: {
                type: String
            }
        },
        render: function(createElement) {
            let component = this;
            return createElement('input',
                {
                    domProps: {
                        type: this.tag,
                        value: this.initialValue || component.value
                    },
                    on: {
                        input: function(event) {
                            component.value = event.target.value;
                            component.$emit('input', event.target.value);
                        },
                        focus: function(event) {
                            component.$emit('focus', event);
                        },
                        blur: function(event) {
                            component.$emit('blur', event);
                        },
                        keyup: function(event) {
                            component.$emit('keyup', event);
                        },
                        keydown: function(event) {
                            component.$emit('keydown', event);
                        },
                        keypress: function(event) {
                            component.$emit('keypress', event);
                        },
                    }
                })
        }
    };
</script>
