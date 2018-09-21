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
                    <users-form :item="item" @created="onCreated"></users-form>
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
    import UsersForm from './Form.vue'
    import CrudBack from "../../components/Crud/Back.vue";

    export default {
        name: 'UsersCreate',
        mixins: [CrudCreate],
        components: {
            CrudBack,
            UsersForm
        },
        mounted() {
            this.tmpItem = JSON.parse(JSON.stringify(this.item));
        },
        data() {
            return {
                item: {
                    id: null,
                    email: '',
                    password: '',
                    name: '',
                    country: null,
                    role: null
                },
                tmpItem: {}
            }
        },
        methods: {
            onCreated() {
                // Set default value
                this.item = JSON.parse(JSON.stringify(this.tmpItem));
            }
        }
    }
</script>
