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
                    self._publish('valueChanged', _ui.value);
                },
                stop: function(_e, _ui) {
                    self._publish('slideStop', _ui.value);
                },
                slide: function(_e, _ui) {
                    self._publish('slide', _ui.value);
                }
            });
        },
    
        value: function() {
            if (arguments.length) {
                this.element.slider('option', 'value', atguments[0]);
                this._publish('valueChanged', this.element.slider('option', 'value'));
            } else {
                return this.element.slider('option', 'value');
            }
        }
    })
})(jQuery)