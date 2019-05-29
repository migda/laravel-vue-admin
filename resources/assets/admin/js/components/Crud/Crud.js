export default {
    props: [],
    data() {
        return {
            loading: true,
            items: [],
            pagination: {
                isLoading: true
            }
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
        getItems(page = 1) {
            return new Promise((resolve) => {
                    this.setPaginationLoading();
                    this.$http.get(this.getUrl(page)).then((response) => {
                        this.items = response.data.data;
                        this.setPagination(response.data);
                        resolve();
                    }, () => {
                        this.$swal("Something went wrong. Try again!", '', "error");
                    });
                }
            );
        },
        getUrl(page = 1) {
            return this.$store.getters.apiUrl + this.module + '/?page=' + page;
        },
        setPaginationLoading() {
            this.pagination.isLoading = true;
        },
        setPagination(data) {
            this.pagination = {
                currentPage: data.meta.current_page,
                from: data.meta.from,
                lastPage: data.meta.last_page,
                to: data.meta.to,
                total: data.meta.total,
                isLoading: false
            }
        },
        changePage(page) {

            this.getItems(page);
        },
    }
};