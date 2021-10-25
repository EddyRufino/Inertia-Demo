<template>
    <h1>Hi, {{ this.name }}</h1>
    <br>
    <ul>
        <li v-for="framework of frameworks" v-text="framework"></li>
    </ul>
</template>

<script>
export default {
    props: {
        name: String,
        frameworks: Array
    }
};
</script>
