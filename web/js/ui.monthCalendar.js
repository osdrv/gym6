;(function($) {
  $.widget('ui.monthCalendar', $.ui.buttonSet, {
    
    options: {
      multiple: true,
      getButtons: function() {return this.element.find('a') },
      getVal: function(_el) { return _el.attr('date') }
    },
    
    _frozen: false,
    
    _create: function() {
      var _e = this.element, _o = this.options, self = this;
      $.ui.buttonSet.prototype._create.apply(this, arguments);
      _o.getMonths = _o.getMonths || self._getMonths;
      this.removeSubscribeHandler(this, 'valueChange');
      this._buttons.unbind().click(function(_ev) {
        _ev.preventDefault();
        this.blur();
        var _val = _o.getVal.call(self, $(this)),
        _dayOfWeek,
        _dayEnabled;
        if (self._hasValue(_val)) self._removeValue(_val); else self._addValue(_val);
        _dayOfWeek = $(this).parent().attr('day');
        _dayEnabled = ($(this).parent().children().filter('.' + _o.selectedClass).length != 0);
        self._publish('buttonClick', _val);
        self._frozen = true;
        self._publish('dayOfWeekTrack', { day: _dayOfWeek, enabled: _dayEnabled });
        self._frozen = false;
      });
      this.addSubscribeHandler(this, 'valueChange', function(_ev, _v) {
        this._buttons.removeClass(_o.selectedClass).each(function(_i, _el) {
          if (self._hasValue(_o.getVal.call(self, $(_el)))) $(_el).addClass(_o.selectedClass); else $(_el).removeClass(_o.selectedClass);
        })
      })
    },
    
    _getMonths: function() { return this.element.find('div.month') },
    
    selectDays: function(_v) {
      if (this._frozen) return;
      var _o = this.options,
      _m = _o.getMonths.call(this),
      _val = [],
      self = this;
      _m.each(function(_i, _el) {
        $.each(_v, function(_k, _index) {
          var _as = _m.children('div[day="' + _index + '"]').children('a'),
          _selected = _as.filter('.' + _o.selectedClass);
          if (_selected.length) _as = _selected;
          _as.each(function(_j, _a) {
            _val.push(_o.getVal.call(self, $(_a)));
          })
        })
      });
      this.value(_val);
    },
    
  })
})(jQuery);