export default {
    props: ['store'],
    data() {
        return {
            loading: true,
            items: []
        };
    },

    mounted: function () {
        this.getItems().then(() => {
            this.loading = false;
        });
    },
    methods: {
        getItems() {
            return new Promise((resolve) => {
                    this.$http.get(this.getUrl()).then((response) => {
                        this.items = response.data.data;
                        resolve();
                    }, () => {
                        this.$swal("Something went wrong. Try again!", '', "error");
                    });
                }
            );
        },
        getUrl() {
            return this.store.apiUrl + this.module + '/';
        }
    }
};