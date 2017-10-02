<!-- Vue component -->
<template>
    <div class="form-group">
        <label class="typo__label" for="transport">Регистрационный номер</label>
        <multiselect v-model="selectedTransports"
                     id="transport" label="label" track-by="value"
                     placeholder="Начните вводить рег. номер" open-direction="bottom"
                     :options="transports" :multiple="false" :searchable="true"
                     :loading="isLoading" :internal-search="false"
                     :clear-on-select="true" :close-on-select="false" :options-limit="300"
                     :limit="3" :limit-text="limitText" :max-height="600" :show-no-results="false"
                     :hide-selected="true" @search-change="asyncFind">
            <template slot="clear" scope="props">
                <div class="multiselect__clear" v-if="selectedTransports.length" @mousedown.prevent.stop="clearAll(props.search)"></div>
            </template><span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
        </multiselect>
        <input type="hidden" name="transport_id" :value="selectedTransports.value">
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    // register globally
    Vue.component('multiselect', Multiselect)

    export default {
        props:{
            selectedTransports: {
                type: Object,
                default () {
                    return {
                        value: 0,
                        label: 'Номер',
                    }
                }
            }
        },
        // OR register locally
        components: { Multiselect },
        data () {
            return {
                transports: [],
                isLoading: false,
                errors:[]
            }
        },
        methods: {
            limitText (count) {
                return `and ${count} other transports`
            },
            asyncFind (query) {
                if (query) {
                    this.isLoading = true

                    axios.get('/api/transports', {
                        params: {q: query}
                    })
                        .then(response => {
                            this.transports = response.data
                            this.isLoading = false
                        })
                        .catch(e => {
                            this.errors.push(e)
                            this.isLoading = false
                        })
                }
            },
            clearAll () {
                this.selectedTransports = []
            }
        }
    }
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
    .multiselect__content-wrapper{
        z-index: 4;
    }
</style>