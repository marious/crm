<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <app-breadcrumb
                    :page-title="$t('product_categories')"
                    :directory="[$t('contact'), $t('contact_type')]"
                    :icon="'clipboard'"/>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="float-md-right mb-3 mb-sm-3 mb-md-0">
                    <a class="btn btn-primary btn-with-shadow" href="/product/create">
                        {{ $t('create_product') }}
                    </a>
                </div>
            </div>
        </div><!-- ./row -->



    </div>
</template>

<script>
export default {
    name: "ProductsList"
}
</script>

<style scoped>

</style>
