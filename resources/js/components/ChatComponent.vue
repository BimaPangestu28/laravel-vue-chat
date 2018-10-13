<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <messages></messages>
            <users></users>
        </div>
    </div>
</template>

<script>
    import Messages from './Messages'
    import Users from './Users'

    export default {
        components: {
            Messages, Users
        }
    }
</script>

<style>
    .col {
        display: inline-block;
        float: left;
    }

    .self {
        text-align: right;
    }
</style>

