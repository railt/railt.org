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
                content: '',
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
            formatLinks(content) {
                return content.replace(/<a\s+href="\/(.*?)"(.*?)>(.*?)<\/a>/g, (link, route, attributes, title) => {
                    let uri = this.$router.resolve({
                        name: 'docs',
                        params: { path: route }
                    });

                    return `<a href="${uri}" ${attributes} data-route="inner">${title}</a>`;
                });
            },
            setContent(data) {
                let content = (data.docs || {}).content || '';

                content = this.formatLinks(content);

                this.content = content;
            },
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
                result({data}) {
                    this.page = data.docs;
                    this.setContent(data);
                    document.title = `${(data.docs || {title: '404'}).title} — Railt`;
                },
                error() {
                    this.page = null;
                }
            }
        }
    }
</script>

<template>
    <section class="page">
        <aside class="nav">
            <documentation-menu></documentation-menu>
        </aside>

        <section class="body">
            <transition name="fade">
                <loading v-if="$apollo.loading"></loading>
            </transition>

            <template v-if="page === null">
                <header class="documentation-header" style="width: 100vw">
                    <h1>Whoops!</h1>
                </header>

                <not-found></not-found>
            </template>

            <template v-else>
                <header class="documentation-header">
                    <h1 v-if="! $apollo.loading">{{ page.title }}</h1>
                    <h1 v-if="$apollo.loading" class="placeholder">&nbsp;</h1>

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

                <article v-if="! $apollo.loading" v-html="content"
                         class="documentation-body"></article>

                <div class="documentation-body" v-if="$apollo.loading">
                    <div v-for="placeholder in placeholders" class="placeholder"
                         :style="{'width': placeholder + 'px'}">&nbsp;
                    </div>
                </div>
            </template>
        </section>
    </section>
</template>

<style lang="scss" scoped>
    @import "../../sass/kernel";

    $menu-width: 250px;

    .nav {
        width: $menu-width;
        order: 1;
        flex-shrink: 0;
        font-size: 14px;
        padding: 20px 15px 20px 0;
        box-sizing: border-box;
        margin: 20px 0;
        box-shadow: 1px 0 0 $color-border;
        position: relative;
    }

    .body {
        order: 2;
        flex-basis: 100%;
        font-size: 16px;
        line-height: 26px;
        position: relative;
        max-width: $ui-width - $menu-width;

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
            padding-top: 10px;
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
                    @include clear();

                    &:before {
                        display: block;
                        float: left;
                        color: #fff;
                        margin-left: -10px;
                    }

                    p {
                        margin: 0 !important;
                        padding: 0 !important;
                    }

                    &.warn,
                    &.info {
                        &:before {
                            @include fa-icon;
                            font-size: 24px;
                            padding-right: 10px;
                        }

                        a {
                            color: #fff;
                            text-decoration: underline;
                            &:hover {
                                color: $color-border-regular;
                            }
                        }

                        color: #fff;
                    }

                    &.warn {
                        &:before {
                            content: $fa-var-warning;
                        }

                        background: $color-red;
                        box-shadow: 0 0 0 2px $color-red;
                    }

                    &.info {
                        &:before {
                            content: $fa-var-info;
                        }

                        background: $color-blue;
                        box-shadow: 0 0 0 2px $color-blue;
                    }
                }

                code {
                    background: $color-bg;
                    color: desaturate($color-main, 25%);
                    padding: 2px 5px;
                    border-radius: 2px;
                    font-family: $font-mono;
                    font-size: inherit;
                }

                & > code,
                & > pre {
                    font-size: 14px;
                }

                pre {
                    display: block;
                    box-sizing: border-box;
                    padding: 10px 15px;
                    border-radius: 3px;
                    background: $color-bg;
                    overflow-x: auto;
                    width: 100%;
                    box-shadow: 0 2px 1px rgba(#001, .1);
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
