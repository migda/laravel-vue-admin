<template>
    <form @submit.prevent="onSubmit">
        todo form
    </form>
</template>

<script>
    export default {
        name: 'users-form',
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
                            this.item = response.data;
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
