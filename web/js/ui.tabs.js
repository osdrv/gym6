;(function($) {
  $.widget('ui.stupidtabs', {
    
    options: {},
    
    name: 'tabs',
    
    _create: function() {
      var _e = this.element, _o = this.options, self = this, _tabs;
      publisher(this);
      subscriber(this);
      _o.activeClass = _o.activeClass || 'active';
      _o.getVal = _o.getVal || function(_tab) { return _tab.attr('name') }
      _o.getTabs = _o.getTabs || function() { return _e.find('a') };
      _o.onTabClick = _o.onTabClick || function (_ev) {
        _stop(_ev);
        this.blur();
        _tabs.removeClass(_o.activeClass);
        $(this).addClass(_o.activeClass);
        self._publish('tabSelect', _o.getVal.call(self, $(this)))
      }
      _tabs = _o.getTabs.call(this).click(_o.onTabClick)
    },
    
    asPublisher: function() {
  		return [this];
  	},
  	
  	selectTab: function(_t) {
  	  var self = this;
  	  this.options.getTabs.call(this).each(function(_i, _el) { if (self.options.getVal.call(self, $(_el)) == _t) $(_el).trigger('click') })
  	}
  })
})(jQuery);
