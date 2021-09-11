<template>
  <div>
    <nav>
      <Link href="/">首頁</Link>
      <Link href="/about">關於</Link>
      <Link href="/comments">留言</Link>
    </nav>
    <slot />
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: { Link },
}
</script>
