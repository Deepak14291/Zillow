  <template>
    <div>
      <Filter :filters="filters">

      </Filter>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
      <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing">
      </Listing>
    </div>

    <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
      <Pagination :links="listings.links">
      </Pagination>
    </div>
  </template>

<script setup>
import Pagination from '../Components/UI/Pagination.vue';
import Filter from './Index/Components/Filters.vue';
import Listing from './Index/Components/Listing.vue';
defineProps({
  listings: Object,
  filters: Object,
})
</script>