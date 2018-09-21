export default {
    props: [],
    data() {
        return {
            loading: true,
            items: []
        };
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
            return this.$store.getters.apiUrl + this.module + '/';
        }
    }
};