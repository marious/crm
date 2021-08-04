<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <app-breadcrumb :page-title="$t('add_product')"
                                :button="{label: $t('back')}"/>
            </div>
        </div>
        <form ref="form">
            <div class="card border-0 card-with-shadow">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-9 col-xl-9">
                            <div class="form-group row">
                                <div class="col-lg-3 col-xl-3 d-flex align-items center">
                                    <label for="product_name" class="mb-lg-0">{{ $t('name') }}</label>
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <div>
                                        <app-input
                                            id="product_name"
                                            :placeholder="$t('enter_name')"
                                            name="name"
                                            v-model="formData.title"
                                            :required="true"
                                            :error-message="$errorMessage(errors, 'name')"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- ./form-group -->

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-12"></div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {FormSubmitMixin} from "../../../../Mixins/Global/FormSubmitMixin";

export default {
    name: "create",
    mixins: [FormSubmitMixin],
    data() {
        return {
            formData: {}
        }
    }
}
</script>

<style scoped>

</style>
