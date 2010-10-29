(function($) {
    $.widget('ui.buttonSet', $.ui.formWidgetBase, {
        
        _buttons: {},
        
        options: {},
        
        _create: function() {
            var _e = this.element, _o = this.options, self = this;
            $.ui.formWidgetBase.prototype._create.apply(this, arguments);
            _o.selectedClass = _o.selectedClass || 'selected';
            _o.multiple = (_o.multiple !== undefined)? _o.multiple : false;
            if (_o.multiple && (!$.isArray(_o.value) || (_o.value !== undefined))) _o.value = (_o.value === undefined)? [] : [_o.value];
            this.value(_o.value);
            this._buttons = (_o.getButtons !== undefined)? _o.getButtons() : this._getButtons();
            this._buttons.click(function() { 
                this.blur();
                var _val = (_o.getVal !== undefined)? _o.getVal($(this)) : self._getVal($(this));
                if (!_o.multiple) {
                    self.value(_val);
                    self._buttons.removeClass(_o.selectedClass);
                    $(this).addClass(_o.selectedClass);
                } else {
                    if (self._hasValue(_val)) {
                        self._removeValue(_val);
                        $(this).removeClass(_o.selectedClass);
                    } else {
                        self._addValue(_val);
                        $(this).addClass(_o.selectedClass);
                    }
                }
            })
        },
        
        _getButtons: function() { return this.element.children('a') },
        
        _getVal: function(_child) { return _child.attr('value') },
        
        _hasValue: function(_v) { return -1 !== $.inArray(_v, this._value) },
        
        _addValue: function(_v) { if (!this._hasValue(_v)) this.value(this.value().push(_v)) },
        
        _removeValue: function(_v) { var _val = this.value(), _i = $.inArray(_v, _val); if (-1 !== _i) { delete _val[_i]; this.value(_val) } },
        
        setName: function(_n) { this._name = _n }
    })
})(jQuery)