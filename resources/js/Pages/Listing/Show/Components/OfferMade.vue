<template>
    <Box>
        <template #header>Offer Made</template>

        <price :price="offer.amount" class="text-3xl"></price>

        <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-500">
            <div>Made on</div>
            <div class="font-medium">{{ offerMadeOn }}</div>
        </section>
    </Box>
</template>

<script setup>
import { computed } from 'vue';
import Box from '@/Pages/Components/UI/Box.vue';
import Price from '@/Pages/Components/UI/Price.vue';

const props = defineProps({
    offer: Object,
})

const offerMadeOn = computed(
    () => new Date(props.offer.created_at).toDateString(),
)
</script>