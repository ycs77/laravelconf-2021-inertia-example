<template>
  <h1 class="title">關於</h1>
  <div>你好~ 我是 {{ name }}</div>
</template>

<script>
import Layout from '@/layouts/Default.vue'

export default {
  layout: Layout,
  props: {
    name: String,
  },
}
</script>
