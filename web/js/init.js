$.objectSize=function(o){var c=0;for(i in o)c++;return c}

if (!Array.indexOf) {
  Array.prototype.indexOf = function(obj) {
    for (var i=0; i < this.length; i++) {
      if (this[i] == obj) {
        return i;
      }
    }
    return -1;
  }
}

function _stop(_ev) { _ev.preventDefault(); _ev.stopPropagation() }

function registration() {
  $(function() {
    $('a[href="#"]').click(function(_ev) { _ev.preventDefault() });

    var _lengthInput = $('#data_length'),
    _complexityInput = $('#data_complexity'),
    _lengthSlider = $('#slider_length').scrollbarWidget({ value: _lengthInput.val(), min: 5 }),
    _ss = $('#scalable-set').scalableSet({ set: { 10: 'span:eq(0)', 35: 'span:eq(1)', 50: 'span:eq(2)', 80: 'span:eq(3)' } }),
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
    _weekSelectorButtonSet = $('#week-date-selector').buttonSet({ value: [], name: 'week', multiple: true }),
    _monthsButtonSet = $('#month-date-selector').monthCalendar({ value: [], name: 'months' }),
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
      inputs: {
        arms: $('#data_arms'),
        prelum: $('#data_prelum'),
        legs: $('#data_legs'),
        flexibility: $('#data_flexibility'),
        buttocks: $('#data_buttocks')
      },
      buttonSet: _complexityButtonSet,
      value_holder: $('#data_complexity')
    });
    _s1._name = 'subscriber1';

    _ss.scalableSet('addSubscribeHandler', _lengthSlider.scrollbarWidget('asPublisher')[0], 'slide', function(_ev, _v) { this.value(_v) });
    _s1.addSubscribeHandler(_lengthSlider.scrollbarWidget('asPublisher')[0], 'valueChange', function(_ev, _v) { _lengthInput.val(_v) });
    _weekSelectorButtonSet.buttonSet('addSubscribeHandler', _monthsButtonSet.monthCalendar('asPublisher')[0], 'dayOfWeekTrack', function(_ev, _v) {
      if (_v.enabled) {
        this._addValue(_v.day);
      } else {
        this._removeValue(_v.day);
      }
    });
    _monthsButtonSet.monthCalendar('addSubscribeHandler', _weekSelectorButtonSet.buttonSet('asPublisher')[0], 'valueChange', function(_ev, _v) { this.selectDays(_v) });
    _s1.addSubscribeHandler(_monthsButtonSet.monthCalendar('asPublisher')[0], 'valueChange', function(_ev, _v) {
      $('#data_dates').val(_v.join(','))
    });
  })
}
