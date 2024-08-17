<template>
    <form>
        <div class="flex flex-wrap mb-2 mt-2">
            <div class="flex flex-nowrap gap-2 items-center mb-2 mt-2">
                <input id="deleted" type="checkbox" v-model="filterForm.deleted"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import { debounce } from 'lodash';

const filterForm = reactive({
    deleted: false
})

watch(
    filterForm, debounce(() => router.get(
        route('realtor.listing.index'),
        filterForm,
        { preserveState: true, preserveScroll: true },
    ), 1000),
)

</script>