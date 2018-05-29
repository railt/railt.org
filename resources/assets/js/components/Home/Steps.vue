<template>
    <div class="steps" :class="{step: `step-${current}`}">
        <div class="description">
            <template v-if="current === 1">
                <h3>Installation</h3>
                <p>
                    Follow the instructions in the terminal below to learn the
                    basics of creating and use of the Railt service.
                    Instructions below mimic the actual worker process
                    with CLI, which you can also try in your own terminal.
                </p>
            </template>

            <template v-if="current === 2">
                <h3>SDL Schema</h3>
                <p>
                    A description of the capabilities of the server is
                    declared by the SDL schema. Below is the example of
                    a schema with one single possibility &mdash; output
                    text that you transmit to the server.
                </p>
            </template>

            <template v-if="current === 3">
                <h3>Controller</h3>
                <p>
                    In order to respond to the request &mdash; should describe the return
                    value in the controller whose method was described in the directive
                    <code>@route(action: "ExampleController@say")</code>
                    at the previous step.
                </p>
            </template>

            <template v-if="current === 4">
                <h3>Request</h3>
                <p>
                    Now we need to configure the transfer of GraphQL queries to the application,
                    so that it can process it and correctly return the response back to the client.
                    We can perfectly configure this basic logic from the scratch.
                </p>
            </template>
        </div>

        <article class="step">
            <app-code v-if="current === 1" @next="current = 2">
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
            <pre class="code" v-if="current === 2">
<span class="code-keyword">schema</span> {
    <span class="code-field">query</span>: <span class="code-type">Example</span>
}

<span class="code-keyword">type</span> Example {
    <span class="code-field">say</span>(<span class="code-argument">message</span>: <span class="code-type">String</span> = <span class="code-value">&quot;Hello&quot;</span>): <span class="code-type">String</span>!
        <span class="code-field">@route</span>(<span class="code-argument">action:</span> <span class="code-value">&quot;ExampleController@say&quot;</span>)
}
            </pre>
            <pre class="code" v-if="current === 3">
<span class="code-keyword">class</span> ExampleController
{
    <span class="code-keyword">public function</span> <span class="code-field">say</span>(<span class="code-type">string</span> <span class="code-argument">$message</span>): <span class="code-type">string</span>
    {
        <span class="code-keyword">return</span> <span class="code-argument">$message</span>;
    }
}
            </pre>
            <pre class="code" v-if="current === 4">
<span class="code-comment">// Create an application</span>
<span class="code-value">$app</span> = <span class="code-keyword">new</span> <span class="code-field">Application</span>();

<span class="code-comment">// Load the SDL schema</span>
<span class="code-value">$schema</span> = <span class="code-field">File</span>::<span class="code-field">fromPathname</span>(<span class="code-keyword">__DIR__</span> . '/schema.graphqls');

<span class="code-comment">// Parse request</span>
<span class="code-value">$response</span> = <span class="code-value">$app</span>-><span class="code-field">request</span>(<span class="code-value">$schema</span>, <span class="code-keyword">new</span> Request());

<span class="code-comment">// Send response</span>
<span class="code-value">$response</span>-><span class="code-field">send</span>();
            </pre>

            <app-button v-if="current > 1 && current < 4" @click="current++">Next</app-button>
        </article>

        <nav class="pagination">
            <div class="item" :class="{active: current === 1}" @click="current = 1">
                1<span>. Installation</span>
            </div>

            <div class="item" :class="{active: current === 2}" @click="current = 2">
                2<span>. Schema</span>
            </div>

            <div class="item" :class="{active: current === 3}" @click="current = 3">
                3<span>. Controller</span>
            </div>

            <div class="item" :class="{active: current === 4}" @click="current = 4">
                4<span>. Request</span>
            </div>
        </nav>
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
            padding: 0;
            @include scrollbar;

            /deep/ .button,
            .button {
                position: absolute;
                bottom: 10px;
                right: 10px;
            }

            .code {
                display: block;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    }
</style>
