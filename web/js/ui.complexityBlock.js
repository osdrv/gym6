(function($) {
    $.widget('ui.complexityBlock', $.ui.formWidgetBase, {
        
        _maxVal: 0,
        
        _value: null,
        
        _deaf: false,
        
        _name: 'complexityBlock',
        
        options: {
            sliders: {},
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
                self.addSubscribeHandler(_el.scrollbarWidget('asPublisher')[0], 'valueChange', function(_ev, _v) {
                    if (self._deaf) return;
                    var _totalV = self._getSlidersValue(), _delta = _totalV - self._maxVal, _clones;
                    _clones = $.extend({}, _o.sliders);
                    delete _clones[_i];
                    if (!$.objectSize(_clones)) return;
                    _delta = Math.round(_delta / $.objectSize(_clones));
                    $.each(_clones, function(_k, _clone) {
                        self._deaf = true;
                        var _cloneV = _clone.scrollbarWidget('value');
                        _clone.scrollbarWidget('value', _cloneV - _delta);
                        self._deaf = false;
                    })
                })
            })
            
            _o.buttonSet.buttonSet('setName', 'buttons');
            this.addSubscribeHandler(_o.buttonSet.buttonSet('asPublisher')[0], 'valueChange', function(_ev, _v) {
                self.value(parseInt(_v, 10));
            })
            
            this.value(_o.value);
        },
        
        _getSlidersValue: function() {
            var _v = 0;
            $.each(this.options.sliders, function(_i, _el) { _v += _el.scrollbarWidget('value') });
            
            return _v;
        }
    })
})(jQuery)