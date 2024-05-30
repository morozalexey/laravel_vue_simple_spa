<script>
export default {
    name: "Show",

    data () {
        return {
            person: null
        }
    },

    mounted() {
        // this.$store.dispatch('getPerson', this.$route.params.id)
        this.getPerson();
    },

    // computed: {
    //     person() {
    //         return this.$store.getters.person
    //     }
    // },

    methods: {
        getPerson() {
            axios.get(`/api/people/${this.$route.params.id}`)
                .then( res => {
                    this.person = res.data.data
                })
        }
    }
}
</script>

<template>
    <div v-if="person">
        <div>
            Name: {{ person.name }}
        </div>
        <div>
            Age: {{ person.age }}
        </div>
        <div>
            Job: {{ person.job }}
        </div>
        <div>
            <router-link :to="{name : 'person.edit', params: { id: person.id}}">Edit</router-link>
        </div>
    </div>
</template>

<style scoped>

</style>
