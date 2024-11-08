<template>
  <form>
    <div class="mb-4 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center gap-2">
        <input
          id="deleted"
          v-model="filterForm.deleted"
          type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
        />
        <label for="deleted">Deleted</label>
      </div>

      <div>
        <select v-model="filterForm.by" class="input-filter-l w-24">
          <option value="created_at">Added {created_at}</option>
          <option value="price">Price</option>
        </select>
        <select v-model="filterForm.order" class="input-filter-r w-32">
          <option
            v-for="option in sortOptions" 
            :key="option.value" :value="option.value"
          >
            {{ option.value }}
            {{ option.label }}
          </option>
        </select>
      </div>

    </div>
  </form>
</template>
  
<script setup>
import { reactive, watch ,computed } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { router } from '@inertiajs/vue3'
import {debounce} from 'lodash';
// router.post('/companies', data, {
//   forceFormData: true,
// })
const sortLabels = {
  created_at: [
    {
      label: 'Latest',
      value: 'desc'
    },
    {
      label: 'Oldest',
      value: 'asc'
    },
  ],
  price: [
    {
      label: 'Pricey',
      value: 'desc',
    },
    {
      label: 'Cheapest',
      value: 'asc',
    },
  ],
}
const props = defineProps({
    filters: Object,
});
const sortOptions = computed(() => sortLabels[filterForm.by])
const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
  by: props.filters.by?? 'created_at',
  order: props.filters.order?? 'desc',
  // X:0
})
// reactive / ref / computed
// https://vuejs.org/guide/essentials/watchers.html

watch(
  filterForm, 
  debounce(() => {
    router.get('/realtor/listing', filterForm, {preserveState: true, preserveScroll: true});
  }, 500) 
);
  // filterForm, () => Inertia.get(
  //   route('realtor.listing.index'),
  //   filterForm,
  //   {preserveState: true, preserveScroll: true},
  // ),
// )
// watch([() => filterForm.deleted , ()=> filterForm.XXX], (newValue, oldValue) => {
//   console.log( newValue ,oldValue);
//   // You can trigger Inertia request here if needed
//   // Inertia.get('/your-endpoint', { filter: newValue });
// });
</script>
  