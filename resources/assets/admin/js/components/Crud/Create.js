export default {
    props: [],
    data() {
        return {
            item: {}
        };
    },
    computed: {
        module() {
            return this.$store.getters.module;
        },
        title() {
            return this.$store.getters.title;
        }
    },
    methods: {
        onCreated() {
            // Clear inputs
            this.item = {};
        }
    }
};