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
            <pre class="code" v-html="code"></pre>
        </article>
    </div>
</template>

<script>
    const CODE_INSTALLATION = `composer require railt/railt --dev
Using version dev-master for railt/railt
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
    Finished: success: 0, skipped: 0, failure: 3, total: 3
Package operations: 14 installs, 0 updates, 0 removals
  - Installing webonyx/graphql-php (v0.11.5): Loading from cache
  - Installing symfony/event-dispatcher (v4.0.8): Downloading (100%)
  - Installing symfony/polyfill-mbstring (v1.7.0): Loading from cache
  - Installing symfony/console (v4.0.8): Downloading (100%)
  - Installing psr/log (1.0.2): Loading from cache
  - Installing symfony/translation (v4.0.8): Loading from cache
  - Installing nesbot/carbon (1.25.0): Loading from cache
  - Installing psr/simple-cache (1.0.1): Loading from cache
  - Installing psr/container (1.0.0): Loading from cache
  - Installing illuminate/contracts (v5.6.16): Loading from cache
  - Installing doctrine/inflector (v1.3.0): Loading from cache
  - Installing illuminate/support (v5.6.16): Loading from cache
  - Installing psr/cache (1.0.1): Loading from cache
  - Installing railt/railt (dev-master f439dce): Cloning f439dcec05 from cache
webonyx/graphql-php suggests installing react/promise (To leverage async resolving on React PHP platform)
webonyx/graphql-php suggests installing psr/http-message (To use standard GraphQL server)
symfony/event-dispatcher suggests installing symfony/dependency-injection ()
symfony/event-dispatcher suggests installing symfony/http-kernel ()
symfony/console suggests installing symfony/lock ()
symfony/console suggests installing symfony/process ()
symfony/translation suggests installing symfony/config ()
symfony/translation suggests installing symfony/yaml ()
illuminate/support suggests installing illuminate/filesystem (Required to use the composer class (5.6.*).)
illuminate/support suggests installing symfony/process (Required to use the composer class (~4.0).)
illuminate/support suggests installing symfony/var-dumper (Required to use the dd function (~4.0).)
railt/railt suggests installing psr/cache-implementation ((~1.0) PSR-6 Cache Implementation)
railt/railt suggests installing psr/simple-cache-implementation ((~1.0) PSR-16 Cache Implementation)
railt/railt suggests installing monolog/monolog ((1.*) PSR-3 Logger Implementation)
Writing lock file
Generating autoload files
`;

    export default {
        data() {
            return {
                current: 1,
                code: CODE_INSTALLATION,
                codeLines: [
                    CODE_INSTALLATION
                ]
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    .steps {
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
            width: 500px;
            margin: 0 auto;
            color: #f9f9f9;
            padding-bottom: 20px;
        }

        .step {
            margin: 0 auto;
            width: 500px;
            height: 400px;
            background: #fff;
            border-radius: 3px;
            box-shadow: $ui-box-shadow;
            position: relative;
            color: $color-text;
            box-sizing: border-box;
            padding: 10px 15px 10px 25px;

            .code {
                display: block;
                padding: 0;
                margin: 0;

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
    }
</style>
