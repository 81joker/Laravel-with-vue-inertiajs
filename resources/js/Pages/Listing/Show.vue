<template>
  <div>
    <ListingAddress :listing="listing" />
    <Link :href="`/listing/${listing.id}/edit`">Edit</Link>   
  </div>
</template>
<script setup>
import {Link} from '@inertiajs/vue3'

import ListingAddress from '@/Components/ListingAddress.vue'
defineProps({
  listing: Object,
})
</script>