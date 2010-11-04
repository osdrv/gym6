(function($) {
  $.widget('ui.scalable', $.ui.formWidgetBase, {
    
    options: {
      max_font_size: 20,
      min_font_size: 14,
    },
    
    _create: function() {
      var _o = this.options;
      $.ui.formWidgetBase.prototype._create.apply(this, arguments);
      this.scale((_o.scale === undefined)? 0 : _o.scale);
    },
    
    scale: function(_v) {
      if (_v > 1) return;
      var _e = this.element,
      _o = this.options,
      _fSize = _o.min_font_size + (_o.max_font_size - _o.min_font_size) * _v;
      _e.animate({ 'font-size': _fSize + 'px' }, { duration: 1000, queue: false});
    }
  })
})(jQuery)