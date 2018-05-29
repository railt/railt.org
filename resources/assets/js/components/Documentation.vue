
<template>
    <section class="page">
        <aside class="nav">
            <app-menu></app-menu>
        </aside>

        <section class="body">
            <div class="spacer"></div>

            <template v-if="page === null">
                <app-error>
                    <header class="documentation-header">
                        <h1>Page Not Found</h1>
                        <h3 style="color: #999">
                            Probably this page is not available in this language.
                        </h3>
                    </header>
                </app-error>
            </template>

            <template v-else>
                <header class="documentation-header">
                    <app-title :title="page.title"></app-title>

                    <h1 v-if="! $apollo.loading">{{ page.title }}</h1>
                    <h1 v-if="$apollo.loading" class="placeholder">&nbsp;</h1>

                    <blockquote class="warn" v-if="! $apollo.loading && isFallback">
                        <p>This page is currently unavailable in the selected language</p>
                    </blockquote>

                    <aside class="sub">
                        <time :datetime="page.updatedAt">
                            <span v-if="! $apollo.loading">Updated at {{ page.updatedAtHuman }}</span>
                            <span v-if="$apollo.loading" class="placeholder">&nbsp;</span>
                        </time>

                        <nav class="controls">
                            <a :href="page.url" class="edit" target="_blank">Edit</a>
                        </nav>
                    </aside>
                </header>

                <template v-if="! $apollo.loading && docs.nav && docs.nav.length > 1">
                    <div class="delimiter">
                        <span>Table of contents</span>
                    </div>

                    <nav class="table-of-contents" v-if="! $apollo.loading">
                        <a :href="'#' + link.slug"
                           :class="'level-' + link.level"
                           v-scroll-to="'#' + link.slug"
                           v-for="link in docs.nav"
                        >{{ link.title }}</a>
                    </nav>
                </template>

                <template v-if="$apollo.loading">
                    <div class="delimiter">
                        <span>Table of contents</span>
                    </div>

                    <nav class="table-of-contents">
                        <div class="placeholder">&nbsp;</div>
                    </nav>
                </template>

                <div class="delimiter"></div>

                <app-content :content="content" :loading="$apollo.loading"></app-content>
            </template>
        </section>
    </section>
</template>

<script>
    import Content from './Documentation/Content';
    import LoadDocumentation from './../../graphql/documentation.graphql';

    export default {
        components: {
            'app-content': Content
        },
        data() {
            return {
                loaded: false,
                page: {},
                content: '',
                isFallback: false,
                query: {}
            }
        },
        methods: {
            routeParamsToPath() {
                let path = this.$route.params.path;

                if (! path) {
                    return null;
                }

                if (typeof path === 'string') {
                    return path;
                }

                return path.join('/');
            }
        },
        apollo: {
            docs: {
                query: LoadDocumentation,
                variables() {
                    return {
                        path: this.routeParamsToPath()
                    };
                },
                result({data}) {
                    this.page = data.docs;
                    this.content = (data.docs || {}).content || '';
                    this.isFallback = !! (data.docs || {}).isFallback;

                    setTimeout(() => {
                        this.$scrollTo(document.getElementById(
                            window.location.hash
                                ? window.location.hash.substr(1)
                                : 'page-top'
                        ));
                    }, 100);
                },
                error() {
                    this.page = null;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/kernel";

    $menu-width: 250px;

    .page {
        padding-top: 100px !important;
    }

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

        .spacer {
            width: 100vw;
            visibility: hidden;
            pointer-events: none;
        }

        .table-of-contents {
            padding-left: 65px;
            display: flex;
            flex-direction: column;

            a {
                display: inline-block;
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

        h1.placeholder {
            width: 400px;
        }

        .documentation-header,
        .documentation-body {
            padding: 0 20px 0 65px;
        }

        .documentation-body {
            padding-bottom: 100px;
        }

        .documentation-header {
            h1 {
                display: block;
                padding-bottom: 10px;
            }

            .sub {
                padding: 15px 0;
                font-size: 14px;
                color: $color-text-placeholder;

                time {
                    font-style: italic;
                }

                .controls {
                    float: right;
                }
            }
        }
    }
</style>
