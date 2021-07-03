import "./bootstrap";
import "./plugins";
import Vue from "vue";
import vuexI18n from "vuex-i18n";
import moment from "moment";
import "./core/coreApp";
import "./crm/crmComponent";
import "./crm/Helpers/helpers";
import crmVuexStore from "./crm/Store";


window.moment = moment;
window.Vue = Vue;

// for working with subfolder
window.axios.defaults.baseURL = window.localStorage.getItem('base_url') !=="" ? window.localStorage.getItem('base_url') : window.location.origin;


Vue.use(vuexI18n.plugin, crmVuexStore);
let language = JSON.parse(window.localStorage.getItem("app-languages"));
let key = window.localStorage.getItem("app-language");
Vue.i18n.add(key, language);
// set the start locale to use
Vue.i18n.set(key);

const app = new Vue({
    store: crmVuexStore,
    el: "#app",
});

window.axios.interceptors.response.use(
    function(response) {
        return response;
    },
    function(error) {
        const code = error.response.status;
        if (401 === code) {
            swal(error.response, code === 401);
        }
        // if (403 === code) {
        //     app.$toastr.e(error.response.data.message);
        //   }
        if (419 === code) {
            app.$toastr.e(error.response.data.message);
        }
        if (424 === code) {
            app.$toastr.e(error.response.data.message);
        }
        if (code > 499) {
            app.$toastr.e(error.response.data.message);
        } else {
            return Promise.reject(error);
        }
    }
);

function swal(response, showConfirm = true) {
    Swal.fire({
        title: "Error!!",
        text: response.data.message,
        showCancelButton: true,
        showConfirmButton: showConfirm,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Login",
        imageWidth: 100,
        imageHeight: 70,
        imageAlt: "Error",
    }).then(function(response) {
        if (!response.dismiss) {
            window.location.replace(window.location.origin + "/admin/users/login");
        }
    });
}

