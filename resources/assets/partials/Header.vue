<style lang="scss" scoped>
    @import "kernel";

    $header:  48px;

    header {
        width: 100%;
        height: $header;
        top: 0;
        left: 0;
        box-sizing: border-box;
        position: fixed;
        background: rgba($color-white, .98);
        box-shadow: 0 1px 0 $color-border;
        z-index: 97;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;

        nav {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;

            a {
                text-transform: uppercase;
                margin: 0 20px 0 0;
                font-size: 13px;
                display: inline-block;
                text-decoration: none;
                white-space: nowrap;

                img {
                    display: block;
                    height: 38px;
                }
            }
        }

        .search {
            height: $header;
            display: flex;
            align-items: center;
            width: 100%;

            & /deep/ .input {
                min-width: 200px;
                width: 100%;


                .container {
                    background: none !important;
                    box-shadow: none !important;
                }

                .placeholder {
                    font-size: 12px;
                    transition:
                            opacity .3s $ui-animation-swift,
                            transform .3s $ui-animation-swift;
                    transform: translateX(1px);
                    opacity: 1;
                }

                &.active .placeholder {
                    opacity: 0;
                    transform: translateX(10px);
                }

                .loader {
                    background: rgba($color-white, .5) !important;
                    box-shadow: 0 0 0 1px rgba($color-white, .5) !important;
                }
            }

            .search-results {
                position: absolute;
                top: $header;
                left: 50%;
                width: $ui-width;
                margin-left: -$ui-width/2;
                background: $color-white;
                border-radius: 1px;
                box-sizing: border-box;
                padding: 5px 0;
                box-shadow:
                    0 -1px 0 $color-white,
                    0 0 0 1px $color-border,
                    $ui-box-shadow;
                opacity: 0;
                transform: translateY(-10px);

                a {
                    display: block;
                    width: 100%;
                    box-sizing: border-box;
                    text-decoration: none;
                    margin: 1px 0;
                    text-transform: none;
                    padding: 12px 20px !important;
                    box-shadow: 0 1px 0 $color-border;

                    &:last-child {
                        box-shadow: none !important;
                    }

                    &:hover {
                        background: $color-bg;
                    }

                    h4 {
                        margin: 0;
                        padding: 0 0 10px 0;
                        text-transform: none;
                        font-weight: bold;
                    }

                    span {
                        color: $color-description;

                        & /deep/ .highlight {
                            background: lighten($color-yellow, 40%) !important;
                            color: $color-text;
                            padding: 0 1px;
                            border-radius: 2px;
                        }
                    }
                }

                h3 {
                    display: block;
                    text-align: center;
                    font-weight: 200;
                    margin: 0;
                    padding: 30px 0;
                    color: $color-description;
                }

                &.visible {
                    opacity: 1;
                    transform: translateY(0);
                    transition:
                        transform .2s $ui-animation-swift,
                        opacity .2s $ui-animation-swift;
                }

                &.error {
                    padding: 15px 20px;
                    background: rgba($color-red, .8);
                    color: #fff;
                    box-shadow:
                        0 0 0 1px darken($color-red, 20%),
                        $ui-box-shadow;
                }
            }
        }

        .aside {
            padding: 0 9px 0 21px;
            margin-left: 30px;
            width: 200px;
            height: $header;
            display: flex;
            align-items: center;

            .language {
                & /deep/ .current,
                & /deep/ .dropdown,
                & /deep/ .value {
                    min-width: 98px !important;
                }
            }
        }
    }
</style>

<template>
    <header>
        <nav>
            <template>
                <slot></slot>
            </template>

            <div class="search" v-if="searchEnable">
                <ui-text view="flat" :placeholder="searchPlaceholder"></ui-text>

                <div class="search-results" :class="{
                    visible: (typeof searchResults !== 'boolean')
                }">
                    <template v-for="result in searchResults">
                        <a :href="result.route">
                            <h4>{{ result.title }}</h4>
                            <span v-html="result.content"></span>
                        </a>
                    </template>
                    <template v-if="searchResults.length === 0">
                        <h3>Not Found</h3>
                    </template>
                </div>
            </div>
        </nav>

        <div class="aside">
            <ui-select class="language" placeholder="Язык">
                <slot name="lang"></slot>
            </ui-select>
        </div>
    </header>
</template>

<script>
    let throttling = null;

    const SEARCH_DESCRIPTION_LENGTH = 100;

    export default {
        props: {
            searchEnable: {
                default: false,
                type: Boolean
            },
            searchPlaceholder: {
                default: 'Search',
                type: String
            }
        },
        data() {
            return {
                searchText: '',
                searchResults: false
            }
        },
        mounted: function () {
            this.$nextTick(() => {
                this.$on('select', value => {
                    document.location = `/${value}`;
                });

                this.$on('input', value => {
                    this.searchText = value;
                    this.searchResults = false;

                    if (value.trim()) {
                        this.search(value.trim());
                    }
                })
            });
        },
        methods: {
            search(value) {
                this.searchError = false;
                this.searchResults = false;

                if (throttling !== null) {
                    throttling = clearTimeout(throttling);
                }

                throttling = setTimeout(() => {
                    throttling = null;
                    this.doSearch(value);
                }, 200);
            },
            doSearch(value) {
                let query = { query: value };

                this.$http.post('/search', query)
                    .then(response => {
                        this.searchResults = response.data.map(result => {
                            result.content = this.highlight(value, result.content);
                            return result;
                        });
                        this.found = true;
                    });
            },
            highlight(q, content) {
                if (content.length > SEARCH_DESCRIPTION_LENGTH) {
                    let regex = new RegExp(q, 'ig');
                    content = content.substr(this.shift(q, content), SEARCH_DESCRIPTION_LENGTH);
                    content = content.replace(regex, `<span class="highlight">${q}</span>`);
                    content += '&hellip;';
                }

                return content;
            },
            shift(query, content) {
                let shift = content.toString()
                    .toLowerCase()
                    .search(query.toString().toLowerCase());

                shift = shift > 30 ? shift - 30 : shift;
                return shift <= 0 ? 0 : shift;
            }
        }
    }
</script>
