<template>
    <nav aria-label="Pagiation" v-cloak>
        <div v-bind:class="{ disabled: pagination.isLoading }" class="row" v-if="pagination.total !== 0">
            <div style="float:left; display:inline-block; margin:6px 15px;">
                <p>Results: {{ pagination.from }} - {{ pagination.to }} of {{ pagination.total }}</p>
            </div>
            <div style="display:inline-block; float:right; margin:0 10px;">
                <ul :class="'pagination pagination-sm'">
                    <!--PREVIOUS-->
                    <li>
                        <a v-on:click="changePage(previousPage())">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <!--SHOW FIRST 2 PAGES IF NOT SHOWN-->
                    <li v-for="n in 2">
                        <a v-on:click="changePage(n)" v-if="showPage(n)">{{ n }}</a>
                    </li>
                    <li class="disabled" v-if="showPage(1)"><span>...</span></li>

                    <!--MAIN-->
                    <li v-for="n in pages()" :class="{'active' : n === pagination.currentPage}">
                        <a v-on:click="changePage(n)">{{ n }}</a>
                    </li>

                    <!--SHOW LAST 2 PAGES IF NOT SHOWN-->
                    <li class="disabled" v-if="showPage(pagination.lastPage)"><span>...</span></li>
                    <li>
                        <a v-on:click="changePage(pagination.lastPage-1)"
                           v-if="showPage(pagination.lastPage-1)">{{ pagination.lastPage - 1 }}</a>
                    </li>
                    <li>
                        <a v-on:click="changePage(pagination.lastPage)"
                           v-if="showPage(pagination.lastPage)">{{ pagination.lastPage }}</a>
                    </li>

                    <!--NEXT-->
                    <li>
                        <a v-on:click="changePage(nextPage())" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'Pagination',
        props: ['pagination', 'limiter'],
        methods: {
            nextPage() {
                if (this.pagination.currentPage < this.pagination.lastPage)
                    return this.pagination.currentPage + 1;
                return 1; // go to start
            },
            previousPage() {
                if (this.pagination.currentPage > 1)
                    return this.pagination.currentPage - 1;
                return this.pagination.lastPage; // go to the last page
            },
            pages() {
                let min, max;
                let pages = [];
                // Only odd numbers
                let limit = (this.limiter % 2 === 0 ? this.limiter - 1 : this.limiter);
                let floor = Math.floor(limit / 2);
                let ceil = Math.ceil(limit / 2);
                // Set up min and max
                if (limit > this.pagination.lastPage) {
                    min = 1;
                    max = this.pagination.lastPage;
                }
                else if (this.pagination.currentPage < ceil) {
                    min = 1;
                    max = limit;
                } else if (this.pagination.currentPage > this.pagination.lastPage - floor) {
                    min = this.pagination.lastPage - (limit - (ceil - floor));
                    max = this.pagination.lastPage;
                } else {
                    min = this.pagination.currentPage - floor;
                    max = this.pagination.currentPage + floor;
                }
                // Push pages to array
                for (let i = min; i <= max; i++) {
                    pages.push(i);
                }
                return pages;
            },
            showPage(page) {
                if (page >= 1 && page <= this.pagination.lastPage)
                    return this.pages().indexOf(page) === -1;
                return false;
            },
            changePage(page) {
                this.$emit('changePage', page);
            },
        }
    }
</script>
<style>
    .disabled {
        pointer-events: none;
    }
</style>
