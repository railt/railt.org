/**
 * Default component props
 */
export default {
    /**
     * Is the component disabled?
     */
    disabled: {
        type: Boolean,
        default: false
    },

    /**
     * Is the component in loading state?
     */
    loading: {
        type: Boolean,
        default: false
    },

    /**
     * Component description
     */
    title: {
        type: String,
        default: null
    },

    /**
     * Component name
     */
    name: {
        type: String,
        default: ''
    },
}
