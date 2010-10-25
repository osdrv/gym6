function registration() {
    $(function() {
        //$('.slider').slider({value:50});
        $('a[href="#"]').click(function(_ev) { _ev.preventDefault() });
        $('#slider_length').scrollbarWidget();
    })
}