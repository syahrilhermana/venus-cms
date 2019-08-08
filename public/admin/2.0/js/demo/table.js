/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3 & 4
Version: 4.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.0/admin/
*/

var handleDataTableDefault = function() {
    "use strict";

    if ($('#data-table-default').length !== 0) {
        $('#data-table-default').DataTable({
            responsive: true
        });
    }
};

var handleDataTableAjax = function(url, table) {
    "use strict";
    table = (typeof table !== 'undefined') ? table : 'v-table';

    if ($('#' + table).length !== 0) {
        $('#' + table).DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            deferRender: true,
            scrollY: 500,
            scrollCollapse: true,
            scroller: true,
            colReorder: true,
            rowReorder: true,
            ajax: {
                url: url + handleUrlParameters(),
                type: "get"
            }
        });
    } else {
        table = $('#' + table).DataTable();
        table.cleardraw();
    }
};

var handleUrlParameters = function () {
    var url = window.location.href;
    var param = url.split("?");

    if(param.length > 1)
        return "?" + param[1];
    else
        return "";
};

var handleRedrawTable = function (table) {
    table = (typeof table !== 'undefined') ? table : 'v-table';

    var table = $('#'+table).DataTable();
    table.draw(false);
};

var DrawTable = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableDefault();
        },
        ajax: function (url, table) {
            handleDataTableAjax(url, table);
        },
        redraw: function (table) {
            handleRedrawTable(table);
        }
    };
}();