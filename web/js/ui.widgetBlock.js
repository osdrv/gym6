$.widget('ui.widgetBlock', $.extend({}, $.ui.formWidgetBase.prototype, {
	
	_widgets: null,
	
	_name: null,
	
	_enabled: true,
	
	_create: function() {
		
		var _e = this.element, _o = this.options, self = this;
		this._widgets = new Object();
		$.ui.formWidgetBase.prototype._create.apply(this, arguments);
		
		this._widgets = _o.widgets || this._widgets;
		_o.hide = _o.hide || function() { _e.hide() };
		_o.show = _o.show || function() { _e.show() };
		_o.onStateChange = _o.onStateChange || function(_ev, _v) { return ('enabled' == _v)? _o.show() : _o.hide() }
		this._name = _o.name || '';
		if (_o.widgets) {
		
			$.each(_o.widgets, function (_n, _w) {
				
				self.addWidget(_n, _w);
			});
		}
		this.enabled((_o.enabled === undefined) ? (_e.filter(':visible').length > 0) : _o.enabled);
		this.addSubscribeHandler(this, 'stateChange', _o.onStateChange);
	},
	
	addWidget: function(_n, _w) {
		
		if (_w === undefined) {
		
			var _w = _n;
			_n = _w._name
		}
		
		var self = this;
		
		this._widgets[_n] = _w;
		
		this.addSubscribeHandler(_w, '*', function(_ev, _v) { if (self.enabled()) self._publish(_w._name + '.' + _ev, _v) });
	},
	
	getWidget: function(_name) {
		
		return (this._widgets[_name] !== undefined) ? this._widgets[_name] : null;
	},
	
	value: function() {
		
		var self = this;
		
		if (!self.enabled()) return -1;
		
		if (arguments.length && !$.isEmptyObject(arguments[0])) {
			
			$.each(arguments[0], function(_key, _data) {
				
				if (self._widgets[_key] !== undefined) {
					
					var _value = (_data['v'] !== undefined) ? _data['v'] : _data,
					_label = (_data['l'] !== undefined) ? _data['l'] : _data;
					self._widgets[_key].setValue(_value, _label);
				}
			});
			
			self._publish('valueChange', self.value());
			
			return this.element;
		}
		
		var _value = {};
		
		$.each(self._widgets, function (_i, _w) {
			
			_value[_w._name] = _w.value();
		});
		
		return _value;
	},
	
	enabled: function() {
		
		if (arguments.length) {
			
			if (this._enabled != arguments[0]) {
				
				this._enabled = arguments[0];
				
				$.each(this._widgets, function(_name, _w) {
					_w.enabled(this._enabled);
				});
				
				this._publish('stateChange', this._enabled ? 'enabled' : 'disabled');
			}
			
			return this.element;
		} else {
		
			return this._enabled;
		}
	}
}));