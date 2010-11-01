(function($) {
  $.widget('ui.scalableSet', $.ui.formWidgetBase, {

    options: {
      max_font_size: 20,
      min_font_size: 14,
      set: {},
      min: 0,
      max: 100,
      value: 50
    },

    _create: function() {
      var _e = this.element, _o = this.options, self = this;
      $.ui.formWidgetBase.prototype._create.apply(this, arguments);
      this.value(_o.value);
    },

    _scale: function() {
      var _closest = this._getClosest(),
      _e = this.element,
      _o = this.options,
      _lElement,
      _rElement,
      _lFont,
      _rFont,
      _distance;
      if (!$.isEmptyObject(_o.set) && (this._value !== null)) {
        _lElement = (_o.set[_closest.l] !== undefined)? _o.set[_closest.l] : null;
        _rElement = (_o.set[_closest.r] !== undefined)? _o.set[_closest.r] : null;
        _distance = _closest.r - _closest.l;
        if (_distance) {
          _lFont = _o.max_font_size - parseInt((_o.max_font_size - _o.min_font_size) * ((this._value - _closest.l) / _distance), 10);
          _rFont = _o.max_font_size - parseInt((_o.max_font_size - _o.min_font_size) * ((_closest.r - this._value) / _distance), 10);
          } else _lFont = _rFont = _o.max_font_size;
          if (_lElement) $(_lElement, this.element).css('font-size', _lFont + 'px');
          if (_rElement) $(_rElement, this.element).css('font-size', _rFont + 'px');
        }
      },

      _getClosest: function() {
        var _res = {},
        _o = this.options,
        _minB = _o.min,
        _maxB = _o.max,
        _v = this._value;
        if (_v <= _o.min) _maxB = _o.min;
        else if (_v >= _o.max) _minB = _o.max;
        else if (!$.isEmptyObject(_o.set)) {
          $.each(_o.set, function(_k, _el) {
            if ((_k <= _v) && (_k > _minB)) _minB = _k;
            if ((_k >= _v) && (_k < _maxB)) _maxB = _k;
          })
        }
        return { l: _minB, r: _maxB };
      },

      value: function() {
        if (arguments.length) {
          this._value = arguments[0];
          this._scale();
          this._publish('valueChange', this._value)
        } else {
          return this._value;
        }
      }
    })
})(jQuery)