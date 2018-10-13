<template>
    <div class="col col-md-8">
        <div class="col messages">
            <div :class="{'alert':true,
                        'alert-success': true,
                        'self': (message.user.name == user.name),
                        'other': (message.user.name != user.name)}" v-for="message in messages">
                <span v-text="message.user.name"></span>
                <p v-text="message.subject"></p>
            </div>
        </div>
        <div class="col">
            <input-chat></input-chat>
        </div>
    </div>
</template>

<script>
    import InputChat from './InputChat'
    import EventBus from '../bus'

    export default {
        components: {
            InputChat
        },

        data: () => ({
            messages: [],
            user: []
        }),

        methods: {
            getMessages() {
                axios.get('/api/messages').then((res) => {
                    this.messages = res.data
                    this.scrollToBottom()
                })
            },

            scrollToBottom() {
                setTimeout(() => {
                    let chat = $(".messages")[0]

                    chat.scrollTop = chat.scrollHeight
                }, 10)
            }
        },

        created() {
            this.user = Laravel.user
            this.getMessages()

            EventBus.$on('message.sent', (message) => {
                this.messages.push(message)

                this.scrollToBottom()
            })
        },
        
    }
</script>

<style>
    .messages {
        height: 600px;
        overflow-y: scroll;
        margin-bottom: 25px;
    }
</style>
