<style lang="scss" scoped>
    @import "kernel";

    .page-donate {
        box-sizing: border-box;
        padding: 40px 50px;
        box-shadow: 0 0 0 1px $color-border;
        border-radius: 3px;
        max-width: 500px;
        margin: 198px auto 150px auto;
        position: relative;
        display: block;

        /deep/ .input {
            width: 400px;
        }

        .form-element-description,
        .form-element {
            box-sizing: border-box;
            padding: 30px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;

            img {
                width: 100px;
                height: auto;
                justify-self: flex-end;
            }

            &.ya-logo {
                justify-content: center;
            }
        }

        .form-element-description {
            border-radius: 3px;
            padding: 20px;
            margin: 20px 0;
            font-size: 12px;
            background: rgba($color-bg, .7);
            box-shadow: 0 0 0 1px $color-border;
        }
    }
</style>

<template>
    <section class="page-donate">
        <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
            <div class="form-element ya-logo">
                <img src="/img/donate/ya-logo.png" alt="By Yandex" />
            </div>

            <input type="hidden" name="receiver" :value="receiver" />
            <input type="hidden" name="formcomment" :value="dest" />
            <input type="hidden" name="short-dest" :value="dest" />
            <input type="hidden" name="label" :value="label" />
            <input type="hidden" name="quickpay-form" value="donate" />
            <input type="hidden" name="targets" value="Railt Donate" />
            <input type="hidden" name="need-fio" value="true" />
            <input type="hidden" name="need-email" value="true" />
            <input type="hidden" name="need-phone" value="false" />
            <input type="hidden" name="need-address" value="false" />

            <div class="form-element">
                <ui-text type="number" name="sum" :placeholder="sum" value="100.00"></ui-text>
            </div>

            <div class="form-element">
                <ui-text name="comment" :placeholder="comment"></ui-text>
            </div>

            <div class="form-element">
                <ui-select name="paymentType">
                    <ui-option :default="true" value="AC">{{ byBank }}</ui-option>
                    <ui-option value="MC">{{ byMobile }}</ui-option>
                    <ui-option value="PC">{{ byYandexMoney }}</ui-option>
                </ui-select>

                <ui-button view="simple">{{ donate }}</ui-button>
            </div>

            <div class="form-element-description">
                <p v-html="description"></p>
            </div>
        </form>
    </section>
</template>

<script>
    export default {
        props: {
            dest: { required: true },
            receiver: { required: true },
            label: { required: true },
            sum: { required: true },
            comment: { required: true },
            donate: { required: true },
            description: { required: true },
            byBank: { required: true },
            byMobile: { required: true },
            byYandexMoney: { required: true },
        }
    };
</script>
