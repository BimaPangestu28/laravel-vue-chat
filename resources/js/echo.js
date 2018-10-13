import EventBus from './bus'

Echo.join('channel-chat')
    .here((users) => {
        EventBus.$emit('users.here', users)
    })
    .joining((user) => {
        EventBus.$emit('user.join', user)
    })
    .leaving((user) => {
        EventBus.$emit('user.leave', user)
    })
    .listen('MessageSent', (message) => {
        EventBus.$emit('message.sent', message)
    })