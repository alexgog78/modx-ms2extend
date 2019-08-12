Ext.apply(ms2Extend.function, {
    //Создание записи
    /*createRecord: function (btn, e) {
        var options = btn.baseParams;

        console.log(this);
        console.log(this.config.namespace);
        console.log(111);
        //var name = Ext.app.Application.instance.getName();
        //console.log(name);
        //var name = Ext.getApplication().getName();
        //console.log(name);


        var window = new abstractModule.window.record({
            title: _(this.config.namespace + '.controls.create'),
            url: this.config.url,
            baseParams: {
                action: options.action
            },
            fields: options.fields,
            _this: this
        });
        console.log(window);
        window.fp.getForm().reset().setValues(options.defaults);
        window.show(e.target);
    },*/


    //Обновление записи
    /*updateRecord: function (btn, e) {
        var options = btn.options.baseParams;
        var window = new ms2Extend.window.record({
            title: _(this.config.namespace + '.controls.update'),
            url: this.config.url,
            baseParams: {
                action: options.action
            },
            fields: options.fields,
            _this: this
        });
        window.fp.getForm().reset();
        window.fp.getForm().setValues(this.menu.record);
        window.show(e.target);
    },*/


    //Удаление записи
    removeRecord: function (btn, e) {
        var options = btn.options.baseParams;

        MODx.msg.confirm({
            title: _('ms2extend.controls.remove'),
            text: _('ms2extend.controls.remove_confirm'),
            url: this.config.url,
            params: {
                action: options.action,
                id: options.record != undefined ? options.record : this.menu.record.id
            },
            listeners: {
                success: {
                    fn: function (r) {
                        if (options.redirect) {
                            MODx.loadPage(options.redirect, 'namespace=ms2extend');
                        } else {
                            this.refresh();
                        }
                    }, scope: this
                }
            }
        });
    }
});