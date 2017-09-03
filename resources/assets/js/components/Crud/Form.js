export default {
    name: 'crud-form',
    props: ['item', 'store', 'module'],
    data() {
      return {
          tmpItem: {}
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
                    this.$http.post(this.store.apiUrl + this.module, this.item).then((response) => {
                        this.$swal("Added!", response.data.name, "success");
                        this.$emit('added');
                        resolve();
                    }, (response) => {
                        this.$swal("Something went wrong. Try again!", JSON.stringify(response.data), "error");
                    });
                }
            );
        },
        updateItem() {
            return new Promise((resolve) => {
                    this.$http.patch(this.store.apiUrl + this.module + '/' + this.item.id + '/', this.item).then((response) => {
                        this.$swal("Edited!", this.item.name, "success");
                        resolve();
                    }, (response) => {
                        this.$swal("Something went wrong. Try again!", JSON.stringify(response.data), "error");
                    });
                }
            );
        }
    }

};