<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            {{ title }}
                        </div>
                        <div class="col-md-6 text-right">
                            <create-button :name="module+'-create'"></create-button>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <users-form :item="item" v-if="item.id"></users-form>
                    <loader v-else>Loading user #{{ id }}</loader>
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

    import UsersForm from './Form.vue'

    export default {
        mixins: [CrudEdit],
        components: {UsersForm, CrudBack, CreateButton}
    }
</script>
