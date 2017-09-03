<template>
    <router-link :to="{ name: name}">Go back to {{ name }}</router-link>
</template>

<script>
    export default {
        name: 'crud-back',
        props: ['name']
    }
</script>