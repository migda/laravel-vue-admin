<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            {{ store.title }}
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <users-form :store="store" :item="item" :module="module" v-on:added="added"></users-form>
                </div>
                <div class="panel-footer">
                    <crud-back :name="module"></crud-back>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UsersForm from './Form.vue'
    import CrudBack from "../../components/Crud/Back.vue";

    export default {
        props: ['store'],
        components: {
            CrudBack,
            UsersForm
        },
        mounted() {
            this.tmpItem = JSON.parse(JSON.stringify(this.item));
        },
        data() {
            return {
                module: 'users',
                item: {
                    id: null,
                    email: '',
                    password: '',
                    name: '',
                    country: {},
                    role: null
                },
                tmpItem: {}
            }
        },
        methods: {
            added() {
                // Set default value
                this.item = JSON.parse(JSON.stringify(this.tmpItem));
            }
        }
    }
</script>
