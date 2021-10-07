<template>
    <v-alert border="top" class="mb-2" :color="color" dark>
        {{ message }}
    </v-alert>
</template>

<script>
export default {
    name: 'Alert',
    props: {
        color: {
            type: String,
            default: 'red lighten-2'
        },
        message: {
            type: String,
            default: ''
        }
    },
}
</script>