if(!window._rsz && iFrameResize) {
    function _rsz() {
        var i = iFrameResize({log: true, checkOrigin: false, interval: 100});
    }
    function _r() {
        if(document.readyState !== 'loading') {
            _rsz();
        }
        else {
            document.addEventListener('DOMContentLoaded', _rsz);
        }
    }
    _r();
}