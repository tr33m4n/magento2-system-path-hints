require([
    'mage/translate',
    'domReady!'
], function ($t) {
    'use strict';

    var timeout = null;

    document.addEventListener('click', function (event) {
        if (!event.target.matches('[data-config-hint]')) {
            return;
        }

        event.preventDefault();

        var originalText = event.target.getAttribute('data-tooltip-text');
        document.addEventListener('copy', function (clipboardEvent) {
            clipboardEvent.preventDefault();

            if (!clipboardEvent.clipboardData) {
                return;
            }

            clipboardEvent.clipboardData.setData('text/plain', event.target.textContent);

            if (timeout) {
                return;
            }

            event.target.setAttribute('data-tooltip-text', $t('Copied!'))
            timeout = setTimeout(function () {
                event.target.setAttribute('data-tooltip-text', originalText);

                timeout = null;
            }, 1000);
        }, {once: true});

        document.execCommand('copy');
    }, false);
});
