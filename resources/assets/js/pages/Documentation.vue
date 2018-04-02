<script>
    import gql from 'graphql-tag';

    const DOCUMENTATION_PAGE = gql`query LoadDocumentation($path: String) {
        docs(path: $path) {
            id,
            urn,
            url,
            title,
            content,
            updatedAt,
            updatedAtForHumans,
            nav {
                slug,
                level,
                title
            }
        }
    }`;

    export default {
        data() {
            return {
                loaded: false,
                page: {},
                query: {},
                placeholders: []
            }
        },
        created() {
            for (let i = 0; i < 60; i++) {
                this.placeholders.push(Math.floor(Math.random() * 300 + 10));
            }
        },
        methods: {
            setTitle(title) {
                document.title = `${title} &mdash; Railt`;
            }
        },
        apollo: {
            docs: {
                query: DOCUMENTATION_PAGE,
                variables() {
                    return {
                        path: this.$route.params.path || null
                    };
                },
                result({data, loader, networkStatus}) {
                    this.page = data.docs;
                    document.title = `${data.docs.title} — Railt`;
                },
                error(error) {
                    console.error('We\'ve got an error!', error)
                }
            }
        }
    }
</script>

<template>
    <section class="page">
        <aside class="nav">
            <nav class="menu">
                <router-link to="/docs/lang/common">Язык</router-link>
                <router-link to="/docs/lang/syntax">Синтаксис</router-link>
                <router-link to="/docs/lang/types">Типы</router-link>
            </nav>
        </aside>

        <section class="body">
            <transition name="fade">
                <loading v-if="$apollo.loading"></loading>
            </transition>

            <header class="documentation-header">
                <h1 v-if="! $apollo.loading">{{ page.title }}</h1>
                <h1 v-if="$apollo.loading" class="placeholder">&nbsp;</h1>

                <input-text placeholder="Поиск..."></input-text>

                <aside class="sub">
                    <time :datetime="page.updatedAt">
                        Обновлено
                        <span v-if="! $apollo.loading">{{ page.updatedAtForHumans }}</span>
                        <span v-if="$apollo.loading" class="placeholder">&nbsp;</span>
                    </time>

                    <a :href="page.url" class="edit" target="_blank">Редактировать</a>
                </aside>
            </header>

            <div class="delimiter">
                <span>Содержание</span>
            </div>

            <nav class="table-of-contents" v-if="! $apollo.loading">
                <a :href="'#' + link.slug" :class="'level-' + link.level" v-for="link in docs.nav">
                    {{ link.title }}
                </a>
            </nav>

            <nav class="table-of-contents" v-if="$apollo.loading">
                <div class="placeholder">&nbsp;</div>
            </nav>

            <div class="delimiter"></div>

            <article v-if="! $apollo.loading" v-html="docs.content"
                     class="documentation-body"></article>

            <div class="documentation-body" v-if="$apollo.loading">
                <div v-for="placeholder in placeholders" class="placeholder"
                     :style="{'width': placeholder + 'px'}">&nbsp;
                </div>
            </div>
        </section>
    </section>
</template>

