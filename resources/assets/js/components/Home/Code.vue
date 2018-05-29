<template>
    <div class="code" @click="run">
        <template v-for="(line, key) in lines">
            <span class="code-line" v-html="line" :data-order="key || ''"></span>
        </template>
        <div class="code-play" v-if="lines.length === 1"></div>

        <app-button v-if="completed" @click="$emit('next')">Next</app-button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lineId: 1,
                lines: [],
                code: [],
                completed: false
            };
        },
        mounted() {
            this.$nextTick(() => {
                this.code = this.$slots.default[0].text.trim().split("\n");
                this.lines.push(this.format(this.code.shift()));
            });
        },
        methods: {
            format(line) {
                line = line.replace(/{color:(.*?)}(.*?){\/color}/g, (data, color, text) => {
                    return `<span style="color:${color}">${text}</span>`;
                });

                return line;
            },
            run() {
                let interval = setInterval(() => {
                    if (this.code.length === 0) {
                        this.completed = true;
                        return clearInterval(interval);
                    }

                    this.lines.push(this.format(this.code.shift()));
                }, 100);
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    .code {
        margin: 0;
        width: 100%;
        height: 100%;
        display: block;
        padding: 10px 0;
        position: relative;
        box-sizing: border-box;

        .code-line {
            display: block;
            max-width: 100%;
            font-family: $font-mono;
            padding: 0 10px 0 30px;
            position: relative;
            min-height: 24px;
            line-height: 24px;
            margin: 1px 0;

            &:before {
                top: 0;
                left: 0;
                width: 20px;
                content: attr(data-order);
                height: 100%;
                display: block;
                text-align: right;
                font-size: 9px;
                position: absolute;
                color: $color-inv-text-placeholder;
            }
        }

        .code-play {
            top: 0;
            left: 0;
            z-index: 3;
            width: 100%;
            height: 100%;
            position: absolute;
            background: rgba(#fff, .3);
            transition: background .3s ease;
            cursor: pointer;

            &:before {
                pointer-events: none;
                @include fa-icon;
                content: $fa-var-play-circle-o;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 64px;
                color: $color-text-placeholder;
                transition: color .3s ease;
            }

            &:hover {
                background: rgba(#fff, .6);
                &:before {
                    color: $color-main;
                }
            }
        }

        /deep/ {
            .cmd {
                color: $color-text-placeholder;
                font-weight: bold;
                user-select: none;
                width: 10px;
                display: inline-block;
                text-align: center;
                margin: 0 5px 0 -15px;
            }
        }
    }
</style>
