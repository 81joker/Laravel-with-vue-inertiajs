<template>
  <div>
    <!-- {{ listing.id }} -->
    <ListingAddress :listing="listing" />
  </div>
</template>
<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
defineProps({
  listing: Object,
})
</script>