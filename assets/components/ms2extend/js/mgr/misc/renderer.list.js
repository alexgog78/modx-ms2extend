Ext.apply(ms2Extend.renderer, {
    tabFields: function(value, cell, row) {
        var rawValue = [];
        Ext.each(value, function(field) {
            rawValue.push(field.field);
        });
        return rawValue.join(',');
    }
});