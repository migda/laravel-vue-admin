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
                <div>
                    <pagination :pagination="pagination" :limiter="limiter"
                                @changePage="changePage"></pagination>
                </div>
            </div>
        </div>
        <loader v-else>Loading {{ this.module }}</loader>
    </div>
</template>

<script>
    import Pagination from "../Pagination";

    export default {
        name: 'CrudIndex',
        props: ['columns', 'loading', 'pagination'],
        components: {Pagination},
        data() {
            return {
                limiter: 7
            }
        },
        computed: {
            module() {
                return this.$store.getters.module;
            }
        },
        methods: {
            changePage(page) {
                this.$emit('changePage', page);
            },
        },
    }
</script>