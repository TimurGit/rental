<!-- Vue component -->
<template>
    <div class="form-group">
        <label class="typo__label" for="user">ФИО</label>
        <multiselect v-model="selectedUsers"
                     id="user" label="label" track-by="value"
                     placeholder="Начните вводить ФИО" open-direction="bottom"
                     :options="users" :multiple="false" :searchable="true"
                     :loading="isLoading" :internal-search="false"
                     :clear-on-select="true" :close-on-select="false" :options-limit="300"
                     :limit="3" :limit-text="limitText" :max-height="600" :show-no-results="false"
                     :hide-selected="true" @search-change="asyncFind">
            <template slot="clear" scope="props">
                <div class="multiselect__clear" v-if="selectedUsers.length" @mousedown.prevent.stop="clearAll(props.search)"></div>
            </template><span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
        </multiselect>
        <input type="hidden" name="user_id" :value="selectedUsers.value">
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    // register globally
    Vue.component('multiselect', Multiselect)

    export default {

        props:{

            selectedUsers: {
                type: Object,
                default () {
                    return {
                        value: 0,
                        label: 'ФИО',
                    }
                }
            }
        },
        // OR register locally
        components: { Multiselect },
        data () {
            return {
                users: [],
                isLoading: false,
                errors:[]
            }
        },
        methods: {
            limitText (count) {
                return `and ${count} other users`
            },
            asyncFind (query) {
                if (query) {
                    this.isLoading = true

                    axios.get('/api/userlist', {
                        params: {q: query}
                    })
                        .then(response => {
                            this.users = response.data
                            this.isLoading = false
                        })
                        .catch(e => {
                            this.errors.push(e)
                            this.isLoading = false
                        })
                }
            },
            clearAll () {
                this.selectedUsers = []
            }
        }
    }
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

