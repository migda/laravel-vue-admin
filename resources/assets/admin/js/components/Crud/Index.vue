<template>
    <div>
        <div class="row" v-if="!loading">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead class="thead-inverse">
                    <tr>
                        <th v-for="column in columns" :style="'width:'+column.width+'%'">{{column.name}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <slot></slot>
                    </tbody>
                </table>
                <div>Paginate toddo</div>
            </div>
        </div>
        <loader v-else>Loading {{ this.module }}</loader>
    </div>
</template>

<script>
    export default {
        name: 'CrudIndex',
        props: ['columns', 'loading'],
        components: {},
        methods: {},
        computed: {
            module() {
                return this.$store.getters.module;
            }
        }
    }
</script>