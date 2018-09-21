<template>
    <div class="row">
        <div class="col-xs-2">
            <div class="loader"></div>
        </div>
        <div class="col-xs-10">
            <slot></slot>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'loader'
    }
</script>

<style>
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #888; /* Grey */
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>