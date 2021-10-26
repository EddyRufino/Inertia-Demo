<template>
    <h1 class="text-4xl font-bold">
        User
    </h1>

    <Nav></Nav>

    <div style="margin-top: 800px">
        <p>La hora actual es {{ time }}.</p>

        <Link href="/users" class="text-blue-500" preserve-scroll>
            Refresh
        </Link>
    </div>

</template>

<script>
import Nav from '../Shared/Nav';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Nav, Link
    },
    props: {
        time: String,
    }
};
</script>
