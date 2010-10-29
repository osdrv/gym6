(function() {
    $.widget('ui.scrollbarWidget', $.ui.formWidgetBase, {
    
        _create: function() {
        
            var _e = this.element, _o = this.options, self = this;
            _o.min = (_o.min !== undefined)? _o.min : 0;
            _o.max = (_o.max !== undefined)? _o.max : 100;
            _o.value = (_o.value !== undefined)? _o.value : 50;
            $.ui.formWidgetBase.prototype._create.apply(this, arguments);
            _e.slider({
                value: _o.value,
                min: _o.min,
                max: _o.max,
                start: function(_e, _ui) {
                    self._publish('slideStart', _ui.value);
                },
                change: function(_e, _ui) {
                    self._publish('valueChange', _ui.value);
                },
                stop: function(_e, _ui) {
                    self._publish('slideStop', _ui.value);
                },
                slide: function(_e, _ui) {
                    self._publish('slide', _ui.value);
                },
                animate: (_o.animate !== undefined)? _o.animate : true
            });
        },
        
        setName: function(_n) { this._name = _n },
        
        value: function() {
            if (arguments.length) {
                var _v = this.element.slider('value', arguments[0]);
                this._publish('valueChange', _v);
            } else {
                return this.element.slider('value');
            }
        }
    })
})(jQuery)