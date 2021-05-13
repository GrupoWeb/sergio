<template>
    <div>
        
    </div>
</template>

<script>
export default {
    data () {
        return {}
    },
    mounted() {
    
    },
    methods: {
        getConection () {
            console.log(process.ENV.DB_CONNECTION)
        }
    },
}
</script>