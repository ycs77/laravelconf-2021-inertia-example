<template>
  <div>
    <header class="border-b border-gray-200">
      <div class="container mx-auto">
        <nav class="nav flex items-center px-4 space-x-6">
          <div class="brand">Inertia Example</div>
          <Link href="/" :class="{ active: $page.url === '/' }">
            首頁
          </Link>
          <Link href="/about" :class="{ active: $page.url === '/about' }">
            關於
          </Link>
          <Link href="/comments" :class="{ active: $page.url === '/comments' }">
            留言
          </Link>
          <Link v-if="!$page.props.user" href="/login" :class="{ active: $page.url === '/login' }">
            登入
          </Link>
          <Link v-else href="/logout" method="post" as="button">
            登出
          </Link>
        </nav>
      </div>
    </header>

    <main class="container mx-auto p-4">
      <slot />
    </main>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: { Link },
}
</script>
