export default {
    name: 'crud-form',
    props: ['item'],
    data() {
        return {
            tmpItem: {}
        }
    },
    computed: {
        apiUrl() {
            return this.$store.getters.apiUrl;
        },
        module() {
            return this.$store.getters.module;
        },
        title() {
            return this.$store.getters.title;
        }
    },
    mounted() {
        this.tmpItem = JSON.parse(JSON.stringify(this.item));
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
                    this.$http.post(this.apiUrl + this.module, this.item).then((response) => {
                        this.$swal("Created!", response.data.data.name, "success");
                        this.$emit('created');
                        resolve();
                    }, (response) => {
                        this.$swal("Something went wrong. Try again!", JSON.stringify(response.data), "error");
                    });
                }
            );
        },
        updateItem() {
            return new Promise((resolve) => {
                    this.$http.patch(this.apiUrl + this.module + '/' + this.item.id + '/', this.item).then((response) => {
                        this.$swal("Updated!", this.item.name, "success");
                        this.$emit('updated');
                        resolve();
                    }, (response) => {
                        this.$swal("Something went wrong. Try again!", JSON.stringify(response.data), "error");
                    });
                }
            );
        }
    }

};