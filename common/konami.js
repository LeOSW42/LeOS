function onKonamiCode(fn) {
    var codes = (function(){
            var c = [38,38,40,40,37,39,37,39,66,65];
            return c;
        })(),
        expecting = function(){
            expecting.codes = expecting.codes || Array.apply({}, codes);
            expecting.reset = function() { expecting.codes = null; };
            return expecting.codes;
        },
        handler = function(e) {
            if (expecting()[0] == (e||window.event).keyCode) {
                expecting().shift();
                if (!expecting().length) {
                    expecting.reset();
                    fn();
                }
            } else { expecting.reset(); }
        };
    window.addEventListener ?
        window.addEventListener('keydown', handler, false)
        : document.attachEvent('onkeydown', handler);
}

onKonamiCode.requireEnterKey = true;
onKonamiCode(function(){
    document.getElementById('konami').style.display='block';
});