<style lang="scss" scoped>
    @import "../../sass/app";

    .nav {
        order: 1;
        width: 200px;
        flex-shrink: 0;
        font-size: 14px;
        padding: 20px 0;
        margin: 20px 0;
        box-shadow: 1px 0 0 $color-border;
        position: relative;

        a {
            display: block;
            width: 100%;
            white-space: nowrap;
            padding: 6px 0;

            &.router-link-active {
                text-decoration: none;
                color: $color-text;
                font-weight: bold !important;
            }
        }
    }

    .body {
        order: 2;
        flex-basis: 100%;
        font-size: 16px;
        line-height: 26px;
        position: relative;
        max-width: $ui-width - 200px;

        .table-of-contents {
            padding-left: 65px;
            display: flex;
            flex-direction: column;

            a {
                display: block;
                font-size: 14px;
                position: relative;
                margin: 0 5px;

                &:before {
                    content: '#';
                    color: $color-border-secondary;
                    position: absolute;
                    left: -20px;
                    text-decoration: none;
                }

                @for $i from 1 through 6 {
                    &.level-#{$i} {
                        left: #{20 * ($i - 1)}px;
                        @if $i == 1 {
                            font-weight: bold;
                            font-size: 15px;
                            &:before {
                                color: $color-border;
                            }
                        }
                    }
                }
            }
        }

        .delimiter {
            font-size: 14px;
            line-height: 16px;
            color: $color-text-placeholder;
            text-transform: uppercase;
            position: relative;
            padding: 30px 0 30px 65px;

            span {
                background: #fff;
                padding: 0 10px;
                margin-left: -10px;
                display: inline-block;
                position: relative;
                z-index: 2;
            }

            &:after {
                content: '';
                background: $color-border;
                width: 100%;
                height: 1px;
                position: absolute;
                top: 38px;
                left: 0;
            }
        }

        .placeholder {
            background: $color-bg;
            width: 150px;
            border-radius: 2px;
            display: inline-block;
        }

        .documentation-header,
        .documentation-body {
            padding: 0 20px 0 65px;
        }

        .documentation-header {
            h1 {
                display: block;
                margin-bottom: 10px;
            }

            .sub {
                padding: 15px 0;
                font-size: 14px;
                color: $color-text-placeholder;

                .edit {
                    float: right;
                }
            }
        }

        .documentation-body {
            position: relative;
            overflow: hidden;
            padding-bottom: 100px;

            .placeholder {
                margin: 4px 8px;
                height: 20px;
            }

            & /deep/ {
                h1, h2, h3, h4, h5, h6 {
                    position: relative;

                    &:hover .header-link {
                        color: $color-border-regular;
                    }

                    .header-link {
                        position: absolute;
                        text-decoration: none;
                        left: -25px;
                        width: 25px;
                        color: #fff;
                        transition: color .3s ease;
                        font-size: 90%;
                        &:hover {
                            color: $color-main;
                        }
                    }
                }

                h4, h5, h6 {
                    .header-link {
                        display: none;
                    }
                }

                & > h1:first-child {
                    position: absolute;
                    z-index: -9999999999;
                    color: transparent;
                    top: -60px;
                }

                p {
                    margin: 30px 0 !important;
                }

                abbr {
                    cursor: help;
                }

                blockquote {
                    box-shadow: 0 0 0 2px $color-border;
                    border-radius: 2px;
                    font-size: 13px;
                    font-style: italic;
                    color: $color-text-secondary;
                    margin: 0;
                    padding: 10px 20px;
                    line-height: 20px;

                    p {
                        margin: 0 !important;
                        padding: 0 !important;
                    }
                }

                code {
                    background: rgba(#0f202d, .01);
                    color: desaturate($color-main, 25%);
                    padding: 2px 5px;
                    border-radius: 2px;
                    font-family: $font-mono;
                    font-size: $font-size;
                }

                pre {
                    display: block;
                    box-sizing: border-box;
                    padding: 10px 15px;
                    border-radius: 2px;
                    box-shadow: 0 0 0 1px $color-border;
                    background: rgba(#0f202d, .01);
                    overflow-x: auto;
                    width: 100%;
                    @include scrollbar;

                    code {
                        background: none;
                        color: inherit;
                        padding: 0;
                    }
                }

                table {
                    width: 100%;
                    box-shadow: 0 0 0 1px $color-border;
                    padding: 10px;

                    th {
                        font-size: 13px;
                        font-weight: normal;
                        text-align: left;
                        text-transform: uppercase;
                        padding-bottom: 10px;
                        color: $color-text-placeholder;
                    }

                    td {
                        font-size: 13px;
                    }
                }
            }
        }
    }
</style>
