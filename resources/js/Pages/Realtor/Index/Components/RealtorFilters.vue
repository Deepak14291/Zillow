<template>
    <form>
        <div class="flex flex-wrap mb-2 mt-2">
            <div class="flex flex-nowrap gap-2 items-center mb-2 mt-2">
                <input id="deleted" type="checkbox" v-model="filterForm.deleted"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <label for="deleted">Deleted</label>

                <div>
                    <select class="input-filter-l w-24" v-model="filterForm.by">
                        <option value="created_at">Added</option>
                        <option value="price">Price</option>
                    </select>
                    <select class="input-filter-r w-32" v-model="filterForm.order">
                        <option v-for="option in sortOptions" :key="option.value" :value="option.value">{{ option.label
                            }}</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import { debounce } from 'lodash';

const sortLabels = {
    'created_at': [
        {
            label: 'latest',
            value: 'desc',
        },
        {
            label: 'oldest',
            value: 'asc',
        },
    ],
    'price': [
        {
            label: 'pricey',
            value: 'desc',
        },
        {
            label: 'cheapest',
            value: 'asc',
        }
    ],
}

const sortOptions = computed(() => sortLabels[filterForm.by])

const props = defineProps({
    filters: Object
})

const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? 'created_at',
    order: props.filters.order ?? 'desc',
})

watch(
    filterForm, debounce(() => router.get(
        route('realtor.listing.index'),
        filterForm,
        { preserveState: true, preserveScroll: true },
    ), 1000),
)

</script>