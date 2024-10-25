<template>
    <Link href="/">Main Page</Link>&nbsp;
    <Link href="/show">Show Page</Link>&nbsp;
    <Link href="/listing">listing Page</Link>&nbsp;
    <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
    <!-- <div>The page with time {{timer}}</div> -->
    <slot>Default</slot>
  </template>
  <script setup>
  import { Link ,usePage} from '@inertiajs/vue3'
  import { computed } from 'vue'

  
  const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)

//   const timer = ref(0)
// setInterval(() => timer.value++, 1000)
  </script>

<style scoped>
  .success {
    background-color: green;
    color: white;
  }
</style>