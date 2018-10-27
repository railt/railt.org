<template>
    <section class="search" :class="{active: active || loading || found}">
        <div class="input">
            <app-text :placeholder="placeholder"
                type="search"
                @focus="focus()"
                @blur="blur()"
                @input="input"
                @keydown.enter="onKeyDown"
                :disabled="loading"
                :loading="loading"
            ></app-text>

            <transition name="fade">
                <div class="search-results" v-if="found && data.length > 0">
                    <div class="search-results-body">
                        <template v-for="link in data">
                            <a :href="link.uri">
                                <h4>{{ link.title }}</h4>
                                <span>{{ link.content }}</span>
                            </a>
                        </template>
                    </div>
                </div>
                <div class="search-results" v-else-if="found && data.length === 0">
                    <div class="search-results-body">{{ langNotFound }}</div>
                </div>
            </transition>
        </div>

        <span class="search-info">
            <template v-if="loading && ! found">{{ langSearching }}</template>
            <template v-else-if="! found">{{ langTyping }}</template>
        </span>

        <transition name="fade">
            <div class="search-background" v-if="active || loading || found"></div>
        </transition>
    </section>
</template>

<script>
    import gql from "graphql-tag";

    export default {
        props: {
            placeholder: {
                type: String
            },
            langSearching: {
                type: String
            },
            langTyping: {
                type: String
            },
            langNotFound: {
                type: String
            }
        },
        data() {
            return {
                active: false,
                loading: false,
                found: false,
                data: [],
                query: '',
            };
        },
        mounted() {
            document.body.addEventListener('click', () => {
                this.found = false;
                this.data = [];
            }, false);
        },
        methods: {
            onKeyDown(e) {
                this.found = false;
                this.search(this.query);
            },
            blur() {
                this.found = false;
                this.active = false;
                this.data = [];
            },
            focus() {
                this.found = false;
                this.active = true;
                this.data = [];
            },
            input(value) {
                this.query = value.toString().trim();
            },
            async search(value) {
                if (value) {
                    this.loading = true;

                    try {
                        let result = await this.searchRequest(value);
                        this.found = true;
                        this.data = result.data.search;
                    } catch (e) {
                        console.error(e);
                    } finally {
                        this.loading = false;
                    }
                }
            },
            searchRequest(query) {
                return this.$apollo.query({
                    query: gql`query($query: String!) {
                        search(query: $query) {
                            uri,
                            title,
                            content
                        }
                    }`,
                    variables: {
                        query: query,
                    },
                    fetchPolicy: 'network',
                })
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    .search {
        transition: .3s $ui-animation-swift;
        padding: 0 15px;

        .input {
            position: relative;
            z-index: 4;

            & /deep/ {
                .input {
                    $size: 48px;

                    height: $size;
                    line-height: $size;
                    width: 100%;

                    .container {
                        box-sizing: border-box;
                        padding-left: 30px;

                        &:before {
                            content: '';
                            position: absolute;
                            left: 0;
                            top: 0;
                            width: $size;
                            height: $size;
                            background: url(/images/icons/search.svg) center center no-repeat;
                            background-size: 18px 18px;
                            opacity: .5;
                        }
                    }

                    input,
                    .placeholder {
                        font-size: 16px;
                    }

                    input {
                        color: $color-silver;
                    }

                    .placeholder {
                        left: 46px;
                    }
                }

                input[type="search"]::-webkit-search-decoration,
                input[type="search"]::-webkit-search-cancel-button,
                input[type="search"]::-webkit-search-results-button,
                input[type="search"]::-webkit-search-results-decoration {
                    display: none;
                }
            }
        }

        &-info {
            color: $color-description;
            display: block;
            position: relative;
            z-index: 4;
            font-size: 16px;
            font-style: italic;
            overflow: hidden;
            max-height: 0;
            transition: .3s $ui-animation-swift;
            padding: 0 0 0 10px;
        }

        & /deep/ {
            .input {
                width: calc(100%);
                transition: width .3s ease, margin-left .3s ease;
            }
        }

        &.active {
            .search-info {
                padding-top: 20px;
                max-height: 25px;
            }
        }

        &-background {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            background: rgba($color-dark-white, .9);
            z-index: 3;
            backdrop-filter: blur(1px);
        }

        &-results {
            left: 0;
            width: 100%;
            z-index: 10;
            padding: 0 0;
            position: absolute;
            box-sizing: border-box;

            &:after,
            &:before {
                content: '';
                top: -14px;
                left: 13px;
                display: block;
                position: absolute;
                width: 1px;
                height: 1px;
                border: transparent 8px solid;
                border-bottom-color: #fff;
            }

            &:before {
                top: -17px;
                border-bottom-color: $color-border;
            }

            &-body {
                width: 100%;
                padding: 10px;
                margin-top: 2px;
                background: #fff;
                box-sizing: border-box;
                border-radius: 0 0 3px 3px;
                box-shadow:
                    0 4px 10px rgba($color-extra-light-silver, .5),
                    0 0 0 2px $color-border;

                a {
                    display: block;
                    padding: 8px 14px;
                    line-height: 20px;
                    border-radius: 3px;
                    margin-bottom: 10px;
                    text-decoration: none;
                    box-sizing: border-box;

                    &:hover {
                        background: $color-extra-light-gray;
                    }

                    h4 {
                        margin: 0 0 6px 0;
                        font-weight: bold;
                        text-transform: none;

                        &:first-letter {
                            text-transform: uppercase;
                        }
                    }

                    span {
                        color: $color-text !important;
                    }
                }
            }
        }
    }
</style>
