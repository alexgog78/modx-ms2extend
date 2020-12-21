'use strict';

ms2Extend.localGrid = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        fields: [],
        columns: [],
        editWindow: {},

        //Core settings
        deferredRender: true,
        autoHeight: true,
        anchor: '100%',
    });
    ms2Extend.localGrid.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.localGrid, MODx.grid.LocalGrid, {
    _recordEditWindow: null,

    initComponent: function () {
        this.columns = this._getGridColumns();
        this.tbar = this.getToolbar();
        ms2Extend.localGrid.superclass.initComponent.call(this);
    },

    getToolbar: function () {
        return [
            this.getCreateButton(),
        ];
    },

    getMenu: function () {
        return [{
            text: _('edit'),
            handler: this._updateRecord,
            scope: this
        }, '-', {
            text: _('delete'),
            handler: this._removeRecord,
            scope: this
        }];
    },

    getCreateButton: function (config = {}) {
        return Ext.applyIf(config, {
            text: _('add'),
            cls: 'primary-button',
            handler: this._createRecord,
            scope: this
        });
    },

    getGridColumn: function (name, config = {}) {
        return ms2Extend.component.gridColumn(name, config);
    },

    _getGridColumns: function () {
        if (this.config.columns.length > 0) {
            return this.config.columns;
        }
        Ext.each(this.config.fields, function (field) {
            this.config.columns.push(this.getGridColumn(field));
        }, this);
        return this.config.columns;
    },

    _createRecord: function (btn, e) {
        if (this._recordEditWindow) {
            this._recordEditWindow.close();
        }
        let window = Ext.apply({
            title: _('create'),
            grid: this,
            listeners: {
                success: {
                    fn: this.refresh
                    , scope: this
                }
            }
        }, this.editWindow);
        this._recordEditWindow = new MODx.load(window);
        this._recordEditWindow.show(e.target);
    },

    _updateRecord: function (btn, e) {
        if (this._recordEditWindow) {
            this._recordEditWindow.close();
        }
        let window = Ext.apply({
            title: _('update'),
            grid: this,
            record: this.menu.record,
            listeners: {
                success: {
                    fn: this.refresh
                    , scope: this
                }
            }
        }, this.editWindow);
        this._recordEditWindow = new MODx.load(window);
        this._recordEditWindow.show(e.target);
    },

    _removeRecord: function () {
        let key = this.menu.record.key
        let store = this.getStore()
        let idx = store.find('key', key);
        store.removeAt(idx);
    },
});
