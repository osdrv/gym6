$.widget('ui.formBase', {
	
	_name: 'form',
	_action: null,
	
	_widgets: null,
	_object_id: null,
	
	_create: function() {
		publisher(this);
		subscriber(this);
		this._widgets = new Object();
		this._action = this.options.action || this.element.attr('action');
		this._object_id = Math.random();
	},
	
	addWidget: function(_widget) {
		
		var self = this;
		this._widgets[_widget._name] = _widget;
		
		this.addSubscribeHandler(_widget, '*', function(_event, _value) {
			
			self._publish(_widget._name + '.' + _event, _value);
			self._publish('valueChange', self.value())
		});
	},
	
	getWidget: function(_name) {
		
		return (this._widgets[_name] !== undefined) ? this._widgets[_name] : null;
	},
	
	asPublisher: function() {
		
		return this;
	},
	
	value: function() {
		
		var _data = {};
		
		$.each(this._widgets, function(_name, _widget) {
			var _n = _widget._name, _v = _widget.value();
			if (_v != -1) {
				_data[_n] = _v;
			}
		});
		
		return _data;
	},
	
	submit: function() { this._publish('submited', this.value()) }
});
