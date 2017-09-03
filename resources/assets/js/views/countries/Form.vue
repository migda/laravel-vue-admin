<template>
    <form @submit.prevent="onSubmit">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" v-model="item.name"
                           placeholder="Name"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" v-if="item.id">Edit</button>
                <button class="btn btn-success" v-else>Create</button>
            </div>
        </div>
    </form>
</template>

<script>
    import CrudEdit from '../../components/Crud/Form'

    export default {
        name: 'countries-form',
        mixins: [CrudEdit]
    }
</script>
