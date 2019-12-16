miniShop2.plugin.ms2extend = {
    //Product form
    getFields: function (config) {
        return {
            proteins: {xtype: 'numberfield', decimalPrecision: 2, description: '<b>[[+proteins]]</b>'},
            fats: {xtype: 'numberfield', decimalPrecision: 2, description: '<b>[[+fats]]</b>'},
            carbohydrates: {xtype: 'numberfield', decimalPrecision: 2, description: '<b>[[+carbohydrates]]</b>'},
            calories: {xtype: 'numberfield', decimalPrecision: 2, description: '<b>[[+calories]]</b>'},
        }
    },

    //Products grid
    getColumns: function () {
        return {
            proteins: {width: 50, sortable: false, decimalPrecision: 2, editor: {xtype: 'numberfield', name: 'proteins'}},
            fats: {width: 50, sortable: false, decimalPrecision: 2, editor: {xtype: 'numberfield', name: 'fats'}},
            carbohydrates: {width: 50, sortable: false, decimalPrecision: 2, editor: {xtype: 'numberfield', name: 'carbohydrates'}},
            calories: {width: 50, sortable: false, decimalPrecision: 2, editor: {xtype: 'numberfield', name: 'calories'}},
        }
    }
};
