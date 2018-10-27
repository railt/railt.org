<template>
    <div class="exec">
        <div class="exec-content" v-if="! version">
            <pre v-html="code"></pre>
            <app-loading v-if="loading"></app-loading>
            <button class="button" :disabled="loading" @click="run">RUN</button>
        </div>

        <app-tabs v-else>
            <app-tab title="Code">
                <pre v-html="code"></pre>
            </app-tab>
            <app-tab v-if="result && result.length" :title="`Result (${result.length})`">
                <template v-for="item in result">
                    <div class="exec-result" v-html="item"></div>
                </template>
            </app-tab>
            <app-tab v-if="errors && errors.length" :title="`Errors (${errors.length})`">
                <div class="exec-error" v-for="error in errors">
                    <span class="exec-error-message">{{ error.message }}</span>
                    <span class="exec-error-line">in SDL on line {{ error.line }}</span>
                </div>
            </app-tab>
        </app-tabs>
    </div>
</template>

<script>
    import gql from "graphql-tag";

    export default {
        data() {
            return {
                loading: false,
                result: null,
                errors: null,
                version: null,
            }
        },
        methods: {
            htmlToText(html) {
                let container = document.createElement('div');
                container.innerHTML = html;
                return (container.textContent || container.innerText || '').trim();
            },
            async run() {
                this.loading = true;

                try {
                    let response = await this.execute(this.htmlToText(this.code));
                    let data = response.data.exec || null;

                    this.result = data.result;
                    this.errors = data.errors;
                    this.version = data.version;
                } finally {
                    this.loading = false;
                }
            },
            execute(code) {
                return this.$apollo.query({
                    query: gql`query($code: String!) {
                        exec(code: $code) {
                            version,
                            result,
                            errors
                        }
                    }`,
                    variables: {
                        code: code,
                    },
                    fetchPolicy: 'network',
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/kernel";

    .exec {
        & /deep/ &-content {
            position: relative;

            .button {
                position: absolute;
                bottom: 10px;
                right: 10px;
            }

            .loader {
                top: 0;
                left: 0;
            }
        }

        &-error,
        &-result {
            box-shadow: 0 0 0 2px $color-border;
            border-radius: 3px;
            font-size: 90%;
            font-style: italic;
            color: $color-text;
            margin: 10px 0;
            padding: 10px 25px;
            line-height: 23px;
            min-height: 24px;
            box-sizing: border-box;
            @include clear();
        }

        &-result {
            white-space: pre;
        }

        &-error {
            color: #fff;
            background: $color-red;
            box-shadow: 0 0 0 2px $color-red;
        }
    }
</style>
