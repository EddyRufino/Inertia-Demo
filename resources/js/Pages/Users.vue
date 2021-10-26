<template>
    <Layout>
        <h1 class="text-4xl font-bold">
            User
        </h1>

        <div style="margin-top: 800px">
            <p>La hora actual es {{ time }}.</p>

            <Link href="/users" class="text-blue-500" preserve-scroll>
                Refresh
            </Link>
        </div>
    </Layout>

</template>

<script setup>
import Layout from '../Shared/Layout';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    time: String
});
</script>
