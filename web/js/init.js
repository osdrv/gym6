function registration() {
    $(function() {
        $('a[href="#"]').click(function(_ev) { _ev.preventDefault() });
        $('#slider_length').scrollbarWidget();
        $('#arms-slider').scrollbarWidget();
        $('#prelum-slider').scrollbarWidget();
        $('#legs-slider').scrollbarWidget();
        $('#flexibility-slider').scrollbarWidget();
        $('#buttocks-slider').scrollbarWidget();
    })
}