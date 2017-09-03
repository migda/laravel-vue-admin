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
    export default {
        name: 'crud-form',
        props: ['item', 'store', 'module'],
        data() {
            return {}
        },
        mounted() {
        },
        methods: {
            onSubmit() {
                if (this.item.id)
                    this.updateItem();
                else
                    this.createItem();
            },
            createItem() {
                return new Promise((resolve) => {
                        this.$http.post(this.store.apiUrl + this.module, this.item).then((response) => {
                            this.$swal("Added!", response.data.name, "success");
                            this.item = {};
                            resolve();
                        }, () => {
                            this.$swal("Something went wrong. Try again!", '', "error");
                        });
                    }
                );
            },
            updateItem() {
                return new Promise((resolve) => {
                        this.$http.patch(this.store.apiUrl + this.module + '/' + this.item.id + '/', this.item).then((response) => {
                            this.$swal("Edited!", this.item.name, "success");
                            resolve();
                        }, () => {
                            this.$swal("Something went wrong. Try again!", '', "error");
                        });
                    }
                );
            }
        }
    }
</script>
