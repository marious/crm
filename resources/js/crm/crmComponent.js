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
Vue.component('app-products',
        require('./Component/Views/Product/Products/ProductsList').default);

Vue.component('create-product',
    require('./Component/Views/Product/Products/Create').default);

Vue.component('app-product-categories',
    require('./Component/Views/Product/Categories/CategoriesList').default);

Vue.component('app-product-category-modal',
    require('./Component/Views/Product/Categories/ProductCategoryModal').default);

Vue.component('app-product-brands',
    require('./Component/Views/Product/Brands/BrandsList').default);

Vue.component('app-product-brand-modal',
    require('./Component/Views/Product/Brands/ProductBrandModal').default);

Vue.component('app-product-units',
    require('./Component/Views/Product/Units/UnitsList').default);

Vue.component('app-product-unit-modal',
    require('./Component/Views/Product/Units/ProductUnitModal').default);

Vue.component('app-product-attributes',
    require('./Component/Views/Product/Attributes/AttributesList').default);

Vue.component('app-product-attribute-modal',
    require('./Component/Views/Product/Attributes/ProductAttributeModal').default);
