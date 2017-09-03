<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            {{ store.title }}
                        </div>
                        <div class="col-md-6 text-right">
                            <create-button :name="'users-create'"></create-button>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <countries-form :store="store" :item="item" :module="module" v-if="item.id"></countries-form>
                    <loader v-else>Loading country #{{ id }}</loader>
                </div>
                <div class="panel-footer">
                    <crud-back :name="module"></crud-back>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CrudEdit from '../../components/Crud/Edit'
    import CrudBack from "../../components/Crud/Back.vue";
    import CreateButton from "../../components/Crud/CreateButton.vue";

    import CountriesForm from './Form.vue'

    export default {
        mixins: [CrudEdit],
        components: {CountriesForm, CrudBack, CreateButton},
        data() {
            return {
                module: 'countries'
            }
        }
    }
</script>
