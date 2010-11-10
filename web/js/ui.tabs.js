;(function($) {
  $.widget('ui.tabs', $.ui.formWidgetBase, {
    
    _create: function() {
      var _e = this.element, _o = this.options, self = this;
      $.ui.formWidgetBase.prototype._create.apply(this, arguments);
      this.element.click(function(_ev) {
        _ev.preventDefault();
        var _tgt = $(_ev.target),
        _txt = _tgt.text();
        if (_tgt.filter('a').length) {
          _tgt.replaceWith(_o.template.selected.replace('%s', _txt));
          _tgt.prevAll().add(_tgt.nextAll()).each(function(_i, _el) {
            _el.replaceWith(_o.template.active.replace('%s', _txt));
          })
        }
      })
    },
    
    selectTab: function(_t) {
      
    }
  })
})(jQuery);