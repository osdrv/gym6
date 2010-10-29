$.objectSize=function(o){var c=0;for(i in o)c++;return c}

function registration() {
    $(function() {
        $('a[href="#"]').click(function(_ev) { _ev.preventDefault() });
        
        var _lengthInput = $('#data_length'),
        _complexityInput = $('#data_complexity'),
        _lengthSlider = $('#slider_length').scrollbarWidget({ value: _lengthInput.val() }),
        _ss = $('#scalable-set').scalableSet({
            set: {
                10: 'span:eq(0)',
                35: 'span:eq(1)',
                50: 'span:eq(2)',
                80: 'span:eq(3)'
            }
        }),
        _s1 = new Subscriber(),
        //_s2 = new Subscriber(),
        _armsSlider = $('#arms-slider').scrollbarWidget(),
        _prelumSlider = $('#prelum-slider').scrollbarWidget(),
        _legsSlider = $('#legs-slider').scrollbarWidget(),
        _flexibilitySlider = $('#flexibility-slider').scrollbarWidget(),
        _buttocksSlider = $('#buttocks-slider').scrollbarWidget(),
        _complexityButtonSet = $('#complexity-set').buttonSet({ value: _complexityInput.val()}),
        _complexityBlock = $('#reg_setting').complexityBlock({
            sliders: {
                arms: _armsSlider,
                prelum: _prelumSlider,
                legs: _legsSlider,
                flexibility: _flexibilitySlider,
                buttocks: _buttocksSlider
            },
            buttonSet: _complexityButtonSet,
            value: $('#data_complexity').val()
        })
        
        _ss.scalableSet('addSubscribeHandler', _lengthSlider.scrollbarWidget('asPublisher')[0], 'slide', function(_ev, _v) { this.value(_v) });
        _s1.addSubscribeHandler(_lengthSlider.scrollbarWidget('asPublisher')[0], 'valueChange', function(_ev, _v) { _lengthInput.val(_v) })
        
        
        
        // _s2.addSubscribeHandler(_complexitySet.buttonSet('asPublisher')[0], 'valueChange', function(_ev, _v) {
        //             _complexityInput.val(_v);
        //             _armsSlider.scrollbarWidget('value', _complexityWeight * _v);
        //             _prelumSlider.scrollbarWidget('value', _complexityWeight * _v);
        //             _legsSlider.scrollbarWidget('value', _complexityWeight * _v);
        //             _flexibilitySlider.scrollbarWidget('value', _complexityWeight * _v);
        //             _buttocksSlider.scrollbarWidget('value', _complexityWeight * _v);
        //         })
    })
}