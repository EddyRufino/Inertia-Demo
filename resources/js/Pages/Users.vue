<template>
    <h1 class="text-4xl font-bold">
        User
    </h1>

    <div style="margin-top: 800px">
        <p>La hora actual es {{ time }}.</p>

        <Link href="/users" class="text-blue-500" preserve-scroll>
            Refresh
        </Link>
    </div>

</template>

<script>
export default {
    props: {
        time: String,
    }
};
</script>
