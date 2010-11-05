(function($) {
  $.widget('ui.buttonSet', $.ui.formWidgetBase, {

    _buttons: {},

    options: {},

    _create: function() {
      var _e = this.element, _o = this.options, self = this;
      this._enabled = true;
      $.ui.formWidgetBase.prototype._create.apply(this, arguments);
      _o.selectedClass = _o.selectedClass || 'select';
      _o.multiple = (_o.multiple !== undefined)? _o.multiple : false;
      _o.getVal = _o.getVal || self._getVal;
      if (_o.multiple && (!$.isArray(_o.value) || (_o.value === undefined))) _o.value = (_o.value === undefined)? [] : [_o.value];
      _o.getButtons = _o.getButtons || this._getButtons;
      this._buttons = _o.getButtons.call(this);
      this._buttons.click(function() {
        this.blur();
        var _val = _o.getVal.call(self, $(this));
        self._publish('buttonClick', _val);
        if (!_o.multiple) {
          self.value(_val);
        } else {
          if (self._hasValue(_val)) self._removeValue(_val); else self._addValue(_val);
        }
      })
      
      this.addSubscribeHandler(this, 'valueChange', function(_ev, _v) {
        if (!_o.multiple) {
          this._buttons.removeClass(_o.selectedClass).each(function(_i, _el) {
            if (_v == self._getVal($(_el))) {
              $(_el).addClass(_o.selectedClass);
              return false;
            }
          })
        } else {
          this._buttons.removeClass(_o.selectedClass).each(function(_i, _el) {
            if (self._hasValue(_o.getVal.call(self, $(_el)))) $(_el).addClass(_o.selectedClass); else $(_el).removeClass(_o.selectedClass);
          })
        }
      })
      
      this.value(_o.value);
    },

    _getButtons: function() { return this.element.children('a') },

    _getVal: function(_child) { return _child.attr('value') },

    _hasValue: function(_v) { return -1 !== $.inArray(_v, this._value) },

    _addValue: function(_v) {
      var _val = $.extend([], this.value());
      if (!this._hasValue(_v)) { _val.push(_v); this.value(_val); }
    },

    _removeValue: function(_v) { var _val = $.extend([], this.value()), _i = $.inArray(_v, _val); if (-1 !== _i) { _val.splice(_i, 1); this.value(_val) } },

    setName: function(_n) { this._name = _n }
  })
})(jQuery)