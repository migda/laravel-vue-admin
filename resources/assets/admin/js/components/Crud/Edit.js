export default {
    props: [],
    data() {
        return {
            loading: true,
            item: {},
            id: this.$route.params.id
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
        this.getItem().then(() => {
            this.loading = false;
        });
    },
    methods: {
        getItem() {
            return new Promise((resolve) => {
                    this.$http.get(this.getUrl()).then((response) => {
                        this.item = response.data.data;
                        resolve();
                    }, () => {
                        this.$swal("Something went wrong. Try again!", '', "error");
                    });
                }
            );
        },
        getUrl() {
            return this.apiUrl + this.module + '/' + this.id + '/';
        },
    }
};