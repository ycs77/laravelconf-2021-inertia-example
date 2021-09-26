<template>
  <div>登入成功 {{ $page.props.user.name }}！</div>
</template>

<script>
import Layout from '@/layouts/Default.vue'

export default {
  layout: Layout,
}
</script>
