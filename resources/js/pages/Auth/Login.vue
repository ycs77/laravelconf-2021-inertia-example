<template>
  <h1 class="title">會員登入</h1>

  <form @submit.prevent="form.post('/login')">
    <div class="input-group">
      <label>E-mail：</label>
      <input type="text" v-model="form.email">
      <div v-if="form.errors.email" class="invalid">
        {{ form.errors.email }}
      </div>
    </div>

    <div class="input-group">
      <label>密碼：</label>
      <input type="password" v-model="form.password">
    </div>

    <button class="btn">登入</button>
  </form>
</template>

<script>
import Layout from '@/layouts/Default.vue'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  layout: Layout,
  setup() {
    const form = useForm({
      email: '',
      password: '',
    })

    return { form }
  },
}
</script>
