<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            {{ title }}
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <countries-form :item="item" @created="onCreated"></countries-form>
                </div>
                <div class="panel-footer">
                    <crud-back :name="module"></crud-back>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CrudCreate from '../../components/Crud/Create'
    import CountriesForm from './Form.vue'
    import CrudBack from "../../components/Crud/Back.vue";

    export default {
        name: 'CountriesCreate',
        mixins: [CrudCreate],
        components: {
            CrudBack,
            CountriesForm
        }
    }
</script>
