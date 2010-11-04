function _stop(_ev) { _ev.preventDefault(); _ev.stopPropagation() }

(function($) {
  $.widget('ui.calendarSet', $.ui.formWidgetBase, {
    
    options: {},
    
    _week: null,
    _months: null,
    _dates: {},
    
    _create: function() {
      var _e = this.element,
      _o = this.options,
      self = this;
      
      $.ui.formWidgetBase.prototype._create.apply(this, arguments);
      this._week = _o.week;
      this._months = _o.months;
      _o.month_days_selector = _o.month_days_selector || 'a';
      _o.week_days_selector = _o.week_days_selector || 'a';
      _o.getItemDate = _o.getItemDate || this._getItemDate;
      
      $(_o.month_days_selector, this._months).click(function(_ev) {
        _stop(_ev);
        this.blur();
        var _enabled = self._toggleDate.call(self, _o.getItemDate.call(self, $(this)));
        if (_enabled) $(this).addClass('active'); else $(this).removeClass('active');
      })
      
      $(_o.week_days_selector, this._week).click(function(_ev) {
        _stop(_ev);
        this.blur();
        self._toggleEveryDay($(this).prevAll(_o.week_days_selector).length);
      })
    },
    
    _toggleDate: function(_date) {
      if (this._dates[_date] !== undefined) {
        delete this._dates[_date];
        return false;
      } else {
        this._dates[_date] = true;
        return true;
      }
    },
    
    _toggleEveryDay: function(_dInWk) {
      
    },
    
    _getItemDate: function(_el) {
      return _el.attr('date');
    }
  })
})(jQuery);