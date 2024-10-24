<template>
  <!-- <MainLayout> -->
    <div>Index</div>
    <Link href="/show">Show Page</Link>
    <div>
      The message is {{ message }}
    </div>
  <!-- </MainLayout> -->
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
import MainLayout from '../../Layouts/MainLayout.vue'
defineProps({ message: String })
</script>
<!-- 
<script>
import MainLayout from '../../Layouts/MainLayout.vue';
export default {
  layout: MainLayout
}
</script> -->