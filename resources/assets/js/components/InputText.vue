<template>
    <div class="input" :class="{'input-focus': focus}">
        <input type="text" :name="name" v-model="innerValue"
               @focus="focus = true"
               @blur="focus = false"
               @input="onInput"
        />
        <span class="input-placeholder"
              :class="{'input-placeholder-hidden': hasValue}">{{ placeholder }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            name: String,
            value: String,
            placeholder: String,
        },
        data() {
            return {
                focus: false,
                innerValue: '',
                hasValue: false,
            }
        },
        created() {
            this.innerValue = this.value;
        },
        methods: {
            onInput(event) {
                this.$emit('input', this.innerValue);
                this.hasValue = this.innerValue.trim().length !== 0;
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/kernel";

    .input {
        display: block;
        height: $ui-height;
        position: relative;
        box-shadow: 0 0 0 2px $color-border;
        background: #fff;
        border-radius: 2px;
        transition: box-shadow .2s $ui-animation-swift;

        &-placeholder,
        input {
            line-height: $ui-height;
            color: $color-text;
            font-size: $font-size;
            font-family: $font-family;
            position: absolute;
            outline: none;
            border: none;
            width: 100%;
            height: 100%;
            display: block;
            box-sizing: border-box;
            padding: 0 $ui-padding;
            background: none;
            z-index: 2;
        }

        &-placeholder {
            z-index: 1;
            user-select: none;
            color: $color-text-secondary;
            opacity: 1;
            transform: translateX(0);
            transition:
                color .2s $ui-animation-swift,
                opacity .2s $ui-animation-swift,
                transform .2s $ui-animation-swift;

            &.input-placeholder-hidden {
                opacity: 0;
                transform: translateX(10px);
            }
        }

        &-focus {
            box-shadow: 0 0 0 2px $color-main;
            transition: box-shadow 0 $ui-animation-swift;

            .input-placeholder {
                color: $color-text-placeholder;
                transition: color 0 $ui-animation-swift;
            }
        }
    }
</style>
