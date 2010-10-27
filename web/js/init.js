function registration() {
    $(function() {
        $('a[href="#"]').click(function(_ev) { _ev.preventDefault() });
        
        var _lengthInput = $('#data_length'),
        _lengthSlider = $('#slider_length').scrollbarWidget({ value: _lengthInput.val() }),
        _ss = $('#scalable-set').scalableSet({
            set: {
                10: 'span:eq(0)',
                35: 'span:eq(1)',
                50: 'span:eq(2)',
                80: 'span:eq(3)'
            }
        }),
        _subscriber = new Subscriber();
        $('#arms-slider').scrollbarWidget();
        $('#prelum-slider').scrollbarWidget();
        $('#legs-slider').scrollbarWidget();
        $('#flexibility-slider').scrollbarWidget();
        $('#buttocks-slider').scrollbarWidget();
        _ss.scalableSet('addSubscribeHandler', _lengthSlider.scrollbarWidget('asPublisher')[0], 'slide', function(_ev, _v) { this.value(_v) });
        _subscriber.addSubscribeHandler(_lengthSlider.scrollbarWidget('asPublisher')[0], 'valueChanged', function(_ev, _v) { _lengthInput.val(_v) })
        
    })
}