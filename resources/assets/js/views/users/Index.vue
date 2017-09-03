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
                    <crud-index :columns="columns">
                        <tr v-for="item in items">
                            <td>{{ item.id }}</td>
                            <td>
                                <router-link :to="{ name: 'users-edit', params: { id: item.id }}">
                                    {{ item.email }}
                                </router-link>
                            </td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.country ? item.country.name : '-' }}</td>
                            <td>{{ item.created_at }}</td>
                        </tr>
                    </crud-index>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Crud from '../../components/Crud/Crud'
    import CrudIndex from '../../components/Crud/Index.vue'
    import CreateButton from "../../components/Crud/CreateButton.vue";

    export default {
        mixins: [Crud],
        components: {
            CreateButton,
            CrudIndex
        },
        data() {
            return {
                module: 'users',
                columns: [
                    {id: 0, name: 'ID', width: 5},
                    {id: 1, name: 'E-mail', width: 30},
                    {id: 2, name: 'Name', width: 25},
                    {id: 3, name: 'Country', width: 20},
                    {id: 4, name: 'Created at', width: 20},
                ]
            }
        },
        mounted() {
        }
    }
</script>
