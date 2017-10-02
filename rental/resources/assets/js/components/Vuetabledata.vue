<template>
    <div class="container-fluid">
    <table class="table">
        <thead>
        <tr>
            <th>Дата взятия</th>
            <th>Дата возврата</th>
            <th>ФИО</th>
            <th>Создано</th>
            <th>Обновлена</th>
            <th width="300px;"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item of opportunities">
            <td><a :href="'/opportunities/' + item.id + '/edit'">{{ item.start }}</a></td>
            <td><a :href="'/opportunities/' + item.id + '/edit'">{{ item.finish }}</a></td>
            <td>{{ item.user.name}}</td>
            <td>{{ item.created_at }}</td>
            <td>{{ item.updated_at }}</td>
            <td>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>

        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a aria-label="Previous" v-bind:class="{ disabled: isFirstPage }" @click="prevpage">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li>
                <a aria-label="Next" v-bind:class="{ disabled: isLastPage }" @click="nextpage" >
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    </div>
</template>

<script>

    export default {
        props:{
            transportId: {
                type: Number,
                default: '0'
            }
        },
        data () {
            return {
                opportunities: {},
                current_page: 1,
                next_page: 0,
                prev_page: 0,
                per_page:10,
                from:1,
                last_page:0,
                errors: {}
            }
        },
        computed: {
            isLastPage () {
                return this.current_page === this.last_page
            },
            isFirstPage () {
                return this.current_page === this.from
            },
        },
        mounted() {
            axios.get('/api/opportunities?transport_id='+this.transportId)
                .then(response => {
                // JSON responses are automatically parsed.
                this.opportunities = response.data.data;
                this.current_page = response.data.current_page;
                this.from = response.data.from;
                this.last_page = response.data.last_page;
                this.per_page = response.data.per_page;
            })
            .catch(e => {
                    this.errors.push(e)
            })
        },
        methods: {
            nextpage () {
                this.next_page = this.current_page+1;
                this.prev_page = this.current_page-1;
                axios.get('/api/opportunities?transport_id='+this.transportId + '&page='+ this.next_page)
                    .then(response => {
                    // JSON responses are automatically parsed.
                    this.opportunities = response.data.data;
                    this.current_page = response.data.current_page;
                    this.per_page = response.data.per_page;
                })
                .catch(e => {
                        this.errors.push(e)
                })
            },
            prevpage(){
                this.next_page = this.current_page+1;
                this.prev_page = this.current_page-1;
                axios.get('/api/opportunities?transport_id='+this.transportId + '&page='+ this.prev_page)
                    .then(response => {
                    // JSON responses are automatically parsed.
                    this.opportunities = response.data.data;
                    this.current_page = response.data.current_page;
                    this.per_page = response.data.per_page;
                })
                .catch(e => {
                        this.errors.push(e)
                })
            }
        },
    }
</script>
<style>

    .pagination a.disabled {
        color: lightgray;
        pointer-events: none;
        cursor: not-allowed;
    }
</style>
