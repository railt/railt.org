<style lang="scss" scoped>
    @import "kernel";

    .page-chat {
        width: 100vw;
        display: flex;
        height: 100vh;
        box-sizing: border-box;
        padding-top: 44px;
        background: #1e2124;

        iframe {
            width: 350px;
            height: 100%;
            background: #1e2124;
        }

        .container {
            width: 90%;
            width: calc(100% - 350px);
            height: 100%;
            background: #36393e;
            flex-shrink: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: inset 1px 0 0 rgba(#fff, .1);
            background: url(/img/chat/bg.png);
            background-size: 100% auto;

            .button {
                box-shadow: 0 0 500px 50px #000;
            }
        }
    }
</style>

<template>
    <section class="page-chat">
        <iframe src="https://discordapp.com/widget?id=360488283471609857&theme=dark"
                width="350"
                height="500"
                allowtransparency="true"
                frameborder="0"
        ></iframe>
        <aside class="container">
            <ui-button :href="joinButton" view="primary" target="blank">Присоединиться</ui-button>
        </aside>
    </section>
</template>

<script>
    export default {
        props: {
            joinButton: {
                type: String
            }
        },
    };
</script>
