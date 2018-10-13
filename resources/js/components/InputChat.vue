<template>
    <div>
        <textarea class="form-control" cols="10" rows="1" placeholder="Type your messages...." v-model="message" @keydown="handle"></textarea>
    </div>
</template>

<script>
    import EventBus from '../bus'

    export default {
        data: () => ({
            message: ''
        }),

        methods: {
            handle(e) {
                if(e.key == "Enter" && !e.shiftKey) {
                    this.sendMessage()
                }
            },

            sendMessage() {
                axios.post('/api/messages', {subject: this.message, id: Laravel.user.id})
                     .then((res) => {
                         let data = {
                            subject: this.message,
                            user: {
                                name: Laravel.user.name,
                            }
                         }

                         EventBus.$emit('message.sent', data)

                         this.message = ''
                     })
            }
        }
    }
</script>

<style>

</style>
