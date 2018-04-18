<template>
    <div class="steps" :class="{step: `step-${current}`}">
        <nav class="pagination">
            <div class="item" :class="{active: current === 1}" @click="current = 1">
                1<span>. Установка</span>
            </div>

            <div class="item" :class="{active: current === 2}" @click="current = 2">
                2<span>. Схема</span>
            </div>

            <div class="item" :class="{active: current === 3}" @click="current = 3">
                3<span>. Контроллер</span>
            </div>

            <div class="item" :class="{active: current === 4}" @click="current = 4">
                4<span>. Запрос</span>
            </div>
        </nav>

        <div class="description">
            <template v-if="current === 1">
                <h3>Установка</h3>

                <p>
                    Следуйте инструкциям в терминале ниже, чтобы узнать основы создания и
                    использования сервиса Railt. Инструкции имитируют фактический рабочий
                    процесс с CLI, который вы также можете попробовать в своем
                    собственном терминале.
                </p>
            </template>
        </div>

        <article class="step">
            <app-code v-if="current === 1">
{color: #ccc}${/color} composer require railt/railt --dev
{color: #51c00e}Loading composer repositories with package information{/color}
{color: #51c00e}Updating dependencies (including require-dev){/color}
{color: #51c00e}Package operations: 9 installs, 0 updates, 0 removals{/color}
  - Installing {color: #51c00e}webonyx/graphql-php{/color} ({color: #1172df}v0.11.5{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}symfony/event-dispatcher{/color} ({color: #1172df}v4.0.8{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}symfony/console{/color} ({color: #1172df}v4.0.8{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}psr/log{/color} ({color: #1172df}1.0.2{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}psr/simple-cache{/color} ({color: #1172df}1.0.1{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}psr/container{/color} ({color: #1172df}1.0.0{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}illuminate/support{/color} ({color: #1172df}v5.6.16{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}psr/cache{/color} ({color: #1172df}1.0.1{/color}): Downloading ({color: #1172df}100%{/color})
  - Installing {color: #51c00e}railt/railt{/color} ({color: #1172df}dev-master f439dce{/color}): Downloading ({color: #1172df}100%{/color})
{color: #51c00e}Writing lock file{/color}
{color: #51c00e}Generating autoload files{/color}
</app-code>
        </article>
    </div>
</template>

<script>
    import Code from './Code';

    export default {
        components: {
            'app-code': Code
        },
        data() {
            return {
                current: 1
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    .steps {
        $width: 600px;
        width: 100%;

        .pagination {
            margin: 0 auto;
            bottom: 0;
            padding: 30px 0;
            display: flex;
            justify-content: center;
            width: 100%;

            .item {
                height: 36px;
                line-height: 36px;
                min-width: 36px;
                text-align: center;
                display: flex;
                flex-wrap: nowrap;
                box-sizing: border-box;
                border-radius: 18px;
                box-shadow: 0 0 0 2px rgba(#fff, .2);
                background: $color-main;
                color: #fff;
                padding: 0 14px;
                margin: 0 6px;
                white-space: nowrap;
                cursor: pointer;
                user-select: none;
                transition:
                    color .6s ease,
                    box-shadow .6s ease,
                    background .6s ease;

                span {
                    display: block;
                    max-width: 0;
                    overflow: hidden;
                    transition: max-width .6s ease;
                }

                &.active {
                    background: #fff;
                    color: $color-main;
                    box-shadow: 0 0 0 2px #fff;

                    span {
                        max-width: 150px;
                    }
                }
            }
        }

        .description {
            width: $width;
            margin: 0 auto;
            color: #f9f9f9;
            padding-bottom: 20px;
        }

        .step {
            margin: 0 auto;
            width: $width;
            height: 400px;
            background: #fff;
            border-radius: 3px;
            box-shadow: $ui-box-shadow;
            position: relative;
            color: $color-text;
            box-sizing: border-box;
            overflow-x: hidden;
            @include scrollbar;
            padding: 0;
        }
    }
</style>
