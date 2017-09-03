<template>
    <router-link :to="{ name: name}" class="btn btn-sm btn-success">
        Add new
    </router-link>
</template>

<script>
    export default {
        name: 'create-button',
        props: ['name']
    }
</script>