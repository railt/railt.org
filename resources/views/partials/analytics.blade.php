@if(! app()->isLocal())
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter{{ (int)env('YANDEX_METRIKA_ID') }} = new Ya.Metrika({
                    id: {{ (int)env('YANDEX_METRIKA_ID') }},
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
                console.error(e);
            }
        });
        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
            n.parentNode.insertBefore(s, n);
        };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <img src="https://mc.yandex.ru/watch/{{ (int)env('YANDEX_METRIKA_ID') }}"
         style="position:absolute; left:-9999px;" alt="" />
</noscript>
@endif
