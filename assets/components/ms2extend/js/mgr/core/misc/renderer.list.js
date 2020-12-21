'use strict';

ms2Extend.renderer = {
    boolean: function (value, cell, row) {
        switch (value) {
            case 0:
            case '0':
            case false:
                cell.css = 'red';
                return _('no');
                break;
            case 1:
            case '1':
            case true:
                cell.css = 'green';
                return _('yes');
                break;
            default:
                return '-';
                break;
        }
    },

    image: function (value, cell, row) {
        cell.css = 'grid-image';
        if (!/(jpg|png|gif|jpeg)$/i.test(value)) {
            value = ms2Extend.config.cssUrl + 'mgr/core/no-photo.png';
        }
        var src = MODx.config.connectors_url + 'system/phpthumb.php?src=' + value + '&w=70&h=35&zx=1&f=png&bg=ffffff';
        value = '<img src="' + src + '" alt="">';
        return value;
    },

    color: function (value, cell, row) {
        return '<div style="width: 30px; height: 20px; border-radius: 3px; background: #' + value + '">&nbsp;</div>';
    },

    user: function (value, cell, row) {
        if (!value) {
            return '';
        }
        var id = row.get('user_id');
        if (!id) {
            return value;
        }
        return String.format(
            '<a href="?a=security/user/update&id={0}" target="_blank">{1}</a>',
            id,
            value
        );
    },
};
