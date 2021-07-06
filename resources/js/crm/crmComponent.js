import Vue from "vue";

Vue.component("app-auth-login", require("./Component/Views/Auth/Login").default);

Vue.component(
    "app-submit-button-loader",
    require("./Component/Helpers/SubmitButtonLoader/Loader").default
);

Vue.component(
    "app-top-navbar",
    require("./Component/Views/Includes/TopNavbar").default
);

// Settings
Vue.component(
    "app-setting-layout",
    require("./Component/Views/Settings/Setting").default
);

Vue.component(
    "app-general-settings",
    require("./Component/Views/Settings/GeneralSetting").default
);


// Product
Vue.component('app-product-categories',
    require('./Component/Views/Product/Categories/CategoriesList').default);

Vue.component('app-product-category-modal',
    require('./Component/Views/Product/Categories/ProductCategoryModal').default);
