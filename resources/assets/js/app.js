/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/* local packages */
require('./bootstrap');
import {messages, dt_es} from './es';

/* imported packages */
window.metisMenu = require('metisMenu');
window.moment = require('moment');
import VeeValidate, { Validator } from 'vee-validate';
import dt from 'datatables.net';
import dbs from 'datatables.net-bs';

require('./sb-admin-2');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
*/ 

//Vue.component('example', require('./components/Example.vue'));

// Merge the locales.
Validator.updateDictionary({
    es: {
        messages
    }
});

var dataTableLang = {
	es: dt_es
}


$(document).ready(function() {
	var lang = $('html').attr('lang');

	Vue.use(VeeValidate, {locale: lang});

	var dt = $('#students-table').DataTable({
		"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
		"language": dataTableLang[lang]
	});

	dt.on( 'order.dt search.dt', function () {
        dt.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});