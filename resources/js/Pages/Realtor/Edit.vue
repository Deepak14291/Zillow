<template>
  <form @submit.prevent="update">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Beds</label>
        <input v-model.number="form.beds" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.beds">
          {{ form.errors.beds }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Baths</label>
        <input v-model.number="form.baths" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.baths">
          {{ form.errors.baths }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Area</label>
        <input v-model.number="form.area" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">City</label>
        <input v-model="form.city" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Post Code</label>
        <input v-model="form.code" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.code">
          {{ form.errors.code }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street</label>
        <input v-model="form.street" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.street">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Street Nr</label>
        <input v-model.number="form.street_nr" type="text" class="input" />
        <div class="input-error" v-if="form.errors.street_nr">
          {{ form.errors.street_nr }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Price</label>
        <input v-model.number="form.price" type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div class="input-error" v-if="form.errors.price">
          {{ form.errors.price }}
        </div>
      </div>

      <div class="col-span-6">
        <button type="submit" class="btn-primary">Update</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  listing: Object
})

const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area: props.listing.area,
  city: props.listing.city,
  street: props.listing.street,
  code: props.listing.code,
  street_nr: props.listing.street_nr,
  price: props.listing.price,

})

const update = () => form.put(route('realtor.listing.update', { listing: props.listing.id }))

</script>