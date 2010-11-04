$.objectSize=function(o){var c=0;for(i in o)c++;return c}

function registration() {
  $(function() {
    $('a[href="#"]').click(function(_ev) { _ev.preventDefault() });

    var _lengthInput = $('#data_length'),
    _complexityInput = $('#data_complexity'),
    _lengthSlider = $('#slider_length').scrollbarWidget({ value: _lengthInput.val(), min: 5 }),
    _ss = $('#scalable-set').scalableSet({
      set: {
        10: 'span:eq(0)',
        35: 'span:eq(1)',
        50: 'span:eq(2)',
        80: 'span:eq(3)'
      }
      }),
      _s1 = new Subscriber(),
      _armsSlider = $('#arms-slider').scrollbarWidget(),
      _armsLabel = $('#arms-slider span').scalable(),
      _prelumSlider = $('#prelum-slider').scrollbarWidget(),
      _prelumLabel = $('#prelum-slider span').scalable(),
      _legsSlider = $('#legs-slider').scrollbarWidget(),
      _legsLabel = $('#legs-slider span').scalable(),
      _flexibilitySlider = $('#flexibility-slider').scrollbarWidget(),
      _flexibilityLabel = $('#flexibility-slider span').scalable(),
      _buttocksSlider = $('#buttocks-slider').scrollbarWidget(),
      _buttocksLabel = $('#buttocks-slider span').scalable(),
      _complexityButtonSet = $('#complexity-set').buttonSet({ value: _complexityInput.val(), name: 'buttons' }),
      _complexityBlock = $('#reg_setting').complexityBlock({
        sliders: {
          arms: _armsSlider,
          prelum: _prelumSlider,
          legs: _legsSlider,
          flexibility: _flexibilitySlider,
          buttocks: _buttocksSlider
        },
        labels: {
          arms: _armsLabel,
          prelum: _prelumLabel,
          legs: _legsLabel,
          flexibility: _flexibilityLabel,
          buttocks: _buttocksLabel
        },
				indicators: {
					arms: $('#indicator-arms'),
          prelum: $('#indicator-prelum'),
          legs: $('#indicator-legs'),
          flexibility: $('#indicator-flexibility'),
          buttocks: $('#indicator-buttocks')
				},
        buttonSet: _complexityButtonSet,
        value: $('#data_complexity').val()
      })

      _ss.scalableSet('addSubscribeHandler', _lengthSlider.scrollbarWidget('asPublisher')[0], 'slide', function(_ev, _v) { this.value(_v) });
      _s1.addSubscribeHandler(_lengthSlider.scrollbarWidget('asPublisher')[0], 'valueChange', function(_ev, _v) { _lengthInput.val(_v) })
    })
  }