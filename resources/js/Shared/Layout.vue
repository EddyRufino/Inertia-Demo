<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="text-lg font-bold">My App</h1>
                <p class=" ml-4">Welcome, {{ username }}</p>
            </div>
            <Nav />
        </header>
    </section>

    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
import Nav from './Nav'

export default {
    components: { Nav },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>
