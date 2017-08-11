<script>
module.exports =  {
    props: {
        current: {
            type: Number,
            default: 1
        },
        total: {
            type: Number,
            default: 0
        },
        perPage: {
            type: Number,
            default: 9
        },
        pageRange: {
            type: Number,
            default: 2
        }
    },
    computed: {
        pages: function() {
            var pages = []

            for(var i = this.rangeStart; i <= this.rangeEnd; i++) {
                pages.push(i)
            }

            return pages
        },
        rangeStart: function() {
            var start = this.current - this.pageRange

            return (start > 0) ? start : 1
        },
        rangeEnd: function() {
            var end = this.current + this.pageRange

            return (end < this.totalPages) ? end : this.totalPages
        },
        totalPages: function() {
            return Math.ceil(this.total/this.perPage)
        },
        nextPage: function() {
            return this.current + 1
        },
        prevPage: function() {
            return this.current - 1
        }
    },
    methods: {
        hasFirst: function() {
            return this.rangeStart !== 1
        },
        hasLast: function() {
            return this.rangeEnd < this.totalPages
        },
        hasPrev: function() {
            return this.current > 1
        },
        hasNext: function() {
            return this.current < this.totalPages
        },
        changePage: function(page) {
            this.$emit('page-changed', page)
        }
    }
};
</script>

<template>
    <ul class="rudolf-pagination">
        <li class="prev">
            <a href="#" v-if="hasPrev()" @click.prevent="changePage(prevPage)"></a>
        </li>

        <li v-if="hasFirst()"><a href="#" @click.prevent="changePage(1)">1</a></li>
        <li v-if="hasFirst()">...</li>


        <li v-for="page in pages">
            <a href="#" @click.prevent="changePage(page)" :class="{ active: current == page }">
                {{ page }}
            </a>
        </li>

        <li v-if="hasLast()">...</li>
        <li v-if="hasLast()"><a href="#" @click.prevent="changePage(totalPages)">{{ totalPages }}</a></li>

        <li class="next">
            <a href="#" v-if="hasNext()" @click.prevent="changePage(nextPage)"></a>
        </li>
    </ul>
</template>
