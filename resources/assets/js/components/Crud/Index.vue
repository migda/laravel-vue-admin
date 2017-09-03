<template>
    <div>
        <div class="row">
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
    </div>
</template>

<script>
    export default {
        name: 'crud-index',
        props: ['columns'],
        components: {},
        methods: {}
    }
</script>