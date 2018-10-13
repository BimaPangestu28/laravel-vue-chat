<template>
    <div class="col col-md-4">
        <h3>Users online {{ users.length }}</h3>
        <u>
            <li v-for="user in users" v-text="user.name"></li>
        </u>
    </div>
</template>

<script>
    import EventBus from '../bus'

    export default {
        data: () => ({
            users: []
        }),

        created() {
            EventBus.$on('users.here', (users) => {
                this.users = users
                console.log(users)
            }).$on('user.join', (user) => {
                this.users.push(user)
            }).$on('user.leave', (user) => {
                this.users = this.users.filter((u) => {
                    return u.id != user.id
                })
            })
        }
    }
</script>

<style>

</style>
