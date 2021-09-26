<template>
  <h1 class="title">首頁</h1>

  <Link href="/fail">錯誤頁面</Link>
</template>

<script>
import Layout from '@/layouts/Default.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
  layout: Layout,
  components: { Link },
}
</script>
