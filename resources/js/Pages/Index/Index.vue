<template>
    <div>Hello!</div>
    <Link href="/show">Show Page</Link>
    <div> This is a sample message: {{ message }}</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    message: String
})
</script>
