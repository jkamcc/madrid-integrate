/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.metisMenu = require('metisMenu');

window.moment = require('moment');
import messages from './es';
import VeeValidate, { Validator } from 'vee-validate';

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

Vue.use(VeeValidate, {locale: 'es'});

const app = new Vue({
    el: 'form#create-student',
    methods: {
    	validateBeforeSubmit(e) {    		
    		this.$validator.validateAll().then(success => {
                console.info(e);
                if (! success) {
                    // handle error
                    return;
                }
                e.currentTarget.submit();
            });
    	}
    }    
});


