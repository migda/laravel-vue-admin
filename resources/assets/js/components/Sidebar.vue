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
        name: 'sidebar'
    }
</script>
<style>
    #sidebar ul li a {
        text-align: left;
    }

    #sidebar.active ul li a {
        padding: 20px 10px;
        text-align: center;
        font-size: 0.85em;
    }

    #sidebar.active ul li a i {
        margin-right:  0;
        display: block;
        font-size: 1.8em;
        margin-bottom: 5px;
    }

    /* Same dropdown links padding*/
    #sidebar.active ul ul a {
        padding: 10px !important;
    }

    /* Changing the arrow position to bottom center position,
       translateX(50%) works with right: 50%
       to accurately  center the arrow */
    #sidebar.active a[aria-expanded="false"]::before, #sidebar.active a[aria-expanded="true"]::before {
        top: auto;
        bottom: 5px;
        right: 50%;
        transform: translateX(50%);
    }
</style>