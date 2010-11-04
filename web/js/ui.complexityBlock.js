(function($) {
  $.widget('ui.complexityBlock', $.ui.formWidgetBase, {

    _maxVal: 0,

    _value: null,

    _deaf: false,

    _name: 'complexityBlock',

    options: {
      sliders: {},
      labels: {},
			indicators: {},
      buttonSet: null,
      weight: 20,
      value: 0
    },

    _create: function() {
      var _e = this.element, _o = this.options, self = this;

      $.ui.formWidgetBase.prototype._create.apply(this, arguments);
      
      this.addSubscribeHandler(this, 'valueChange', function(_ev, _v) {
        self._maxVal = _v * _o.weight * $.objectSize(_o.sliders);
        self._deaf = true;
        $.each(_o.sliders, function(_i, _el) { _el.scrollbarWidget('value', _v * _o.weight) })
        self._deaf = false;
      })

      $.each(_o.sliders, function(_i, _el) {
        _el.scrollbarWidget('setName', _i);
				var _labelOnChange = function(_ev, _v) {
					var _multiple = _v / _el.scrollbarWidget('option', 'max');
          this.scale(_multiple);
					_o.indicators[_i].animate({ opacity: _multiple }, { duration: 1000, queue: false });
        }
        _o.labels[_i].scalable('addSubscribeHandler', _el.scrollbarWidget('asPublisher')[0], 'slide', _labelOnChange);
        _o.labels[_i].scalable('addSubscribeHandler', _el.scrollbarWidget('asPublisher')[0], 'valueChange', _labelOnChange);
        self.addSubscribeHandler(_el.scrollbarWidget('asPublisher')[0], 'slideStop', function(_ev, _v) {
          _el.scrollbarWidget('value', self._fade(_v));
        })
        self.addSubscribeHandler(_el.scrollbarWidget('asPublisher')[0], 'slide', function(_ev, _v) {
          if (self._deaf) return;
          var _totalV = self._getSlidersValue(),
          _minVal = self.approximation,
          _delta = _totalV - self._maxVal,
          _clones = $.extend({}, _o.sliders),
          _clonesCount;
          delete _clones[_i];
          _clonesCount = $.objectSize(_clones);
          if (!_clonesCount) return;
          _delta = Math.round(_delta / _clonesCount);
          $.each(_clones, function(_k, _clone) {
            self._deaf = true;
            var _cloneV = _clone.scrollbarWidget('value'),
            _faded = Math.round(self._fade(_cloneV - _delta));
            _clone.scrollbarWidget('value', _faded);
            self._deaf = false;
          })
        })
      })
      
      this.addSubscribeHandler(_o.buttonSet.buttonSet('asPublisher')[0], 'buttonClick', function(_ev, _v) {
        if (_v == self.value()) self._publish('valueChange', _v);
      })
      
      this.addSubscribeHandler(_o.buttonSet.buttonSet('asPublisher')[0], 'valueChange', function(_ev, _v) {
        self.value(parseInt(_v, 10));
      })
      
      this.value(_o.value);
    },

    _approximation: { 0:10, 1:10, 2:10, 3:10, 4:10, 5:11, 6:11, 7:11, 8:12, 9:12, 10:12, 11:13, 12:14, 13:14, 15:16, 16:17, 17:18, 18:18, 19:19, 20:20 },
    //_approximation: { 0:5, 1:5, 2:5, 3:6, 4:6, 5:7, 6:7, 7:8, 8:8 },
    //_approximation: { 0:8, 1:8, 2:8, 3:8, 4:9, 5:9, 6:10, 7:10, 8:11, 9:11, 10:12, 11:12, 12:13, 13:13 },

    _fade: function(_x) {
      _x = (_x > 0)? _x : 0;
      return (this._approximation[_x] !== undefined)? this._approximation[_x] : _x;
    },
    
    _unfade: function(_x) {
      var _a = this._approximation,
      _s = $.objectSize();
      return (_x >= _a[_s - 1])? _x : (function(_v) { var _r = _v; $.each(_a, function(_i, _el) { if (_v == _i) { _r = _el } else if (_v < _i) { return false }}); return _r })(_x);
    },

    _getSlidersValue: function() {
      var _v = 0;
      $.each(this.options.sliders, function(_i, _el) { _v += _el.scrollbarWidget('value') });

      return _v;
    }
  })
})(jQuery)