<template>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Sidebar example</div>

            <div class="panel-body">
                <ul class="list-unstyled">
                    <li>
                        <router-link :to="{ name: 'dashboard'}">
                            <span class="glyphicon glyphicon-home"></span> Home
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'countries'}">
                            <span class="glyphicon glyphicon-globe"></span> Counties
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'users'}">
                            <span class="glyphicon glyphicon-user"></span> Users
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'sidebar',
        props: ['store']
    }
</script>