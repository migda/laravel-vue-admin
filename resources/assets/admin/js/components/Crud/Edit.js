export default {
    props: ['store'],
    data() {
        return {
            loading: true,
            item: {},
            id: this.$route.params.id
        };
    },

    mounted: function () {
        this.getItem().then(() => {
            this.loading = false;
        });
    },
    methods: {
        getItem() {
            return new Promise((resolve) => {
                    this.$http.get(this.getUrl()).then((response) => {
                        this.item = response.data;
                        resolve();
                    }, () => {
                        this.$swal("Something went wrong. Try again!", '', "error");
                    });
                }
            );
        },
        getUrl() {
            return this.store.apiUrl + this.module + '/' + this.id + '/';
        },
    }
};