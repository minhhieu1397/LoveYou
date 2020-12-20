<template>
    <div id="app-container">
        home
        <home />
    </div>
</template>

<script>
import dashboard from './dashboard'
import profile from './Profile'

export default {
    components: {
        helloworld,
        section1,
        login,
        home,
    },
    data() {
        return {
            text: 'This is app component.'
        }
    }
}
</script>